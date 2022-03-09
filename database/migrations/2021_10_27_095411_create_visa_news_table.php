<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_news', function (Blueprint $table) {
            $table->id();
            $table->string('visa_company_name');
            $table->string('visa_company_address');
            $table->string('number_of_visa');
            $table->string('country');
            $table->string('city');
            $table->string('working_hour');
            $table->string('salary');
            $table->string('bonus');
            $table->string('description');
            $table->string('weekend_day');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visa_news');
    }
}
