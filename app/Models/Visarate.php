<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visa;

use App\Models\Payment;

class Visarate extends Model
{
    //use HasFactory;
    protected $table = 'visarates';
    protected $fillable =[
        'visa_number',
        'vendor_rate',
        'agent_rate',
        'passenger_rate',
        'paid_amount',
        'due_amount',
        'payment_date',
        'payment_status',
        'benefit_loss',
        'created_by',
            
    ];
    public $timestamps = true;

    public function visa(){
        return $this->belongsTo(Visa::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
