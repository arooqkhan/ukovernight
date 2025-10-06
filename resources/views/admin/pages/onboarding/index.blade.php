@extends('admin.master.main')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<style>
    /* Modal Custom Styles */
    .modal-content {
        background-color: #f8f9fa;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        background-color: #343a40;
        color: white;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        padding: 20px;
        position: relative;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .close {
        color: white;
        font-size: 1.5rem;
        position: absolute;
        right: 20px;
        top: 15px;
    }

    .modal-body {
        padding: 30px;
        font-size: 1rem;
        color: #343a40;
    }

    #documentFile {
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 10px;
    }

    .modal-footer {
        background-color: #f8f9fa;
        padding: 20px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        text-align: right;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<div class="col-lg-12">
    <h4 class="ml-2">Employees Record</h4>
    <div class="statbox widget box box-shadow">
        @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                    background: '#28a745',
                    customClass: {
                        popup: 'small-swal-popup'
                    }
                });
            });
        </script>
        @endif

        @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'error',
                    title: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                    background: '#dc3545',
                    customClass: {
                        popup: 'small-swal-popup'
                    }
                });
            });
        </script>
        @endif
        <div class="widget-content widget-content-area">

        <table id="style-2" class="table style-2 dt-table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>
                @if($employee->image)
                    <img src="{{ asset($employee->image) }}" class="rounded-circle profile-img" style="width:50px;height:50px;margin-right:10px;">
                @else
                    <img src="{{ asset('images/dummy.jpg') }}" class="rounded-circle profile-img" style="width:50px;height:50px;margin-right:10px;">
                @endif
                {{ $employee->first_name }} {{ $employee->last_name }}
            </td>
            <td class="text-center">
                <a href="{{ route('onboarding.edit', $employee->id) }}" class="btn btn-primary btn-sm">
                    Edit
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>
</div>



@endsection