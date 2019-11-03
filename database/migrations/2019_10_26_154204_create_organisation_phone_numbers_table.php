<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationPhoneNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_phone_numbers', function (Blueprint $table) {
            $table->unsignedBigInteger('organisation_profile_id');
            $table->string('phone_number')->unique();
            $table->boolean('is_preferred')->default(false); // Determine preferred number

            // When the organisation is deleted, delete all of its phone numbers as well.
            $table->foreign('organisation_profile_id')->references('id')->on('organisation_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_phone_numbers');
    }
}
