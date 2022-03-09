<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Visarate;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable =[
        'visa_number',
        'amount',
        'payment_date',
        'created_by',
            
    ];
    public $timestamps = true;

    public function visarate(){
        return $this->belongsTo(Visarate::class);
    }

    
}
