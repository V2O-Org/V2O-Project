<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('organisation_id')->unique;
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('profile_img')->nullable(); // The organisation's profile picture

            // Organisation's Location Information
            $table->string('street_address');
            $table->string('state');
            $table->string('city');
            $table->string('country');

            // Contact Information
            $table->string('org_url')->nullable(); // Webpage for organisation
            $table->string('fax')->nullable();
            $table->string('mailing_address'); // TODO: Set default as location in other fields
            
            $table->timestamps();

            $table->foreign('organisation_id')->references('id')->on('organisations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_profiles');
    }
}
