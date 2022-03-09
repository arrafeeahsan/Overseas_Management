<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;

class Task extends Model
{
    //use HasFactory;
    protected $table = 'tasks';
    protected $fillable =[
        'client_id',
        'interview_date',
        'interview_status',
        'medical_date',
        'medical_status',
        'medical_expire_date',
        'training_start_date',
        'training_card_status',
        'training_card_paid_status',
        'finger_date',
        'finger_status',
        'first_vaccine_status',
        'second_vaccine_status',
        'created_by',
    ];
    public $timestamps = true;

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
