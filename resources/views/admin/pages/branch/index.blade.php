@extends('admin.master.main')

@section('content')

@if(session('success'))
<meta name="flash-success" content="{{ session('success') }}">
@endif
@if(session('error'))
<meta name="flash-error" content="{{ session('error') }}">
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

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
                <i class="fas fa-building fa-2x" style="color: #1f2937;"></i>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Company Branches</h4>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage company branch locations</p>
            </div>
        </div>
        <a href="{{ route('branch.create') }}" class="btn btn-secondary">
            <i class="fas fa-plus me-2"></i>Add Branch
        </a>
    </div>
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
            <table id="style-2" class="table table-striped align-middle style-2 dt-table-hover">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Name</th>
                        <th>Manager Name</th>
                        <th>Number</th>
                        <th>Address</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($branchs as $branch)
                    <tr>
                        <td><strong style="color: #0f172a;">#{{ $branch->id }}</strong></td>
                        <td>
                            <strong style="color: #1e293b; font-weight: 600;">{{ $branch->name }}</strong>
                        </td>
                        <td style="color: #475569;">
                            <i class="fas fa-user-tie me-1" style="color: #64748b;"></i>{{ $branch->manager_name }}
                        </td>
                        <td style="color: #475569;">
                            <i class="fas fa-phone me-1" style="color: #64748b;"></i>{{ $branch->number }}
                        </td>
                        <td style="color: #475569; max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            <i class="fas fa-map-marker-alt me-1" style="color: #64748b;"></i>{{ $branch->address }}
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $branch->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $branch->id }}" style="border-radius: 10px; border: 1px solid #e5e7eb; box-shadow: 0 8px 24px rgba(0,0,0,0.08);">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('branch.edit', $branch->id) }}" style="padding: 10px 16px; border-radius: 6px;">
                                            <i class="fas fa-edit me-2"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('branch.destroy', $branch->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to remove this branch?')" style="padding: 10px 16px; border-radius: 6px;">
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
    </div>
</div>



@endsection