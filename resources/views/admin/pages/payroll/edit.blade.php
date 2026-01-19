@extends('admin.master.main')
@section('content')

@include('admin.pages.partials.form-styles')

<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fas fa-money-check-alt"></i>
            Edit Payroll
        </h3>
        <a href="{{ route('payroll.index') }}" class="btn">
            <i class="fas fa-arrow-left me-2"></i>Back
        </a>
    </div>

    <div class="form-card">
    <form action="{{ route('payroll.update', $payroll->id) }}" method="POST" id="payrollForm">
        @csrf
        @method('PUT')

        <div class="row">
                <div class="col-md-12">
                    <div class="form-group-wrapper">
                        <label for="inputEmployeeId"><i class="fas fa-user me-2"></i>Employee Name</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-user"></i>
                            <select class="form-control form-select" id="inputEmployeeId" name="employee_id" required>
                        <option value="">Select Employee</option>
                        @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id', $payroll->employee_id) == $employee->id ? 'selected' : '' }}>
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
                            <input type="number" step="0.01" class="form-control" id="salary" name="salary" placeholder="Enter Salary" value="{{ old('salary', $payroll->salary) }}" required>
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
                            <input type="number" step="0.01" class="form-control" id="bonus" name="bonus" placeholder="Enter Bonus" value="{{ old('bonus', $payroll->bonus) }}">
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
                            <input type="number" step="0.01" class="form-control" id="deduction" name="deduction" placeholder="Enter Deduction" value="{{ old('deduction', $payroll->deduction) }}">
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
                            <input type="number" step="0.01" class="form-control" id="total" name="total" placeholder="Total" value="{{ old('total', $payroll->total) }}" readonly required>
                        </div>
                        @if ($errors->has('total'))
                        <span class="text-danger">{{ $errors->first('total') }}</span>
                        @endif
                </div>
            </div>
        </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save me-2"></i>Update
                </button>
                <a href="{{ route('payroll.index') }}" class="btn btn-back">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
        </div>
    </form>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const salaryInput = document.getElementById('salary');
        const bonusInput = document.getElementById('bonus');
        const deductionInput = document.getElementById('deduction');
        const totalInput = document.getElementById('total');

        function updateTotal() {
            const salary = parseFloat(salaryInput.value) || 0;
            const bonus = parseFloat(bonusInput.value) || 0;
            const deduction = parseFloat(deductionInput.value) || 0;
            totalInput.value = (salary + bonus - deduction).toFixed(2);
        }

        salaryInput.addEventListener('input', updateTotal);
        bonusInput.addEventListener('input', updateTotal);
        deductionInput.addEventListener('input', updateTotal);

        updateTotal();
    });
</script>

@endsection
