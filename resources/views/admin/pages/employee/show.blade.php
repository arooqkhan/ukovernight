@extends('admin.master.main')
@section('content')

<div class="statbox widget box box-shadow">
    <div class="widget-content widget-content-area p-3">
        <a href="{{ route('employee.index') }}" class="btn btn-secondary mb-3">
            Back
        </a>


        <a href="{{ route('employee.download.pdf', $employee->id) }}" class="btn btn-danger mb-3">
    <i class="fas fa-file-pdf"></i> Download PDF
</a>



        <div class="card shadow-sm">
            <div class="card-header  text-white">
                <h4>Employee Details: {{ $employee->first_name }} {{ $employee->last_name }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    
                    <!-- Left Column -->
                    <div class="col-md-4 text-center mb-3">
                        <img src="{{ $employee->image ? asset($employee->image) : asset('images/dummy.jpg') }}" 
                             class="img-fluid rounded-circle mb-3" 
                             alt="Employee Image" style="width: 180px; height: 180px; object-fit: cover;">
                        <ul class="list-group text-left">
                            <li class="list-group-item"><strong>ID:</strong> {{ $employee->id }}</li>
                            <li class="list-group-item"><strong>Name:</strong> {{ $employee->first_name }} {{ $employee->last_name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $employee->user->email }}</li>
                            <li class="list-group-item"><strong>Role:</strong> {{ $employee->role }}</li>
                            <li class="list-group-item"><strong>Employee ID:</strong> {{ $employee->employee_id }}</li>
                        </ul>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Department:</strong> {{ $employee->department ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Designation:</strong> {{ $employee->designation }}</li>
                                    <li class="list-group-item"><strong>Status:</strong> {{ $employee->employee_status ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Branch:</strong> {{ $employee->branchDetail->name ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Salary:</strong> {{ $employee->salary ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Work Shift:</strong> {{ $employee->work_shift ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Joining Date:</strong> {{ $employee->joining_date ?? '-' }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6 mb-3">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Contact Number:</strong> {{ $employee->number ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Emergency Number:</strong> {{ $employee->emgr_number ?? '-' }}</li>
                                    <li class="list-group-item"><strong>NI Number:</strong> {{ $employee->ninumber ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Date of Birth:</strong> {{ $employee->dob ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Address:</strong> {{ $employee->address ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Visa Status:</strong> {{ $employee->visa ?? '-' }}</li>
                                    <li class="list-group-item"><strong>Next Right To Check Date:</strong> {{ $employee->visadate ?? '-' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <!-- Onboarding Details -->
        @if($onboarding)
        <h4 class="mb-3">Onboarding Record</h4>

        <!-- STEP 1 -->
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">Step 1: Job Application</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"><strong>First Name:</strong> {{ $onboarding->first_name }}</div>
                    <div class="col-md-3"><strong>Surname:</strong> {{ $onboarding->surname }}</div>
                    <div class="col-md-3"><strong>Maiden Name:</strong> {{ $onboarding->maiden_name }}</div>
                    <div class="col-md-3"><strong>Previous Name:</strong> {{ $onboarding->previous_name }}</div>
                    <div class="col-md-3"><strong>Telephone:</strong> {{ $onboarding->telephone_number }}</div>
                    <div class="col-md-3"><strong>Mobile:</strong> {{ $onboarding->mobile_number }}</div>
                    <div class="col-md-3"><strong>Gender:</strong> {{ $onboarding->gender }}</div>
                    <div class="col-md-3">
    <strong>Driver:</strong> {{ $onboarding->is_driver == 1 ? 'Yes' : 'No' }}
</div>
                    <div class="col-md-3"><strong>Post Code:</strong> {{ $onboarding->post_code }}</div>
                    <div class="col-md-3"><strong>NI Number:</strong> {{ $onboarding->ni_number }}</div>
                    <div class="col-md-3"><strong>Email:</strong> {{ $onboarding->email }}</div>
                    <div class="col-md-3">
    <strong>Own Transport:</strong> {{ $onboarding->own_transport == 1 ? 'Yes' : 'No' }}
</div>
                   <div class="col-md-3">
    <strong>Endorsements:</strong> {{ $onboarding->endorsements == 1 ? 'Yes' : 'No' }}
</div>
                    <div class="col-md-3"><strong>Address:</strong> {{ $onboarding->address }}</div>
                    <div class="col-md-3"><strong>Position Applied:</strong> {{ $onboarding->position_applied }}</div>
                    <div class="col-md-3"><strong>Location:</strong> {{ $onboarding->location }}</div>
                    <div class="col-md-3"><strong>Work Preference:</strong> {{ $onboarding->work_preference }}</div>
                    <div class="col-md-3"><strong>Hours Requested:</strong> {{ $onboarding->hours_requested }}</div>
                </div>
            </div>
        </div>

        <!-- STEP 2 -->
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">Step 2: Referee Info</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"><strong>Referee Name:</strong> {{ $onboarding->referee_name }}</div>
                    <div class="col-md-3"><strong>Address:</strong> {{ $onboarding->referee_address }}</div>
                    <div class="col-md-3"><strong>Telephone:</strong> {{ $onboarding->referee_tel }}</div>
                    <div class="col-md-3"><strong>Email:</strong> {{ $onboarding->referee_email }}</div>
                    <div class="col-md-3"><strong>Candidate:</strong> {{ $onboarding->candidate_name }}</div>
                    <div class="col-md-3"><strong>Position:</strong> {{ $onboarding->position_for }}</div>
                    <div class="col-md-3"><strong>Capacity Known:</strong> {{ $onboarding->capacity_known }}</div>
                    <div class="col-md-3"><strong>Known Duration:</strong> {{ $onboarding->known_duration }}</div>
                    <div class="col-md-3"><strong>Views:</strong> {{ $onboarding->referee_views }}</div>
                    <div class="col-md-3"><strong>Signature:</strong> {{ $onboarding->referee_signature }}</div>
                    <div class="col-md-3"><strong>Date:</strong> {{ $onboarding->referee_date }}</div>
                </div>
            </div>
        </div>

        <!-- STEP 3 -->
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">Step 3: Employment Info</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"><strong>Company:</strong> {{ $onboarding->company_name }}</div>
                    <div class="col-md-3"><strong>Address:</strong> {{ $onboarding->company_address }}</div>
                    <div class="col-md-3"><strong>Telephone:</strong> {{ $onboarding->company_tel }}</div>
                    <div class="col-md-3"><strong>Email:</strong> {{ $onboarding->company_email }}</div>
                    <div class="col-md-3"><strong>Candidate Name:</strong> {{ $onboarding->employee_candidate_name }}</div>
                    <div class="col-md-3"><strong>Start Date:</strong> {{ $onboarding->employment_start_date }}</div>
                    <div class="col-md-3"><strong>End Date:</strong> {{ $onboarding->employment_end_date }}</div>
                    <div class="col-md-3"><strong>Duties:</strong> {{ $onboarding->position_duties }}</div>
                    <div class="col-md-3"><strong>Capacity Known:</strong> {{ $onboarding->capacity_employee_known }}</div>
                    <div class="col-md-3"><strong>Reason for Leaving:</strong> {{ $onboarding->reason_for_leaving }}</div>
                   <div class="col-md-3">
    <strong>Performance Issues:</strong> {{ $onboarding->performance_issues == 1 ? 'Yes' : 'No' }}
</div>
                   <div class="col-md-3">
    <strong>Re-employ:</strong> {{ $onboarding->would_reemploy == 1 ? 'Yes' : 'No' }}
</div>
                </div>
            </div>
        </div>

        <!-- STEP 4 -->
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">Step 4: Bank Info</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"><strong>Bank Name:</strong> {{ $onboarding->bank_name }}</div>
                    <div class="col-md-3"><strong>Address:</strong> {{ $onboarding->bank_address }}</div>
                    <div class="col-md-3"><strong>Sort Code:</strong> {{ $onboarding->sort_code }}</div>
                    <div class="col-md-3"><strong>Account Number:</strong> {{ $onboarding->account_number }}</div>
                    <div class="col-md-3"><strong>Account Name:</strong> {{ $onboarding->account_name }}</div>
                </div>
            </div>
        </div>

        <!-- STEP 5 -->
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">Step 5: Equal Opportunities</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"><strong>Ethnic Origin:</strong> {{ $onboarding->ethnic_origin }}</div>
                    <div class="col-md-3"><strong>Gender:</strong> {{ $onboarding->gender_eo }}</div>
                    <div class="col-md-3"><strong>Sexual Orientation:</strong> {{ $onboarding->sexual_orientation }}</div>
                    <div class="col-md-3"><strong>Religion:</strong> {{ $onboarding->religion }}</div>
                    <div class="col-md-3"><strong>Marital Status:</strong> {{ $onboarding->marital_status }}</div>
                    <div class="col-md-3">
    <strong>Disability:</strong> {{ $onboarding->has_disability == 1 ? 'Yes' : 'No' }}
</div>
                    <div class="col-md-3"><strong>Caring Responsibilities:</strong> {{ $onboarding->caring_responsibilities }}</div>
                </div>
            </div>
        </div>

        <!-- STEP 6 -->
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">Step 6: Driving</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"><strong>Licence:</strong> {{ $onboarding->driving_licence }}</div>
                    <div class="col-md-3"><strong>Insurance:</strong> {{ $onboarding->vehicle_insurance }}</div>
                    <div class="col-md-3"><strong>Tax/MOT:</strong> {{ $onboarding->tax_mot }}</div>
                </div>
            </div>
        </div>

        <!-- STEP 7 -->
       <div class="card mb-3">
    <div class="card-header bg-secondary text-white">Step 7: Health</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3"><strong>Health Problem:</strong> {{ $onboarding->health1 == 1 ? 'Yes' : 'No' }}</div>
            <div class="col-md-3"><strong>Work Illness:</strong> {{ $onboarding->health2 == 1 ? 'Yes' : 'No' }}</div>
            <div class="col-md-3"><strong>Ill Health Leave:</strong> {{ $onboarding->health3 == 1 ? 'Yes' : 'No' }}</div>
            <div class="col-md-3"><strong>Medical Treatment:</strong> {{ $onboarding->health4 == 1 ? 'Yes' : 'No' }}</div>
            <div class="col-md-3"><strong>Special Aids:</strong> {{ $onboarding->health5 == 1 ? 'Yes' : 'No' }}</div>
        </div>
    </div>
</div>

        <!-- STEP 8 -->
        <div class="card mb-3">
            <div class="card-header bg-secondary text-white">Step 8: DBS</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"><strong>Signature:</strong> {{ $onboarding->dbs_signature }}</div>
                    <div class="col-md-3"><strong>Print Name:</strong> {{ $onboarding->dbs_print_name }}</div>
                    <div class="col-md-3"><strong>Date:</strong> {{ $onboarding->dbs_date }}</div>
                </div>
            </div>
        </div>

        @else
        <div class="alert alert-warning">No Onboarding record found for this employee.</div>
        @endif
    </div>
</div>



    </div>
</div>

@endsection
