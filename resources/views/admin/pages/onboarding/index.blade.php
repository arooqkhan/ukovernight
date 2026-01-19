@extends('admin.master.main')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<style>
    /* Modal Custom Styles */
    .modal-content {
        background-color: #f8f9fa;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        background-color: #343a40;
        color: white;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        padding: 20px;
        position: relative;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .close {
        color: white;
        font-size: 1.5rem;
        position: absolute;
        right: 20px;
        top: 15px;
    }

    .modal-body {
        padding: 30px;
        font-size: 1rem;
        color: #343a40;
    }

    #documentFile {
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 10px;
    }

    .modal-footer {
        background-color: #f8f9fa;
        padding: 20px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        text-align: right;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

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

<div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-3" style="padding-left: 10px; padding-top: 0;">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-users fa-2x" style="color: #1f2937;"></i>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Employees Record</h4>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage employee onboarding records</p>
            </div>
        </div>
    </div>
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
            <table id="style-2" class="table table-striped align-middle style-2 dt-table-hover">
    <thead>
        <tr>
                        <th style="width: 60px;">ID</th>
            <th>Employee Name</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
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
            <td class="text-center">
                            <a href="{{ route('onboarding.edit', $employee->id) }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-edit me-1"></i>Edit
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>
</div>



@endsection