@extends('admin.master.main')

@section('content')

        @if(session('success'))
<meta name="flash-success" content="{{ session('success') }}">
@endif
@if(session('error'))
<meta name="flash-error" content="{{ session('error') }}">
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

        <script>
    // Flash messages using meta tags
            document.addEventListener('DOMContentLoaded', function() {
        const successMsg = document.querySelector('meta[name="flash-success"]');
        const errorMsg = document.querySelector('meta[name="flash-error"]');
        
        if (successMsg) {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'success',
                title: successMsg.getAttribute('content'),
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                    background: '#28a745',
                    customClass: {
                        popup: 'small-swal-popup'
                    }
                });
        }

        if (errorMsg) {
                Swal.fire({
                    position: 'bottom-end',
                    icon: 'error',
                title: errorMsg.getAttribute('content'),
                    showConfirmButton: false,
                    timer: 3000,
                    toast: true,
                    background: '#dc3545',
                    customClass: {
                        popup: 'small-swal-popup'
                    }
                });
        }
            });
        </script>

<div class="col-lg-12">
    <div class="d-flex justify-content-between align-items-center mb-3" style="padding-left: 10px; padding-top: 0;">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-money-bill-wave fa-2x" style="color: #1f2937;"></i>
            </div>
            <div>
                <h4 class="mb-0" style="font-weight: 600; font-size: 1.5rem; color: #0f172a;">Company Expenses</h4>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage company expense records</p>
            </div>
        </div>
        <a href="{{ route('expenses.create') }}" class="btn btn-secondary">
            <i class="fas fa-plus me-2"></i>Add Expense
        </a>
    </div>
    <div class="statbox widget box box-shadow">
        <div class="widget-content widget-content-area">
            <table id="style-2" class="table table-striped align-middle style-2 dt-table-hover">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th class="text-center">Image</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expenses as $expense)
                    <tr>
                        <td><strong style="color: #0f172a;">#{{ $expense->id }}</strong></td>
                        <td>
                            <strong style="color: #1e293b; font-weight: 600;">{{ $expense->name }}</strong>
                        </td>
                        <td>
                            <span style="color: #059669; font-weight: 600;">
                                <i class="fas fa-dollar-sign me-1"></i>{{ number_format($expense->price, 2) }}
                            </span>
                        </td>
                        <td style="color: #475569; font-weight: 500;">
                            <i class="fas fa-calendar me-1" style="color: #64748b;"></i>{{ \Carbon\Carbon::parse($expense->date)->format('M d, Y') }}
                        </td>
                        <td class="text-center">
                            @if($expense->image)
                            <a href="{{ asset($expense->image) }}" target="_blank" title="View Expense Image">
                                <img src="{{ asset($expense->image) }}"
                                    class="profile-img"
                                    alt="Expense Image">
                            </a>
                            @else
                            <span class="text-muted" style="font-size: 0.85rem;">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to remove this expense?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection