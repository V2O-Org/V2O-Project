<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastActivityVolunteerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_volunteer', function (Blueprint $table) {
            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('volunteer_profile_id');
            $table->integer('volunteer_hours_earned')->default(0);
            $table->timestamps();

            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('volunteer_profile_id')->references('id')->on('volunteer_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('past_activity_volunteer');
    }
}
