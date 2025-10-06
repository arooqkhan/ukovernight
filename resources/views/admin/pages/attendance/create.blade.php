@extends('admin.master.main')

@section('content')

<div class="row">
    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
        <div class="statbox widget box box-shadow">

            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h3>Add Attendance</h3>
                </div>
            </div>

            <form action="{{ route('attendance.store') }}" method="POST" id="attendanceForm">
                @csrf

                <!-- Employee Dropdown -->
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <label for="inputEmployeeId">Employee Name</label>
                        <select class="form-control" id="inputEmployeeId" name="employee_id" required>
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Clock In -->
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <label for="clock_in_date">Clock In Date:</label>
                        <input type="date" class="form-control" id="clock_in_date" name="clock_in_date"
                               value="{{ old('clock_in_date') ? old('clock_in_date') : date('Y-m-d') }}"
                               max="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="clock_in_time">Clock In Time:</label>
                        <input type="time" class="form-control" id="clock_in_time" name="clock_in_time"
                               value="{{ old('clock_in_time') }}" required>
                    </div>
                </div>

                <!-- Clock Out -->
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <label for="clock_out_date">Clock Out Date:</label>
                        <input type="date" class="form-control" id="clock_out_date" name="clock_out_date"
                               value="{{ old('clock_out_date') }}" max="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-sm-6">
                        <label for="clock_out_time">Clock Out Time:</label>
                        <input type="time" class="form-control" id="clock_out_time" name="clock_out_time"
                               value="{{ old('clock_out_time') }}">
                    </div>
                </div>

                <!-- Reason -->
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <label for="reason">Reason:</label>
                        <textarea class="form-control" id="reason" name="reason" rows="3" required>{{ old('reason') }}</textarea>
                    </div>
                </div>

                <!-- Submit & Back -->
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>




@endsection