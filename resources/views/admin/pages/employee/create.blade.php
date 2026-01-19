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
        position: relative;
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

    .input-icon-wrapper .form-control {
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

    .document-input-group {
        display: flex;
        gap: 10px;
        margin-bottom: 12px;
    }

    .document-input-group .form-control {
        flex: 1;
    }

    .btn-add-doc {
        background: #10b981;
        border: none;
        color: #ffffff;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        white-space: nowrap;
    }

    .btn-remove-doc {
        background: #ef4444;
        border: none;
        color: #ffffff;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        white-space: nowrap;
    }

    #imagePreview {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: 2px solid #e5e7eb;
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
</style>

<div class="employee-form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-user-plus"></i>
            Employee Registration Form
        </h3>
        <a href="{{route('employee.index')}}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
            </div>

    <div class="form-card">
            <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

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
                            <input type="text" class="form-control" id="inputFirstName" name="first_name" placeholder="Enter First Name" value="{{ old('first_name') }}" maxlength="30" required>
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
                            <input type="text" class="form-control" id="inputLastName" name="last_name" placeholder="Enter Last Name" value="{{ old('last_name') }}" required>
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
                            <input type="email" class="form-control" id="inputContactEmail" name="contact_email" placeholder="Enter Contact Email" value="{{ old('contact_email') }}" required>
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
                            <input type="text" class="form-control" id="inputEmployeeId" name="employee_id" placeholder="Employee ID" value="{{ old('employee_id', $nextEmployeeId) }}" maxlength="255" required>
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
                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter User Email" value="{{ old('email') }}" required>
                        </div>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputPassword"><i class="fas fa-lock me-2"></i>Password</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-lock"></i>
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter Password" minlength="8" required>
                        </div>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label><i class="fas fa-venus-mars me-2"></i>Gender</label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" name="gender" id="genderMale" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                <label for="genderMale">Male</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="gender" id="genderFemale" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                <label for="genderFemale">Female</label>
                        </div>
                            <div class="radio-option">
                                <input type="radio" name="gender" id="genderOther" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                                <label for="genderOther">Other</label>
                        </div>
                        </div>
                        @if ($errors->has('gender'))
                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputBranch"><i class="fas fa-building me-2"></i>Branch</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-building"></i>
                            <select class="form-control form-select" id="inputBranch" name="branch" required>
                            <option value="">Select Branch</option>
                            @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                                {{ $branch->name }}
                            </option>
                            @endforeach
                        </select>
                        </div>
                        @if ($errors->has('branch'))
                        <span class="text-danger">{{ $errors->first('branch') }}</span>
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
                            <input type="number" class="form-control" id="inputSalary" name="salary" placeholder="Enter Salary" value="{{ old('salary') }}" required>
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
                            <input type="text" class="form-control" id="inputNumber" name="number" placeholder="Enter Contact Number" value="{{ old('number') }}" required>
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
                        <label for="inputemgrNumber"><i class="fas fa-phone-alt me-2"></i>Emergency Number</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-phone-alt"></i>
                            <input type="text" class="form-control" id="inputemgrNumber" name="emgr_number" placeholder="Enter Emergency Number" value="{{ old('emgr_number') }}" required>
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
            <option value="enroll" {{ old('pension_status') == 'enroll' ? 'selected' : '' }}>Enroll</option>
            <option value="notenroll" {{ old('pension_status') == 'notenroll' ? 'selected' : '' }}>Not Enroll</option>
            <option value="opt_out" {{ old('pension_status') == 'opt_out' ? 'selected' : '' }}>Opt Out</option>
            <option value="enroll_optout" {{ old('pension_status') == 'enroll_optout' ? 'selected' : '' }}>Enroll & Opt Out</option>
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
                            <option value="Main Department" {{ old('department') == 'Main Department' ? 'selected' : '' }}>Main Department</option>
                            <option value="Sub Department" {{ old('department') == 'Sub Department' ? 'selected' : '' }}>Sub Department</option>
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
                            <input type="text" class="form-control" id="inputDesignation" placeholder="Enter Designation" name="designation" value="{{ old('designation') }}" maxlength="255" required>
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
                            <option value="Probation" {{ old('employee_status') == 'Probation' ? 'selected' : '' }}>Probation</option>
                            <option value="Permanent" {{ old('employee_status') == 'Permanent' ? 'selected' : '' }}>Permanent</option>
                            <option value="0 hour contract" {{ old('employee_status') == '0 hour contract' ? 'selected' : '' }}>0 hour Contract</option>
                            <option value="suspended" {{ old('employee_status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
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
                            <option value="Accountant" {{ old('role') == 'Accountant' ? 'selected' : '' }}>Accountant</option>
                            <option value="HR" {{ old('role') == 'HR' ? 'selected' : '' }}>HR</option>
                            <option value="Employee" {{ old('role') == 'Employee' ? 'selected' : '' }}>Employee</option>
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
                            <input type="date" class="form-control" id="inputJoiningDate" name="joining_date" value="{{ old('joining_date') }}" required>
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
        <option value="Day" {{ old('work_shift') == 'Day' ? 'selected' : '' }}>Day</option>
        <option value="Night" {{ old('work_shift') == 'Night' ? 'selected' : '' }}>Night</option>
        <option value="Both" {{ old('work_shift') == 'Both' ? 'selected' : '' }}>Both</option>
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
                            <input type="date" class="form-control" id="inputDob" name="dob" value="{{ old('dob') }}" required>
                        </div>
                        @if ($errors->has('dob'))
                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputCnic"><i class="fas fa-id-card me-2"></i>NI Number</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-id-card"></i>
                            <input type="text" class="form-control" id="inputCnic" name="ninumber" placeholder="Enter NI Number" value="{{ old('ninumber') }}" maxlength="15" required>
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
                        <input type="text" class="form-control" id="inputVisa" name="visa" placeholder="Enter Visa Status" value="{{ old('visa') }}">
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
                        <input type="date" class="form-control" id="inputVisaDate" name="visadate" value="{{ old('visadate') }}" required>
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
                        <textarea class="form-control" id="inputAddress" name="address" placeholder="Enter Full Address" rows="3" maxlength="500" required style="padding-left: 16px;">{{ old('address') }}</textarea>
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
                <label><i class="fas fa-file-alt me-2"></i>Add Documents</label>
                <div id="document-fields">
                    <div class="document-input-group">
                        <input type="text" name="documents[]" placeholder="Enter document name (e.g., CNIC, Passport, CV)" class="form-control">
                        <button type="button" class="btn btn-add-doc add-document-btn">
                            <i class="fas fa-plus me-1"></i>Add Document
                        </button>
                        </div>
                    </div>
                </div>

            <div class="form-group-wrapper">
                <label for="profileImage"><i class="fas fa-image me-2"></i>Profile Image</label>
                <div class="file-input-wrapper">
                    <input type="file" class="form-control" id="profileImage" name="image" accept="image/*" onchange="previewImage(event)">
                </div>
                @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <div class="mt-3">
                    <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 200px; max-height: 200px; border-radius: 12px;" />
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Submit
                </button>
                <a href="{{route('employee.index')}}" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
            </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('document-fields');

        // Add a new input field
        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-document-btn') || e.target.closest('.add-document-btn')) {
                const newField = document.createElement('div');
                newField.classList.add('document-input-group');
                newField.innerHTML = `
                        <input type="text" name="documents[]" placeholder="Enter document name" class="form-control">
                    <button type="button" class="btn btn-remove-doc remove-document-btn">
                        <i class="fas fa-trash me-1"></i>Remove
                    </button>
                `;
                container.appendChild(newField);
            }
        });

        // Remove an input field
        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-document-btn') || e.target.closest('.remove-document-btn')) {
                const btn = e.target.classList.contains('remove-document-btn') ? e.target : e.target.closest('.remove-document-btn');
                btn.closest('.document-input-group').remove();
            }
        });
    });
</script>











@endsection