@extends('admin.master.main')

@section('content')
<form action="{{ route('payslip.generate', ['employee' => $employeeId, 'first_name' => $firstName, 'last_name' => $lastName]) }}" method="GET">
    <div class="row">
        <!-- Employee Information -->
        <div class="form-group col-md-4">
            <label for="employee">Employee Name:</label>
            <select id="employee" name="employee" class="form-control">
                <option value="{{ $employeeId }}">
                    {{ $firstName }} {{ $lastName }}
                </option>
            </select>
        </div>

        <!-- Month Selection -->
        <div class="form-group col-md-4">
            <label for="month">Select Month:</label>
            <select id="month" name="month" class="form-control">
                @php
                    $currentMonth = date('n'); // Current month as a number (1-12)
                    $currentYear = date('Y'); // Current year
                @endphp

                @for ($i = 1; $i <= $currentMonth; $i++)
                    <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                    </option>
                @endfor
            </select>
        </div>

        <!-- Year Selection -->
        <div class="form-group col-md-4">
            <label for="year">Select Year:</label>
            <select id="year" name="year" class="form-control">
                @if(isset($years) && is_array($years))
                    @foreach($years as $y)
                        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : ($y == $currentYear ? 'selected' : '') }}>
                            {{ $y }}
                        </option>
                    @endforeach
                @else
                    {{-- Fallback: show current year --}}
                    <option value="{{ $currentYear }}" selected>{{ $currentYear }}</option>
                @endif
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2">View Payslip</button>
    <a href="javascript:void(0)" onclick="history.back()" class="btn btn-success mt-2">Back</a>
</form>

<!-- Show matching PDFs if any -->
@if(!empty($matchingPdfs) && count($matchingPdfs) > 0)
    <div class="mt-4">
 <h4>
    @if($selectedMonthName || $selectedYear)
        Payslip For {{ $selectedMonthName ?? '' }} {{ $selectedYear ?? '' }}
    @else
        All Payslips
    @endif
</h4>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Payslip PDF</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matchingPdfs as $pdf)
                    <tr>
                        <td>{{ basename($pdf) }}</td>
                        <td>
                            <a href="{{ asset($pdf) }}" class="btn btn-primary" target="_blank">View Document</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@elseif(isset($notFoundMessage))
    <div class="alert bg-danger mt-4">
        <h5>{{ $notFoundMessage }}</h5>
    </div>
@endif
@endsection
