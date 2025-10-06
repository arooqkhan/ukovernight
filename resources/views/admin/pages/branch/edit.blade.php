@extends('admin.master.main')

@section('content')

<div class="row">
    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
        <div class="statbox widget box box-shadow">

            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h3>Edit Branch</h3>
                </div>
            </div>

          <form action="{{ route('branch.update', $branch->id) }}" method="POST" id="branchEditForm">
    @csrf
    @method('PUT') <!-- Update ke liye -->

    <div class="row mb-4">
        <!-- Branch Name -->
        <div class="col-md-6">
            <label for="branchName">Branch Name</label>
            <input type="text" class="form-control" id="branchName" name="name"
                   value="{{ old('name', $branch->name) }}" required>
        </div>

        <!-- Manager Name -->
        <div class="col-md-6">
            <label for="managerName">Manager Name</label>
            <input type="text" class="form-control" id="managerName" name="manager_name"
                   value="{{ old('manager_name', $branch->manager_name) }}" required>
        </div>
    </div>

    <div class="row mb-4">
        <!-- Branch Number -->
        <div class="col-md-6">
            <label for="branchNumber">Number</label>
            <input type="text" class="form-control" id="branchNumber" name="number"
                   value="{{ old('number', $branch->number) }}" required>
        </div>

         </div>

           <div class="row mb-4">

        <!-- Branch Address -->
        <div class="col-md-12">
            <label for="branchAddress">Address</label>
            <textarea class="form-control" id="branchAddress" name="address" rows="3" required>{{ old('address', $branch->address) }}</textarea>
        </div>
        </div>
    

    <!-- Submit & Back -->
    <div class="row mb-4">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('branch.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

</form>

        </div>
    </div>
</div>



@endsection
