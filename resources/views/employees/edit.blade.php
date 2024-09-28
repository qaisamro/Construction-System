@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
                </div>
                <div class="form-group">
                    <label for="company_id">Company:</label>
                    <select name="company_id" class="form-control" required>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="daily_wage">Daily Wage:</label>
                    <input type="number" name="daily_wage" class="form-control" value="{{ $employee->daily_wage }}" required>
                </div>
                <div class="form-group">
                    <label for="currency">Currency:</label>
                    <select name="currency" class="form-control" required>
                        <option value="USD" {{ $employee->currency == 'USD' ? 'selected' : '' }}>USD</option>
                        <option value="ILS" {{ $employee->currency == 'ILS' ? 'selected' : '' }}>ILS</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
