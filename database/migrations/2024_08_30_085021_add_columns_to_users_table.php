<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Adding new columns to the users table
            $table->string('user_reporter_type')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('isd')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('phone')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Dropping columns if the migration is rolled back
            $table->dropColumn([
                'user_reporter_type',
                'last_name',
                'address',
                'country',
                'state',
                'city',
                'pincode',
                'isd',
                'mobile',
                'fax',
                'phone',
                
            ]);
        });
    }
}
