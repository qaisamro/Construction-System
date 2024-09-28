<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Company;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with('company')->get();
        $types = ['purchases', 'employee advances', 'material costs', 'miscellaneous', 'other'];

        $expensesByType = [];
        foreach ($types as $type) {
            $expensesByType[$type] = $expenses->filter(function ($expense) use ($type) {
                return $expense->type == $type;
            });
        }
        
        $expensesByType['other'] = $expenses->filter(function ($expense) use ($types) {
            return !in_array($expense->type, $types);
        });

        return view('expenses.index', compact('expenses', 'expensesByType'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('expenses.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'expense_date' => 'required|date',
            'other_type' => 'nullable|required_if:type,other|string', 
        ]);

        $data = $request->all();

        if ($request->type === 'other') {
            $data['type'] = $request->other_type; 
        }

        Expense::create($data);

        return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }

    public function edit(Expense $expense)
    {
        $companies = Company::all();
        return view('expenses.edit', compact('expense', 'companies'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'type' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'expense_date' => 'required|date',
            'other_type' => 'nullable|required_if:type,other|string', 
        ]);

        $data = $request->all();

        if ($request->type === 'other') {
            $data['type'] = $request->other_type; 
        }

        $expense->update($data);

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }
}
