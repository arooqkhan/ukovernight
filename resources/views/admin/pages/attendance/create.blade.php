@extends('admin.master.main')

@section('content')

@include('admin.pages.partials.form-styles')

<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-user-check"></i>
            Add Attendance
        </h3>
        <a href="{{ route('attendance.index') }}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
            </div>

    <div class="form-card">
            <form action="{{ route('attendance.store') }}" method="POST" id="attendanceForm">
                @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputEmployeeId"><i class="fas fa-user me-2"></i>Employee Name</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user"></i>
                            <select class="form-control form-select" id="inputEmployeeId" name="employee_id" required>
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                        @if ($errors->has('employee_id'))
                        <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="clock_in_date"><i class="fas fa-calendar-check me-2"></i>Clock In Date</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-calendar-check"></i>
                            <input type="date" class="form-control" id="clock_in_date" name="clock_in_date" value="{{ old('clock_in_date') ? old('clock_in_date') : date('Y-m-d') }}" max="{{ date('Y-m-d') }}" required>
                        </div>
                        @if ($errors->has('clock_in_date'))
                        <span class="text-danger">{{ $errors->first('clock_in_date') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="clock_in_time"><i class="fas fa-clock me-2"></i>Clock In Time</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-clock"></i>
                            <input type="time" class="form-control" id="clock_in_time" name="clock_in_time" value="{{ old('clock_in_time') }}" required>
                        </div>
                        @if ($errors->has('clock_in_time'))
                        <span class="text-danger">{{ $errors->first('clock_in_time') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="clock_out_date"><i class="fas fa-calendar-times me-2"></i>Clock Out Date</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-calendar-times"></i>
                            <input type="date" class="form-control" id="clock_out_date" name="clock_out_date" value="{{ old('clock_out_date') }}" max="{{ date('Y-m-d') }}">
                        </div>
                        @if ($errors->has('clock_out_date'))
                        <span class="text-danger">{{ $errors->first('clock_out_date') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="clock_out_time"><i class="fas fa-clock me-2"></i>Clock Out Time</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-clock"></i>
                            <input type="time" class="form-control" id="clock_out_time" name="clock_out_time" value="{{ old('clock_out_time') }}">
                        </div>
                        @if ($errors->has('clock_out_time'))
                        <span class="text-danger">{{ $errors->first('clock_out_time') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="reason"><i class="fas fa-comment me-2"></i>Reason</label>
                        <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Enter Reason" required style="padding-left: 16px;">{{ old('reason') }}</textarea>
                        @if ($errors->has('reason'))
                        <span class="text-danger">{{ $errors->first('reason') }}</span>
                        @endif
        </div>
    </div>
</div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Submit
                </button>
                <a href="{{ route('attendance.index') }}" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
