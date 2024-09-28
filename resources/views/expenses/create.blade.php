@extends('layouts.app')

@section('title', 'Add Expense')

@section('content')
<div class="container mt-4">
    <h1>Add Expense</h1>
    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="company_id">Company</label>
            <select name="company_id" id="company_id" class="form-control">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" onchange="showOtherInput(this.value)">
                <option value="purchases">Purchases</option>
                <option value="employee advances">Employee Advances</option>
                <option value="material costs">Material Costs</option>
                <option value="miscellaneous">Miscellaneous</option>
                <option value="other">Other</option> 
            </select>
        </div>
        <div class="form-group" id="otherTypeInput" style="display: none;">
            <label for="other_type">Other Type:</label>
            <input type="text" name="other_type" id="other_type" class="form-control">
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="expense_date">Expense Date</label>
            <input type="date" name="expense_date" id="expense_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Expense</button>
    </form>
</div>

<script>
    function showOtherInput(value) {
        var otherTypeInput = document.getElementById('otherTypeInput');
        if (value === 'other') {
            otherTypeInput.style.display = 'block';
        } else {
            otherTypeInput.style.display = 'none';
        }
    }
</script>
@endsection
