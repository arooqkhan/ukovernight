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

    .file-input-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .file-input-wrapper input[type="file"] {
        padding: 12px;
        border: 2px dashed #cbd5e1;
        border-radius: 10px;
        background: #f8fafc;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-input-wrapper input[type="file"]:hover {
        border-color: #667eea;
        background: #f1f5f9;
    }

    #imagePreview img {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border: 2px solid #e5e7eb;
        max-width: 200px;
        margin-top: 15px;
    }
</style>

<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-money-bill-wave"></i>
            Edit Expense
        </h3>
        <a href="{{ route('expenses.index') }}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
            </div>

    <div class="form-card">
            <form action="{{ route('expenses.update', $expense->id) }}" method="POST" id="expenseForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputName"><i class="fas fa-tag me-2"></i>Expense Name</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-tag"></i>
                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Expense Name" value="{{ old('name', $expense->name) }}" maxlength="255" required>
                        </div>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputPrice"><i class="fas fa-pound-sign me-2"></i>Price</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-pound-sign"></i>
                            <input type="number" step="0.01" class="form-control" id="inputPrice" name="price" placeholder="Enter Price" value="{{ old('price', $expense->price) }}" min="0" max="99999999" required>
                        </div>
                        @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputDate"><i class="fas fa-calendar me-2"></i>Date</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-calendar"></i>
                            <input type="date" class="form-control" id="inputDate" name="date" value="{{ old('date', $expense->date) }}" max="{{ date('Y-m-d') }}" required>
                        </div>
                        @if ($errors->has('date'))
                        <span class="text-danger">{{ $errors->first('date') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputImage"><i class="fas fa-image me-2"></i>Image</label>
                        <div class="file-input-wrapper">
                        <input type="file" class="form-control" id="inputImage" name="image" accept="image/*">
                        </div>
                        <div id="imagePreview" class="mt-2">
                            @if($expense->image)
                                <img src="{{ asset($expense->image) }}" alt="Current Image" style="border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); border: 2px solid #e5e7eb; max-width: 200px; margin-top: 15px;">
                            @endif
                        </div>
                        @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Update
                </button>
                <a href="{{ route('expenses.index') }}" class="btn btn-back">
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
            img.style.maxWidth = '200px';
            img.style.height = 'auto';
            img.style.borderRadius = '12px';
            img.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
            img.style.border = '2px solid #e5e7eb';
            img.style.marginTop = '15px';
            img.alt = 'Preview';
            imagePreview.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
});
</script>

@endsection
