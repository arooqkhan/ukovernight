@extends('admin.master.main')

@section('content')
<style>
    .small-swal-popup {
        width: 250px !important;
        padding: 10px !important;
    }
    
    /* Modern Card Styling */
    .statbox {
        border-radius: 10px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .statbox:hover {
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
    }
    
    /* Table Styling */
    #style-2 {
        border-radius: 8px;
        overflow: hidden;
    }
    
    #style-2 thead th {
        background-color: #f8f9fa;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }
    
    #style-2 tbody tr {
        transition: background-color 0.2s;
    }
    
    #style-2 tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    /* Badge Styling */
  .badge {
    padding: 0.5em 0.8em;
    font-weight: 500;
    border-radius: 4px;
    color: white;
    min-width: 80px;
    text-align: center;
    display: inline-block;
  }
    
    /* Button Styling */
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        line-height: 1.5;
        border-radius: 4px;
    }
    
    /* Form Control Styling */
    .form-control {
        border-radius: 6px;
        border: 1px solid #e0e6ed;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
    }
    
    /* Modal Styling */
    .modal-content {
        border: none;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .modal-header {
        border-bottom: 1px solid #e9ecef;
        background-color: #f8f9fa;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    
    .list-group-item {
        border: 1px solid rgba(0, 0, 0, 0.05);
        padding: 0.75rem 1.25rem;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .d-flex.flex-wrap {
            flex-direction: column;
        }
        
        .form-group {
            margin-right: 0 !important;
            margin-bottom: 15px;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="m-0">Employee Leave Details</h4>
        <a href="{{ route('leave.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i> Apply Leave
        </a>
    </div>
    <div class="statbox widget box box-shadow p-4">

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

        <!-- Filter Section -->
        <div class="card mb-4">
            <div class="card-body p-3">
                <form action="{{ route('leave.index') }}" method="GET">
                    <div class="row align-items-end">
                        <div class="col-md-4 mb-2">
                            <label for="month" class="form-label fw-bold small text-muted mb-1">MONTH</label>
                            <select name="month" id="month" class="form-select">
                                <option value="">All Months</option>
                                @for ($m = 1; $m <= 12; $m++)
                                    <option value="{{ $m }}" {{ (isset($selectedMonth) && $selectedMonth == $m) ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        
                        <div class="col-md-4 mb-2">
                            <label for="year" class="form-label fw-bold small text-muted mb-1">YEAR</label>
                            <select name="year" id="year" class="form-select">
                                <option value="">All Years</option>
                                @for ($y = date('Y'); $y >= date('Y') - 5; $y--)
                                    <option value="{{ $y }}" {{ (isset($selectedYear) && $selectedYear == $y) ? 'selected' : '' }}>
                                        {{ $y }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        
                        <div class="col-md-4 mb-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search me-2"></i> Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



            <!-- Leave Table -->
            <div class="table-responsive">
                <table id="style-2" class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th class="text-nowrap">#ID</th>
                            <th>Employee</th>
                            <th>Leave Type</th>
                            <th>Date / Duration</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Days</th>
                            <th class="text-end">Actions</th>
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
                                <span class="badge bg-warning">Pending</span>
                            @elseif($leave->status == 1)
                                <span class="badge bg-success">Approved</span>
                            @elseif($leave->status == 2)
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>

                        <td class="text-center">
                            <span class="badge bg-light text-dark">
                                {{ $leave->leave_days ?? 1 }} {{ ($leave->leave_days ?? 1) > 1 ? 'Days' : 'Day' }}
                            </span>
                        </td>

                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-1">
                                @if($leave->status == 0)
                                    @can('status leave')
                                    <form action="{{ route('leave.accept', $leave->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to approve this leave request?');">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" title="Approve">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('leave.reject', $leave->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to reject this leave request?');">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Reject">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                    @endcan
                                @endif

                                @can('update leave')
                                <button type="button" class="btn btn-sm btn-outline-info view-details-btn" data-bs-toggle="tooltip" title="View Details" data-bs-toggle="modal" data-bs-target="#viewDetailsModal" data-leave="{{ json_encode($leave) }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @endcan

                                <form action="{{ route('leave.destroy', $leave->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this leave record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title" id="viewDetailsModalLabel">
                            <i class="fas fa-calendar-alt me-2"></i>Leave Request Details
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="card-title text-muted text-uppercase small mb-3">Request Information</h6>
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img id="modalEmployeeImage" src="" alt="Employee" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-1 fw-bold" id="modalEmployeeName">-</h6>
                                                    <p class="text-muted small mb-1">Employee ID: <span id="modalLeaveId" class="text-dark">-</span></p>
                                                    <span class="badge bg-light text-dark" id="modalLeaveType">-</span>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label small text-muted mb-1">Reason</label>
                                                <p class="mb-0" id="modalLeaveReason">-</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="card-title text-muted text-uppercase small mb-3">Leave Details</h6>
                                            
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <div class="border rounded p-2">
                                                        <div class="small text-muted">Start Date</div>
                                                        <div class="fw-medium" id="modalStartDate">-</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="border rounded p-2">
                                                        <div class="small text-muted">End Date</div>
                                                        <div class="fw-medium" id="modalEndDate">-</div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <div class="border rounded p-2">
                                                        <div class="small text-muted">Start Time</div>
                                                        <div class="fw-medium" id="modalStartTime">-</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="border rounded p-2">
                                                        <div class="small text-muted">End Time</div>
                                                        <div class="fw-medium" id="modalEndTime">-</div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="border rounded p-2">
                                                <div class="small text-muted">Status</div>
                                                <div>
                                                    <span class="badge" id="modalStatusBadge">-</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body">
                                            <h6 class="card-title text-muted text-uppercase small mb-3">Supporting Document</h6>
                                            <div id="imageContainer" class="text-center">
                                                <img id="modalImage" src="" alt="No document attached" class="img-fluid rounded" style="max-height: 300px; display: none;">
                                                <p id="noDocument" class="text-muted">No document attached</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0 bg-light">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Close
                        </button>
                        <button type="button" class="btn btn-primary" id="printLeaveDetails">
                            <i class="fas fa-print me-2"></i>Print
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Enhanced Modal Styling */
            .modal-content {
                border: none;
                border-radius: 12px;
                overflow: hidden;
            }
            
            .modal-header {
                border-bottom: 1px solid rgba(0, 0, 0, 0.05);
                padding: 1.25rem 1.5rem;
            }
            
            .modal-body {
                padding: 1.5rem;
            }
            
            .modal-footer {
                padding: 1rem 1.5rem;
                border-top: 1px solid rgba(0, 0, 0, 0.05);
            }
            
            /* Card hover effect */
            .card {
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }
            
            .card:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05) !important;
            }
            
            /* Responsive adjustments */
            @media (max-width: 768px) {
                .modal-dialog {
                    margin: 0.5rem;
                }
                
                .modal-body {
                    padding: 1rem;
                }
            }
        </style>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Handle view details button click
            document.querySelectorAll('.view-details-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const leave = JSON.parse(this.getAttribute('data-leave'));
                    
                    // Set employee info
                    document.getElementById('modalLeaveId').textContent = leave.id || '-';
                    
                    const employeeName = leave.employee 
                        ? `${leave.employee.first_name || ''} ${leave.employee.last_name || ''}`.trim() 
                        : 'No Employee';
                    document.getElementById('modalEmployeeName').textContent = employeeName || '-';
                    
                    // Set employee image if available
                    const employeeImage = document.getElementById('modalEmployeeImage');
                    if (leave.employee && leave.employee.image) {
                        employeeImage.src = leave.employee.image;
                        employeeImage.style.display = 'block';
                    } else {
                        employeeImage.src = '{{ asset("images/dummy.jpg") }}';
                    }
                    
                    // Set leave type and reason
                    document.getElementById('modalLeaveType').textContent = leave.leave_type || '-';
                    document.getElementById('modalLeaveReason').textContent = leave.reason || 'No reason provided';
                    
                    // Set dates and times
                    const startDate = leave.start_date || leave.date || '-';
                    const endDate = leave.end_date || leave.date || '-';
                    
                    document.getElementById('modalStartDate').textContent = startDate;
                    document.getElementById('modalEndDate').textContent = endDate;
                    document.getElementById('modalStartTime').textContent = leave.start_time || '-';
                    document.getElementById('modalEndTime').textContent = leave.end_time || '-';
                    
                    // Set status badge
                    const statusMap = { 
                        '0': { text: 'Pending', class: 'bg-warning' },
                        '1': { text: 'Approved', class: 'bg-success' },
                        '2': { text: 'Rejected', class: 'bg-danger' }
                    };
                    
                    const status = statusMap[String(leave.status)] || { text: 'Unknown', class: 'bg-secondary' };
                    const statusBadge = document.getElementById('modalStatusBadge');
                    statusBadge.textContent = status.text;
                    statusBadge.className = 'badge ' + status.className;
                    
                    // Handle document/image
                    const imageContainer = document.getElementById('imageContainer');
                    const imageElement = document.getElementById('modalImage');
                    const noDocumentElement = document.getElementById('noDocument');
                    
                    if (leave.image) {
                        imageElement.src = leave.image;
                        imageElement.style.display = 'block';
                        noDocumentElement.style.display = 'none';
                    } else {
                        imageElement.style.display = 'none';
                        noDocumentElement.style.display = 'block';
                    }
                });
            });
            
            // Handle print button
            document.getElementById('printLeaveDetails')?.addEventListener('click', function() {
                window.print();
            });
        });
        </script>
    </div>
</div>
@endsection
