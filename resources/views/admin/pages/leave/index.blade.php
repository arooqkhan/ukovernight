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
    
    /* Professional Table Styling */
    #style-2 {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        background: #ffffff;
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }
    
    #style-2 thead th {
        background-color: #f8fafc;
        color: #1e293b;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        padding: 14px 18px;
        border-bottom: 2px solid #e5e7eb;
        text-align: left;
        white-space: nowrap;
    }
    
    #style-2 tbody tr {
        transition: background-color 0.15s ease;
        background-color: #ffffff;
        border-bottom: 1px solid #f1f5f9;
    }
    
    #style-2 tbody tr:last-child {
        border-bottom: none;
    }
    
    #style-2 tbody tr:hover {
        background-color: #f8fafc;
    }
    
    #style-2 tbody td {
        padding: 14px 18px;
        vertical-align: middle;
        color: #475569;
        font-size: 0.875rem;
        border-bottom: 1px solid #f1f5f9;
    }
    
    #style-2 tbody tr:last-child td {
        border-bottom: none;
    }
    
    /* Dropdown Menu Styling */
    .dropdown-menu {
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        padding: 4px 0;
        margin-top: 4px;
    }
    
    .dropdown-item {
        padding: 10px 16px;
        font-size: 0.875rem;
        color: #475569;
        transition: all 0.15s ease;
        display: flex;
        align-items: center;
    }
    
    .dropdown-item:hover {
        background-color: #f8fafc;
        color: #1e293b;
    }
    
    .dropdown-item.text-danger {
        color: #dc2626;
    }
    
    .dropdown-item.text-danger:hover {
        background-color: #fee2e2;
        color: #991b1b;
    }
    
    .dropdown-divider {
        margin: 4px 0;
        border-color: #e5e7eb;
    }
    
    /* Badge Styling - Only for leave page content, not header */
    #style-2 .badge,
    .modal-content .badge,
    .form-card .badge {
        padding: 0.5em 0.8em;
        font-weight: 500;
        border-radius: 4px;
        color: white;
        min-width: 80px;
        text-align: center;
        display: inline-block;
    }
    
    /* Ensure header notification badge is not affected */
    .header .badge,
    .navbar .badge,
    .notification-dropdown .badge {
        padding: 0 !important;
        min-width: auto !important;
        text-align: left !important;
        display: block !important;
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

<div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-3" style="padding-left: 10px; padding-top: 0;">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-calendar-alt fa-2x" style="color: #1f2937;"></i>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Employee Leave</h4>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage leave requests and approvals</p>
            </div>
        </div>
        <a href="{{ route('leave.create') }}" class="btn btn-secondary">
            <i class="fas fa-plus-circle me-2"></i> Apply Leave
        </a>
    </div>
    <div class="statbox widget box box-shadow">

        {{-- ✅ SweetAlert Notifications --}}
        <meta name="flash-success" content="{{ session('success') }}">
        <meta name="flash-error" content="{{ session('error') }}">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var success = document.querySelector('meta[name="flash-success"]')?.getAttribute('content') || '';
                var errorMsg = document.querySelector('meta[name="flash-error"]')?.getAttribute('content') || '';
                if (success) {
                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: success,
                        showConfirmButton: false,
                        timer: 3000,
                        toast: true,
                        background: '#10b981',
                        color: '#ffffff',
                        customClass: { popup: 'small-swal-popup' }
                    });
                }
                if (errorMsg) {
                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'error',
                        title: errorMsg,
                        showConfirmButton: false,
                        timer: 3000,
                        toast: true,
                        background: '#ef4444',
                        color: '#ffffff',
                        customClass: { popup: 'small-swal-popup' }
                    });
                }
            });
        </script>

        <div class="widget-content widget-content-area">

        <!-- Executive Filter Section -->
        <div class="card mb-3" style="border-radius: 12px; border: 1px solid #e5e7eb; background: #ffffff;">
            <div class="card-body" style="padding: 12px 16px 16px 16px;">
                <form action="{{ route('leave.index') }}" method="GET">
                    <div class="row align-items-end g-3">
                        <div class="col-md-4">
                            <label for="month" class="form-label fw-bold mb-2" style="color: #475569; font-size: 0.9rem;">
                                <i class="fas fa-calendar me-2"></i>MONTH
                            </label>
                            <select name="month" id="month" class="form-select" style="border: 1px solid #e5e7eb; border-radius: 10px; padding: 10px 16px;">
                                <option value="">All Months</option>
                                @for ($m = 1; $m <= 12; $m++)
                                    <option value="{{ $m }}" {{ (isset($selectedMonth) && $selectedMonth == $m) ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="year" class="form-label fw-bold mb-2" style="color: #475569; font-size: 0.9rem;">
                                <i class="fas fa-calendar-alt me-2"></i>YEAR
                            </label>
                            <select name="year" id="year" class="form-select" style="border: 1px solid #e5e7eb; border-radius: 10px; padding: 10px 16px;">
                                <option value="">All Years</option>
                                @for ($y = date('Y'); $y >= date('Y') - 5; $y--)
                                    <option value="{{ $y }}" {{ (isset($selectedYear) && $selectedYear == $y) ? 'selected' : '' }}>
                                        {{ $y }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        
                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fas fa-search me-2"></i> Filter Results
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



            <!-- Leave Table -->
            <div class="table-responsive">
                <table id="style-2" class="table table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-nowrap">#ID</th>
                            <th>Employee</th>
                            <th>Leave Type</th>
                            <th>Date / Duration</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Days</th>
                            <th class="text-center">Actions</th>
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
                                <span class="badge" style="background: #fff7ed; color: #92400e; padding: 6px 12px; border-radius: 6px; font-weight: 600;">
                                    <i class="fas fa-clock me-1"></i>Pending
                                </span>
                            @elseif($leave->status == 1)
                                <span class="badge" style="background: #e7f7ec; color: #166534; padding: 6px 12px; border-radius: 6px; font-weight: 600;">
                                    <i class="fas fa-check-circle me-1"></i>Approved
                                </span>
                            @elseif($leave->status == 2)
                                <span class="badge" style="background: #fef2f2; color: #991b1b; padding: 6px 12px; border-radius: 6px; font-weight: 600;">
                                    <i class="fas fa-times-circle me-1"></i>Rejected
                                </span>
                            @endif
                        </td>

                        <td class="text-center">
                            <span class="badge bg-light text-dark">
                                {{ $leave->leave_days ?? 1 }} {{ ($leave->leave_days ?? 1) > 1 ? 'Days' : 'Day' }}
                            </span>
                        </td>

                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $leave->id }}" data-bs-toggle="dropdown" aria-expanded="false" style="border: 2px solid #e2e8f0; color: #64748b; padding: 8px 14px; border-radius: 8px; background: #ffffff;">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $leave->id }}" style="border-radius: 10px; border: 1px solid #e5e7eb; box-shadow: 0 8px 24px rgba(0,0,0,0.08); min-width: 180px; padding: 4px 0;">
                                    @if($leave->status == 0)
                                        @can('status leave')
                                        <li>
                                            <form action="{{ route('leave.accept', $leave->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to approve this leave request?')">
                                                    <i class="fas fa-check me-2 text-success"></i> Approve
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="{{ route('leave.reject', $leave->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to reject this leave request?')">
                                                    <i class="fas fa-times me-2 text-danger"></i> Reject
                                                </button>
                                            </form>
                                        </li>
                                        <li><hr class="dropdown-divider my-1"></li>
                                        @endcan
                                    @endif
                                    @can('update leave')
                                    <li>
                                        <button type="button" class="dropdown-item view-details-btn" data-leave="{{ json_encode($leave) }}">
                                            <i class="fas fa-eye me-2"></i> View Details
                                        </button>
                                    </li>
                                    @endcan
                                    <li>
                                        <form action="{{ route('leave.destroy', $leave->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this leave record?')">
                                                <i class="fas fa-trash-alt me-2"></i> Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
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
            #viewDetailsModal .modal-content {
                border: none;
                border-radius: 12px;
                overflow: hidden;
                background-color: #ffffff !important;
            }
            
            #viewDetailsModal .modal-header {
                border-bottom: 1px solid rgba(0, 0, 0, 0.05);
                padding: 1.25rem 1.5rem;
                background-color: #ffffff !important;
            }
            
            #viewDetailsModal .modal-body {
                padding: 1.5rem;
                background-color: #ffffff !important;
            }
            
            #viewDetailsModal .modal-footer {
                padding: 1rem 1.5rem;
                border-top: 1px solid rgba(0, 0, 0, 0.05);
                background-color: #ffffff !important;
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
            // Initialize modal
            const viewDetailsModal = new bootstrap.Modal(document.getElementById('viewDetailsModal'));
            
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
                        employeeImage.src = '{{ asset("") }}' + leave.employee.image;
                        employeeImage.style.display = 'block';
                    } else {
                        employeeImage.src = '{{ asset("images/dummy.jpg") }}';
                        employeeImage.style.display = 'block';
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
                        imageElement.src = '{{ asset("") }}' + leave.image;
                        imageElement.style.display = 'block';
                        noDocumentElement.style.display = 'none';
                    } else {
                        imageElement.style.display = 'none';
                        noDocumentElement.style.display = 'block';
                    }
                    
                    // Open the modal
                    viewDetailsModal.show();
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
