<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('id');
            $table->date('interview_date')->nullable()->default(NULL);
            $table->string('interview_status')->nullable()->default(NULL);
            $table->date('medical_date')->nullable()->default(NULL);
            $table->string('medical_status')->nullable()->default(NULL);
            $table->date('medical_expire_date')->nullable()->default(NULL);
            $table->date('training_start_date')->nullable()->default(NULL);
            $table->string('training_card_status')->nullable()->default(NULL);
            $table->string('training_card_paid_status')->nullable()->default(NULL);
            $table->date('finger_date')->nullable()->default(NULL);
            $table->string('finger_status')->nullable()->default(NULL);
            $table->string('first_vaccine_status')->nullable()->default(NULL);
            $table->string('second_vaccine_status')->nullable()->default(NULL);
            $table->string('created_by');
            $table->unsignedInteger('client_id')->unique();
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
        Schema::dropIfExists('tasks');
    }
}
