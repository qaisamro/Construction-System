<?php

namespace App\Http\Controllers;

use App\Models\WorkingDay;
use Illuminate\Http\Request;

class WorkingDayController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
        ]);

        WorkingDay::create($request->all());

        return redirect()->route('employees.show', $request->employee_id)
                        ->with('success', 'Working day added successfully.');
    }
}
