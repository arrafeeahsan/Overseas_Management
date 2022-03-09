<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobNameToVisaNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visa_news', function (Blueprint $table) {
            $table->string('job_name');
            $table->string('news_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visa_news', function (Blueprint $table) {
            $table->dropColumn('job_name');
            $table->dropColumn('news_status');
        });
    }
}
