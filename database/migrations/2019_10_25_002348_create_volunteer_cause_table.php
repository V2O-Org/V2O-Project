<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerCauseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer_cause', function (Blueprint $table) {
            $table->unsignedBigInteger('volunteer_profile_id');
            $table->unsignedBigInteger('cause_id');

            
            $table->foreign('volunteer_profile_id')->references('id')->on('volunteer_profiles')->onDelete('cascade');
            $table->foreign('cause_id')->references('id')->on('causes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteer_cause');
    }
}
