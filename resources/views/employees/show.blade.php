@extends('layouts.app')

@section('title', 'Employee Details')

@section('content')
<div class="container mt-4">
    <h1>Employee Details</h1>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Employee Information
        </div>
        <div class="card-body">
            <p>Name: {{ $employee->name }}</p>
            <p>Email: {{ $employee->email }}</p>
            <p>Company: {{ $employee->company->name }}</p>
            <p>Daily Wage: {{ $employee->daily_wage }} {{ $employee->currency }}</p>
            <p>Net Salary: {{ $netSalary }} {{ $employee->currency }}</p>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            Advances
        </div>
        <div class="card-body">
            <ul class="list-group">
                @forelse($advances ?? [] as $advance)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $advance->advance_date }}: {{ $advance->amount }} {{ $employee->currency }}
                        <span class="float-right">
                            <a href="{{ route('advances.edit', $advance->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            <form action="{{ route('advances.destroy', $advance->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </span>
                    </li>
                @empty
                    <li class="list-group-item">No advances recorded.</li>
                @endforelse
            </ul>
            <a href="{{ route('advances.create') }}" class="btn btn-primary mt-3">Add Advance</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            Working Days
        </div>
        <div class="card-body">
            <p>Total Present Days: {{ $presentDaysCount }}</p>
            <ul class="list-group">
                @forelse($presentDays ?? [] as $attendance)
                    <li class="list-group-item">{{ $attendance->attendance_date }}</li>
                @empty
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Button for printing -->
    <button class="btn btn-primary mt-3 btn-lg btn-block" onclick="printEmployeeDetails()">
        <i class="fas fa-print"></i> Print Employee Details
    </button>
</div>

<script>
    function printEmployeeDetails() {
        window.print();
    }
</script>
@endsection
