@extends('admin.master.main')

@section('content')

@include('admin.pages.partials.form-styles')

<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-file-alt"></i>
            Add Announcement Document
        </h3>
        <a href="{{ route('accouncementdocument.index') }}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
            </div>

    <div class="form-card">
            <form action="{{ route('accouncementdocument.store') }}" method="POST" id="expenseForm" enctype="multipart/form-data">
                @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputEmployee"><i class="fas fa-user me-2"></i>Select Employee</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user"></i>
                            <select class="form-control form-select" id="inputEmployee" name="employee_id" required>
                            <option value="" disabled selected>Select an Employee</option>
                            @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                        @if ($errors->has('employee_id'))
                        <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                        @endif
                </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputTitle"><i class="fas fa-heading me-2"></i>Title</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-heading"></i>
                            <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Enter Document Title" value="{{ old('title') }}" required>
                        </div>
                        @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputExpiry"><i class="fas fa-calendar-times me-2"></i>Expiry Date</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-calendar-times"></i>
                            <input type="date" class="form-control" id="inputExpiry" name="expiry_date" value="{{ old('expiry_date') }}" required>
                    </div>
                        @if ($errors->has('expiry_date'))
                        <span class="text-danger">{{ $errors->first('expiry_date') }}</span>
                        @endif
        </div>
    </div>
</div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Submit
                </button>
                <a href="{{ route('accouncementdocument.index') }}" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
