<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('visa_number')->unique();
            $table->string('company_name');
            $table->string('visa_type');
            $table->string('vendor_name')->nullable()->default(NULL);
            $table->string('visa_status');
            $table->date('ambassador_paid_date')->nullable()->default(NULL);
            $table->date('visa_expiry_date')->nullable()->default(NULL);
            $table->string('applied_person_name');
            $table->string('reference_supplier')->nullable()->default(NULL);
            $table->string('created_by');
            $table->timestamps();
            $table->unsignedInteger('client_id')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visas');
    }
}
