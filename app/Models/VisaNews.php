<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaNews extends Model
{
    use HasFactory;
    protected $table = 'visa_news';
    protected $fillable =[
        'visa_company_name',
        'visa_company_address',
        'number_of_visa',
        'country',
        'city',
        'working_hour',
        'salary',
        'bonus',
        'description',
        'weekend_day',
        'job_name',
        'news_status',
        'created_by',
            
    ];
    public $timestamps = true;
}
