@extends('admin.master.main')

@section('content')

<style>
    .employee-form-container {
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
        text-decoration: none;
    }

    .form-header .btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
        color: #ffffff;
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

    .form-section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e293b;
        margin: 35px 0 20px 0;
        padding-bottom: 10px;
        border-bottom: 2px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-section-title:first-child {
        margin-top: 0;
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
        cursor: pointer;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        color: #ffffff;
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
        text-decoration: none;
        display: inline-block;
    }

    .btn-back:hover {
        background: #e2e8f0;
        color: #1e293b;
        text-decoration: none;
    }

    .text-danger {
        color: #ef4444;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
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

    #profilePicturePreview {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: 2px solid #e5e7eb;
        margin-top: 15px;
    }
</style>

<div class="employee-form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-user-edit"></i>
            Edit Employee
        </h3>
        <a href="{{ route('employee.index') }}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
            </div>

    <div class="form-card">
                    <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

            <div class="form-section-title">
                <i class="fas fa-user"></i>
                Personal Information
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputFirstName"><i class="fas fa-user me-2"></i>First Name</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Enter First Name" value="{{ old('first_name', $employee->first_name) }}" maxlength="30" required>
                        </div>
                                @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputLastName"><i class="fas fa-user me-2"></i>Last Name</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Enter Last Name" value="{{ old('last_name', $employee->last_name) }}" required>
                        </div>
                                @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>
                            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputContactEmail"><i class="fas fa-envelope me-2"></i>Contact Email</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="email" class="form-control" id="inputContactEmail" name="contact_email" placeholder="Enter Contact Email" value="{{ old('contact_email', $employee->contact_email) }}" required>
                        </div>
                        @if ($errors->has('contact_email'))
                                <span class="text-danger">{{ $errors->first('contact_email') }}</span>
                                @endif
                            </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputEmployeeId"><i class="fas fa-id-card me-2"></i>Employee ID</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-id-card"></i>
                            <input type="text" class="form-control" id="inputEmployeeId" name="employee_id" placeholder="Employee ID" value="{{ old('employee_id', $employee->employee_id) }}" maxlength="255" required>
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
                        <label for="inputEmail"><i class="fas fa-at me-2"></i>User Email</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-at"></i>
                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter User Email" value="{{ old('email', $employee->user->email ?? '') }}" required>
                        </div>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label><i class="fas fa-venus-mars me-2"></i>Gender</label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" name="gender" id="genderMale" value="male" {{ old('gender', $employee->gender) == 'male' ? 'checked' : '' }} required>
                                <label for="genderMale">Male</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="gender" id="genderFemale" value="female" {{ old('gender', $employee->gender) == 'female' ? 'checked' : '' }}>
                                <label for="genderFemale">Female</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="gender" id="genderOther" value="other" {{ old('gender', $employee->gender) == 'other' ? 'checked' : '' }}>
                                <label for="genderOther">Other</label>
                            </div>
                        </div>
                        @if ($errors->has('gender'))
                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputBranch"><i class="fas fa-building me-2"></i>Branch</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-building"></i>
                            <select class="form-control form-select" id="inputBranch" name="branch" required>
                                    <option value="">Select Branch</option>
                                    @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" {{ old('branch_id', $employee->branch_id) == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>
                                    @endforeach
                                </select>
                        </div>
                                @if ($errors->has('branch_id'))
                                <span class="text-danger">{{ $errors->first('branch_id') }}</span>
                                @endif
                    </div>
                </div>
                            </div>

            <div class="form-section-title">
                <i class="fas fa-briefcase"></i>
                Employment Details
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputSalary"><i class="fas fa-pound-sign me-2"></i>Salary</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-pound-sign"></i>
                            <input type="number" class="form-control" id="inputSalary" name="salary" placeholder="Enter Salary" value="{{ old('salary', $employee->salary) }}" required>
                        </div>
                                @if ($errors->has('salary'))
                                <span class="text-danger">{{ $errors->first('salary') }}</span>
                                @endif
                            </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputNumber"><i class="fas fa-phone me-2"></i>Contact Number</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-phone"></i>
                            <input type="text" class="form-control" id="inputNumber" name="number" placeholder="Enter Contact Number" value="{{ old('number', $employee->number) }}" required>
                        </div>
                                @if ($errors->has('number'))
                                <span class="text-danger">{{ $errors->first('number') }}</span>
                                @endif
                            </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputEmergencyNumber"><i class="fas fa-phone-alt me-2"></i>Emergency Number</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-phone-alt"></i>
                            <input type="text" class="form-control" id="inputEmergencyNumber" name="emgr_number" placeholder="Enter Emergency Number" value="{{ old('emgr_number', $employee->emgr_number) }}">
                        </div>
                                @if ($errors->has('emgr_number'))
                                <span class="text-danger">{{ $errors->first('emgr_number') }}</span>
                                @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputPensionStatus"><i class="fas fa-piggy-bank me-2"></i>Pension Status</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-piggy-bank"></i>
                            <select class="form-control form-select" id="inputPensionStatus" name="pension_status" required>
                                <option value="">Select Pension Status</option>
                                <option value="enroll" {{ old('pension_status', $employee->pension_status) == 'enroll' ? 'selected' : '' }}>Enroll</option>
                                <option value="notenroll" {{ old('pension_status', $employee->pension_status) == 'notenroll' ? 'selected' : '' }}>Not Enroll</option>
                                <option value="opt_out" {{ old('pension_status', $employee->pension_status) == 'opt_out' ? 'selected' : '' }}>Opt Out</option>
                                <option value="enroll_optout" {{ old('pension_status', $employee->pension_status) == 'enroll_optout' ? 'selected' : '' }}>Enroll & Opt Out</option>
                            </select>
                        </div>
                        @if ($errors->has('pension_status'))
                        <span class="text-danger">{{ $errors->first('pension_status') }}</span>
                        @endif
                    </div>
                            </div>
                        </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputDepartment"><i class="fas fa-sitemap me-2"></i>Department</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-sitemap"></i>
                            <select class="form-control form-select" id="inputDepartment" name="department" required>
                                    <option value="">Select Department</option>
                                    <option value="Main Department" {{ old('department', $employee->department) == 'Main Department' ? 'selected' : '' }}>Main Department</option>
                                    <option value="Sub Department" {{ old('department', $employee->department) == 'Sub Department' ? 'selected' : '' }}>Sub Department</option>
                                </select>
                        </div>
                                @if ($errors->has('department'))
                                <span class="text-danger">{{ $errors->first('department') }}</span>
                                @endif
                            </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputDesignation"><i class="fas fa-user-tie me-2"></i>Designation</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user-tie"></i>
                            <input type="text" class="form-control" id="inputDesignation" name="designation" placeholder="Enter Designation" value="{{ old('designation', $employee->designation) }}" maxlength="255" required>
                        </div>
                                @if ($errors->has('designation'))
                                <span class="text-danger">{{ $errors->first('designation') }}</span>
                                @endif
                    </div>
                            </div>
                        </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputEmployeeStatus"><i class="fas fa-info-circle me-2"></i>Employee Status</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-info-circle"></i>
                            <select class="form-control form-select" id="inputEmployeeStatus" name="employee_status" required>
                                <option value="">Select Employee Status</option>
                                    <option value="Permanent" {{ old('employee_status', $employee->employee_status) == 'Permanent' ? 'selected' : '' }}>Permanent</option>
                                    <option value="Probation" {{ old('employee_status', $employee->employee_status) == 'Probation' ? 'selected' : '' }}>Probation</option>
                                    <option value="0 hour contract" {{ old('employee_status', $employee->employee_status) == '0 hour contract' ? 'selected' : '' }}>0 Hour Contract</option>
                                    <option value="Suspended" {{ old('employee_status', $employee->employee_status) == 'Suspended' ? 'selected' : '' }}>Suspended</option>
                                </select>
                        </div>
                                @if ($errors->has('employee_status'))
                                <span class="text-danger">{{ $errors->first('employee_status') }}</span>
                                @endif
                            </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputRole"><i class="fas fa-user-shield me-2"></i>Role</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user-shield"></i>
                            <select class="form-control form-select" id="inputRole" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="Accountant" {{ old('role', $employee->role) == 'Accountant' ? 'selected' : '' }}>Accountant</option>
                                <option value="HR" {{ old('role', $employee->role) == 'HR' ? 'selected' : '' }}>HR</option>
                                    <option value="Employee" {{ old('role', $employee->role) == 'Employee' ? 'selected' : '' }}>Employee</option>
                                </select>
                        </div>
                                @if ($errors->has('role'))
                                <span class="text-danger">{{ $errors->first('role') }}</span>
                                @endif
                    </div>
                            </div>
                        </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputJoiningDate"><i class="fas fa-calendar-check me-2"></i>Joining Date</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-calendar-check"></i>
                                <input type="date" class="form-control" id="inputJoiningDate" name="joining_date" value="{{ old('joining_date', $employee->joining_date) }}" required>
                        </div>
                                @if ($errors->has('joining_date'))
                                <span class="text-danger">{{ $errors->first('joining_date') }}</span>
                                @endif
                            </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputWorkShift"><i class="fas fa-clock me-2"></i>Work Shift</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-clock"></i>
                            <select class="form-control form-select" id="inputWorkShift" name="work_shift" required>
                                <option value="">Select Work Shift</option>
                                <option value="Day" {{ old('work_shift', $employee->work_shift) == 'Day' ? 'selected' : '' }}>Day</option>
                                <option value="Night" {{ old('work_shift', $employee->work_shift) == 'Night' ? 'selected' : '' }}>Night</option>
                                <option value="Both" {{ old('work_shift', $employee->work_shift) == 'Both' ? 'selected' : '' }}>Both</option>
                            </select>
                        </div>
                            @if ($errors->has('work_shift'))
                                <span class="text-danger">{{ $errors->first('work_shift') }}</span>
                            @endif
                        </div>
                </div>
            </div>

            <div class="form-section-title">
                <i class="fas fa-id-badge"></i>
                Additional Information
                        </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputDob"><i class="fas fa-birthday-cake me-2"></i>Date of Birth</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-birthday-cake"></i>
                                <input type="date" class="form-control" id="inputDob" name="dob" value="{{ old('dob', $employee->dob) }}">
                        </div>
                                @if ($errors->has('dob'))
                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                @endif
                            </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputNinumber"><i class="fas fa-id-card me-2"></i>NI Number</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-id-card"></i>
                            <input type="text" class="form-control" id="inputNinumber" name="ninumber" placeholder="Enter NI Number" value="{{ old('ninumber', $employee->ninumber) }}" maxlength="15">
                        </div>
                                @if ($errors->has('ninumber'))
                                <span class="text-danger">{{ $errors->first('ninumber') }}</span>
                                @endif
                    </div>
                            </div>
                        </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputVisa"><i class="fas fa-passport me-2"></i>Visa Status</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-passport"></i>
                                <input type="text" class="form-control" id="inputVisa" name="visa" placeholder="Enter Visa Status" value="{{ old('visa', $employee->visa) }}">
                        </div>
                                @if ($errors->has('visa'))
                                <span class="text-danger">{{ $errors->first('visa') }}</span>
                                @endif
                            </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputVisaDate"><i class="fas fa-calendar-alt me-2"></i>Next Right To Check Date</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-calendar-alt"></i>
                                <input type="date" class="form-control" id="inputVisaDate" name="visadate" value="{{ old('visadate', $employee->visadate) }}">
                        </div>
                                @if ($errors->has('visadate'))
                                <span class="text-danger">{{ $errors->first('visadate') }}</span>
                                @endif
                            </div>
</div>
</div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputAddress"><i class="fas fa-map-marker-alt me-2"></i>Address</label>
                        <textarea class="form-control" id="inputAddress" name="address" placeholder="Enter Full Address" rows="3" maxlength="500" style="padding-left: 16px;">{{ old('address', $employee->address) }}</textarea>
                                @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                </div>
            </div>

            <div class="form-section-title">
                <i class="fas fa-file-upload"></i>
                Documents & Profile
                        </div>

            <div class="form-group-wrapper">
                <label for="inputProfilePicture"><i class="fas fa-image me-2"></i>Profile Picture</label>
                <div class="file-input-wrapper">
                                <input type="file" class="form-control" id="inputProfilePicture" name="image" accept="image/*" onchange="previewImage(event)">
                </div>
                                @if ($employee->image)
                <img id="profilePicturePreview" src="{{ asset($employee->image) }}" alt="Profile Picture" style="border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); border: 2px solid #e5e7eb; max-width: 200px; margin-top: 15px;">
                                @else
                <img id="profilePicturePreview" alt="Profile Picture" style="display: none; max-width: 200px; margin-top: 15px;">
                                @endif
                                @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                        </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Update
                </button>
                <a href="{{ route('employee.index') }}" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('profilePicturePreview');
            output.src = reader.result;
            output.style.display = 'block';
            output.style.borderRadius = '12px';
            output.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
            output.style.border = '2px solid #e5e7eb';
            output.style.maxWidth = '200px';
            output.style.marginTop = '15px';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
