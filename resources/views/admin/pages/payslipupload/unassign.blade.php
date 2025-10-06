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
    }
    .dropdown-item { white-space: nowrap; }
</style>

<!-- jQuery + Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<div class="col-lg-12">
    <h4>Unassigned Employees</h4>
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">

            <!-- Top Controls: Back + Month Selector -->
            <a href="{{ route('payslipupload.index') }}" class="btn btn-secondary m-2">Back</a>
            <div class="d-flex justify-content-between mb-3">

                <form class="m-2" method="GET" action="{{ route('payslipupload.unassignPage') }}">
                    <div class="form-inline">
                        <label for="month" class="mr-2">Select Month:</label>
                        <select name="month" id="month" class="form-control" onchange="this.form.submit()">
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
            <table id="style-2" class="table style-2 dt-table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($unassignedEmployees as $employee)
                        <tr class="emp-row" id="employee-row-{{ $employee->employee_id }}">
                            <td>{{ $employee->employee_id }}</td>
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>
                                <!-- Upload PDF button -->
                                <a href="{{ route('payslipupload.create') }}" class="btn btn-success">Upload PDF</a>

                                <!-- Unassign Document Dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Unassign Document
                                    </button>
                                    <ul class="dropdown-menu">
                                        @if(isset($unassignedPdfsByEmployee[$employee->employee_id]) && count($unassignedPdfsByEmployee[$employee->employee_id]) > 0)
                                            @foreach($unassignedPdfsByEmployee[$employee->employee_id] as $pdf)
                                                <li>
                                                    <button type="button" class="dropdown-item" onclick="unassignDocument('{{ $employee->employee_id }}', '{{ basename($pdf) }}')">
                                                        {{ basename($pdf) }}
                                                    </button>
                                                </li>
                                            @endforeach
                                        @else
                                            <li><span class="dropdown-item text-muted">No unassigned PDFs</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">No unassigned employees found for this month.</td>
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
