@extends('admin.master.main')

@section('content')
<div class="container">
    <h3>Edit Onboarding Form</h3>

  

   
    <form action="{{ route('onboarding.update', $onboarding->user_id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- STEP 1: Job Application -->
        <h4>1. Job Application</h4>
        <div class="row mb-3">
            <div class="col">
                <label>First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name',$onboarding->first_name) }}" class="form-control">
            </div>
            <div class="col">
                <label>Surname</label>
                <input type="text" name="surname" value="{{ old('surname',$onboarding->surname) }}" class="form-control">
            </div>
        </div>
        <div class="mb-3"><label>Maiden Name</label><input type="text" name="maiden_name" value="{{ old('maiden_name',$onboarding->maiden_name) }}" class="form-control"></div>
        <div class="mb-3"><label>Previous Name</label><input type="text" name="previous_name" value="{{ old('previous_name',$onboarding->previous_name) }}" class="form-control"></div>
        <div class="row mb-3">
            <div class="col"><label>Telephone</label><input type="text" name="telephone_number" value="{{ old('telephone_number',$onboarding->telephone_number) }}" class="form-control"></div>
            <div class="col"><label>Mobile</label><input type="text" name="mobile_number" value="{{ old('mobile_number',$onboarding->mobile_number) }}" class="form-control"></div>
        </div>
        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-select">
                <option value="Male" {{ $onboarding->gender=="Male"?'selected':'' }}>Male</option>
                <option value="Female" {{ $onboarding->gender=="Female"?'selected':'' }}>Female</option>
                <option value="Other" {{ $onboarding->gender=="Other"?'selected':'' }}>Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Are you a driver?</label><br>
            <input type="radio" name="is_driver" value="1" {{ $onboarding->is_driver ? 'checked':'' }}> Yes
            <input type="radio" name="is_driver" value="0" {{ !$onboarding->is_driver ? 'checked':'' }}> No
        </div>
        <div class="mb-3"><label>Post Code</label><input type="text" name="post_code" value="{{ old('post_code',$onboarding->post_code) }}" class="form-control"></div>
        <div class="mb-3"><label>NI Number</label><input type="text" name="ni_number" value="{{ old('ni_number',$onboarding->ni_number) }}" class="form-control"></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" value="{{ old('email',$onboarding->email) }}" class="form-control"></div>
        <div class="mb-3">
            <label>Own Transport</label><br>
            <input type="radio" name="own_transport" value="1" {{ $onboarding->own_transport ? 'checked':'' }}> Yes
            <input type="radio" name="own_transport" value="0" {{ !$onboarding->own_transport ? 'checked':'' }}> No
        </div>
        <div class="mb-3">
            <label>Any Endorsements</label><br>
            <input type="radio" name="endorsements" value="1" {{ $onboarding->endorsements ? 'checked':'' }}> Yes
            <input type="radio" name="endorsements" value="0" {{ !$onboarding->endorsements ? 'checked':'' }}> No
        </div>
        <div class="mb-3"><label>Address</label><textarea name="address" class="form-control">{{ old('address',$onboarding->address) }}</textarea></div>
        <div class="mb-3"><label>Position Applied For</label><input type="text" name="position_applied" value="{{ old('position_applied',$onboarding->position_applied) }}" class="form-control"></div>
        <div class="mb-3"><label>Location</label><input type="text" name="location" value="{{ old('location',$onboarding->location) }}" class="form-control"></div>
        <div class="mb-3">
            <label>Work Preference</label>
            <select name="work_preference" class="form-select">
                <option value="Full Time" {{ $onboarding->work_preference=="Full Time"?'selected':'' }}>Full Time</option>
                <option value="Part Time" {{ $onboarding->work_preference=="Part Time"?'selected':'' }}>Part Time</option>
            </select>
        </div>
        <div class="mb-3"><label>Hours Requested</label><input type="text" name="hours_requested" value="{{ old('hours_requested',$onboarding->hours_requested) }}" class="form-control"></div>

        <!-- STEP 2: Character Reference -->
        <h4>2. Character Reference</h4>
        <div class="mb-3"><label>Referee Name</label><input type="text" name="referee_name" value="{{ old('referee_name',$onboarding->referee_name) }}" class="form-control"></div>
        <div class="mb-3"><label>Address</label><textarea name="referee_address" class="form-control">{{ old('referee_address',$onboarding->referee_address) }}</textarea></div>
        <div class="row mb-3">
            <div class="col"><label>Tel</label><input type="text" name="referee_tel" value="{{ old('referee_tel',$onboarding->referee_tel) }}" class="form-control"></div>
            <div class="col"><label>Email</label><input type="email" name="referee_email" value="{{ old('referee_email',$onboarding->referee_email) }}" class="form-control"></div>
        </div>
        <div class="mb-3"><label>Candidate Name</label><input type="text" name="candidate_name" value="{{ old('candidate_name',$onboarding->candidate_name) }}" class="form-control"></div>
        <div class="mb-3"><label>For the position of</label><input type="text" name="position_for" value="{{ old('position_for',$onboarding->position_for) }}" class="form-control"></div>
        <div class="mb-3"><label>Capacity in which candidate is known</label><input type="text" name="capacity_known" value="{{ old('capacity_known',$onboarding->capacity_known) }}" class="form-control"></div>
        <div class="mb-3"><label>How long have you known the candidate?</label><input type="text" name="known_duration" value="{{ old('known_duration',$onboarding->known_duration) }}" class="form-control"></div>
        <div class="mb-3"><label>Views on candidate</label><textarea name="referee_views" class="form-control">{{ old('referee_views',$onboarding->referee_views) }}</textarea></div>
        <div class="mb-3"><label>Referee Signature</label><input type="text" name="referee_signature" value="{{ old('referee_signature',$onboarding->referee_signature) }}" class="form-control"></div>
        <div class="mb-3"><label>Date</label><input type="date" name="referee_date" value="{{ old('referee_date',$onboarding->referee_date) }}" class="form-control"></div>

        <!-- STEP 3: Employee Reference -->
        <h4>3. Employee Reference</h4>
        <div class="mb-3"><label>Company Name</label><input type="text" name="company_name" value="{{ old('company_name',$onboarding->company_name) }}" class="form-control"></div>
        <div class="mb-3"><label>Address</label><textarea name="company_address" class="form-control">{{ old('company_address',$onboarding->company_address) }}</textarea></div>
        <div class="row mb-3">
            <div class="col"><label>Tel</label><input type="text" name="company_tel" value="{{ old('company_tel',$onboarding->company_tel) }}" class="form-control"></div>
            <div class="col"><label>Email</label><input type="email" name="company_email" value="{{ old('company_email',$onboarding->company_email) }}" class="form-control"></div>
        </div>
        <div class="mb-3"><label>Employment Start Date</label><input type="date" name="employment_start_date" value="{{ old('employment_start_date',$onboarding->employment_start_date) }}" class="form-control"></div>
        <div class="mb-3"><label>Employment End Date</label><input type="date" name="employment_end_date" value="{{ old('employment_end_date',$onboarding->employment_end_date) }}" class="form-control"></div>
        <div class="mb-3"><label>Position held and duties</label><textarea name="position_duties" class="form-control">{{ old('position_duties',$onboarding->position_duties) }}</textarea></div>
        <div class="mb-3"><label>Capacity in which candidate is known</label><input type="text" name="capacity_employee_known" value="{{ old('capacity_employee_known',$onboarding->capacity_employee_known) }}" class="form-control"></div>
        <div class="mb-3"><label>Reason for leaving</label><input type="text" name="reason_for_leaving" value="{{ old('reason_for_leaving',$onboarding->reason_for_leaving) }}" class="form-control"></div>
        <div class="mb-3"><label>Performance/Disciplinary issues?</label><br>
            <input type="radio" name="performance_issues" value="1" {{ $onboarding->performance_issues ? 'checked':'' }}> Yes
            <input type="radio" name="performance_issues" value="0" {{ !$onboarding->performance_issues ? 'checked':'' }}> No
        </div>
        <div class="mb-3"><label>Would you employ again?</label><br>
            <input type="radio" name="would_reemploy" value="1" {{ $onboarding->would_reemploy ? 'checked':'' }}> Yes
            <input type="radio" name="would_reemploy" value="0" {{ !$onboarding->would_reemploy ? 'checked':'' }}> No
        </div>

        <!-- STEP 4: Bank Details -->
        <h4>4. Bank Details</h4>
        <div class="mb-3"><label>Bank Name</label><input type="text" name="bank_name" value="{{ old('bank_name',$onboarding->bank_name) }}" class="form-control"></div>
        <div class="mb-3"><label>Bank Address</label><textarea name="bank_address" class="form-control">{{ old('bank_address',$onboarding->bank_address) }}</textarea></div>
        <div class="mb-3"><label>Sort Code</label><input type="text" name="sort_code" value="{{ old('sort_code',$onboarding->sort_code) }}" class="form-control"></div>
        <div class="mb-3"><label>Account No</label><input type="text" name="account_number" value="{{ old('account_number',$onboarding->account_number) }}" class="form-control"></div>
        <div class="mb-3"><label>Account Name</label><input type="text" name="account_name" value="{{ old('account_name',$onboarding->account_name) }}" class="form-control"></div>

        <!-- STEP 5: Equal Opportunity -->
        <h4>5. Equal Opportunity</h4>
        <div class="mb-3"><label>Ethnic Origin</label><input type="text" name="ethnic_origin" value="{{ old('ethnic_origin',$onboarding->ethnic_origin) }}" class="form-control"></div>
        <div class="mb-3"><label>Gender</label>
            <select name="gender_eo" class="form-select">
                <option value="Male" {{ $onboarding->gender_eo=="Male"?'selected':'' }}>Male</option>
                <option value="Female" {{ $onboarding->gender_eo=="Female"?'selected':'' }}>Female</option>
                <option value="Other" {{ $onboarding->gender_eo=="Other"?'selected':'' }}>Other</option>
            </select>
        </div>
        <div class="mb-3"><label>Sexual Orientation</label><input type="text" name="sexual_orientation" value="{{ old('sexual_orientation',$onboarding->sexual_orientation) }}" class="form-control"></div>
        <div class="mb-3"><label>Religion or Belief</label><input type="text" name="religion" value="{{ old('religion',$onboarding->religion) }}" class="form-control"></div>
        <div class="mb-3"><label>Marital Status</label><input type="text" name="marital_status" value="{{ old('marital_status',$onboarding->marital_status) }}" class="form-control"></div>
        <div class="mb-3"><label>Do you have disability?</label><br>
            <input type="radio" name="has_disability" value="1" {{ $onboarding->has_disability ? 'checked':'' }}> Yes
            <input type="radio" name="has_disability" value="0" {{ !$onboarding->has_disability ? 'checked':'' }}> No
        </div>
        <div class="mb-3"><label>Caring Responsibilities</label><input type="text" name="caring_responsibilities" value="{{ old('caring_responsibilities',$onboarding->caring_responsibilities) }}" class="form-control"></div>

        <!-- STEP 6: Driver & Vehicle -->
        <h4>6. Driver & Vehicle</h4>
        <div class="mb-3"><label>Driving Licence</label><input type="text" name="driving_licence" value="{{ old('driving_licence',$onboarding->driving_licence) }}" class="form-control"></div>
        <div class="mb-3"><label>Vehicle Insurance</label><input type="text" name="vehicle_insurance" value="{{ old('vehicle_insurance',$onboarding->vehicle_insurance) }}" class="form-control"></div>
        <div class="mb-3"><label>Tax & MOT</label><input type="text" name="tax_mot" value="{{ old('tax_mot',$onboarding->tax_mot) }}" class="form-control"></div>

        <!-- STEP 7: Health Declaration -->
        <h4>7. Health Declaration</h4>
        <div class="mb-3"><label>Any significant health problem?</label><br>
            <input type="radio" name="health1" value="1" {{ $onboarding->health1 ? 'checked':'' }}> Yes
            <input type="radio" name="health1" value="0" {{ !$onboarding->health1 ? 'checked':'' }}> No
        </div>
        <div class="mb-3"><label>Illness caused by work?</label><br>
            <input type="radio" name="health2" value="1" {{ $onboarding->health2 ? 'checked':'' }}> Yes
            <input type="radio" name="health2" value="0" {{ !$onboarding->health2 ? 'checked':'' }}> No
        </div>
        <div class="mb-3"><label>Left employment due to ill health?</label><br>
            <input type="radio" name="health3" value="1" {{ $onboarding->health3 ? 'checked':'' }}> Yes
            <input type="radio" name="health3" value="0" {{ !$onboarding->health3 ? 'checked':'' }}> No
        </div>
        <div class="mb-3"><label>Currently under medical treatment?</label><br>
            <input type="radio" name="health4" value="1" {{ $onboarding->health4 ? 'checked':'' }}> Yes
            <input type="radio" name="health4" value="0" {{ !$onboarding->health4 ? 'checked':'' }}> No
        </div>
        <div class="mb-3"><label>Need special aids/adjustments?</label><br>
            <input type="radio" name="health5" value="1" {{ $onboarding->health5 ? 'checked':'' }}> Yes
            <input type="radio" name="health5" value="0" {{ !$onboarding->health5 ? 'checked':'' }}> No
        </div>

        <!-- STEP 8: DBS Declaration -->
        <h4>8. DBS Declaration</h4>
        <div class="mb-3"><label>Signature</label><input type="text" name="dbs_signature" value="{{ old('dbs_signature',$onboarding->dbs_signature) }}" class="form-control"></div>
        <div class="mb-3"><label>Print Name</label><input type="text" class="form-control" name="dbs_print_name" value="{{ old('dbs_print_name',$onboarding->dbs_print_name) }}"></div>
        <div class="mb-3"><label>Date</label><input type="date" name="dbs_date" value="{{ old('dbs_date',$onboarding->dbs_date) }}" class="form-control"></div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>

</div>
@endsection
