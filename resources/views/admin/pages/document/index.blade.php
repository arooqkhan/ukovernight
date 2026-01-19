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

<style>
    .filter-section {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        margin-bottom: 24px;
    }

    .filter-section .form-label {
        font-weight: 600;
        color: #1e293b;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }

    .filter-section .form-control,
    .filter-section select {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 10px 16px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .filter-section .form-control:focus,
    .filter-section select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .filter-section .form-control::placeholder {
        color: #94a3b8;
    }

    .filter-section .btn {
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .filter-section .btn-secondary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.2);
    }

    .filter-section .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        color: #ffffff;
    }

    .status-filter-group {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
        padding-top: 16px;
        border-top: 1px solid #e5e7eb;
        margin-top: 20px;
    }

    .status-filter-group .status-label {
        font-weight: 600;
        color: #1e293b;
        font-size: 0.95rem;
        margin: 0;
    }

    .status-radio-group {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .status-radio-option {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .status-radio-option input[type="radio"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #667eea;
    }

    .status-radio-option label {
        margin: 0;
        cursor: pointer;
        font-weight: 500;
        color: #475569;
        font-size: 0.9rem;
    }

    .filter-dropdown-menu {
        min-width: 400px;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid #e5e7eb;
        margin-top: 8px !important;
    }

    .filter-dropdown-menu .form-label {
        font-weight: 600;
        color: #1e293b;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }

    .filter-dropdown-menu .form-control,
    .filter-dropdown-menu select {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 10px 16px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        margin-bottom: 16px;
    }

    .filter-dropdown-menu .form-control:focus,
    .filter-dropdown-menu select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .filter-dropdown-toggle {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.2);
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .filter-dropdown-toggle:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        color: #ffffff;
    }

    .filter-dropdown-toggle:focus {
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        color: #ffffff;
    }
</style>

<div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-3" style="padding-left: 10px; padding-top: 0;">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-file-alt fa-2x" style="color: #1f2937;"></i>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Employees Document</h4>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage and track employee documents</p>
            </div>
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

            <!-- Filter Toolbar -->
            <div class="filter-section">
                <div class="row align-items-center">
                    <!-- Left: Primary actions -->
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                        <div class="d-flex gap-2" style="flex-wrap: nowrap;">
                            <a href="{{ route('document.create') }}" class="btn btn-secondary" style="white-space: nowrap;">
                                <i class="fas fa-plus me-2"></i>Add Document
                            </a>
                            <a href="{{ route('accouncementdocument.index') }}" class="btn btn-secondary" style="white-space: nowrap;">
                                <i class="fas fa-file-request me-2"></i>Requested Document
                            </a>
                        </div>
                    </div>

            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'HR' || auth()->user()->role == 'Accountant')
                    <!-- Right: Filter Dropdown -->
                    <div class="col-12 col-lg-6 d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="btn filter-dropdown-toggle dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-filter me-2"></i>Filter
                            </button>
                            <div class="dropdown-menu filter-dropdown-menu" aria-labelledby="filterDropdown">
                                <div class="px-2">
                                    <label for="employeeSelect" class="form-label">Select Employee</label>
                    <select id="employeeSelect" class="form-control" onchange="filterDocuments()">
                        <option value="">Select Employee</option>
                        @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                        @endforeach
                    </select>
                </div>
                                <div class="px-2">
                                    <label for="searchTitleInput" class="form-label">Search by Document Title</label>
                                    <input type="text" id="searchTitleInput" class="form-control" placeholder="e.g. Passport" onkeyup="filterDocuments()">
                </div>
                                <div class="px-2">
                                    <label for="searchNameInput" class="form-label">Search by Employee Name</label>
                                    <input type="text" id="searchNameInput" class="form-control" placeholder="e.g. John Doe" onkeyup="filterDocuments()">
                </div>
            </div>
                </div>
            </div>
            @endif
                </div>

                @if(auth()->user()->role == 'admin' || auth()->user()->role == 'HR' || auth()->user()->role == 'Accountant')
                <!-- Status filters -->
                <div class="status-filter-group">
                    <span class="status-label">Status:</span>
                    <div class="status-radio-group">
                        <div class="status-radio-option">
                            <input type="radio" name="status" id="statusAll" value="" checked onclick="filterDocuments()">
                            <label for="statusAll">All</label>
                        </div>
                        <div class="status-radio-option">
                            <input type="radio" name="status" id="statusPending" value="0" onclick="filterDocuments()">
                            <label for="statusPending">Pending</label>
                        </div>
                        <div class="status-radio-option">
                            <input type="radio" name="status" id="statusAccepted" value="1" onclick="filterDocuments()">
                            <label for="statusAccepted">Accepted</label>
                        </div>
                        <div class="status-radio-option">
                            <input type="radio" name="status" id="statusRejected" value="2" onclick="filterDocuments()">
                            <label for="statusRejected">Rejected</label>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <table id="style-2" class="table table-striped align-middle style-2 dt-table-hover">
                <thead>
                    <tr>
                        <th style="padding-top: 0 !important;">ID</th>
                        <th>Employee Name</th>
                        <th>Document Title</th>
                        <th>Document</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="documentTableBody">
                    @foreach($documents as $document)
                    <tr data-status="{{ $document->status }}" data-employee="{{ $document->employee_id }}">
                        <td>{{ $document->id }}</td>
                        <td>
                            <span>
                                @if($document->employee && $document->employee->image)
                                <img src="{{ asset($document->employee->image) }}" class="rounded-circle profile-img" alt="Employee Image" style="width: 50px; height: 50px; margin-right: 10px;">
                                @else
                                <img src="{{ asset('images/dummy.jpg') }}" class="rounded-circle profile-img" alt="Employee Image" style="width: 50px; height: 50px; margin-right: 10px;">
                                @endif
                            </span>
                            @if($document->employee && $document->employee->first_name && $document->employee->last_name)
                            {{ $document->employee->first_name }} {{ $document->employee->last_name }}
                            @else
                            No Employee
                            @endif
                        </td>
                        <td>{{ $document->name }}</td>
                        <td>
                            <a href="{{ asset($document->document) }}" target="_blank" rel="noopener noreferrer">
                                <i class="fa fa-file-alt"></i> {{ $document->name }}
                            </a>



                        </td>
                <td>{{ \Carbon\Carbon::parse($document->expiry_date)->format('d-m-Y') }}</td>

                        <td class="text-center">
                            @if($document->status == 0)
                            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'HR' || auth()->user()->role == 'Accountant')
                            <button class="btn btn-success btn-sm" onclick="updateStatus({{ $document->id }}, 1)">Accept</button>
                            <button class="btn btn-danger btn-sm" onclick="updateStatus({{ $document->id }}, 2)">Reject</button>

                            @else
                            <span class="badge badge-warning">Pending</span>
                            @endif
                            @elseif($document->status == 1)
                            <span class="badge badge-success">Accepted</span>
                            @elseif($document->status == 2)

                            @php
                                $rejectedUploadUrl = route('documents.edits', [
                                    'title' => $document->name,
                                    'id' => optional($document->employee)->id,
                                    'first_name' => optional($document->employee)->first_name,
                                    'last_name' => optional($document->employee)->last_name,
                                    'docid' => $document->id
                                ]);
                            @endphp
                            <a href="{{ $rejectedUploadUrl }}" class="btn btn-danger">Rejected/Upload</a>

                            @endif
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $document->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $document->id }}">
                                    @can('update document')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('document.edit', $document->id) }}">
                                            <i class="fas fa-edit me-2"></i> Edit
                                        </a>
                                    </li>
                                    @endcan

                                    <!-- View Document Link -->
                                    <li>
                                        <a class="dropdown-item" href="{{ asset($document->document) }}" target="_blank" rel="noopener noreferrer">
                                            <i class="fas fa-eye me-2"></i> View
                                        </a>
                                    </li>

                                    <!-- Delete Form -->
                                    <li>
                                        <form action="{{ route('document.destroy', $document->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to remove this document?')">
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

<script>
    function filterDocuments() {
        const searchTitleInput = document.getElementById('searchTitleInput').value.toLowerCase();
        const searchNameInput = document.getElementById('searchNameInput').value.toLowerCase();
        const status = document.querySelector('input[name="status"]:checked').value;
        const selectedEmployee = document.getElementById('employeeSelect').value;
        const documentRows = document.querySelectorAll('#documentTableBody tr');

        documentRows.forEach(row => {
            const title = row.cells[2].textContent.toLowerCase();
            const employeeName = row.cells[1].textContent.toLowerCase();
            const rowStatus = row.dataset.status;
            const rowEmployee = row.dataset.employee;

            const titleMatch = title.includes(searchTitleInput);
            const nameMatch = employeeName.includes(searchNameInput);
            const statusMatch = status === "" || rowStatus === status;
            const employeeMatch = selectedEmployee === "" || rowEmployee === selectedEmployee;

            if (titleMatch && nameMatch && statusMatch && employeeMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function updateStatus(documentId, status) {
        fetch(`/document/${documentId}/update-status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure you include the CSRF token
                },
                body: JSON.stringify({
                    status: status
                })
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Network response was not ok.');
            })
            .then(data => {
                // Optionally, you could update the status on the page here
                // but since you want a page refresh, we'll skip that

                // Reload the page to reflect the changes
                location.reload();
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }
</script>


<script>
    $(document).ready(function() {
        // Initialize your DataTable (if not already)
        var table = $('#style-2').DataTable();

        // Filter by employee dropdown
        $('#employeeSelect').on('change', function() {
            var selectedEmployee = $(this).val();

            if(selectedEmployee === "") {
                // Show all employees
                table.rows().show();
                table.search('').draw();
            } else {
                // Use a custom search function
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var rowEmployee = table.row(dataIndex).node().dataset.employee;
                        return rowEmployee == selectedEmployee;
                    }
                );
            }

            // Redraw table and move to first page
            table.draw();
            table.page('first').draw('page');

            // Remove custom search after drawing to not affect other filters
            $.fn.dataTable.ext.search.pop();
        });
    });
</script>


@endsection