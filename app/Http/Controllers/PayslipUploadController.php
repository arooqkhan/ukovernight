<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Document;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\PayslipUpload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PayslipUploadController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view payslipupload', ['only' => ['index']]);
        $this->middleware('permission:create payslipupload', ['only' => ['create','store']]);
        $this->middleware('permission:delete payslipupload', ['only' => ['destroy']]);
        $this->middleware('permission:unassignPage payslipupload', ['only' => ['unassignPage']]);
        $this->middleware('permission:remove payslipupload', ['only' => ['remove']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the logged-in user
        $loggedInUser = auth()->user();
    
        // Log user information for debugging
        \Log::info('Logged-in User:', [
            'id' => $loggedInUser->id,
            'role' => $loggedInUser->role,
            'employee_id' => $loggedInUser->employee_id, // Log employee ID for clarity
        ]);
    
        // Fetch all payslip uploads
        $payslipUploads = PayslipUpload::all();
    
        // Initialize arrays to hold employee data
        $employeesData = [];
        $assignedEmployeeIds = [];
    
        foreach ($payslipUploads as $payslipUpload) {
            // Decode the JSON data in the 'pdfs' column
            $pdfPaths = json_decode($payslipUpload->pdfs, true);
    
            // Iterate over each PDF path
            foreach ($pdfPaths as $pdfPath) {
                // Extract filename from the path (e.g., 'EMP01.pdf')
                $filename = basename($pdfPath);
                $employeeId = pathinfo($filename, PATHINFO_FILENAME); // Extract 'EMP01' from 'EMP01.pdf'
    
                // Fetch employee details based on employee_id
                $employee = Employee::where('employee_id', $employeeId)->first();
    
                if ($employee) {
                    // Check if the logged-in user is an admin, HR, or Accountant
                    if (in_array($loggedInUser->role, ['admin', 'HR', 'Accountant'])) {
                        // Admin, HR, Accountant: show all payslip uploads
                        $employeesData[] = [
                            'payslip_upload_id' => $payslipUpload->id,
                            'first_name' => $employee->first_name,
                            'last_name' => $employee->last_name,
                            'pdf' => $pdfPath,
                        ];
                    } else {
                        // Regular employees: show only their own payslip uploads
                        if ($employee->id == $loggedInUser->employee_id) {
                            $employeesData[] = [
                                'payslip_upload_id' => $payslipUpload->id,
                                'first_name' => $employee->first_name,
                                'last_name' => $employee->last_name,
                                'pdf' => $pdfPath,
                            ];
                        }
                    }
                    $assignedEmployeeIds[] = $employee->id; // Collect assigned employee IDs
                }
            }
        }
    
        // Log the collected assigned employee IDs for debugging
        \Log::info('Assigned Employee IDs:', $assignedEmployeeIds);
    
        // Fetch unassigned employees only for admin, HR, Accountant
        if (in_array($loggedInUser->role, ['admin', 'HR', 'Accountant'])) {
            $unassignedEmployees = Employee::whereNotIn('id', $assignedEmployeeIds)->get();
        } else {
            // Regular employees: fetch only their own record
            $unassignedEmployees = Employee::where('id', $loggedInUser->employee_id)->get();
        }
    
        // Check the count of unassigned employees and log it
        $unassignedCount = $unassignedEmployees->count();
        \Log::info('Count of Unassigned Employees:', ['count' => $unassignedCount]);
    
        // Convert the collection to an array for logging
        $unassignedEmployeesArray = $unassignedEmployees->toArray();
        \Log::info('Unassigned Employees:', $unassignedEmployeesArray);
    
        // Pass the data to the view
        return view('admin.pages.payslipupload.index', compact('employeesData', 'unassignedEmployees'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.payslipupload.create');
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the uploaded files and the month field
        $request->validate([
            'month' => 'required|string', // Validate that month is required
            'pdfs' => 'required|array', // Ensure 'pdfs' is an array
            'pdfs.*' => 'mimes:pdf|max:2048', // Validate each file as PDF and max 2MB
        ], [
            'month.required' => 'Please select a month.',
            'pdfs.required' => 'Please upload at least one PDF.',
            'pdfs.*.mimes' => 'Only PDF files are allowed.',
            'pdfs.*.max' => 'Each PDF must not exceed 2MB.',
        ]);
    
        $pdfPaths = [];
    
        // Check if there are files uploaded
        if ($request->hasFile('pdfs')) {
            foreach ($request->file('pdfs') as $file) {
                // Generate a unique filename
                $filename = $file->getClientOriginalName();
    
                // Move the file to the 'public/pdfs' directory
                $destinationPath = public_path('pdfs');
                $file->move($destinationPath, $filename);
    
                // Store the public file path
                $pdfPaths[] = 'pdfs/' . $filename; 
            }
        }
    
        // Save the file paths and month to the database
        PayslipUpload::create([
            'month' => $request->input('month'), // Store the selected month
            'pdfs' => json_encode($pdfPaths), // Convert array of file paths to JSON
        ]);
    
        // Redirect back with a success message
        return redirect()->route('payslipupload.index')->with('success', 'PDF(s) uploaded successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy($id)
{
    // Find the PayslipUpload record by ID
    $payslipUpload = PayslipUpload::findOrFail($id);
    
    // Decode the JSON data into an array
    $pdfPaths = json_decode($payslipUpload->pdfs, true);
    
    // Assuming the request contains the PDF path to delete
    $pdfToDelete = request()->input('pdf'); // This should be passed as part of the request
    
    // Check if the PDF exists in the array and remove it
    if (($key = array_search($pdfToDelete, $pdfPaths)) !== false) {
        unset($pdfPaths[$key]);
    }

    // Re-index the array to prevent gaps
    $pdfPaths = array_values($pdfPaths);

    // Check if the pdfs array is empty after deletion
    if (empty($pdfPaths)) {
        $payslipUpload->deleted_at = now(); // Mark as deleted
        $payslipUpload->pdfs = null; // Optionally, you can set pdfs to null as well
    } else {
        $payslipUpload->deleted_at = null; // Clear deleted_at if PDFs still exist
    }

    // Update the pdfs field with the new JSON data
    $payslipUpload->pdfs = json_encode($pdfPaths);
    
    // Save the changes
    $payslipUpload->save();

    // Redirect back with a success message
    return redirect()->route('payslipupload.index')->with('success', 'PDF removed successfully!');
}

   
    



// public function unassignPage()
// {
    
//     // Fetch all employee IDs from the employees table
//     $employeeIds = Employee::pluck('employee_id')->toArray();

//     // Fetch all payslip uploads
//     $payslipUploads = PayslipUpload::all();

//     // Initialize an array to hold all PDFs and assigned employee IDs
//     $allPdfs = [];
//     $assignedEmployeeIds = [];

//     foreach ($payslipUploads as $payslipUpload) {
//         // Decode the JSON data in the 'pdfs' column
//         $pdfPaths = json_decode($payslipUpload->pdfs, true);

//         // Check if $pdfPaths is an array
//         if (is_array($pdfPaths)) {
//             // Add all PDFs to the allPdfs array
//             $allPdfs = array_merge($allPdfs, $pdfPaths);

//             // Extract employee IDs from PDFs
//             foreach ($pdfPaths as $pdfPath) {
//                 $filename = basename($pdfPath);
//                 $employeeIdWithExtension = pathinfo($filename, PATHINFO_FILENAME); // Extract 'EMP01' from 'EMP01.pdf'
//                 $assignedEmployeeIds[] = $employeeIdWithExtension;
//             }
//         }
//     }

//     // Remove duplicates just in case
//     $assignedEmployeeIds = array_unique($assignedEmployeeIds);

//     // Filter out PDFs that are not assigned to existing employees
//     $unassignedPdfs = array_filter($allPdfs, function ($pdfPath) use ($employeeIds) {
//         $filename = basename($pdfPath);
//         $employeeIdWithExtension = pathinfo($filename, PATHINFO_FILENAME);
//         return !in_array($employeeIdWithExtension, $employeeIds);
//     });

//     // Fetch all employees and filter out those who have not been assigned any PDFs
//     $unassignedEmployees = Employee::whereNotIn('employee_id', $assignedEmployeeIds)->get();

//     // Prepare data for the view
//     $unassignedPdfsByEmployee = [];

//     foreach ($unassignedEmployees as $employee) {
//         // Only include unassigned PDFs for each employee
//         $unassignedPdfsByEmployee[$employee->employee_id] = $unassignedPdfs;
//     }

//     // Pass both unassigned employees and unassigned PDFs to the view
//     return view('admin.pages.payslipupload.unassign', compact('unassignedEmployees', 'unassignedPdfsByEmployee'));
// }



public function unassignPage(Request $request)
{
    // Selected month (for filtering employees)
    $selectedMonth = $request->get('month', Carbon::now()->month);

    // Month names for dropdown
    $months = [
        1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
        5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
        9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
    ];

    $allEmployees = Employee::all();

    // 1️⃣ Get employees assigned in the selected month
    $payslipUploadsForMonth = PayslipUpload::where('month', $selectedMonth)->get();
    $assignedEmployeeIds = [];

    foreach ($payslipUploadsForMonth as $upload) {
        $pdfs = json_decode($upload->pdfs, true);
        if (is_array($pdfs)) {
            foreach ($pdfs as $pdf) {
                $fileName = basename($pdf);
                foreach ($allEmployees as $employee) {
                    if (str_contains($fileName, $employee->employee_id)) {
                        $assignedEmployeeIds[] = $employee->employee_id;
                        break;
                    }
                }
            }
        }
    }

    $assignedEmployeeIds = array_unique($assignedEmployeeIds);

    // Employees who do NOT have payslip in the selected month
    $unassignedEmployees = $allEmployees->filter(function ($employee) use ($assignedEmployeeIds) {
        return !in_array($employee->employee_id, $assignedEmployeeIds);
    });

    // 2️⃣ Get all PDFs from all months (for dropdown)
    $allPayslipUploads = PayslipUpload::all();
    $allPdfs = [];
    foreach ($allPayslipUploads as $upload) {
        $pdfs = json_decode($upload->pdfs, true);
        if (is_array($pdfs)) {
            $allPdfs = array_merge($allPdfs, $pdfs);
        }
    }

    // Filter PDFs that are truly unassigned (not linked to any employee)
    $unassignedPdfs = array_filter($allPdfs, function ($pdf) use ($allEmployees) {
        $fileName = basename($pdf);
        foreach ($allEmployees as $employee) {
            if (str_contains($fileName, $employee->employee_id)) {
                return false;
            }
        }
        return true;
    });

    // Map **all unassigned PDFs** to every employee in the current view
    $unassignedPdfsByEmployee = [];
    foreach ($unassignedEmployees as $employee) {
        $unassignedPdfsByEmployee[$employee->employee_id] = $unassignedPdfs;
    }

    return view('admin.pages.payslipupload.unassign', [
        'months' => $months,
        'selectedMonth' => $selectedMonth,
        'unassignedEmployees' => $unassignedEmployees,
        'unassignedPdfsByEmployee' => $unassignedPdfsByEmployee,
    ]);
}






public function remove(Request $request)
{
    $employeeId = $request->input('employee_id');
    $pdfName = $request->input('pdf');
    $month = $request->input('month'); // selected month from dropdown

    $pdfPath = "pdfs/$pdfName";
    $formattedPdfPath = "pdfs/{$employeeId}.pdf";

    // ✅ Find PDF in ANY month (no restriction)
    $payslipUpload = PayslipUpload::all()->filter(function($payslipUpload) use ($pdfPath) {
        $pdfPaths = json_decode($payslipUpload->pdfs, true);
        return is_array($pdfPaths) && in_array($pdfPath, $pdfPaths);
    })->first();

    if (!$payslipUpload) {
        return response()->json(['success' => false, 'message' => 'PDF not found in any payslip record.']);
    }

    // ✅ Decode and remove the PDF from old month
    $pdfPaths = json_decode($payslipUpload->pdfs, true);
    if (is_array($pdfPaths) && in_array($pdfPath, $pdfPaths)) {
        // Remove from old month’s list completely
        $updatedPdfPaths = array_values(array_filter($pdfPaths, function ($path) use ($pdfPath) {
            return $path !== $pdfPath;
        }));

        $payslipUpload->pdfs = json_encode($updatedPdfPaths);
        $payslipUpload->save();
    }

    // ✅ Move the actual file in public/pdfs/
    $oldFilePath = public_path($pdfPath);
    $newFilePath = public_path($formattedPdfPath);

    if (file_exists($oldFilePath)) {
        rename($oldFilePath, $newFilePath);
    } else {
        return response()->json(['success' => false, 'message' => 'PDF file not found in storage.']);
    }

    // ✅ Create or update payslip for the selected (target) month
    $targetMonthUpload = PayslipUpload::firstOrCreate(
        ['month' => $month],
        ['pdfs' => json_encode([])]
    );

    $monthPdfs = json_decode($targetMonthUpload->pdfs, true) ?? [];
    if (!in_array($formattedPdfPath, $monthPdfs)) {
        $monthPdfs[] = $formattedPdfPath;
        $targetMonthUpload->pdfs = json_encode($monthPdfs);
        $targetMonthUpload->save();
    }

    return response()->json([
        'success' => true,
        'message' => "PDF successfully moved to month: $month."
    ]);
}






}
