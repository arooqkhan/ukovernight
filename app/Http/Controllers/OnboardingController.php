<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Onboarding;
use Illuminate\Http\Request;

class OnboardingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $employees = Onboarding::all();
         return view('admin.pages.onboarding.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.onboarding.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    try {
        $validated = $request->validate([
            // STEP 1
            'first_name' => 'required',
            'surname' => 'required',
            'maiden_name' => 'nullable',
            'previous_name' => 'nullable',
            'telephone_number' => 'nullable',
            'mobile_number' => 'nullable',
            'gender' => 'required',
            'is_driver' => 'required|boolean',
            'post_code' => 'required',
            'ni_number' => 'required',
            'email' => 'required|email',
            'own_transport' => 'required|boolean',
            'endorsements' => 'required|boolean',
            'address' => 'required',
            'position_applied' => 'required',
            'location' => 'required',
            'work_preference' => 'required',
            'hours_requested' => 'required',

            // STEP 2
            'referee_name' => 'required',
            'referee_address' => 'required',
            'referee_tel' => 'required',
            'referee_email' => 'required|email',
            'candidate_name' => 'required',
            'position_for' => 'required',
            'capacity_known' => 'required',
            'known_duration' => 'required',
            'referee_views' => 'required',
            'referee_signature' => 'required',
            'referee_date' => 'required|date',

            // STEP 3
            'company_name' => 'required',
            'company_address' => 'required',
            'company_tel' => 'required',
            'company_email' => 'required|email',
            'employment_start_date' => 'required|date',
            'employment_end_date' => 'required|date',
            'position_duties' => 'required',
            'capacity_employee_known' => 'required',
            'reason_for_leaving' => 'required',
            'performance_issues' => 'required|boolean',
            'would_reemploy' => 'required|boolean',

            // STEP 4
            'bank_name' => 'required',
            'bank_address' => 'required',
            'sort_code' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',

            // STEP 5
            'ethnic_origin' => 'required',
            'gender_eo' => 'required',
            'sexual_orientation' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'has_disability' => 'required|boolean',
            'caring_responsibilities' => 'required',

            // STEP 6
            'driving_licence' => 'required',
            'vehicle_insurance' => 'required',
            'tax_mot' => 'required',

            // STEP 7
            'health1' => 'required|boolean',
            'health2' => 'required|boolean',
            'health3' => 'required|boolean',
            'health4' => 'required|boolean',
            'health5' => 'required|boolean',

            // STEP 8
            'dbs_signature' => 'required',
            'dbs_print_name' => 'required',
            'dbs_date' => 'required|date',
        ]);

        $onboarding = new Onboarding();
        $onboarding->user_id = auth()->id();
        $onboarding->fill($validated);
        $onboarding->save();

        return redirect()->route('dashboard')->with('success', 'Onboarding form submitted successfully!');

    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: '.$e->getMessage())->withInput();
    }
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    

    $onboarding = Onboarding::findOrFail($id);
    return view('admin.pages.onboarding.edit', compact('onboarding'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    try {
        $onboarding = Onboarding::where('user_id', $id)->firstOrFail();

        $validated = $request->validate([
            // Step 1: Job Application
            'first_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'maiden_name' => 'nullable|string|max:255',
            'previous_name' => 'nullable|string|max:255',
            'telephone_number' => 'nullable|string|max:20',
            'mobile_number' => 'nullable|string|max:20',
            'gender' => 'required|string',
            'is_driver' => 'required|boolean',
            'post_code' => 'required|string|max:20',
            'ni_number' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'own_transport' => 'required|boolean',
            'endorsements' => 'required|boolean',
            'address' => 'required|string',
            'position_applied' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'work_preference' => 'required|string|max:50',
            'hours_requested' => 'required|string|max:50',

            // Step 2: Character Reference
            'referee_name' => 'nullable|string|max:255',
            'referee_address' => 'nullable|string',
            'referee_tel' => 'nullable|string|max:20',
            'referee_email' => 'nullable|email|max:255',
            'candidate_name' => 'nullable|string|max:255',
            'position_for' => 'nullable|string|max:255',
            'capacity_known' => 'nullable|string|max:255',
            'known_duration' => 'nullable|string|max:255',
            'referee_views' => 'nullable|string',
            'referee_signature' => 'nullable|string|max:255',
            'referee_date' => 'nullable|date',

            // Step 3: Employee Reference
            'company_name' => 'nullable|string|max:255',
            'company_address' => 'nullable|string',
            'company_tel' => 'nullable|string|max:20',
            'company_email' => 'nullable|email|max:255',
            'employment_start_date' => 'nullable|date',
            'employment_end_date' => 'nullable|date',
            'position_duties' => 'nullable|string',
            'capacity_employee_known' => 'nullable|string|max:255',
            'reason_for_leaving' => 'nullable|string|max:255',
            'performance_issues' => 'nullable|boolean',
            'would_reemploy' => 'nullable|boolean',

            // Step 4: Bank Details
            'bank_name' => 'nullable|string|max:255',
            'bank_address' => 'nullable|string',
            'sort_code' => 'nullable|string|max:20',
            'account_number' => 'nullable|string|max:20',
            'account_name' => 'nullable|string|max:255',

            // Step 5: Equal Opportunity
            'ethnic_origin' => 'nullable|string|max:255',
            'gender_eo' => 'nullable|string|max:50',
            'sexual_orientation' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'marital_status' => 'nullable|string|max:255',
            'has_disability' => 'nullable|boolean',
            'caring_responsibilities' => 'nullable|string|max:255',

            // Step 6: Driver & Vehicle
            'driving_licence' => 'nullable|string|max:255',
            'vehicle_insurance' => 'nullable|string|max:255',
            'tax_mot' => 'nullable|string|max:255',

            // Step 7: Health Declaration
            'health1' => 'nullable|boolean',
            'health2' => 'nullable|boolean',
            'health3' => 'nullable|boolean',
            'health4' => 'nullable|boolean',
            'health5' => 'nullable|boolean',

            // Step 8: DBS Declaration
            'dbs_signature' => 'nullable|string|max:255',
            'dbs_date' => 'nullable|date',
        ]);

        $onboarding->update($validated);

        return redirect()->route('onboarding.index')->with('success', 'Onboarding record updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
