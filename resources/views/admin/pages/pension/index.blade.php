@extends('admin.master.main')
@section('content')

<style>
    .small-swal-popup {
        width: 250px !important;
        padding: 10px !important;
    }

    .btn-circle {
        width: 36px;
        height: 36px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 5px;
    }

    .form-check-inline {
        margin-left: 10px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="col-lg-12">
    <h4 class="m-2">Employees Pension Record</h4>

    <div class="statbox widget box box-shadow">
        {{-- Success Alert --}}
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

        {{-- Error Alert --}}
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

  

            <!-- Employee Table -->
            <table id="style-2" class="table style-2 dt-table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date Of Brith</th>
                        <th>Pension Status</th>
                        
                       
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        @if($employee->role === 'admin')
                            @continue
                        @endif

                        <tr data-branch="{{ $employee->branch }}">
                            <td>{{ $employee->id }}</td>
                            <td>
                                <span>
                                    @if($employee->image)
                                        <img src="{{ asset($employee->image) }}" class="rounded-circle profile-img" alt="Employee Image" style="width: 50px; height: 50px; margin-right: 10px;">
                                    @else
                                        <img src="{{ asset('images/dummy.jpg') }}" class="rounded-circle profile-img" alt="Employee Image" style="width: 50px; height: 50px; margin-right: 10px;">
                                    @endif
                                </span>
                                {{ $employee->first_name }} {{ $employee->last_name }}
                            </td>
                           
                            <td>{{ $employee->dob }}</td>
                            <td>{{ $employee->pension_status}}</td>
                          
                                
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No pension  records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Branch Filter Script -->
<script>
    $(document).ready(function() {
        $('.branch-filter').on('change', function() {
            var selectedBranch = $(this).val().toLowerCase();

            $('table tbody tr').each(function() {
                var rowBranch = $(this).data('branch').toLowerCase();

                if (selectedBranch === 'all' || rowBranch === selectedBranch) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

@endsection
