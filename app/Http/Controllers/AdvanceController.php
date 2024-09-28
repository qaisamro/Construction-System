<?php

// AdvanceController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Advance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AdvanceController extends Controller
{
    public function create()
    {
        $employees = Employee::all();
        return view('advances.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'advance_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        Advance::create($request->all());

        return redirect()->route('employees.show', $request->employee_id)->with('success', 'Advance added successfully.');
    }

    public function edit($id)
    {
        $advance = Advance::findOrFail($id);
        $employees = Employee::all();
        return view('advances.edit', compact('advance', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'advance_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        $advance = Advance::findOrFail($id);
        $advance->update($request->all());

        return redirect()->route('employees.show', $advance->employee_id)->with('success', 'Advance updated successfully.');
    }

    public function destroy($id)
    {
        $advance = Advance::findOrFail($id);
        $advance->delete();

        return redirect()->route('employees.show', $advance->employee_id)->with('success', 'Advance deleted successfully.');
    }
}
