@extends('admin.master.main')

@section('content')

<style>
    .form-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 25px 30px;
        border-radius: 12px 12px 0 0;
        margin-bottom: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .form-header h3 {
        color: #ffffff;
        font-weight: 700;
        font-size: 1.5rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-header h3 i {
        font-size: 1.8rem;
    }

    .form-header .btn {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .form-header .btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
    }

    .form-card {
        background: #ffffff;
        border-radius: 0 0 12px 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 35px;
        border: 1px solid #e5e7eb;
    }

    .form-group-wrapper {
        position: relative;
        margin-bottom: 24px;
    }

    .form-group-wrapper label {
        font-weight: 600;
        color: #1e293b;
        font-size: 0.9rem;
        margin-bottom: 8px;
        display: block;
    }

    .form-group-wrapper .form-control,
    .form-group-wrapper .form-select {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #ffffff;
    }

    .form-group-wrapper .form-control:focus,
    .form-group-wrapper .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .form-group-wrapper .form-control::placeholder {
        color: #94a3b8;
    }

    .input-icon-wrapper {
        position: relative;
    }

    .input-icon-wrapper i {
        display: none;
    }

    .input-icon-wrapper .form-control {
        padding-left: 16px;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 35px;
        padding-top: 25px;
        border-top: 1px solid #e5e7eb;
    }

    .btn-submit {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: #ffffff;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-back {
        background: #f1f5f9;
        border: 1px solid #e5e7eb;
        color: #475569;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .text-danger {
        color: #ef4444;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    }
</style>

<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-building"></i>
            Add Branch
        </h3>
        <a href="{{ route('branch.index') }}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
            </div>

    <div class="form-card">
            <form action="{{ route('branch.store') }}" method="POST" id="branchForm" enctype="multipart/form-data">
                @csrf

            <div class="row">
                    <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="branchName"><i class="fas fa-building me-2"></i>Branch Name</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-building"></i>
                            <input type="text" class="form-control" id="branchName" name="name" placeholder="Enter Branch Name" value="{{ old('name') }}" maxlength="255" required>
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
                            <input type="text" class="form-control" id="managerName" name="manager_name" placeholder="Enter Manager Name" value="{{ old('manager_name') }}" maxlength="255" required>
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
                            <input type="text" class="form-control" id="branchNumber" name="number" placeholder="Enter Branch Number" value="{{ old('number') }}" maxlength="50" required>
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
                        <textarea class="form-control" id="branchAddress" name="address" rows="3" placeholder="Enter Branch Address" maxlength="500" required style="padding-left: 16px;">{{ old('address') }}</textarea>
                        @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Submit
                </button>
                <a href="{{ route('branch.index') }}" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
            </form>
    </div>
</div>


<script>
    document.getElementById('inputImage').addEventListener('change', function(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.innerHTML = ''; // Clear any existing preview

        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '10%'; // Ensure the image fits within the container
                img.style.height = 'auto'; // Maintain aspect ratio
                img.alt = 'Preview';
                imagePreview.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection