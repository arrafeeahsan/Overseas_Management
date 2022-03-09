<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    use HasFactory;
    protected $table = 'expense_types';
    protected $fillable =[
        'expense_type_name',
        'created-by',
    ];
}
