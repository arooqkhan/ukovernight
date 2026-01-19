@extends('admin.master.main')
@section('content')

<style>
    .table-responsive {
        overflow-x: auto;
        /* Enable horizontal scrolling */
        -webkit-overflow-scrolling: touch;
        /* Smooth scrolling for iOS */
        position: relative;
        max-width: 100%;
    }
    
    .table-responsive::-webkit-scrollbar {
        height: 12px;
    }
    
    .table-responsive::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }
    
    .table-responsive::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
        transition: background 0.3s ease;
    }
    
    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
    
    .table-responsive {
        scrollbar-width: thin;
        scrollbar-color: #cbd5e1 #f1f5f9;
    }

    .table {
        min-width: 800px;
        /* Set a minimum width for the table */
        width: 100%;
    }

    .table-header-height {
        height: 70px;
        /* Adjust the height as needed */
    }

    .table-header-height th {
        vertical-align: middle;
        /* Center content vertically */
    }

    div[title] {
        position: relative;
        cursor: pointer;
    }

    div[title]:hover::after {
        content: attr(title);
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: #1f2937;
        color: #fff;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 12px;
        white-space: nowrap;
        z-index: 1000;
        pointer-events: none;
        opacity: 0.95;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    /* Table styling improvements */
    .table-responsive {
        border-radius: 10px;
        overflow-x: auto !important;
        overflow-y: visible;
        max-height: none;
    }
    
    .table-bordered {
        border: 1px solid #e5e7eb !important;
    }
    
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #e5e7eb !important;
    }
    
    /* Ensure sticky column works */
    .table-responsive {
        position: relative;
        display: block;
        width: 100%;
    }
    
    /* Force horizontal scrollbar visibility */
    .table-responsive {
        overflow-x: scroll !important;
        -webkit-overflow-scrolling: touch;
    }
    
    /* Premium Filter Section Styling */
    .filter-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .filter-card:hover {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }
    
    .filter-row {
        padding-bottom: 16px;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .filter-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    
    .filter-label {
        font-weight: 600;
        color: #1e293b;
        font-size: 0.875rem;
        margin-bottom: 8px;
        display: block;
    }
    
    .filter-label-small {
        font-weight: 500;
        color: #475569;
        font-size: 0.8rem;
        margin-bottom: 6px;
        display: block;
    }
    
    .filter-group {
        display: flex;
        flex-direction: column;
    }
    
    .filter-select,
    .filter-input {
        min-width: 200px;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        padding: 10px 16px;
        font-size: 0.875rem;
        color: #1e293b;
        background: #ffffff;
        transition: all 0.2s ease;
    }
    
    .filter-select:focus,
    .filter-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .filter-select:hover,
    .filter-input:hover {
        border-color: #cbd5e1;
    }
    
    .filter-btn-search,
    .filter-btn-custom {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: #ffffff;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2);
        height: fit-content;
        align-self: flex-end;
    }
    
    .filter-btn-search:hover,
    .filter-btn-custom:hover {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }
    
    .filter-btn-search:active,
    .filter-btn-custom:active {
        transform: translateY(0);
    }
    
    .filter-btn-dropdown {
        background: #ffffff;
        color: #475569;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 500;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        min-width: 200px;
        justify-content: space-between;
    }
    
    .filter-btn-dropdown:hover {
        background: #f8fafc;
        border-color: #3b82f6;
        color: #3b82f6;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.15);
    }
    
    .filter-btn-dropdown:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .dropdown-menu {
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        padding: 4px 0;
        margin-top: 4px;
        min-width: 200px;
    }
    
    .dropdown-item {
        padding: 10px 16px;
        font-size: 0.875rem;
        color: #475569;
        transition: all 0.15s ease;
        display: flex;
        align-items: center;
        border: none;
        background: transparent;
        width: 100%;
        text-align: left;
    }
    
    .dropdown-item:hover {
        background-color: #f8fafc;
        color: #1e293b;
    }
    
    .dropdown-item.active {
        background-color: #eff6ff;
        color: #1e40af;
        font-weight: 600;
    }
    
    .dropdown-item.active i {
        color: #3b82f6;
    }
</style>



<div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-3" style="padding-left: 10px; padding-top: 0;">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-calendar-week fa-2x" style="color: #1f2937;"></i>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Work Rota Schedule</h4>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">View and manage employee work schedules</p>
            </div>
        </div>
        @can('download rota')
        <form method="POST" action="{{ route('rota.download') }}" style="display: inline;">
                        @csrf
                        <input type="hidden" name="employee_id" id="download_employee_id" value="{{ request()->get('employee_id') }}">
                        <input type="hidden" name="start_date" id="download_start_date" value="{{ request()->get('start_date') }}">
                        <input type="hidden" name="end_date" id="download_end_date" value="{{ request()->get('end_date') }}">
            <button type="submit" class="btn btn-success">Excel</button>
        </form>
                        @endcan
                </div>
    
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
            <!-- Filter Section -->
            <form method="GET" action="{{ route('rota.index') }}">
                <div class="filter-card" style="padding: 24px; background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border: 1px solid #e5e7eb; border-radius: 16px; margin-bottom: 24px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);">
                    <!-- Employee Filter Row with Quick Range -->
                    <div class="filter-row mb-4">
                        <div class="d-flex align-items-end gap-3 flex-wrap">
                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'HR' || auth()->user()->role == 'Accountant')
                            <div class="filter-group">
                                <label for="employee_id" class="filter-label">
                                    <i class="fas fa-user me-2"></i>Select Employee:
                                </label>
                                <select name="employee_id" id="employee_id" class="filter-select" onchange="this.form.submit()">
                            <option value="">All Employees</option>
                            @foreach($allEmployees as $employee)
                            <option value="{{ $employee->id }}" {{ request()->get('employee_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->first_name }} {{ $employee->last_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                            @endif
                            
                            <!-- Quick Date Range Dropdown -->
                            <div class="filter-group ms-auto">
                                <label class="filter-label">
                                    <i class="fas fa-calendar-alt me-2"></i>Quick Range:
                                </label>
                                <div class="dropdown">
                                    <button class="filter-btn-dropdown dropdown-toggle" type="button" id="quickRangeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        @if(request()->get('view') == 'week')
                                            <i class="fas fa-calendar-week me-2"></i>Current Week
                                        @elseif(request()->get('view') == 'two_weeks')
                                            <i class="fas fa-calendar me-2"></i>Next Two Weeks
                                        @elseif(request()->get('view') == 'month')
                                            <i class="fas fa-calendar-check me-2"></i>Current Month
                    @else
                                            <i class="fas fa-calendar-alt me-2"></i>Select Range
                                        @endif
                                        <i class="fas fa-chevron-down ms-2"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="quickRangeDropdown">
                                        <li>
                                            <form method="GET" action="{{ route('rota.index') }}" class="d-inline">
                                                @if(request()->get('employee_id'))
                                                <input type="hidden" name="employee_id" value="{{ request()->get('employee_id') }}">
                                                @endif
                                                <input type="hidden" name="view" value="week">
                                                <button type="submit" class="dropdown-item {{ request()->get('view') == 'week' ? 'active' : '' }}">
                                                    <i class="fas fa-calendar-week me-2"></i>Current Week
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                            <form method="GET" action="{{ route('rota.index') }}" class="d-inline">
                                                @if(request()->get('employee_id'))
                                                <input type="hidden" name="employee_id" value="{{ request()->get('employee_id') }}">
                                                @endif
                                                <input type="hidden" name="view" value="two_weeks">
                                                <button type="submit" class="dropdown-item {{ request()->get('view') == 'two_weeks' ? 'active' : '' }}">
                                                    <i class="fas fa-calendar me-2"></i>Next Two Weeks
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                            <form method="GET" action="{{ route('rota.index') }}" class="d-inline">
                                                @if(request()->get('employee_id'))
                                                <input type="hidden" name="employee_id" value="{{ request()->get('employee_id') }}">
                    @endif
                                                <input type="hidden" name="view" value="month">
                                                <button type="submit" class="dropdown-item {{ request()->get('view') == 'month' ? 'active' : '' }}">
                                                    <i class="fas fa-calendar-check me-2"></i>Current Month
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                </div>
                    </div>
                        </div>
                    </div>
                    
                    <!-- Custom Date Range -->
                    <div class="filter-row">
                        <label class="filter-label mb-2 d-block">
                            <i class="fas fa-calendar-day me-2"></i>Custom Range:
                        </label>
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            <div class="filter-group">
                                <label for="start_date" class="filter-label-small">From:</label>
                                <input type="date" name="start_date" id="start_date" class="filter-input" value="{{ request()->get('start_date') }}">
                        </div>
                            <div class="filter-group">
                                <label for="end_date" class="filter-label-small">To:</label>
                                <input type="date" name="end_date" id="end_date" class="filter-input" value="{{ request()->get('end_date') }}">
                    </div>
                            <button type="submit" class="filter-btn-custom">
                                <i class="fas fa-filter me-2"></i>Show Custom Range
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Display the date range -->
                @if(isset($startDate) && isset($endDate))
            <div class="mb-3" style="padding: 0 16px;">
                <h5 style="font-weight: 600; color: #1e293b; margin: 0;">
                    <i class="fas fa-calendar-check me-2" style="color: #64748b;"></i>
                    Shifts from {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} to {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}
                </h5>
            </div>
                @endif

            <!-- Table with horizontal scrolling -->
            <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                <table class="table table-bordered align-middle" style="margin-bottom: 0; min-width: 100%;">
                    <thead>
                        <tr class="table-header-height">
                            <th style="background-color: orange; color: black !important; width: 180px; position: sticky; left: 0; z-index: 10;">Employee Name</th>
                            @php
                            $period = \Carbon\CarbonPeriod::create($startDate, $endDate);
                            @endphp
                            @foreach($period as $date)
                            <th style="background-color: orange; color: black !important; min-width: 140px; text-align: center;">{{ $date->format('l, d M') }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td class="bg-warning text-white font-weight-bold" style="position: sticky; left: 0; z-index: 5; width: 180px;">{{ $employee->first_name }} {{ $employee->last_name }}</td>

                            @php
                            $employeeShifts = $employee->shifts->keyBy(function($shift) {
                            return \Carbon\Carbon::parse($shift->date)->format('Y-m-d');
                            });

                            $employeeLeaves = $employee->leaves;
                            @endphp

                            @foreach($period as $date)
                            @php
                            $shiftDate = $date->format('Y-m-d');
                            $shift = $employeeShifts->get($shiftDate);

                            // Enhanced logic to handle both multi-day and single-day leaves
                            $leave = $employeeLeaves->first(function($leave) use ($date) {
                            $leaveStart = \Carbon\Carbon::parse($leave->start_date ?? $leave->date);
                            $leaveEnd = \Carbon\Carbon::parse($leave->end_date ?? $leave->date);

                            // Check if the date falls within the leave period or matches a single-day leave
                            return $date->between($leaveStart, $leaveEnd) || $date->isSameDay($leaveStart);
                            });
                            @endphp

                            <td class="@if($leave) bg-danger text-white @elseif($shift) bg-success text-white @else bg-secondary text-white @endif">
                                @if($leave)
                                {{ ucfirst($leave->leave_type) }} <br>
                                {{ $leave->reason }} <br>
                                From: {{ \Carbon\Carbon::parse($leave->start_date ?? $leave->date)->format('d M Y') }} <br>
                                To: {{ \Carbon\Carbon::parse($leave->end_date ?? $leave->date)->format('d M Y') }}
                                @elseif($shift)
                                {{ ucfirst($shift->shift_type) }} <br>
                                {{ \Carbon\Carbon::parse($shift->start_time)->format('h:i A') }} -
                                {{ \Carbon\Carbon::parse($shift->end_time)->format('h:i A') }} <br>
                                {{ ucfirst($shift->add_duty) }}
                                <br>
                                <div style="display: inline-block;" title="{{ ucfirst($shift->node) }}">
                                    {{ ucfirst(Str::words($shift->node, 4, '...')) }}
                                </div>

                                @if($shift->status == 0)
                                <div class="mt-2 shift-actions" data-shift-id="{{ $shift->id }}">
                                    <button class="btn btn-sm btn-primary accept-btn">Accept</button>
                                    <button class="btn btn-sm btn-danger reject-btn">Reject</button>
                                </div>
                                @elseif($shift->status == 1)
                                <br>
                                <span class="badge" style="background-color: green;">Accepted</span>
                                @elseif($shift->status == 2)
                                <br>
                                <span class="badge badge-danger">Rejected</span>
                                @endif
                                @else
                                No shift or leave
                                @endif
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-submit form when employee dropdown changes
        const employeeSelect = document.getElementById('employee_id');
        if (employeeSelect) {
            employeeSelect.addEventListener('change', function() {
                // Preserve other form values
                const form = this.closest('form');
                if (form) {
                    form.submit();
                }
            });
        }
        
        document.querySelectorAll('.accept-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                var shiftId = this.closest('.shift-actions').getAttribute('data-shift-id');
                updateShiftStatus(shiftId, 'accept');
            });
        });

        document.querySelectorAll('.reject-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                var shiftId = this.closest('.shift-actions').getAttribute('data-shift-id');
                updateShiftStatus(shiftId, 'reject');
            });
        });

        function updateShiftStatus(shiftId, action) {
            var url = action === 'accept' ? `/shifts/${shiftId}/accept` : `/shifts/${shiftId}/reject`;

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'accepted' || data.status === 'rejected') {
                        var cell = document.querySelector(`[data-shift-id="${shiftId}"]`);
                        cell.innerHTML = `<span class="badge badge-${data.status === 'accepted' ? 'success' : 'danger'}">${data.status.charAt(0).toUpperCase() + data.status.slice(1)}</span>`;
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    });
</script>

@endsection