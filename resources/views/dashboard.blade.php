@extends('admin.master.main')

@section('content')

@php
use App\Models\Onboarding;
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
$hasOnboarding = false;

// Check if user has role 'employee'
if ($user && $user->role === 'employee') {
$hasOnboarding = Onboarding::where('user_id', $user->id)->exists();
}
@endphp

@if($user && $user->role === 'employee' && !$hasOnboarding)
<script>
    window.location = "{{ route('onboarding.create') }}";
</script>
@endif

<style>
    /* Executive Dashboard Styles (neutral, minimal) */
    * { box-sizing: border-box; }

    .dashboard-container {
        padding: 28px 20px;
        background: #f8fafc;
        min-height: calc(100vh - 80px);
    }

    .dashboard-heading { margin-bottom: 16px; padding-left: 10px; }
    .dashboard-heading h2 { font-weight: 600; font-size: 2rem; color: #0f172a; letter-spacing: -0.3px; }
    .dashboard-heading p { font-size: 1rem; color: #64748b; }

    /* Cards */
    .card { border-radius: 12px; border: 1px solid #e5e7eb; box-shadow: 0 1px 2px rgba(0,0,0,0.04); background: #fff; }
    .card .card-header { background: #f8fafc; color: #0f172a; font-weight: 600; padding: 16px 20px; border-bottom: 1px solid #e5e7eb; text-transform: none; letter-spacing: 0; }
    .card .card-body { padding: 20px; }

    /* Stat cards */
    .stat-card { border: 1px solid #e5e7eb; box-shadow: 0 1px 2px rgba(0,0,0,0.04); }
    .stat-card .stats-content .card-title { font-weight: 600; font-size: .9rem; color: #64748b; text-transform: none; letter-spacing: 0; }
    .stat-card .stats-number { font-size: 2rem; font-weight: 700; color: #0f172a; }
    .stat-card .icon-box { width: 56px; height: 56px; border-radius: 12px; background: #eff6ff; color: #1d4ed8; display: flex; align-items: center; justify-content: center; }

    /* Tables */
    .table { width: 100%; margin-bottom: 0; }
    .table thead th { background: #f8fafc; color: #0f172a; font-weight: 600; border-bottom: 1px solid #e5e7eb; padding: 14px 16px; }
    .table tbody tr { border-bottom: 1px solid #e5e7eb; transition: background-color .15s ease; }
    .table tbody tr:hover { background: #f3f4f6; }
    .table tbody td { padding: 14px 16px; color: #334155; }
    .table-bordered { border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden; }
    .table-bordered thead th { border: none; }
    .table-bordered tbody td { border-right: 1px solid #eef2f7; }
    .table-bordered tbody td:last-child { border-right: none; }

    /* Announcement cards */
    .announcement-card { border-left: 4px solid #1d4ed8; border-radius: 10px; }
    .announcement-card:hover { border-left-width: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); transform: none; }
    .announcement-card h5 { font-weight: 600; color: #0f172a; }
    .announcement-card p { color: #64748b; }

    /* Outline button */
    .btn-outline-primary { border: 1px solid #cbd5e1; color: #0f172a; border-radius: 8px; padding: 8px 16px; }
    .btn-outline-primary:hover { background: #f1f5f9; color: #0f172a; border-color: #cbd5e1; transform: none; box-shadow: none; }

    /* Pagination */
    .pagination { margin-top: 20px; justify-content: center; }
    .page-link { color: #1d4ed8; border-color: #e5e7eb; padding: 10px 14px; border-radius: 8px; }
    .page-link:hover { background: #eef2ff; color: #1d4ed8; }
    .page-item.active .page-link { background: #1d4ed8; border-color: #1d4ed8; color: #fff; }
</style>




<div class="dashboard-heading">
    <h2>Welcome to Dashboard</h2>
    <p>Overview of your HR management system</p>
</div>

<div class="dashboard-container">
    <div class="row">
        @if(Auth::user()->role == 'admin')
        <!-- Premium Stats Section -->
        <div class="row mb-3">
            <div class="col-md-4 mb-4">
                <div class="card stat-card">
                    <div class="card-header">
                        <i class="fas fa-users me-2"></i>Total Employees
                    </div>
                    <div class="card-body">
                        <div class="stats-content">
                            <h5 class="card-title">Total Employees</h5>
                            <p class="stats-number">{{ $totalEmployees }}</p>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card stat-card">
                    <div class="card-header">
                        <i class="fas fa-pound-sign me-2"></i>Total Salary
                    </div>
                    <div class="card-body">
                        <div class="stats-content">
                            <h5 class="card-title">Total Salary</h5>
                            <p class="stats-number">£{{ number_format($totalSalary, 2) }}</p>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-pound-sign"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card stat-card">
                    <div class="card-header">
                        <i class="fas fa-file-invoice-dollar me-2"></i>Total Expense
                    </div>
                    <div class="card-body">
                        <div class="stats-content">
                            <h5 class="card-title">Total Expense</h5>
                            <p class="stats-number">£{{ number_format($totalExpense, 2) }}</p>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Premium Employee Shifts Section -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-calendar-alt me-2"></i>Employee Shifts (This Week)
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Shift Type</th>
                                        <th>Additional Duty</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($shift as $sh)
                                    <tr>
                                        <td>
                                            @if(!empty($sh->employee) && !empty($sh->employee->first_name))
                                            <strong>{{ $sh->employee->first_name }} {{ $sh->employee->last_name }}</strong>
                                            @else
                                            <em class="text-muted">No employee</em>
                                            @endif
                                        </td>
                                        <td><span class="badge bg-primary">{{ $sh->shift_type }}</span></td>
                                        <td>{{ $sh->add_duty ?: 'N/A' }}</td>
                                        <td>{{ date('M d, Y', strtotime($sh->date)) }}</td>
                                        <td><i class="fas fa-clock me-1"></i>{{ date('h:i A', strtotime($sh->start_time)) }}</td>
                                        <td><i class="fas fa-clock me-1"></i>{{ date('h:i A', strtotime($sh->end_time)) }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-danger fw-bold">
                                            <i class="fas fa-calendar-times me-2"></i>No shifts found for this week
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if($shift->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $shift->links('vendor.pagination.bootstrap-4') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <!-- Premium Right-to-Check Employees Section -->
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-exclamation-triangle me-2"></i>Near Next Right-to-Check Employees
                    </div>
            <div class="card-body">
                @if(!empty($nxtRgtDate) && count($nxtRgtDate) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                                        <th>Full Name</th>
                                        <th>Visa Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nxtRgtDate as $nxtRgtDt)
                        <tr>
                                        <td><strong>#{{ $nxtRgtDt->employee_id }}</strong></td>
                            <td>{{ $nxtRgtDt->first_name }} {{ $nxtRgtDt->last_name }}</td>
                                        <td>
                                            <span class="badge bg-warning text-dark">
                                                <i class="fas fa-calendar me-1"></i>
                                                {{ $nxtRgtDt->visadate ? date('M d, Y', strtotime($nxtRgtDt->visadate)) : 'N/A' }}
                                            </span>
                                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                        </div>
                @else
                        <div class="text-center py-5">
                            <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                            <p class="text-center text-muted fs-5">No employees found within the next 5 days.</p>
                        </div>
                @endif
            </div>
        </div>
            </div>
        </div>

        @else
        <!-- Premium User Dashboard -->
        <div class="row mb-5">
            <div class="col-md-6 mb-4">
                <div class="card stat-card">
                    <div class="card-header">
                        <i class="fas fa-user-circle me-2"></i>Welcome
                    </div>
                    <div class="card-body">
                        <div class="stats-content">
                            <h5 class="card-title mb-3">Welcome, {{ Auth::user()->name }}!</h5>
                            <p class="card-text mb-4 text-muted">Thank you for logging in. Use the menu to access your features.</p>
                            <div class="mt-4">
                                <h6 class="card-title">Your Bonus</h6>
                                <p class="stats-number mb-0">£{{ number_format($bonus ?? 0, 2) }}</p>
                            </div>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-gift"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-folder-open me-2"></i>Your Documents
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            @if(!empty($documents))
                            @foreach($documents as $document)
                            <li class="mb-3 p-3 bg-light rounded">
                                <i class="fas fa-file-alt me-2 text-primary"></i>
                                <strong>{{ $document ?? 'Unnamed Document' }}</strong>
                            </li>
                            @endforeach
                            @elseif(!empty($empdoc))
                            <li class="mb-3 p-3 bg-light rounded">
                                <i class="fas fa-file-alt me-2 text-primary"></i>
                                <strong>{{ $empdoc->title }}</strong>
                            </li>
                            @else
                            <li class="text-center py-4">
                                <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">No documents available.</p>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Premium Announcements Section -->
        @if($announcements->count() > 0)
        <div class="row mb-5">
            <div class="col-12 mb-4">
                <h3 class="mb-4" style="color: #1e293b; font-weight: 600;">
                    <i class="fas fa-bullhorn me-2" style="color: #667eea;"></i>Recent Announcements
                </h3>
            </div>
            @foreach($announcements as $announcement)
            <div class="col-md-4 mb-4">
                <div class="card announcement-card">
                    <div class="card-body">
                        <h5 class="mb-3">{{ $announcement->title }}</h5>
                        <p class="mb-4">{{ Str::limit($announcement->message, 80) }}</p>
                        <a href="{{ route('announcements.details', $announcement->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye me-1"></i>View Details
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Premium Document Announcements Section -->
        @if($announcementdocuments->count() > 0)
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="mb-4" style="color: #1e293b; font-weight: 600;">
                    <i class="fas fa-file-alt me-2" style="color: #667eea;"></i>Document Announcements
                </h3>
            </div>
            @foreach($announcementdocuments as $announcement)
            <div class="col-md-4 mb-4">
                <div class="card announcement-card">
                    <div class="card-body">
                        <h5 class="mb-3">{{ $announcement->title }}</h5>
                        <form action="{{ route('announcementdocument.updateStatus', $announcement->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="button" class="btn btn-sm btn-success" onclick="confirmStatusUpdate('{{ $announcement->id }}')">
                                <i class="fas fa-check me-1"></i>Mark as Read
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @endif
    </div>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmStatusUpdate(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This will mark the announcement as read!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, mark it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector(`form[action*='${id}']`).submit();
            }
        });
    }
</script>
@endsection