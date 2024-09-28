<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'type',
        'amount',
        'description',
        'expense_date',
    ];

    // تعريف العلاقة مع النموذج Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }   
}
