<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unique;
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
        Schema::dropIfExists('organisations');
    }
}
