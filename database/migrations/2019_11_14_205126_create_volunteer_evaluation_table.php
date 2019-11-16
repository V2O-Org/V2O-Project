<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer_evaluation', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('organisation_id');
			$table->unsignedBigInteger('volunteer_id');
			$table->unsignedBigInteger('rating');
			$table->text('Comment')->nullable();
			
            $table->timestamps();
			
			$table->foreign('organisation_id')->references('id')->on('organisations');
			$table->foreign('volunteer_id')->references('id')->on('volunteers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteer_evaluation');
    }
}
