<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branchs = Branch::orderBy('created_at','desc')->get();
        return view('admin.pages.branch.index',compact('branchs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.pages.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    // 1. Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'number' => 'required|string|max:50',
        'manager_name' => 'required|string|max:255',
        'address' => 'required|string|max:500',
    ]);

    // 2. Create Branch
    $branch = new Branch();
    $branch->name = $request->name;
    $branch->number = $request->number;
    $branch->manager_name = $request->manager_name;
    $branch->address = $request->address;
    $branch->save();

    // 3. Redirect with success message
    return redirect()->route('branch.index')->with('success', 'Branch created successfully!');
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
        $branch = Branch::findOrFail($id);
        return view('admin.pages.branch.edit',compact('branch'));

    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    // 1. Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'number' => 'required|string|max:50',
        'manager_name' => 'required|string|max:255',
        'address' => 'required|string|max:500',
    ]);

    // 2. Find branch
    $branch = Branch::findOrFail($id);

    // 3. Update values
    $branch->name = $request->name;
    $branch->number = $request->number;
    $branch->manager_name = $request->manager_name;
    $branch->address = $request->address;
    $branch->save();

    // 4. Redirect with success message
    return redirect()->route('branch.index')->with('success', 'Branch updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return redirect()->route('branch.index')->with('success', 'Branch deleted!!!...');
    }
}
