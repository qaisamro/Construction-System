<!-- resources/views/advances/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Advance</h2>
    <form action="{{ route('advances.update', $advance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" id="employee_id" class="form-control">
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $advance->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="advance_date" id="advance_date" class="form-control" value="{{ $advance->date }}">
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ $advance->amount }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
