<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('reporter_type');//individual, enterprise or government
            $table->string('incident_id')->unique(); //RMG+random 5 digit+current year
            $table->string('reporter_name');
            $table->text('incident_details');
            $table->timestamp('incident_report_time');
            $table->string('priority');//high, medium, low
            $table->string('incident_status');//open, in progress , closed
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('incidents');
    }
}
