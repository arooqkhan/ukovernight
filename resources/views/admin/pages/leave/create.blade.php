@extends('admin.master.main')

@section('content')

@include('admin.pages.partials.form-styles')

<style>
    .radio-group {
        display: flex;
        gap: 20px;
        margin-top: 8px;
    }

    .radio-option {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .radio-option input[type="radio"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #667eea;
    }

    .radio-option label {
        margin: 0;
        cursor: pointer;
        font-weight: 500;
        color: #475569;
    }

    .file-input-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .file-input-wrapper input[type="file"] {
        padding: 12px;
        border: 2px dashed #cbd5e1;
        border-radius: 10px;
        background: #f8fafc;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-input-wrapper input[type="file"]:hover {
        border-color: #667eea;
        background: #f1f5f9;
    }

    #imagePreview {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: 2px solid #e5e7eb;
        margin-top: 15px;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Initially hide the date and time fields
        $('.time-fields').hide();
        $('.date-fields').hide();

        // Function to toggle visibility based on radio button change
        $('input[type=radio][name=duration]').change(function() {
            if (this.value === 'Single day') {
                $('.date-time-fields').slideUp();
                $('.date-fields').slideUp();
                $('.time-fields').slideUp();
                $('.dt-fields').slideDown();
            } else if (this.value === 'Multi day') {
                $('.date-time-fields').slideDown();
                $('.date-fields').slideDown();
                $('.time-fields').slideUp();
                $('.dt-fields').slideUp();
                $('.half-fields').slideUp();
            } else if (this.value === 'Half day') {
                $('.date-time-fields').slideUp();
                $('.date-fields').slideUp();
                $('.time-fields').slideUp();
                $('.dt-fields').slideDown();
                $('.half-fields').slideDown();
            } else if (this.value === 'Hours') {
                $('.date-time-fields').slideUp();
                $('.date-fields').slideUp();
                $('.half-fields').slideUp();
                $('.time-fields').slideDown();
                $('.dt-fields').slideDown();
            }
        });
    });
</script>

<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-calendar-alt"></i>
            Assign Leave
        </h3>
        <a href="{{ route('leave.index') }}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
            </div>

    <div class="form-card">
            <form action="{{ route('leave.store') }}" method="POST" enctype="multipart/form-data" id="leaveForm">
                @csrf

            <div class="row">
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputLeaveType"><i class="fas fa-tag me-2"></i>Leave Type</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-tag"></i>
                            <input type="text" class="form-control" id="inputLeaveType" name="leave_type" placeholder="Enter Leave Type" value="{{ old('leave_type') }}" required>
                        </div>
                        @if ($errors->has('leave_type'))
                        <span class="text-danger">{{ $errors->first('leave_type') }}</span>
                        @endif
                    </div>
</div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label><i class="fas fa-clock me-2"></i>Duration</label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" name="duration" id="singleDay" value="Single day" {{ old('duration', 'Single day') == 'Single day' ? 'checked' : '' }}>
                                <label for="singleDay">Single day</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="duration" id="multiDay" value="Multi day" {{ old('duration') == 'Multi day' ? 'checked' : '' }}>
                                <label for="multiDay">Multi day</label>
                        </div>
                        </div>
                        @if ($errors->has('duration'))
                        <span class="text-danger">{{ $errors->first('duration') }}</span>
                        @endif
                        </div>
                    </div>
                </div>

            <div class="date-fields" style="display: none;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-wrapper">
                            <label for="inputStartDate"><i class="fas fa-calendar-check me-2"></i>Start Date</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-calendar-check"></i>
                                <input type="date" class="form-control" id="inputStartDate" name="start_date" value="{{ old('start_date') }}" min="{{ date('Y-m-d') }}">
                            </div>
                            @if ($errors->has('start_date'))
                            <span class="text-danger">{{ $errors->first('start_date') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-wrapper">
                            <label for="inputEndDate"><i class="fas fa-calendar-times me-2"></i>End Date</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-calendar-times"></i>
                                <input type="date" class="form-control" id="inputEndDate" name="end_date" value="{{ old('end_date') }}" min="{{ date('Y-m-d') }}">
                            </div>
                            @if ($errors->has('end_date'))
                            <span class="text-danger">{{ $errors->first('end_date') }}</span>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>

            <div class="time-fields" style="display: none;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-wrapper">
                            <label for="inputStartTime"><i class="fas fa-clock me-2"></i>Start Time</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-clock"></i>
                                <input type="time" class="form-control" id="inputStartTime" name="start_time" value="{{ old('start_time') }}">
                            </div>
                            @if ($errors->has('start_time'))
                            <span class="text-danger">{{ $errors->first('start_time') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-wrapper">
                            <label for="inputEndTime"><i class="fas fa-clock me-2"></i>End Time</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-clock"></i>
                                <input type="time" class="form-control" id="inputEndTime" name="end_time" value="{{ old('end_time') }}">
                            </div>
                            @if ($errors->has('end_time'))
                            <span class="text-danger">{{ $errors->first('end_time') }}</span>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>

                <div class="dt-fields">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-wrapper">
                            <label for="inputDate"><i class="fas fa-calendar me-2"></i>Date</label>
                            <div class="input-icon-wrapper">
                                <i class="fas fa-calendar"></i>
                                <input type="date" class="form-control" id="inputDate" name="date" value="{{ old('date') }}" min="{{ date('Y-m-d') }}">
                            </div>
                            @if ($errors->has('date'))
                            <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>

                <div class="half-fields" style="display: none;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group-wrapper">
                            <label><i class="fas fa-clock me-2"></i>Leave Duration</label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" name="leave_duration" id="firstHalf" value="First half" {{ old('leave_duration') == 'First half' ? 'checked' : '' }}>
                                    <label for="firstHalf">First half</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" name="leave_duration" id="secondHalf" value="Second half" {{ old('leave_duration') == 'Second half' ? 'checked' : '' }}>
                                    <label for="secondHalf">Second half</label>
                                </div>
                            </div>
                            @if ($errors->has('leave_duration'))
                            <span class="text-danger">{{ $errors->first('leave_duration') }}</span>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputReason"><i class="fas fa-comment-alt me-2"></i>Reason</label>
                        <textarea class="form-control" id="inputReason" name="reason" rows="3" placeholder="Enter Reason for Leave" required style="padding-left: 16px;">{{ old('reason') }}</textarea>
                        @if ($errors->has('reason'))
                        <span class="text-danger">{{ $errors->first('reason') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputImage"><i class="fas fa-paperclip me-2"></i>Attachments</label>
                        <div class="file-input-wrapper">
                        <input type="file" class="form-control" id="inputImage" name="image" accept="image/*">
                        </div>
                        <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 200px; max-height: 200px;">
                        @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Submit
                </button>
                <a href="{{ route('leave.index') }}" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
            </form>
    </div>
</div>

<script>
    document.getElementById('inputImage').addEventListener('change', function(event) {
        var file = event.target.files[0];
        if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        };
        reader.readAsDataURL(file);
        }
    });
</script>

@endsection
