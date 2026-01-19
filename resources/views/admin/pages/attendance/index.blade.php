@extends('admin.master.main')
@section('content')

<style>
    .small-swal-popup {
        width: 250px !important;
        padding: 10px !important;
    }
    
    /* Consistent with other tables - use global styles */
    /* Button spacing - ensure proper top margin */
    .widget-content-area > .btn {
        margin-top: 20px !important;
        margin-bottom: 16px !important;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="col-lg-12">
<h4 class="m-2">Attendance Records</h4>
    <div class="statbox widget box box-shadow">
        <meta name="flash-success" content="{{ session('success') }}">
        <meta name="flash-error" content="{{ session('error') }}">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var successMeta = document.querySelector('meta[name="flash-success"]');
                var errorMeta = document.querySelector('meta[name="flash-error"]');
                var success = successMeta ? successMeta.getAttribute('content') : '';
                var errorMsg = errorMeta ? errorMeta.getAttribute('content') : '';
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
            
            @can('create attendance')
            <a href="{{ route('attendance.create') }}" class="btn btn-secondary" style="margin: 20px 0 16px 16px;">Add Attendance</a>
            @endcan
            <table id="style-2" class="table table-striped align-middle style-2 dt-table-hover">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Employee Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $displayedEmployees = [];
                    @endphp

                    @foreach($attendances as $attendance)
                    @if($attendance->employee && !in_array($attendance->employee->id, $displayedEmployees))
                    @php
                    $displayedEmployees[] = $attendance->employee->id;
                    @endphp
                    <tr>
                    
                        <td>{{$attendance->id}}</td>
                        <td>
                            <div class="d-flex align-items-center">
        @if($attendance->employee && $attendance->employee->image)
                                    <img src="{{ asset($attendance->employee->image) }}" class="rounded-circle profile-img me-3" alt="Employee Image">
        @else
                                    <img src="{{ asset('images/dummy.jpg') }}" class="rounded-circle profile-img me-3" alt="Employee Image">
        @endif
                                <span>
    @if($attendance->employee && $attendance->employee->first_name && $attendance->employee->last_name)
        {{ $attendance->employee->first_name }} {{ $attendance->employee->last_name }}
    @else
        No Employee
    @endif
                                </span>
                            </div>
</td>

                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $attendance->id }}" data-bs-toggle="dropdown" aria-expanded="false" style="border: 2px solid #e2e8f0; color: #64748b; padding: 8px 14px; border-radius: 8px; background: #ffffff;">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $attendance->id }}">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('attendance.show', $attendance->employee->id) }}">
                                            <i class="fas fa-eye me-2"></i>View Details
                </a>
                                    </li>
                                    @can('delete attendance')
                                    <li>
                                        <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to Remove this Attendance?')">
                                                <i class="fas fa-trash-alt me-2"></i>Delete
                                </button>
                                        </form>
                                    </li>
                                @endcan
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach

                </tbody>
            </table>
        </div>
        @endsection