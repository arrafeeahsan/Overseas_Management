<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visarates', function (Blueprint $table) {
            $table->id('id');
            $table->string('visa_number')->unique();
            $table->double('vendor_rate');
            $table->double('agent_rate');
            $table->double('passenger_rate');
            $table->double('paid_amount');
            $table->double('due_amount');
            $table->date('payment_date');
            $table->string('payment_status');
            $table->double('benefit_loss')->nullable();
            $table->string('created_by');
            $table->timestamps();
            $table->unsignedInteger('visa_id')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visarates');
    }
}
