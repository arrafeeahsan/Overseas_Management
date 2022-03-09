<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Passport;
use App\Models\Task;
use App\Models\Visa;
use App\Models\Payment;

class Client extends Model
{
    protected $table = 'clients'; //no need if table name plural form of model name
    //protected $primaryKey = 'userId'; // no need if id is directly written rather than userid for the specific column
    protected $fillable =[
        'client_name',
        'client_father',
        'client_address',
        'client_phone',
        'client_nid',
        'client_dob',
        'client_supplier',
        'client_pp',
        'created_by',
    ];
    public $timestamps = true; //if false then CREATED_AT and UPDATED_AT will not need to be find

    public function passport(){
        return $this->hasOne(Passport::class);
    }

    public function task()
    {
        return $this->hasOne(Task::class, 'client_id', 'id');
    }

    public function visa()
    {
        return $this->hasOne(Visa::class);
    }

    

}
