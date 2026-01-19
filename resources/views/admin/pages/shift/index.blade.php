@extends('admin.master.main')
@section('content')

<style>
    .small-swal-popup {
        width: 250px !important;
        padding: 10px !important;
    }

    td[title] {
        position: relative;
        cursor: pointer;
    }

    td[title]:hover::after {
        content: attr(title);
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: #1f2937;
        color: #fff;
        padding: 8px 12px;
        border-radius: 8px;
        white-space: nowrap;
        font-size: 12px;
        z-index: 10;
        pointer-events: none;
        opacity: 0.95;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    /* Reduce gap between columns */
    #style-2 th:nth-child(2),
    #style-2 td:nth-child(2) {
        padding-right: 16px !important;
    }
    #style-2 th:nth-child(9),
    #style-2 td:nth-child(9) {
        padding-left: 16px !important;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
    // Flash messages using meta tags
            document.addEventListener('DOMContentLoaded', function() {
        const successMsg = document.querySelector('meta[name="flash-success"]');
        const errorMsg = document.querySelector('meta[name="flash-error"]');
        
        if (successMsg) {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                title: successMsg.getAttribute('content'),
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                    background: '#28a745',
                    customClass: {
                        popup: 'small-swal-popup'
                    }
                });
        }
        
        if (errorMsg) {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'error',
                title: errorMsg.getAttribute('content'),
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                background: '#dc3545',
                    customClass: {
                        popup: 'small-swal-popup'
                    }
                });
        }
            });
        </script>

@if(session('success'))
<meta name="flash-success" content="{{ session('success') }}">
@endif
@if(session('error'))
<meta name="flash-error" content="{{ session('error') }}">
        @endif

<div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-3" style="padding-left: 10px; padding-top: 0;">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-calendar-alt fa-2x" style="color: #1f2937;"></i>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Shift Schedule</h4>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage employee shift schedules</p>
            </div>
        </div>
            @can('create attendance')
        <a href="{{ route('shift.create') }}" class="btn btn-secondary">
            <i class="fas fa-plus me-2"></i>Add Shift
        </a>
            @endcan
    </div>
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
            <table id="style-2" class="table table-striped align-middle style-2 dt-table-hover">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Employee Name</th>
                        <th>Shift Type</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Additional Duty</th>
                        <th>Note</th>
                        <th class="text-center" style="width: 120px;">Status</th>
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'HR' || auth()->user()->role == 'Accountant')
                        <th class="text-center" style="width: 140px;">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($shifts as $shift)
                    @if($shift->employee) <!-- Check if the employee relation exists -->
                    <tr>
                        <td><strong style="color: #0f172a;">#{{ $shift->id }}</strong></td>
                        <td>
                            @if(isset($shift->employee))
                            <img
                                src="{{ $shift->employee->image ? asset($shift->employee->image) : asset('images/dummy.jpg') }}"
                                alt="{{ $shift->employee->first_name ?? 'No Name' }} {{ $shift->employee->last_name ?? '' }}"
                                class="profile-img">
                            <strong style="color: #1e293b; font-weight: 600;">{{ $shift->employee->first_name ?? 'No Name' }} {{ $shift->employee->last_name ?? '' }}</strong>
                            @else
                            <span class="text-muted">No Employee</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge" style="background: #e0e7ff; color: #4338ca; padding: 6px 12px; border-radius: 8px; font-weight: 500;">
                                <i class="fas fa-clock me-1"></i>{{ ucfirst($shift->shift_type) }}
                            </span>
                        </td>
                        <td style="color: #475569; font-weight: 500;">{{ $shift->date }}</td>
                        <td style="color: #475569;">
                            <i class="fas fa-clock me-1" style="color: #64748b;"></i>{{ \Carbon\Carbon::parse($shift->start_time)->format('h:i A') }}
                        </td>
                        <td style="color: #475569;">
                            <i class="fas fa-clock me-1" style="color: #64748b;"></i>{{ \Carbon\Carbon::parse($shift->end_time)->format('h:i A') }}
                        </td>
                        <td style="color: #475569;">{{ ucfirst($shift->add_duty) ?: 'N/A' }}</td>
                        <td title="{{ $shift->node }}" style="color: #64748b; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            {{ Str::words($shift->node, 1, '...') ?: '-' }}
                        </td>
                        <td class="text-center">
                            @if($shift->status == 0)
                            <span class="badge" style="background: #fef3c7; color: #d97706; padding: 6px 12px; border-radius: 8px; font-weight: 500;">
                                <i class="fas fa-clock me-1"></i>Pending
                            </span>
                            @elseif($shift->status == 2)
                            <span class="badge" style="background: #fee2e2; color: #dc2626; padding: 6px 12px; border-radius: 8px; font-weight: 500;">
                                <i class="fas fa-times-circle me-1"></i>Rejected
                            </span>
                            @else
                            <span class="badge" style="background: #d1fae5; color: #059669; padding: 6px 12px; border-radius: 8px; font-weight: 500;">
                                <i class="fas fa-check-circle me-1"></i>Accepted
                            </span>
                            @endif
                        </td>
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'HR' || auth()->user()->role == 'Accountant')
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $shift->id }}" data-bs-toggle="dropdown" aria-expanded="false" style="border: 2px solid #e2e8f0; color: #64748b; padding: 8px 14px; border-radius: 8px; background: #ffffff;">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $shift->id }}">
                                    @can('update shift')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('shift.edit', $shift->id) }}">
                                            <i class="fas fa-edit me-2"></i>Edit
                                        </a>
                                    </li>
                                    @endcan
                                    @can('delete shift')
                                    <li>
                                        <form action="{{ route('shift.destroy', $shift->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to remove this shift?')">
                                                <i class="fas fa-trash-alt me-2"></i>Delete
                                </button>
                            </form>
                                    </li>
                            @endcan
                                </ul>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection