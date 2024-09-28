<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'advance_date', 'amount'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
