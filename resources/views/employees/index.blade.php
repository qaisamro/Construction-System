@extends('layouts.app')

@section('title', 'Employees')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2>Employees</h2>
            <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Create Employee</a>
            
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Daily Wage</th>
                            <th>Currency</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>{{ $employee->daily_wage }}</td>
                            <td>{{ $employee->currency }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Employee Actions">
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info">View Report</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
