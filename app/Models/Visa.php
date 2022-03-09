<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;
use App\Models\Visarate;

class Visa extends Model
{
    use HasFactory;
    protected $table = 'visas';
    protected $fillable =[
        'visa_number',
        'company_name',
        'visa_type',
        'vendor_name',
        'visa_status',
        'ambassador_paid_date',
        'visa_expiry_date',
        'applied_person_name',
        'reference_supplier',
        'created_by',
            
    ];
    public $timestamps = true;

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function visarate()
    {
        return $this->hasOne(Visarate::class, 'visa_id', 'id');
    }

    

    
}
