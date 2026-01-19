@extends('admin.master.main')

@section('content')

@include('admin.pages.partials.form-styles')

<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-bullhorn"></i>
            Add Announcement
        </h3>
        <a href="{{ route('announcements.index') }}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
            </div>

    <div class="form-card">
            <form action="{{ route('announcements.store') }}" method="POST" id="announcementForm">
                @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputTitle"><i class="fas fa-heading me-2"></i>Title</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-heading"></i>
                            <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Enter Announcement Title" value="{{ old('title') }}" required>
                    </div>
                        @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="inputDate"><i class="fas fa-calendar me-2"></i>Date</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-calendar"></i>
                            <input type="date" class="form-control" id="inputDate" name="date" value="{{ old('date') ? old('date') : date('Y-m-d') }}" required>
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
                        <label for="inputMessage"><i class="fas fa-comment-alt me-2"></i>Message</label>
                        <textarea class="form-control" id="inputMessage" name="message" rows="4" placeholder="Enter Announcement Message" required style="padding-left: 16px;">{{ old('message') }}</textarea>
                        @if ($errors->has('message'))
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Submit
                </button>
                <a href="{{ route('announcements.index') }}" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
            </form>
        </div>
    </div>

@endsection
