@extends('admin.master.main')

@section('content')

<style>
    .form-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 25px 30px;
        border-radius: 12px 12px 0 0;
        margin-bottom: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .form-header h3 {
        color: #ffffff;
        font-weight: 700;
        font-size: 1.5rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-header h3 i {
        font-size: 1.8rem;
    }

    .form-header .btn {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .form-header .btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
    }

    .form-card {
        background: #ffffff;
        border-radius: 0 0 12px 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 35px;
        border: 1px solid #e5e7eb;
    }

    .form-group-wrapper {
        position: relative;
        margin-bottom: 24px;
    }

    .form-group-wrapper label {
        font-weight: 600;
        color: #1e293b;
        font-size: 0.9rem;
        margin-bottom: 8px;
        display: block;
    }

    .form-group-wrapper .form-control,
    .form-group-wrapper .form-select {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #ffffff;
    }

    .form-group-wrapper .form-control:focus,
    .form-group-wrapper .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .form-group-wrapper .form-control::placeholder {
        color: #94a3b8;
    }

    .input-icon-wrapper {
        position: relative;
    }

    .input-icon-wrapper i {
        display: none;
    }

    .input-icon-wrapper .form-control,
    .input-icon-wrapper .form-select {
        padding-left: 16px;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 35px;
        padding-top: 25px;
        border-top: 1px solid #e5e7eb;
    }

    .btn-submit {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: #ffffff;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-back {
        background: #f1f5f9;
        border: 1px solid #e5e7eb;
        color: #475569;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .text-danger {
        color: #ef4444;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    }
</style>

<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-clock"></i>
            Add Shift
        </h3>
        <a href="{{ route('shift.index') }}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
            </div>

    <div class="form-card">
            <form action="{{ route('shift.store') }}" method="POST" id="shiftForm">
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
                        <label for="shift_type"><i class="fas fa-calendar-alt me-2"></i>Shift Type</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-calendar-alt"></i>
                            <select class="form-control form-select" id="shift_type" name="shift_type" required>
                            <option value="">Select Shift Type</option>
                            <option value="Morning" {{ old('shift_type') == 'Morning' ? 'selected' : '' }}>Morning</option>
                            <option value="Evening" {{ old('shift_type') == 'Evening' ? 'selected' : '' }}>Evening</option>
                            <option value="Night" {{ old('shift_type') == 'Night' ? 'selected' : '' }}>Night</option>
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
                            <input type="text" class="form-control" placeholder="Enter Additional Duty" id="add_duty" name="add_duty" value="{{ old('add_duty') }}" required>
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
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') ? old('date') : date('Y-m-d') }}" required>
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
                            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time') }}" required>
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
                            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ old('end_time') }}" required>
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
                            <input type="text" placeholder="Enter Note" class="form-control" id="note" name="node" value="{{ old('note') }}" required>
                        </div>
                        @if ($errors->has('note'))
                        <span class="text-danger">{{ $errors->first('note') }}</span>
                        @endif
        </div>
    </div>
</div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Submit
                </button>
                <a href="{{ route('shift.index') }}" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
