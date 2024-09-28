@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1>Attendances</h1>
            <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">Record Attendance</a>
            
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                        <tr>
                            <td>{{ $attendance->employee->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($attendance->attendance_date)->format('Y-m-d') }}</td>
                            <td>{{ $attendance->status }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Attendance Actions">
                                    <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
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
