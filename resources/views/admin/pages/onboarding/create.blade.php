<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Multi Step Job Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-step {
            display: none;
            animation: slideIn 0.5s ease-in-out;
        }

        .form-step.active {
            display: block;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Job Application - Multi Step Form</h2>

           <form  action="{{ route('onboarding.store') }}" method="POST">
    @csrf

    <!-- STEP 1: Job Application -->
    <div class="form-step active">
        <h4>1. Job Application</h4>
        <div class="row mb-3">
            <div class="col">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="col">
                <label>Surname</label>
                <input type="text" class="form-control" name="surname" required>
            </div>
        </div>
        <div class="mb-3"><label>Maiden Name</label><input type="text" class="form-control" name="maiden_name"></div>
        <div class="mb-3"><label>Previous Name</label><input type="text" class="form-control" name="previous_name"></div>
        <div class="row mb-3">
            <div class="col"><label>Telephone</label><input type="text" class="form-control" name="telephone_number" required></div>
            <div class="col"><label>Mobile</label><input type="text" class="form-control" name="mobile_number" required></div>
        </div>
        <div class="mb-3">
            <label>Gender</label>
            <select class="form-select" name="gender" required>
                <option value="">Select</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Are you a driver?</label><br>
            <input type="radio" name="is_driver" value="1" required> Yes
            <input type="radio" name="is_driver" value="0"> No
        </div>
        <div class="mb-3"><label>Post Code</label><input type="text" class="form-control" name="post_code" required></div>
        <div class="mb-3"><label>NI Number</label><input type="text" class="form-control" name="ni_number" required></div>
        <div class="mb-3"><label>Email</label><input type="email" class="form-control" name="email" required></div>
        <div class="mb-3">
            <label>Own Transport</label><br>
            <input type="radio" name="own_transport" value="1" required> Yes
            <input type="radio" name="own_transport" value="0"> No
        </div>
        <div class="mb-3">
            <label>Any Endorsements</label><br>
            <input type="radio" name="endorsements" value="1" required> Yes
            <input type="radio" name="endorsements" value="0"> No
        </div>
        <div class="mb-3"><label>Address</label><textarea class="form-control" name="address" required></textarea></div>
        <div class="mb-3"><label>Position Applied For</label><input type="text" class="form-control" name="position_applied" required></div>
        <div class="mb-3"><label>Location</label><input type="text" class="form-control" name="location" required></div>
        <div class="mb-3">
            <label>Work Preference</label>
            <select class="form-select" name="work_preference" required>
                <option value="">Select</option>
                <option>Full Time</option>
                <option>Part Time</option>
            </select>
        </div>
        <div class="mb-3"><label>Hours Requested</label><input type="text" class="form-control" name="hours_requested" required></div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>
    </div>

    <!-- STEP 2: Character Reference -->
    <div class="form-step">
        <h4>2. Character Reference</h4>
        <div class="mb-3"><label>Referee Name</label><input type="text" class="form-control" name="referee_name" required></div>
        <div class="mb-3"><label>Address</label><textarea class="form-control" name="referee_address" required></textarea></div>
        <div class="row mb-3">
            <div class="col"><label>Tel</label><input type="text" class="form-control" name="referee_tel" required></div>
            <div class="col"><label>Email</label><input type="email" class="form-control" name="referee_email" required></div>
        </div>
        <div class="mb-3"><label>Candidate Name</label><input type="text" class="form-control" name="candidate_name" required></div>
        <div class="mb-3"><label>For the position of</label><input type="text" class="form-control" name="position_for" required></div>
        <div class="mb-3"><label>Capacity in which candidate is known</label><input type="text" class="form-control" name="capacity_known" required></div>
        <div class="mb-3"><label>How long have you known the candidate?</label><input type="text" class="form-control" name="known_duration" required></div>
        <div class="mb-3"><label>Views on candidate</label><textarea class="form-control" name="referee_views" required></textarea></div>
        <div class="mb-3"><label>Referee Signature</label><input type="text" class="form-control" name="referee_signature" required></div>
        <div class="mb-3"><label>Date</label><input type="date" class="form-control" name="referee_date" required></div>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary prev-step">Previous</button>
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>
    </div>

    <!-- STEP 3: Employee Reference -->
    <div class="form-step">
        <h4>3. Employee Reference</h4>
        <div class="mb-3"><label>Company Name</label><input type="text" class="form-control" name="company_name" required></div>
        <div class="mb-3"><label>Address</label><textarea class="form-control" name="company_address" required></textarea></div>
        <div class="row mb-3">
            <div class="col"><label>Tel</label><input type="text" class="form-control" name="company_tel" required></div>
            <div class="col"><label>Email</label><input type="email" class="form-control" name="company_email" required></div>
        </div>
        <div class="mb-3"><label>Employment Start Date</label><input type="date" class="form-control" name="employment_start_date" required></div>
        <div class="mb-3"><label>Employment End Date</label><input type="date" class="form-control" name="employment_end_date" required></div>
        <div class="mb-3"><label>Position held and duties</label><textarea class="form-control" name="position_duties" required></textarea></div>
        <div class="mb-3"><label>Capacity in which candidate is known</label><input type="text" class="form-control" name="capacity_employee_known" required></div>
        <div class="mb-3"><label>Reason for leaving</label><input type="text" class="form-control" name="reason_for_leaving" required></div>
        <div class="mb-3"><label>Performance/Disciplinary issues?</label><br>
            <input type="radio" name="performance_issues" value="1" required> Yes
            <input type="radio" name="performance_issues" value="0"> No
        </div>
        <div class="mb-3"><label>Would you employ again?</label><br>
            <input type="radio" name="would_reemploy" value="1" required> Yes
            <input type="radio" name="would_reemploy" value="0"> No
        </div>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary prev-step">Previous</button>
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>
    </div>

    <!-- STEP 4: Bank Details -->
    <div class="form-step">
        <h4>4. Bank Details</h4>
        <div class="mb-3"><label>Bank Name</label><input type="text" class="form-control" name="bank_name" required></div>
        <div class="mb-3"><label>Bank Address</label><textarea class="form-control" name="bank_address" required></textarea></div>
        <div class="mb-3"><label>Sort Code</label><input type="text" class="form-control" name="sort_code" required></div>
        <div class="mb-3"><label>Account No</label><input type="text" class="form-control" name="account_number" required></div>
        <div class="mb-3"><label>Account Name</label><input type="text" class="form-control" name="account_name" required></div>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary prev-step">Previous</button>
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>
    </div>

    <!-- STEP 5: Equal Opportunity -->
    <div class="form-step">
        <h4>5. Equal Opportunity</h4>
        <div class="mb-3"><label>Ethnic Origin</label><input type="text" class="form-control" name="ethnic_origin" required></div>
        <div class="mb-3"><label>Gender</label>
            <select class="form-select" name="gender_eo" required>
                <option value="">Select</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
        </div>
        <div class="mb-3"><label>Sexual Orientation</label><input type="text" class="form-control" name="sexual_orientation" required></div>
        <div class="mb-3"><label>Religion or Belief</label><input type="text" class="form-control" name="religion" required></div>
        <div class="mb-3"><label>Marital Status</label><input type="text" class="form-control" name="marital_status" required></div>
        <div class="mb-3"><label>Do you have disability?</label><br>
            <input type="radio" name="has_disability" value="1" required> Yes
            <input type="radio" name="has_disability" value="0"> No
        </div>
        <div class="mb-3"><label>Caring Responsibilities</label><input type="text" class="form-control" name="caring_responsibilities" required></div>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary prev-step">Previous</button>
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>
    </div>

    <!-- STEP 6: Driver & Vehicle -->
    <div class="form-step">
        <h4>6. Driver & Vehicle</h4>
        <div class="mb-3"><label>Driving Licence</label><input type="text" class="form-control" name="driving_licence" required></div>
        <div class="mb-3"><label>Vehicle Insurance</label><input type="text" class="form-control" name="vehicle_insurance" required></div>
        <div class="mb-3"><label>Tax & MOT</label><input type="text" class="form-control" name="tax_mot" required></div>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary prev-step">Previous</button>
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>
    </div>

    <!-- STEP 7: Health Declaration -->
    <div class="form-step">
        <h4>7. Health Declaration</h4>
        <div class="mb-3"><label>Any significant health problem?</label><br>
            <input type="radio" name="health1" value="1" required> Yes
            <input type="radio" name="health1" value="0"> No
        </div>
        <div class="mb-3"><label>Illness caused by work?</label><br>
            <input type="radio" name="health2" value="1" required> Yes
            <input type="radio" name="health2" value="0"> No
        </div>
        <div class="mb-3"><label>Left employment due to ill health?</label><br>
            <input type="radio" name="health3" value="1" required> Yes
            <input type="radio" name="health3" value="0"> No
        </div>
        <div class="mb-3"><label>Currently under medical treatment?</label><br>
            <input type="radio" name="health4" value="1" required> Yes
            <input type="radio" name="health4" value="0"> No
        </div>
        <div class="mb-3"><label>Need special aids/adjustments?</label><br>
            <input type="radio" name="health5" value="1" required> Yes
            <input type="radio" name="health5" value="0"> No
        </div>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary prev-step">Previous</button>
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>
    </div>

    <!-- STEP 8: DBS Declaration -->
    <div class="form-step">
        <h4>8. DBS Declaration</h4>
        <div class="mb-3"><label>Signature</label><input type="text" class="form-control" name="dbs_signature" required></div>
        <div class="mb-3"><label>Print Name</label><input type="text" class="form-control" name="dbs_print_name" required></div>
        <div class="mb-3"><label>Date</label><input type="date" class="form-control" name="dbs_date" required></div>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary prev-step">Previous</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>



        </div>
    </div>

    <script>
        const steps = document.querySelectorAll(".form-step");
        const nextBtns = document.querySelectorAll(".next-step");
        const prevBtns = document.querySelectorAll(".prev-step");
        let formStepIndex = 0;

        function showStep(index) {
            steps.forEach((step, i) => {
                step.classList.toggle("active", i === index);
            });
        }

        nextBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                // Sirf current step ke inputs validate karenge
                const inputs = steps[formStepIndex].querySelectorAll("input, select, textarea");
                let valid = true;
                inputs.forEach(input => {
                    if (!input.checkValidity()) {
                        valid = false;
                    }
                });

                if (!valid) {
                    document.getElementById("multiStepForm").reportValidity();
                    return;
                }

                formStepIndex++;
                if (formStepIndex >= steps.length) formStepIndex = steps.length - 1;
                showStep(formStepIndex);
            });
        });

        prevBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                formStepIndex--;
                if (formStepIndex < 0) formStepIndex = 0;
                showStep(formStepIndex);
            });
        });
    </script>