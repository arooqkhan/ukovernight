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
    <div class="d-flex justify-content-between align-items-center mb-3" style="padding-left: 10px; padding-top: 0;">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-file-pdf fa-2x" style="color: #1f2937;"></i>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Assigned Employees</h4>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage employee payslip assignments</p>
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('payslipupload.create') }}" class="btn btn-secondary">
                <i class="fas fa-upload me-2"></i>Upload PDF
            </a>
            @can('unassignPage payslipupload')
            <a href="{{ route('payslipupload.unassignPage') }}" class="btn btn-secondary">
                <i class="fas fa-users me-2"></i>View Unassigned Employees
            </a>
            @endcan
        </div>
    </div>
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
        
        <table id="style-2" class="table table-striped align-middle style-2 dt-table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>PDF</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employeesData as $data)
                <tr>
                    <td>{{ $data['payslip_upload_id'] }}</td>
                    <td>{{ $data['first_name'] }} {{ $data['last_name'] }}</td>
                    <td>
                        <a href="{{ asset($data['pdf']) }}" target="_blank" class="text-decoration-none">
                            <i class="fas fa-file-pdf me-2" style="color: #dc2626;"></i>
                            <span style="color: #1d4ed8;">View PDF</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('payslipupload.destroy', $data['payslip_upload_id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="pdf" value="{{ $data['pdf'] }}">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this PDF?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

@endsection