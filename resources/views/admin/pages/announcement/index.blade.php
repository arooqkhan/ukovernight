@extends('admin.master.main')

@section('content')

<style>
    .small-swal-popup {
        width: 250px !important;
        padding: 10px !important;
    }

    .modal-content {
        border-radius: 10px;
        padding: 20px;
        border: 1px solid #e0e0e0;
    }

    .modal-header {
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 15px;
    }

    .modal-title {
        font-size: 20px;
        font-weight: 700;
        color: #333;
    }

    .modal-body {
        font-size: 16px;
        color: #555;
    }

    .modal-footer {
        border-top: 1px solid #e0e0e0;
        padding-top: 15px;
        justify-content: center;
    }

    .modal-footer .btn {
        border-radius: 5px;
        font-size: 14px;
        padding: 10px 20px;
    }

    .modal-dialog {
        max-width: 700px;
    }

    .modal-header .close {
        margin: -10px -10px -10px auto;
        padding: 0;
        font-size: 24px;
        font-weight: 700;
    }

    .modal-header .close span {
        color: #999;
    }

    .modal-body p {
        margin: 0;
        padding: 10px 0;
        border-bottom: 1px solid #e0e0e0;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                <i class="fas fa-bullhorn fa-2x" style="color: #1f2937;"></i>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Latest Announcements</h4>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage company announcements</p>
            </div>
            </div>
            @can('create announcements')
        <a href="{{ route('announcements.create') }}" class="btn btn-secondary">
            <i class="fas fa-plus me-2"></i>Add Announcement
        </a>
            @endcan
    </div>
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
            <table id="style-2" class="table table-striped align-middle style-2 dt-table-hover">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th class="text-center" style="width: 140px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($announcements as $announcement)
                    <tr>
                        <td><strong style="color: #0f172a;">#{{ $announcement->id }}</strong></td>
                        <td>
                            <strong style="color: #1e293b; font-weight: 600;">{{ $announcement->title }}</strong>
                        </td>
                      <td>
    <span data-toggle="tooltip" 
          data-placement="top" 
                                  title="{{ $announcement->message }}"
                                  style="color: #475569; max-width: 300px; display: inline-block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ Str::limit($announcement->message, 50) }}{{ strlen($announcement->message) > 50 ? '...' : '' }}
    </span>
</td>
                        <td style="color: #475569; font-weight: 500;">
                            <i class="fas fa-calendar me-1" style="color: #64748b;"></i>{{ \Carbon\Carbon::parse($announcement->date)->format('M d, Y') }}
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $announcement->id }}" data-bs-toggle="dropdown" aria-expanded="false" style="border: 2px solid #e2e8f0; color: #64748b; padding: 8px 14px; border-radius: 8px; background: #ffffff;">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $announcement->id }}">
                            @can('update announcements')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('announcements.edit', $announcement->id) }}">
                                            <i class="fas fa-edit me-2"></i>Edit
                            </a>
                                    </li>
                            @endcan
                                    @can('delete announcements')
                                    <li>
                                        <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to remove this announcement?')">
                                                <i class="fas fa-trash-alt me-2"></i>Delete
                                </button>
                                        </form>
                                    </li>
                                @endcan
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

<script>
    $(function () {
        $('[data-toggle="tooltip"], [data-bs-toggle="tooltip"]').tooltip();
    });
</script>

@endsection
