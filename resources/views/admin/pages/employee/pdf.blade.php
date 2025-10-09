<!DOCTYPE html>
<html>
<head>
    <title>Employee Record PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #000; }
        h3, h4 { margin: 10px 0 5px; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        th, td { border: 1px solid #aaa; padding: 6px; vertical-align: top; text-align: left; }
        .section { margin-bottom: 20px; page-break-inside: avoid; }
        .section-title { background: #f2f2f2; font-weight: bold; padding: 6px; font-size: 13px; }
    </style>
</head>
<body>
    <h3>Employee Details</h3>
    <table>
        <tr><th>ID</th><td>{{ $employee->id }}</td></tr>
        <tr><th>Name</th><td>{{ $employee->first_name }} {{ $employee->last_name }}</td></tr>
        <tr><th>Email</th><td>{{ $employee->user->email }}</td></tr>
        <tr><th>Role</th><td>{{ $employee->role }}</td></tr>
        <tr><th>Employee ID</th><td>{{ $employee->employee_id }}</td></tr>
        <tr><th>Department</th><td>{{ $employee->department ?? '-' }}</td></tr>
        <tr><th>Designation</th><td>{{ $employee->designation ?? '-' }}</td></tr>
        <tr><th>Status</th><td>{{ $employee->employee_status ?? '-' }}</td></tr>
        <tr><th>Branch</th><td>{{ $employee->branchDetail->name ?? '-' }}</td></tr>
        <tr><th>Salary</th><td>{{ $employee->salary ?? '-' }}</td></tr>
        <tr><th>Work Shift</th><td>{{ $employee->work_shift ?? '-' }}</td></tr>
        <tr><th>Joining Date</th><td>{{ $employee->joining_date ?? '-' }}</td></tr>
        <tr><th>Contact Number</th><td>{{ $employee->number ?? '-' }}</td></tr>
        <tr><th>Emergency Number</th><td>{{ $employee->emgr_number ?? '-' }}</td></tr>
        <tr><th>NI Number</th><td>{{ $employee->ninumber ?? '-' }}</td></tr>
        <tr><th>Date of Birth</th><td>{{ $employee->dob ?? '-' }}</td></tr>
        <tr><th>Address</th><td>{{ $employee->address ?? '-' }}</td></tr>
        <tr><th>Visa Status</th><td>{{ $employee->visa ?? '-' }}</td></tr>
        <tr><th>Next Right To Check Date</th><td>{{ $employee->visadate ?? '-' }}</td></tr>
    </table>

    @if($onboarding)
        <div class="section">
            <div class="section-title">Step 1: Job Application</div>
            <table>
                <tr><th>First Name</th><td>{{ $onboarding->first_name }}</td></tr>
                <tr><th>Surname</th><td>{{ $onboarding->surname }}</td></tr>
                <tr><th>Maiden Name</th><td>{{ $onboarding->maiden_name }}</td></tr>
                <tr><th>Previous Name</th><td>{{ $onboarding->previous_name }}</td></tr>
                <tr><th>Telephone</th><td>{{ $onboarding->telephone_number }}</td></tr>
                <tr><th>Mobile</th><td>{{ $onboarding->mobile_number }}</td></tr>
                <tr><th>Gender</th><td>{{ $onboarding->gender }}</td></tr>
                <tr><th>Driver</th><td>{{ $onboarding->is_driver ? 'Yes' : 'No' }}</td></tr>
                <tr><th>Post Code</th><td>{{ $onboarding->post_code }}</td></tr>
                <tr><th>NI Number</th><td>{{ $onboarding->ni_number }}</td></tr>
                <tr><th>Email</th><td>{{ $onboarding->email }}</td></tr>
                <tr><th>Own Transport</th><td>{{ $onboarding->own_transport ? 'Yes' : 'No' }}</td></tr>
                <tr><th>Endorsements</th><td>{{ $onboarding->endorsements ? 'Yes' : 'No' }}</td></tr>
                <tr><th>Address</th><td>{{ $onboarding->address }}</td></tr>
                <tr><th>Position Applied</th><td>{{ $onboarding->position_applied }}</td></tr>
                <tr><th>Location</th><td>{{ $onboarding->location }}</td></tr>
                <tr><th>Work Preference</th><td>{{ $onboarding->work_preference }}</td></tr>
                <tr><th>Hours Requested</th><td>{{ $onboarding->hours_requested }}</td></tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Step 2: Referee Info</div>
            <table>
                <tr><th>Referee Name</th><td>{{ $onboarding->referee_name }}</td></tr>
                <tr><th>Address</th><td>{{ $onboarding->referee_address }}</td></tr>
                <tr><th>Telephone</th><td>{{ $onboarding->referee_tel }}</td></tr>
                <tr><th>Email</th><td>{{ $onboarding->referee_email }}</td></tr>
                <tr><th>Candidate</th><td>{{ $onboarding->candidate_name }}</td></tr>
                <tr><th>Position</th><td>{{ $onboarding->position_for }}</td></tr>
                <tr><th>Capacity Known</th><td>{{ $onboarding->capacity_known }}</td></tr>
                <tr><th>Known Duration</th><td>{{ $onboarding->known_duration }}</td></tr>
                <tr><th>Views</th><td>{{ $onboarding->referee_views }}</td></tr>
                <tr><th>Signature</th><td>{{ $onboarding->referee_signature }}</td></tr>
                <tr><th>Date</th><td>{{ $onboarding->referee_date }}</td></tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Step 3: Employment Info</div>
            <table>
                <tr><th>Company</th><td>{{ $onboarding->company_name }}</td></tr>
                <tr><th>Address</th><td>{{ $onboarding->company_address }}</td></tr>
                <tr><th>Telephone</th><td>{{ $onboarding->company_tel }}</td></tr>
                <tr><th>Email</th><td>{{ $onboarding->company_email }}</td></tr>
                <tr><th>Candidate Name</th><td>{{ $onboarding->employee_candidate_name }}</td></tr>
                <tr><th>Start Date</th><td>{{ $onboarding->employment_start_date }}</td></tr>
                <tr><th>End Date</th><td>{{ $onboarding->employment_end_date }}</td></tr>
                <tr><th>Duties</th><td>{{ $onboarding->position_duties }}</td></tr>
                <tr><th>Capacity Known</th><td>{{ $onboarding->capacity_employee_known }}</td></tr>
                <tr><th>Reason for Leaving</th><td>{{ $onboarding->reason_for_leaving }}</td></tr>
                <tr><th>Performance Issues</th><td>{{ $onboarding->performance_issues ? 'Yes' : 'No' }}</td></tr>
                <tr><th>Re-employ</th><td>{{ $onboarding->would_reemploy ? 'Yes' : 'No' }}</td></tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Step 4: Bank Info</div>
            <table>
                <tr><th>Bank Name</th><td>{{ $onboarding->bank_name }}</td></tr>
                <tr><th>Address</th><td>{{ $onboarding->bank_address }}</td></tr>
                <tr><th>Sort Code</th><td>{{ $onboarding->sort_code }}</td></tr>
                <tr><th>Account Number</th><td>{{ $onboarding->account_number }}</td></tr>
                <tr><th>Account Name</th><td>{{ $onboarding->account_name }}</td></tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Step 5: Equal Opportunities</div>
            <table>
                <tr><th>Ethnic Origin</th><td>{{ $onboarding->ethnic_origin }}</td></tr>
                <tr><th>Gender</th><td>{{ $onboarding->gender_eo }}</td></tr>
                <tr><th>Sexual Orientation</th><td>{{ $onboarding->sexual_orientation }}</td></tr>
                <tr><th>Religion</th><td>{{ $onboarding->religion }}</td></tr>
                <tr><th>Marital Status</th><td>{{ $onboarding->marital_status }}</td></tr>
                <tr><th>Disability</th><td>{{ $onboarding->has_disability ? 'Yes' : 'No' }}</td></tr>
                <tr><th>Caring Responsibilities</th><td>{{ $onboarding->caring_responsibilities }}</td></tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Step 6: Driving</div>
            <table>
                <tr><th>Licence</th><td>{{ $onboarding->driving_licence }}</td></tr>
                <tr><th>Insurance</th><td>{{ $onboarding->vehicle_insurance }}</td></tr>
                <tr><th>Tax/MOT</th><td>{{ $onboarding->tax_mot }}</td></tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Step 7: Health</div>
            <table>
                <tr><th>Health Problem</th><td>{{ $onboarding->health1 ? 'Yes' : 'No' }}</td></tr>
                <tr><th>Work Illness</th><td>{{ $onboarding->health2 ? 'Yes' : 'No' }}</td></tr>
                <tr><th>Ill Health Leave</th><td>{{ $onboarding->health3 ? 'Yes' : 'No' }}</td></tr>
                <tr><th>Medical Treatment</th><td>{{ $onboarding->health4 ? 'Yes' : 'No' }}</td></tr>
                <tr><th>Special Aids</th><td>{{ $onboarding->health5 ? 'Yes' : 'No' }}</td></tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Step 8: DBS</div>
            <table>
                <tr><th>Signature</th><td>{{ $onboarding->dbs_signature }}</td></tr>
                <tr><th>Print Name</th><td>{{ $onboarding->dbs_print_name }}</td></tr>
                <tr><th>Date</th><td>{{ $onboarding->dbs_date }}</td></tr>
            </table>
        </div>
    @else
        <p><strong>No Onboarding Record Found</strong></p>
    @endif
</body>
</html>
