<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Vendor extends Model
{
    //use HasFactory;
    protected $table = 'vendors';
    protected $fillable =[
        'vendor_name',
        'vendor_address',
        'vendor_contact',
        'created_by',
    ];
    public $timestamps = true;

}


