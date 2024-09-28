@extends('layouts.app')

@section('title', 'Edit Expense')

@section('content')
<div class="container mt-4">
    <h1>Edit Expense</h1>
    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="company_id">Company</label>
            <select name="company_id" id="company_id" class="form-control">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $expense->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
                <option value="purchases" {{ $expense->type == 'purchases' ? 'selected' : '' }}>Purchases</option>
                <option value="employee advances" {{ $expense->type == 'employee advances' ? 'selected' : '' }}>Employee Advances</option>
                <option value="material costs" {{ $expense->type == 'material costs' ? 'selected' : '' }}>Material Costs</option>
                <option value="miscellaneous" {{ $expense->type == 'miscellaneous' ? 'selected' : '' }}>Miscellaneous</option>
                <option value="other" {{ !in_array($expense->type, ['purchases', 'employee advances', 'material costs', 'miscellaneous']) ? 'selected' : '' }}>Other</option> <!-- تعديل الشرط هنا -->
            </select>
        </div>
        <div class="form-group" id="other-type-group" style="{{ !in_array($expense->type, ['purchases', 'employee advances', 'material costs', 'miscellaneous']) ? '' : 'display: none;' }}">
            <label for="other_type">Other Type</label>
            <input type="text" name="other_type" id="other_type" class="form-control" value="{{ !in_array($expense->type, ['purchases', 'employee advances', 'material costs', 'miscellaneous']) ? $expense->type : '' }}"> <!-- تعديل القيمة هنا -->
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ $expense->amount }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $expense->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="expense_date">Expense Date</label>
            <input type="date" name="expense_date" id="expense_date" class="form-control" value="{{ $expense->expense_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Expense</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var typeSelect = document.getElementById('type');
        var otherTypeGroup = document.getElementById('other-type-group');

        typeSelect.addEventListener('change', function () {
            if (typeSelect.value === 'other') {
                otherTypeGroup.style.display = 'block';
            } else {
                otherTypeGroup.style.display = 'none';
            }
        });
    });
</script>
@endsection
