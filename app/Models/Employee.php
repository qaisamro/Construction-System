<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'company_id', 'daily_wage', 'currency'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function advances()
    {
        return $this->hasMany(Advance::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function calculateNetSalary()
    {
        $workingDaysCount = $this->attendances()->where('status', 'Present')->count();
        $totalAdvances = $this->advances()->sum('amount');
        $netSalary = ($workingDaysCount * $this->daily_wage) - $totalAdvances;
        return $netSalary;
    }

    public function presentDaysCount()
    {
        return $this->attendances()->where('status', 'Present')->count();
    }

    public function presentDays()
    {
        return $this->attendances()->where('status', 'Present')->get();
    }
}
