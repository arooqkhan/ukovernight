@extends('admin.master.main')

@section('content')

@include('admin.pages.partials.form-styles')

<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-building"></i>
            Edit Branch
        </h3>
        <a href="{{ route('branch.index') }}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
            </div>

    <div class="form-card">
          <form action="{{ route('branch.update', $branch->id) }}" method="POST" id="branchEditForm">
    @csrf
            @method('PUT')

            <div class="row">
        <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="branchName"><i class="fas fa-building me-2"></i>Branch Name</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-building"></i>
                            <input type="text" class="form-control" id="branchName" name="name" placeholder="Enter Branch Name" value="{{ old('name', $branch->name) }}" maxlength="255" required>
        </div>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
        </div>
    </div>

        <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="managerName"><i class="fas fa-user-tie me-2"></i>Manager Name</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user-tie"></i>
                            <input type="text" class="form-control" id="managerName" name="manager_name" placeholder="Enter Manager Name" value="{{ old('manager_name', $branch->manager_name) }}" maxlength="255" required>
        </div>
                        @if ($errors->has('manager_name'))
                        <span class="text-danger">{{ $errors->first('manager_name') }}</span>
                        @endif
         </div>
        </div>
        </div>
    
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="branchNumber"><i class="fas fa-phone me-2"></i>Number</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-phone"></i>
                            <input type="text" class="form-control" id="branchNumber" name="number" placeholder="Enter Branch Number" value="{{ old('number', $branch->number) }}" maxlength="50" required>
                        </div>
                        @if ($errors->has('number'))
                        <span class="text-danger">{{ $errors->first('number') }}</span>
                        @endif
                    </div>
        </div>
    </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="branchAddress"><i class="fas fa-map-marker-alt me-2"></i>Address</label>
                        <textarea class="form-control" id="branchAddress" name="address" rows="3" placeholder="Enter Branch Address" maxlength="500" required style="padding-left: 16px;">{{ old('address', $branch->address) }}</textarea>
                        @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
        </div>
    </div>
</div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Update
                </button>
                <a href="{{ route('branch.index') }}" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
