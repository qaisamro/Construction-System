<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Company; 


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'company_id' => 'required',
            'daily_wage' => 'required|numeric',
            'currency' => 'required|in:USD,ILS',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
                        ->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'company_id' => 'required',
            'daily_wage' => 'required|numeric',
            'currency' => 'required|in:USD,ILS',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
                        ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
                        ->with('success', 'Employee deleted successfully.');
    }
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        $advances = $employee->advances;
        $presentDaysCount = $employee->attendances()->where('status', 'Present')->count();
        $totalAdvances = $advances->sum('amount');
        $netSalary = ($presentDaysCount * $employee->daily_wage) - $totalAdvances;
    
        return view('employees.show', compact('employee', 'advances', 'presentDaysCount', 'netSalary'));
    }
    

}
