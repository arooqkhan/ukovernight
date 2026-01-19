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

    .input-icon-wrapper .form-control,
    .input-icon-wrapper .form-select {
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
</style>

<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-file-alt"></i>
            Edit Document
        </h3>
        <a href="javascript:history.back()" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
            </div>

    <div class="form-card">
            <form action="{{ route('document.update', $document->id) }}" method="POST" id="documentForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputName"><i class="fas fa-file-signature me-2"></i>Document Name</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-file-signature"></i>
                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter Document Name" value="{{ old('name', $document->name) }}" maxlength="255" required>
                        </div>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        </div>
                    </div>
                </div>

                @if(auth()->user()->role == 'admin' || auth()->user()->role == 'HR' || auth()->user()->role == 'Accountant')
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputEmployee"><i class="fas fa-user me-2"></i>Select Employee</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user"></i>
                            <select class="form-control form-select" id="inputEmployee" name="employee_id">
                                <option value="" disabled {{ old('employee_id', $document->employee_id) ? '' : 'selected' }}>Select Employee</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}" {{ old('employee_id', $document->employee_id) == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->first_name }} {{ $employee->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('employee_id'))
                        <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                        @endif
                        </div>
                    </div>
                </div>
                @endif

                <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputDocument"><i class="fas fa-file-upload me-2"></i>Document File</label>
                        <div class="file-input-wrapper">
                            <input type="file" class="form-control" id="inputDocument" name="document" accept=".pdf,.doc,.docx,.xls,.xlsx">
                        </div>
                            <div id="documentPreview" class="mt-2">
                                @if($document->document)
                                    <div>
                                        <strong>Current Document:</strong><br>
                                        @if(strpos($document->document, '.pdf') !== false)
                                        <a href="{{ asset($document->document) }}" target="_blank" class="btn btn-info" style="margin-top: 10px;">View PDF</a>
                                        @else
                                        <a href="{{ asset($document->document) }}" download class="btn btn-info" style="margin-top: 10px;">Download</a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @if ($errors->has('document'))
                        <span class="text-danger">{{ $errors->first('document') }}</span>
                        @endif
                        </div>
                    </div>
                </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Update
                </button>
                <a href="javascript:history.back()" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
                </div>
            </form>
    </div>
</div>

<script>
    document.getElementById('inputDocument').addEventListener('change', function(event) {
        var documentPreview = document.getElementById('documentPreview');
        documentPreview.innerHTML = ''; // Clear any existing preview

        var files = event.target.files;
        if (files && files[0]) {
            var file = files[0];
            var fileType = file.type;
            var fileName = file.name;
            var fileURL = URL.createObjectURL(file);

            var preview = document.createElement('div');
            preview.innerHTML = `<strong>Selected File:</strong> ${fileName}<br>`;

            // For PDF files, provide a link to view the file
            if (fileType === 'application/pdf') {
                preview.innerHTML += `<a href="${fileURL}" target="_blank" class="btn btn-info" style="margin-top: 10px;">View PDF</a>`;
            } else {
                // For other document types, provide a link to download the file
                preview.innerHTML += `<a href="${fileURL}" download="${fileName}" class="btn btn-info" style="margin-top: 10px;">Download ${fileName}</a>`;
            }

            documentPreview.appendChild(preview);
        }
    });
</script>

@endsection
