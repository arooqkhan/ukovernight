@extends('admin.master.main')
@section('content')

<div class="content">
    @if ($errors->any())
    <ul class="alert alert-warning">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Role</a></li>
            <li class="breadcrumb-item active">Form</li>
        </ol>
    </nav>
   <div class="card">
    <div class="card-header">
        <h4>Create Role
            <a href="{{ url('roles') }}" class="btn btn-secondary float-end">Back</a>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{ url('roles') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Write Name here..." />
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-secondary">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection