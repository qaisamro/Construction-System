@extends('layouts.app')

@section('title', 'Expenses')

@section('content')
<div class="container mt-4">
    <h1>Expenses</h1>
    <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-4">Add Expense</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Purchases</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="employee-advances-tab" data-toggle="tab" href="#employee-advances" role="tab" aria-controls="employee-advances" aria-selected="false">Employee Advances</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="material-costs-tab" data-toggle="tab" href="#material-costs" role="tab" aria-controls="material-costs" aria-selected="false">Material Costs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="miscellaneous-tab" data-toggle="tab" href="#miscellaneous" role="tab" aria-controls="miscellaneous" aria-selected="false">Miscellaneous</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">Other</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        @foreach(['all', 'purchases', 'employee advances', 'material costs', 'miscellaneous', 'other'] as $type)
            <div class="tab-pane fade {{ $type == 'all' ? 'show active' : '' }}" id="{{ str_replace(' ', '-', $type) }}" role="tabpanel" aria-labelledby="{{ str_replace(' ', '-', $type) }}-tab">
                <table class="table table-bordered table-striped mt-4">
                    <thead class="thead-dark">
                        <tr>
                            <th>Company</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($type == 'all' ? $expenses : $expensesByType[$type] as $expense)
                            <tr>
                                <td>{{ $expense->company->name }}</td>
                                <td>{{ $expense->type }}</td>
                                <td>{{ $expense->amount }}</td>
                                <td>{{ $expense->description }}</td>
                                <td>{{ $expense->expense_date }}</td>
                                <td>
                                    <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No expenses found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</div>
@endsection
