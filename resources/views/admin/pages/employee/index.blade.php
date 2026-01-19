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
    <div class="d-flex align-items-center mb-4" style="padding-left: 10px;">
        <div class="me-3">
            <i class="fas fa-users fa-2x" style="color: #1f2937;"></i>
        </div>
        <div>
            <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Employees</h4>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage employee directory and details</p>
        </div>
    </div>

    <div class="statbox widget box box-shadow">
        <meta name="flash-success" content="{{ session('success') }}">
        <meta name="flash-error" content="{{ session('error') }}">
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var success = document.querySelector('meta[name="flash-success"]')?.getAttribute("content") || "";
                var errorMsg = document.querySelector('meta[name="flash-error"]')?.getAttribute("content") || "";
                if (success) {
                Swal.fire({
                        position: "bottom-end",
                        icon: "success",
                        title: success,
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                        background: "#10b981",
                        color: "#ffffff",
                        customClass: { popup: "small-swal-popup" }
                });
                }
                if (errorMsg) {
                Swal.fire({
                        position: "bottom-end",
                        icon: "error",
                        title: errorMsg,
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                        background: "#ef4444",
                        color: "#ffffff",
                        customClass: { popup: "small-swal-popup" }
                });
                }
            });
        </script>

        <div class="widget-content widget-content-area">

            <div class="d-flex justify-content-between align-items-end flex-wrap gap-3" style="padding: 16px; background: #f8fafc; border: 1px solid #e5e7eb; border-radius: 12px; margin-bottom: 16px;">

                <!-- Add Employee Button -->
                <div>
                @can('create employee')
                    <a href="{{ route('employee.create') }}" class="btn btn-secondary">
                        <i class="fas fa-plus-circle me-2"></i>Add New Employee
                    </a>
                @endcan
                </div>

                <!-- Branch Filter Select Box -->
                <div style="min-width: 250px;">
                    <label for="branchFilter" class="form-label">
                        <i class="fas fa-filter me-2"></i>Filter by Branch
                    </label>
                    <select class="form-control branch-filter" id="branchFilter" name="branch">
                        <option value="all" selected>All branches</option>
                        @foreach($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>




            <!-- Employee Table -->
            <table id="style-2" class="table table-striped align-middle style-2 dt-table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>User Email</th>
                        <th>Designation</th>
                        <th>EmployeeID</th>
                        <th>Role</th>
                        <th class="text-center col-actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)

                    {{-- Skip if role is admin --}}
                    @if($employee->role === 'admin')
                    @continue
                    @endif

                    <tr data-branch="{{ $employee->branch }}">
                        <td>{{ $employee->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($employee->image)
                                <img src="{{ asset($employee->image) }}" class="rounded-circle profile-img me-3" alt="Employee Image">
                                @else
                                <img src="{{ asset('images/dummy.jpg') }}" class="rounded-circle profile-img me-3" alt="Employee Image">
                                @endif
                                <div>
                                    <strong style="color: #1e293b; font-weight: 600;">{{ $employee->first_name }} {{ $employee->last_name }}</strong>
                                </div>
                            </div>
                        </td>
                        <td>
                            <i class="fas fa-envelope me-2" style="color: #64748b;"></i>
                            <span style="color: #475569;">{{ $employee->user->email }}</span>
                        </td>
                        <td>
                            <span class="badge bg-info" style="background: #eff6ff !important; color: #1d4ed8 !important; border: 1px solid #c7d2fe;">
                                {{ $employee->designation ?: 'N/A' }}
                            </span>
                        </td>
                        <td>
                            <strong style="color: #0f172a; font-weight: 600;">#{{ $employee->employee_id }}</strong>
                        </td>
                        <td>
                            <span class="badge" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #ffffff; padding: 6px 10px; border-radius: 6px; font-weight: 600;">
                                {{ ucfirst($employee->role) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $employee->id }}" data-bs-toggle="dropdown" aria-expanded="false" style="border: 2px solid #e2e8f0; color: #64748b; padding: 8px 14px; border-radius: 8px; background: #ffffff;">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $employee->id }}">
                                    @if($employee->role !== 'admin')
                                        @can('update employee')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('employee.edit', $employee->id) }}">
                                                <i class="fas fa-edit me-2"></i> Edit
                                            </a>
                                        </li>
                                        @endcan
                                    @endif

                                    <li>
                                        <a class="dropdown-item" href="{{ route('employee.show', $employee->id) }}">
                                            <i class="fas fa-eye me-2"></i> View Details
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('documents.showByEmployee', $employee->id) }}">
                                            <i class="fas fa-file-alt me-2"></i> Documents
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('attendance.show', $employee->id) }}">
                                            <i class="fas fa-calendar-check me-2"></i> Attendance
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('payroll.showWithEmployee', [0, $employee->id, $employee->first_name, $employee->last_name]) }}">
                                            <i class="fas fa-dollar-sign me-2"></i> Payslip
                                        </a>
                                    </li>

                                    @if($employee->role !== 'admin')
                                        @can('delete employee')
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this employee?')">
                                                    <i class="fas fa-trash-alt me-2"></i> Delete
                                                </button>
                                            </form>
                                        </li>
                                        @endcan
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center" style="padding: 60px 20px !important;">
                            <i class="fas fa-users fa-4x mb-3" style="color: #cbd5e1;"></i>
                            <p style="font-size: 1.1rem; color: #94a3b8; margin: 0;">No employee records found.</p>
                            <p style="font-size: 0.9rem; color: #cbd5e1; margin-top: 8px;">Add your first employee to get started.</p>
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