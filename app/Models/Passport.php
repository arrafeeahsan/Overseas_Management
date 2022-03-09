<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Passport extends Model
{
    //use HasFactory;
    protected $table = 'passports';
    protected $fillable =[
        'client_id',
        'passport_number',
        'submission_date',
        'withdraw_date',
        'created_by',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
