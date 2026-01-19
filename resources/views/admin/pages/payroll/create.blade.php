@extends('admin.master.main')

@section('content')

@include('admin.pages.partials.form-styles')

<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-money-check-alt"></i>
            Add Payroll
        </h3>
        <a href="{{ route('payroll.index') }}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
            </div>

    <div class="form-card">
            <form action="{{ route('payroll.store') }}" method="POST" id="payrollForm">
                @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputEmployeeId"><i class="fas fa-user me-2"></i>Employee Name</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user"></i>
                            <select class="form-control form-select" id="inputEmployeeId" name="employee_id" required>
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
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

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="salary"><i class="fas fa-pound-sign me-2"></i>Salary</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-pound-sign"></i>
                            <input type="number" step="0.01" class="form-control" id="salary" name="salary" placeholder="Enter Salary" value="{{ old('salary') }}" required>
                        </div>
                        @if ($errors->has('salary'))
                        <span class="text-danger">{{ $errors->first('salary') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="bonus"><i class="fas fa-gift me-2"></i>Bonus</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-gift"></i>
                            <input type="number" step="0.01" class="form-control" id="bonus" name="bonus" placeholder="Enter Bonus" value="{{ old('bonus') }}">
                        </div>
                        @if ($errors->has('bonus'))
                        <span class="text-danger">{{ $errors->first('bonus') }}</span>
                        @endif
                    </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="deduction"><i class="fas fa-minus-circle me-2"></i>Deduction</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-minus-circle"></i>
                            <input type="number" step="0.01" class="form-control" id="deduction" name="deduction" placeholder="Enter Deduction" value="{{ old('deduction') }}">
                        </div>
                        @if ($errors->has('deduction'))
                        <span class="text-danger">{{ $errors->first('deduction') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-wrapper">
                        <label for="total"><i class="fas fa-calculator me-2"></i>Total</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-calculator"></i>
                            <input type="number" step="0.01" class="form-control" id="total" name="total" placeholder="Total" value="{{ old('total') }}" readonly required>
                        </div>
                        @if ($errors->has('total'))
                        <span class="text-danger">{{ $errors->first('total') }}</span>
                        @endif
        </div>
    </div>
</div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Submit
                </button>
                <a href="{{ route('payroll.index') }}" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const salaryField = document.getElementById('salary');
        const bonusField = document.getElementById('bonus');
        const deductionField = document.getElementById('deduction');
        const totalField = document.getElementById('total');

        function calculateTotal() {
            const salary = parseFloat(salaryField.value) || 0;
            const bonus = parseFloat(bonusField.value) || 0;
            const deduction = parseFloat(deductionField.value) || 0;
            const total = salary + bonus - deduction;
            totalField.value = total.toFixed(2);
        }

        salaryField.addEventListener('input', calculateTotal);
        bonusField.addEventListener('input', calculateTotal);
        deductionField.addEventListener('input', calculateTotal);

        calculateTotal();
    });
</script>

@endsection
