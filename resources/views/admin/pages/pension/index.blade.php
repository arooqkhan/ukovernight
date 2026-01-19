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

        @if(session('success'))
<meta name="flash-success" content="{{ session('success') }}">
@endif
@if(session('error'))
<meta name="flash-error" content="{{ session('error') }}">
@endif

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
                    customClass: { popup: 'small-swal-popup' }
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
                    customClass: { popup: 'small-swal-popup' }
                });
        }
            });
        </script>

<div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-3" style="padding-left: 10px; padding-top: 0;">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-piggy-bank fa-2x" style="color: #1f2937;"></i>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Employees Pension Record</h4>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage employee pension enrollment records</p>
            </div>
        </div>
    </div>
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
            <!-- Employee Table -->
            <table id="style-2" class="table table-striped align-middle style-2 dt-table-hover">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Name</th>
                        <th>Date Of Birth</th>
                        <th class="text-center">Pension Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        @if($employee->role === 'admin')
                            @continue
                        @endif

                        <tr data-branch="{{ $employee->branch }}">
                            <td><strong style="color: #0f172a;">#{{ $employee->id }}</strong></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($employee->image)
                                    <img src="{{ asset($employee->image) }}" class="profile-img me-3" alt="Employee Image">
                                    @else
                                    <img src="{{ asset('images/dummy.jpg') }}" class="profile-img me-3" alt="Employee Image">
                                    @endif
                                    <strong style="color: #1e293b; font-weight: 600;">{{ $employee->first_name }} {{ $employee->last_name }}</strong>
                                </div>
                            </td>
                            <td style="color: #475569; font-weight: 500;">
                                <i class="fas fa-calendar me-1" style="color: #64748b;"></i>{{ $employee->dob ? \Carbon\Carbon::parse($employee->dob)->format('M d, Y') : '-' }}
                            </td>
                            <td class="text-center">
                                @if($employee->pension_status == 'enroll')
                                <span class="badge" style="background: #dbeafe; color: #1e40af; padding: 6px 12px; border-radius: 8px; font-weight: 500;">
                                    <i class="fas fa-check-circle me-1"></i>Enroll
                                </span>
                                @elseif($employee->pension_status == 'notenroll')
                                <span class="badge" style="background: #f1f5f9; color: #64748b; padding: 6px 12px; border-radius: 8px; font-weight: 500;">
                                    <i class="fas fa-times-circle me-1"></i>Not Enroll
                                </span>
                                @elseif($employee->pension_status == 'opt_out')
                                <span class="badge" style="background: #fef3c7; color: #d97706; padding: 6px 12px; border-radius: 8px; font-weight: 500;">
                                    <i class="fas fa-sign-out-alt me-1"></i>Opt Out
                                </span>
                                @elseif($employee->pension_status == 'enroll_optout')
                                <span class="badge" style="background: #e0e7ff; color: #4338ca; padding: 6px 12px; border-radius: 8px; font-weight: 500;">
                                    <i class="fas fa-exchange-alt me-1"></i>Enroll & Opt Out
                                </span>
                                @else
                                <span class="badge" style="background: #f1f5f9; color: #64748b; padding: 6px 12px; border-radius: 8px; font-weight: 500;">
                                    <i class="fas fa-minus me-1"></i>{{ ucfirst($employee->pension_status ?? 'N/A') }}
                                </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center" style="padding: 60px 20px !important;">
                                <i class="fas fa-piggy-bank fa-4x mb-3" style="color: #cbd5e1;"></i>
                                <p style="font-size: 1.1rem; color: #94a3b8; margin: 0;">No pension records found.</p>
                            </td>
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
