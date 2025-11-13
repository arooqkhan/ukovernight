@extends('admin.master.main')

@section('content')
<style>
    .small-swal-popup {
        width: 250px !important;
        padding: 10px !important;
    }
   
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="col-lg-12">
    <h4 class="m-2">Employee Leave Details</h4>
    <div class="statbox widget box box-shadow">

        {{-- ✅ SweetAlert Notifications --}}
        @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                    background: '#28a745',
                    customClass: { popup: 'small-swal-popup' }
                });
            });
        </script>
        @endif

        @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'error',
                    title: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                    background: '#dc3545',
                    customClass: { popup: 'small-swal-popup' }
                });
            });
        </script>
        @endif

        <div class="widget-content widget-content-area">

      <div class="d-flex justify-content-between">

    <!-- Left Side: Apply Leave Button -->
    <div class="m-2">
        <a href="{{ route('leave.create') }}" class="btn btn-primary">
             Apply Leave
        </a>
    </div>

    <!-- Right Side: Month & Year Filter -->
 
<form action="{{ route('leave.index') }}" method="GET" class="m-2">
    <div class="d-flex flex-wrap align-items-end justify-content-start mb-2">
        <div class="form-group mb-2" style="flex: 1; min-width: 180px; margin-right: 20px;">
            <label for="month" class="font-weight-bold mb-1">Month:</label>
            <select name="month" id="month" class="form-control form-control" style="width: 100%;">
                <option value="">All</option>
                @for ($m = 1; $m <= 12; $m++)
                    <option value="{{ $m }}" {{ (isset($selectedMonth) && $selectedMonth == $m) ? 'selected' : '' }}>
                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="form-group mb-2" style="flex: 1; min-width: 180px;">
            <label for="year" class="font-weight-bold mb-1">Year:</label>
            <select name="year" id="year" class="form-control form-control" style="width: 100%;">
                <option value="">All</option>
                @for ($y = date('Y'); $y >= date('Y') - 5; $y--)
                    <option value="{{ $y }}" {{ (isset($selectedYear) && $selectedYear == $y) ? 'selected' : '' }}>
                        {{ $y }}
                    </option>
                @endfor
            </select>
        </div>
    </div>

    <!-- ✅ Centered Search Button -->
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary btn-sm px-4">
            <i class="fas fa-search"></i> Search
        </button>
    </div>
</form>



</div>



            <!-- ✅ Leave Table -->
            <table id="style-2" class="table style-2 dt-table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Leave Type</th>
                        <th>Date / Duration</th>
                        <th>Status</th>
                        <th>Leave Days</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaves as $leave)
                    <tr>
                        <td>{{ $leave->id }}</td>
                        <td>
                            <span>
                                <img src="{{ $leave->employee && $leave->employee->image ? asset($leave->employee->image) : asset('images/dummy.jpg') }}"
                                     class="rounded-circle profile-img"
                                     alt="Employee Image"
                                     style="width: 50px; height: 50px; margin-right: 10px;">
                            </span>
                            {{ $leave->employee->first_name ?? 'No' }} {{ $leave->employee->last_name ?? 'Employee' }}
                        </td>
                        <td>{{ $leave->leave_type }}</td>

                        <td>
                            @if($leave->date)
                                {{ $leave->date }}
                            @elseif($leave->start_date && $leave->end_date)
                                {{ $leave->start_date }} to {{ $leave->end_date }}
                            @elseif($leave->start_date)
                                {{ $leave->start_date }}
                            @elseif($leave->end_date)
                                {{ $leave->end_date }}
                            @else
                                -
                            @endif
                        </td>

                        <td class="text-center">
                            @if($leave->status == 0)
                                <span class="badge badge-warning">Pending</span>
                            @elseif($leave->status == 1)
                                <span class="badge badge-success">Accepted</span>
                            @elseif($leave->status == 2)
                                <span class="badge badge-danger">Rejected</span>
                            @endif
                        </td>

                        <td class="text-center">
                            {{ $leave->leave_days ?? 1 }} {{ ($leave->leave_days ?? 1) > 1 ? 'Days' : '' }}
                        </td>

                        <td class="text-center">
                            @if($leave->status == 0)
                                @can('status leave')
                                <form action="{{ route('leave.accept', $leave->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to Accept this Leave?')">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>

                                <form action="{{ route('leave.reject', $leave->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Reject this Leave?')">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                                @endcan
                            @endif

                            @can('update leave')
                            <button type="button" class="btn btn-info btn-sm view-details-btn" data-toggle="modal" data-target="#viewDetailsModal" data-leave="{{ json_encode($leave) }}">
                                <i class="fas fa-eye"></i>
                            </button>
                            @endcan

                            <form action="{{ route('leave.destroy', $leave->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Cancel this Leave?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- ✅ Modal Code -->
        <div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewDetailsModalLabel">Leave Details</h5>
                        <button type="button" class="btn btn-sm btn-primary close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item"><strong>ID:</strong> <span id="modalLeaveId"></span></li>
                                        <li class="list-group-item"><strong>Employee Name:</strong> <span id="modalEmployeeName"></span></li>
                                        <li class="list-group-item"><strong>Leave Type:</strong> <span id="modalLeaveType"></span></li>
                                        <li class="list-group-item"><strong>Reason:</strong> <span id="modalLeaveReason"></span></li>
                                        <li class="list-group-item"><strong>Date:</strong> <span id="modalLeaveDate"></span></li>
                                    </ul>
                                </div>

                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item"><strong>Start Date:</strong> <span id="modalStartDate"></span></li>
                                        <li class="list-group-item"><strong>End Date:</strong> <span id="modalEndDate"></span></li>
                                        <li class="list-group-item"><strong>Start Time:</strong> <span id="modalStartTime"></span></li>
                                        <li class="list-group-item"><strong>End Time:</strong> <span id="modalEndTime"></span></li>
                                        <li class="list-group-item"><strong>Status:</strong> <span id="modalLaststatus"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <strong>Image:</strong>
                                    <img id="modalImage" src="" alt="Leave Image" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .modal-content,
            .modal-body,
            .modal-header,
            .modal-footer,
            .list-group-item {
                background-color: #fff !important;
                color: #000 !important;
            }
            .modal-header {
                border-bottom: 1px solid #ddd;
            }
        </style>

        <script>
        $(document).ready(function() {
            $('.view-details-btn').on('click', function() {
                var leave = $(this).data('leave');
                const setField = (id, value) => {
                    const field = $('#' + id);
                    const listItem = field.closest('li');
                    if (value) {
                        field.text(value);
                        listItem.show();
                    } else {
                        listItem.hide();
                    }
                };

                setField('modalLeaveId', leave.id);
                setField('modalEmployeeName', leave.employee ? (leave.employee.first_name + ' ' + leave.employee.last_name) : '');
                setField('modalLeaveType', leave.leave_type);
                setField('modalLeaveReason', leave.reason);

                if (leave.date) {
                    setField('modalLeaveDate', leave.date);
                    $('#modalStartDate, #modalEndDate').closest('li').hide();
                } else {
                    $('#modalLeaveDate').closest('li').hide();
                    setField('modalStartDate', leave.start_date);
                    setField('modalEndDate', leave.end_date);
                }

                setField('modalStartTime', leave.start_time);
                setField('modalEndTime', leave.end_time);

                const statusMap = { '0': 'Pending', '1': 'Accepted', '2': 'Rejected' };
                setField('modalLaststatus', statusMap[String(leave.status)] || '--');

                if (leave.image) $('#modalImage').attr('src', leave.image).show();
                else $('#modalImage').hide();
            });
        });
        </script>
    </div>
</div>
@endsection
