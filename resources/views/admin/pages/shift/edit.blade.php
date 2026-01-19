@extends('admin.master.main')

@section('content')

@include('admin.pages.partials.form-styles')

<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-clock"></i>
            Edit Shift
        </h3>
        <a href="{{ route('shift.index') }}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
                    </div>

    <div class="form-card">
        <form action="{{ route('shift.update', $shift->id) }}" method="POST" id="shiftForm">
        @csrf
        @method('PUT')

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputEmployeeId"><i class="fas fa-user me-2"></i>Employee Name</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user"></i>
                            <select class="form-control form-select" id="inputEmployeeId" name="employee_id" required>
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id', $shift->employee_id) == $employee->id ? 'selected' : '' }}>
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
                        <label for="shift_type"><i class="fas fa-calendar-alt me-2"></i>Shift Type</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-calendar-alt"></i>
                            <select class="form-control form-select" id="shift_type" name="shift_type" required>
                                <option value="">Select Shift Type</option>
                                <option value="Morning" {{ old('shift_type', $shift->shift_type) == 'Morning' ? 'selected' : '' }}>Morning</option>
                                <option value="Evening" {{ old('shift_type', $shift->shift_type) == 'Evening' ? 'selected' : '' }}>Evening</option>
                                <option value="Night" {{ old('shift_type', $shift->shift_type) == 'Night' ? 'selected' : '' }}>Night</option>
            </select>
        </div>
                        @if ($errors->has('shift_type'))
                        <span class="text-danger">{{ $errors->first('shift_type') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="add_duty"><i class="fas fa-tasks me-2"></i>Additional Duty</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-tasks"></i>
                            <input type="text" class="form-control" placeholder="Enter Additional Duty" id="add_duty" name="add_duty" value="{{ old('add_duty', $shift->add_duty) }}" required>
                        </div>
                        @if ($errors->has('add_duty'))
                        <span class="text-danger">{{ $errors->first('add_duty') }}</span>
                        @endif
                    </div>
                </div>
        </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="date"><i class="fas fa-calendar me-2"></i>Date</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-calendar"></i>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $shift->date) }}" required>
                        </div>
                        @if ($errors->has('date'))
                        <span class="text-danger">{{ $errors->first('date') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="start_time"><i class="fas fa-clock me-2"></i>Start Time</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-clock"></i>
                            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $shift->start_time) }}" required>
                        </div>
                        @if ($errors->has('start_time'))
                        <span class="text-danger">{{ $errors->first('start_time') }}</span>
                        @endif
                    </div>
                </div>
        </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="end_time"><i class="fas fa-clock me-2"></i>End Time</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-clock"></i>
                            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', $shift->end_time) }}" required>
        </div>
                        @if ($errors->has('end_time'))
                        <span class="text-danger">{{ $errors->first('end_time') }}</span>
                        @endif
        </div>
        </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="note"><i class="fas fa-sticky-note me-2"></i>Note</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-sticky-note"></i>
                            <input type="text" placeholder="Enter Note" class="form-control" id="note" name="node" value="{{ old('node', $shift->node) }}" required>
</div>
                        @if ($errors->has('node'))
                        <span class="text-danger">{{ $errors->first('node') }}</span>
                        @endif
                </div>
            </div>
        </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Update
                </button>
                <a href="{{ route('shift.index') }}" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
