@extends('admin.master.main')

@section('content')

@if(session('success'))
<meta name="flash-success" content="{{ session('success') }}">
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

@php
    $user = Auth::user();
    $employee = $user->employee ?? null;
@endphp

<style>
    .profile-page-wrapper {
        min-height: 100vh;
        background: #ffffff;
        padding: 0;
        margin: 0;
    }
    
    .profile-header-banner {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        height: 200px;
        position: relative;
        overflow: hidden;
    }
    
    .profile-header-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }
    
    .profile-content-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 24px 40px;
        position: relative;
        margin-top: -80px;
    }
    
    .profile-name-section {
        text-align: center;
        margin-bottom: 32px;
        position: relative;
        z-index: 2;
    }
    
    .profile-name-section h1 {
        color: #0f172a;
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0 0 8px 0;
        text-shadow: none;
        letter-spacing: -0.5px;
    }
    
    .profile-name-section .user-role {
        color: #64748b;
        font-size: 1.1rem;
        font-weight: 500;
        margin: 0;
    }
    
    .profile-image-container {
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
    }
    
    .profile-image-container img {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        border: 6px solid #ffffff;
        object-fit: cover;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
        background: #f8fafc;
    }
    
    .profile-image-placeholder {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        border: 6px solid #ffffff;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    }
    
    .profile-image-placeholder i {
        color: #ffffff;
        font-size: 4rem;
    }
    
    .profile-tabs {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-bottom: 32px;
        border-bottom: 2px solid #e5e7eb;
        padding-bottom: 0;
        position: relative;
    }
    
    .profile-tab {
        padding: 16px 32px;
        background: transparent;
        border: none;
        color: #94a3b8;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        position: relative;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    
    
    .profile-tab.active {
        color: #60a5fa;
    }
    
    .profile-tab.active::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        right: 0;
        height: 3px;
        background: #60a5fa;
        border-radius: 2px 2px 0 0;
    }
    
    .tab-actions {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        gap: 16px;
    }
    
    .tab-action-btn {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        color: #0f172a;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .tab-action-btn:hover {
        background: #f1f5f9;
        transform: translateY(-2px);
    }
    
    .tab-content {
        display: none;
    }
    
    .tab-content.active {
        display: block;
    }
    
    .profile-main-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 32px;
        margin-top: 32px;
    }
    
    .profile-info-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 32px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }
    
    .profile-info-card h3 {
        color: #0f172a;
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0 0 24px 0;
        padding-bottom: 16px;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .info-row {
        display: grid;
        grid-template-columns: 200px 1fr;
        gap: 16px;
        padding: 16px 0;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .info-row:last-child {
        border-bottom: none;
    }
    
    .info-label {
        color: #64748b;
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .info-value {
        color: #0f172a;
        font-size: 0.95rem;
        font-weight: 500;
    }
    
    .info-value.empty {
        color: #94a3b8;
        font-style: italic;
    }
    
    .edit-icon {
        color: #60a5fa;
        cursor: pointer;
        margin-left: 8px;
        font-size: 0.9rem;
    }
    
    .upload-documents-section {
        background: #ffffff;
        border-radius: 16px;
        padding: 32px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }
    
    .upload-documents-section h3 {
        color: #0f172a;
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0 0 24px 0;
        padding-bottom: 16px;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .document-list {
        margin-bottom: 24px;
    }
    
    .document-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 16px;
        background: #f8fafc;
        border-radius: 8px;
        margin-bottom: 8px;
        border: 1px solid #e5e7eb;
    }
    
    .document-item span {
        color: #0f172a;
        font-size: 0.9rem;
    }
    
    .document-delete {
        color: #ef4444;
        cursor: pointer;
        font-size: 1rem;
        transition: all 0.2s ease;
    }
    
    .document-delete:hover {
        color: #dc2626;
        transform: scale(1.1);
    }
    
    .upload-btn {
        width: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #ffffff;
        border: none;
        border-radius: 12px;
        padding: 16px 24px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }
    
    .upload-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }
    
    .form-section {
        background: #ffffff;
        border-radius: 16px;
        padding: 32px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }
    
    .form-group {
        margin-bottom: 24px;
    }
    
    .form-label {
        display: block;
        color: #94a3b8;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-input {
        width: 100%;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 12px 16px;
        color: #0f172a;
        font-size: 0.95rem;
        transition: all 0.2s ease;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .form-input::placeholder {
        color: #9ca3af;
    }
    
    .file-input-wrapper {
        position: relative;
    }
    
    .file-input-custom {
        width: 100%;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 12px 16px;
        color: #0f172a;
        font-size: 0.95rem;
        cursor: pointer;
    }
    
    .file-hint {
        color: #64748b;
        font-size: 0.8rem;
        margin-top: 8px;
        display: block;
    }
    
    .password-hint {
        color: #64748b;
        font-size: 0.8rem;
        margin-top: 6px;
        display: block;
    }
    
    .btn-submit {
        width: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #ffffff;
        border: none;
        border-radius: 12px;
        padding: 14px 24px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }
    
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }
    
    .alert-danger-custom {
        background: #7f1d1d;
        border: 1px solid #991b1b;
        border-radius: 8px;
        padding: 16px 20px;
        margin-bottom: 24px;
    }
    
    .alert-danger-custom ul {
        margin: 0;
        padding-left: 20px;
        color: #fca5a5;
    }
    
    .alert-danger-custom li {
        margin-bottom: 6px;
        font-size: 0.9rem;
    }
    
    @media (max-width: 992px) {
        .profile-main-content {
            grid-template-columns: 1fr;
        }
    }
    
    @media (max-width: 768px) {
        .profile-name-section h1 {
            font-size: 2rem;
        }
        
        .profile-tabs {
            flex-wrap: wrap;
        }
        
        .tab-actions {
            position: static;
            transform: none;
            margin-top: 16px;
            justify-content: center;
        }
        
        .info-row {
            grid-template-columns: 1fr;
            gap: 8px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successMsg = document.querySelector('meta[name="flash-success"]');
        
        if (successMsg) {
            Swal.fire({
                position: 'bottom-end',
                icon: 'success',
                title: successMsg.getAttribute('content'),
                showConfirmButton: false,
                timer: 3000,
                toast: true,
                background: '#10b981',
                color: '#ffffff',
            });
        }
        
        // Tab switching
        const tabs = document.querySelectorAll('.profile-tab');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const targetTab = this.getAttribute('data-tab');
                
                // Remove active class from all tabs and contents
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(tc => tc.classList.remove('active'));
                
                // Add active class to clicked tab and corresponding content
                this.classList.add('active');
                document.getElementById(targetTab).classList.add('active');
            });
        });
        
        // Image preview
        const imageInput = document.getElementById('image');
        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.querySelector('.profile-image-container img');
                        if (img) {
                            img.src = e.target.result;
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>

<div class="profile-page-wrapper">
    <!-- Header Banner -->
    <div class="profile-header-banner"></div>
    
    <!-- Profile Content -->
    <div class="profile-content-container">
        <!-- Profile Name and Image -->
        <div class="profile-name-section">
            <div class="profile-image-container">
                @if($user->image && file_exists(public_path($user->image)))
                    <img src="{{ asset($user->image) }}" alt="{{ $user->name }}" id="profileImagePreview">
                @else
                    <div class="profile-image-placeholder">
                        <i class="fas fa-user"></i>
                    </div>
                @endif
            </div>
            <h1>{{ $user->name }}</h1>
            <p class="user-role">
                @if($user->role == 0)
                    HR
                @elseif($user->role == 'admin')
                    Admin
                @else
                    {{ ucfirst($user->role) }}
                @endif
            </p>
        </div>
        
        <!-- Tabs Navigation -->
        <div class="profile-tabs">
            <button class="profile-tab active" data-tab="updateProfile">Update Profile</button>
            <button class="profile-tab" data-tab="updatePassword">Update Password</button>
            <div class="tab-actions">
                <!-- <div class="tab-action-btn" title="Settings">
                    <i class="fas fa-cog"></i>
                </div> -->
                <div class="tab-action-btn" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i>
                </div>
            </div>
        </div>
        
        <!-- Update Profile Tab Content -->
        <div id="updateProfile" class="tab-content active">
            <div class="profile-main-content">
                <!-- Left Column - Upload Documents -->
                <div class="upload-documents-section">
                    <h3>Uploaded Documents</h3>
                    <div class="document-list">
                        @if($employee && $employee->documents && $employee->documents->count() > 0)
                            @foreach($employee->documents->take(5) as $doc)
                                <div class="document-item">
                                    <span>{{ $doc->title ?? 'Document' }}</span>
                                    <i class="fas fa-times document-delete"></i>
                                </div>
                            @endforeach
                        @else
                            <p style="color: #64748b; font-size: 0.9rem; margin: 0;">No documents uploaded</p>
                        @endif
                    </div>
                    <button class="upload-btn" onclick="document.getElementById('documentUpload').click()">
                        <i class="fas fa-cloud-upload-alt"></i>
                        Upload Now
                    </button>
                    <input type="file" id="documentUpload" style="display: none;" multiple>
                </div>
                
                <!-- Right Column - Profile Information -->
                <div class="profile-info-card">
                    <h3>Profile Information</h3>
                    
                    <div class="info-row">
                        <div class="info-label">Employee ID</div>
                        <div class="info-value">{{ $user->employee_id ?? ($employee->employee_id ?? 'N/A') }}</div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">Email</div>
                        <div class="info-value">
                            {{ $user->email }}
                            <i class="fas fa-pencil-alt edit-icon"></i>
                        </div>
                    </div>
                    
                    @if($employee)
                        <div class="info-row">
                            <div class="info-label">Phone</div>
                            <div class="info-value">{{ $employee->number ?? 'N/A' }}</div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">Date of Birth</div>
                            <div class="info-value">{{ $employee->dob ? date('Y-m-d', strtotime($employee->dob)) : 'N/A' }}</div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">Gender</div>
                            <div class="info-value">{{ $employee->gender ?? 'N/A' }}</div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">Department</div>
                            <div class="info-value">{{ $employee->department ?? 'N/A' }}</div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">Designation</div>
                            <div class="info-value">{{ $employee->designation ?? 'N/A' }}</div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">Joining Date</div>
                            <div class="info-value">{{ $employee->joining_date ? date('Y-m-d', strtotime($employee->joining_date)) : 'N/A' }}</div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">Address</div>
                            <div class="info-value">{{ $employee->address ?? 'N/A' }}</div>
                        </div>
                        
                        <div class="info-row">
                            <div class="info-label">NI Number</div>
                            <div class="info-value">{{ $employee->ninumber ?? 'N/A' }}</div>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Update Profile Form -->
            <div class="form-section" style="margin-top: 32px;">
                <h3 style="color: #0f172a; font-size: 1.25rem; font-weight: 700; margin: 0 0 24px 0; padding-bottom: 16px; border-bottom: 1px solid #e5e7eb;">Edit Profile</h3>
                
                @if($errors->any())
                <div class="alert-danger-custom">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li><i class="fas fa-exclamation-circle"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form action="{{ route('profiles.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" id="name" name="name" 
                                    value="{{ $user->name }}" required
                                    placeholder="Enter your full name"
                                    class="form-input">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email" 
                                    value="{{ $user->email }}" required
                                    placeholder="Enter your email address"
                                    class="form-input">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="image" class="form-label">Profile Picture</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="image" name="image" 
                                accept="image/jpeg,image/png,image/gif,image/jpg"
                                class="file-input-custom">
                        </div>
                        <span class="file-hint">
                            <i class="fas fa-info-circle"></i> Accepted formats: JPG, PNG, GIF (Max: 2MB)
                        </span>
                    </div>
                    
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save me-2"></i>Update Profile
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Update Password Tab Content -->
        <div id="updatePassword" class="tab-content">
            <div class="form-section">
                <h3 style="color: #0f172a; font-size: 1.25rem; font-weight: 700; margin: 0 0 24px 0; padding-bottom: 16px; border-bottom: 1px solid #e5e7eb;">Change Password</h3>
                
                <form action="{{ route('adminprofilepass') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" id="current_password" name="current_password" required
                            placeholder="Enter your current password"
                            class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" id="new_password" name="new_password" required
                            placeholder="Enter your new password"
                            class="form-input">
                        <span class="password-hint">
                            <i class="fas fa-shield-alt"></i> Minimum 8 characters required
                        </span>
                    </div>
                    
                    <div class="form-group">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" required
                            placeholder="Confirm your new password"
                            class="form-input">
                    </div>
                    
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-key me-2"></i>Update Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@endsection
