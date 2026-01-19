@extends('admin.master.main')

@section('content')



<style>
    /* Modal Custom Styles */
    .modal-content { background-color: #f8f9fa; border-radius: 15px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); }
    .modal-header { background-color: #343a40; color: white; border-top-left-radius: 15px; border-top-right-radius: 15px; padding: 20px; }
    .modal-title { font-size: 1.5rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
    .close { color: white; font-size: 1.5rem; position: absolute; right: 20px; top: 15px; }
    .modal-body { padding: 30px; font-size: 1rem; color: #343a40; }
    .modal-footer { background-color: #f8f9fa; padding: 20px; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; text-align: right; }

    /* Filter Section Styles */
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

    .status-radio-group {
        display: flex;
        flex-direction: column;
        gap: 12px;
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

    /* Profile Image Styling */
    .profile-img { width: 50px; height: 50px; margin-right: 10px; object-fit: cover; border-radius: 50%; }
</style>

<div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-3" style="padding-left: 10px; padding-top: 0;">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-file-request fa-2x" style="color: #1f2937;"></i>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Request Documents</h4>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage document requests and uploads</p>
            </div>
        </div>
    </div>

    <div class="statbox widget box box-shadow">
        @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                    background: '#28a745',
                    color: '#ffffff'
                });
            });
        </script>
        @endif

        @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'error',
                    title: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                    background: '#dc3545',
                    color: '#ffffff'
                });
            });
        </script>
        @endif

        <div class="widget-content widget-content-area">
            <!-- Filter Toolbar -->
            <div class="filter-section">
                <div class="row align-items-center">
                    <!-- Left: Primary actions -->
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                        <div class="d-flex gap-2" style="flex-wrap: nowrap;">
            @can('create announcementsdocument')
                            <a href="{{ route('accouncementdocument.create') }}" class="btn btn-secondary" style="white-space: nowrap;">
                                <i class="fas fa-plus me-2"></i>Add Request Document
                            </a>
            @endcan
                            <a href="javascript:void(0)" onclick="history.back()" class="btn btn-secondary" style="white-space: nowrap;">
                                <i class="fas fa-arrow-left me-2"></i>Back
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
                <select id="employeeSelect" class="form-control">
                    <option value="">Select Employee</option>
                    @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                    @endforeach
                </select>
                                </div>
                                <div class="px-2">
                                    <label for="nameFilter" class="form-label">Search by Name</label>
                                    <input type="text" id="nameFilter" placeholder="e.g. John Doe" class="form-control">
                                </div>
                                <div class="px-2">
                                    <label class="form-label">Show Status:</label>
                                    <div class="status-radio-group">
                                        <div class="status-radio-option">
                                            <input type="radio" id="uploadedFilter" name="statusFilter" value="uploaded">
                <label for="uploadedFilter">Show Uploaded</label>
                                        </div>
                                        <div class="status-radio-option">
                                            <input type="radio" id="pendingFilter" name="statusFilter" value="pending">
                <label for="pendingFilter">Show Pending/Upload</label>
                                        </div>
                                        <div class="status-radio-option">
                                            <input type="radio" id="bothFilter" name="statusFilter" value="both" checked>
                <label for="bothFilter">Show Both</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            @endif
                </div>
            </div>
            <table id="style-2" class="table style-2 dt-table-hover">
                <thead>
                    <tr>
                        <th style="padding-top: 0 !important;">ID</th>
                        <th>Employee Name</th>
                        <th>Document Title</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accouncementdocuments as $accouncementdocument)
                    <tr class="{{ $accouncementdocument->status == 0 ? 'status-pending' : 'status-uploaded' }}" data-employee="{{ $accouncementdocument->employee->id }}">
                        <td>{{ $accouncementdocument->id }}</td>
                        <td class="employee-name">
    <span>
        @if($accouncementdocument->employee && $accouncementdocument->employee->image)
            <img src="{{ asset($accouncementdocument->employee->image) }}" class="profile-img" alt="Employee Image">
        @else
            <img src="{{ asset('images/dummy.jpg') }}" class="profile-img" alt="Employee Image">
        @endif
    </span>
    @if($accouncementdocument->employee && $accouncementdocument->employee->first_name && $accouncementdocument->employee->last_name)
        {{ $accouncementdocument->employee->first_name }} {{ $accouncementdocument->employee->last_name }}
    @else
        No Employee
    @endif
</td>
                        <td>{{ $accouncementdocument->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($accouncementdocument->expiry_date)->format('d-m-Y') }}</td>
                        <td>
                            @if($accouncementdocument->status == 0)
                            <a href="{{ route('documents.create', ['title' => $accouncementdocument->title, 'id' => $accouncementdocument->employee->id, 'first_name' => $accouncementdocument->employee->first_name, 'last_name' => $accouncementdocument->employee->last_name]) }}" class="btn btn-warning">Pending/Upload</a>

                            @else
                            <span class="badge badge-success">Uploaded</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <form action="{{ route('accouncementdocument.destroy', $accouncementdocument->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this document?')">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
    const employeeSelect = document.getElementById('employeeSelect');
    const uploadedFilter = document.getElementById('uploadedFilter');
    const pendingFilter = document.getElementById('pendingFilter');
    const bothFilter = document.getElementById('bothFilter');
    const nameFilter = document.getElementById('nameFilter');

    function filterRows() {
        const selectedEmployee = employeeSelect.value;
        const uploadedRows = document.querySelectorAll('.status-uploaded');
        const pendingRows = document.querySelectorAll('.status-pending');
        const allRows = document.querySelectorAll('tbody tr');

        // Hide all rows initially
        allRows.forEach(row => row.style.display = 'none');

        // Show rows based on the selected filter
        if (bothFilter.checked) {
            allRows.forEach(row => row.style.display = '');
        } else if (uploadedFilter.checked) {
            uploadedRows.forEach(row => row.style.display = '');
        } else if (pendingFilter.checked) {
            pendingRows.forEach(row => row.style.display = '');
        }

        // Apply employee filter
        if (selectedEmployee) {
            allRows.forEach(row => {
                if (row.dataset.employee !== selectedEmployee) {
                    row.style.display = 'none';
                }
            });
        }

        // Apply name filter
        const nameFilterValue = nameFilter.value.toLowerCase();
        if (nameFilterValue) {
            allRows.forEach(row => {
                const employeeName = row.querySelector('.employee-name').textContent.toLowerCase();
                if (!employeeName.includes(nameFilterValue)) {
                    row.style.display = 'none';
                }
            });
        }
    }

    // Add event listeners for filters
    employeeSelect.addEventListener('change', filterRows);
    uploadedFilter.addEventListener('change', filterRows);
    pendingFilter.addEventListener('change', filterRows);
    bothFilter.addEventListener('change', filterRows);
    nameFilter.addEventListener('input', filterRows);

    // Initial call to apply the default state
    filterRows();
});

</script>

@endsection
