<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('profile_img')->nullable(); // The volunteer's profile picture
            $table->date('date_of_birth');

            // Volunteer's Location Information
            $table->string('street_address_1')->nullable();
            $table->string('street_address_2')->nullable(); // Optional
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
}
