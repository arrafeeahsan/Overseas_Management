<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExpenseType;

class Expense extends Model
{
    //use HasFactory;
    protected $table = 'expenses';
    protected $fillable =[
        'type',
        'amount',
        'created-by',
    ];

    public function expensetype()
    {
        return $this->hasMany(ExpenseType::class);
    } 
}
