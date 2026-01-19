@extends('admin.master.main')

@section('content')

<style>
    .dropdown-menu {
        background-color: white !important;
        max-height: 300px;
        overflow-y: auto;
        width: auto;
        min-width: 200px;
        position: absolute;
        z-index: 1000;
        border: 1px solid #e5e7eb !important;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08) !important;
        border-radius: 10px !important;
    }
    .dropdown-item { 
        white-space: nowrap; 
        padding: 10px 16px !important;
        border-radius: 6px !important;
    }
    .dropdown-item:hover {
        background: #f1f5f9 !important;
        color: #0f172a !important;
    }
    
    /* Reduce gap between Name and Action columns */
    #style-2 th:nth-child(2),
    #style-2 td:nth-child(2) {
        padding-right: 16px !important;
    }
    #style-2 th:nth-child(3),
    #style-2 td:nth-child(3) {
        padding-left: 16px !important;
    }
    
    /* Ensure buttons stay in one row */
    #style-2 td .d-flex {
        flex-wrap: nowrap !important;
    }
    #style-2 td .btn {
        flex-shrink: 0;
    }
</style>

<!-- jQuery + Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-3" style="padding-left: 10px; padding-top: 0;">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-user-times fa-2x" style="color: #1f2937;"></i>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Unassigned Employees</h4>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Employees without payslip assignments</p>
            </div>
        </div>
        <a href="{{ route('payslipupload.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
    </div>
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">

            <!-- Month Selector -->
            <div class="mb-3" style="padding: 12px 16px;">
                <form method="GET" action="{{ route('payslipupload.unassignPage') }}">
                    <div class="d-flex align-items-center gap-3">
                        <label for="month" class="form-label mb-0" style="font-weight: 600; color: #475569;">Select Month:</label>
                        <select name="month" id="month" class="form-control" onchange="this.form.submit()" style="width: auto; min-width: 200px; border: 1px solid #e5e7eb; border-radius: 10px; padding: 10px 16px;">
                            @foreach($months as $key => $name)
                                <option value="{{ $key }}" {{ $selectedMonth == $key ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>

            <!-- Employees Table -->
            <table id="style-2" class="table table-striped align-middle style-2 dt-table-hover">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Name</th>
                        <th class="text-center" style="width: 320px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($unassignedEmployees as $employee)
                        <tr class="emp-row" id="employee-row-{{ $employee->employee_id }}">
                            <td><strong style="color: #0f172a;">#{{ $employee->employee_id }}</strong></td>
                            <td>
                                <strong style="color: #1e293b; font-weight: 600;">{{ $employee->first_name }} {{ $employee->last_name }}</strong>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2" style="flex-wrap: nowrap;">
                                <!-- Upload PDF button -->
                                    <a href="{{ route('payslipupload.create') }}" class="btn btn-secondary btn-sm" style="white-space: nowrap;">
                                        <i class="fas fa-upload me-1"></i>Upload PDF
                                    </a>

                                <!-- Unassign Document Dropdown -->
                                <div class="btn-group">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="white-space: nowrap;">
                                            <i class="fas fa-link me-1"></i>Unassign Document
                                    </button>
                                    <ul class="dropdown-menu">
                                        @if(isset($unassignedPdfsByEmployee[$employee->employee_id]) && count($unassignedPdfsByEmployee[$employee->employee_id]) > 0)
                                            @foreach($unassignedPdfsByEmployee[$employee->employee_id] as $pdf)
                                                <li>
                                                    <button type="button" class="dropdown-item" onclick="unassignDocument('{{ $employee->employee_id }}', '{{ basename($pdf) }}')">
                                                            <i class="fas fa-file-pdf me-2"></i>{{ basename($pdf) }}
                                                    </button>
                                                </li>
                                            @endforeach
                                        @else
                                            <li><span class="dropdown-item text-muted">No unassigned PDFs</span></li>
                                        @endif
                                    </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center" style="padding: 60px 20px !important;">
                                <i class="fas fa-users fa-4x mb-3" style="color: #cbd5e1;"></i>
                                <p style="font-size: 1.1rem; color: #94a3b8; margin: 0;">No unassigned employees found for this month.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- AJAX to remove/unassign document -->
<script>
  function unassignDocument(employeeId, pdfName) {
    const selectedMonth = $('#month').val();

    $.ajax({
        url: "{{ route('payslipupload.remove') }}",
        method: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            employee_id: employeeId,
            pdf: pdfName,
            month: selectedMonth // ✅
        },
        success: function(response) {
            if (response.success) {
                alert(response.message);
                $('#employee-row-' + employeeId).remove();
            } else {
                alert(response.message);
            }
        },
        error: function() {
            alert('An error occurred while unassigning the document.');
        }
    });
}

</script>

@endsection
