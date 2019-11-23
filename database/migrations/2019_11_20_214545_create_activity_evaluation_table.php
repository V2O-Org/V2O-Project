<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_evaluation', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('activity_id');
			$table->unsignedBigInteger('volunteer_id');
			$table->unsignedBigInteger('rating');
			$table->text('comment')->nullable();
			
            $table->timestamps();
			
			$table->foreign('activity_id')->references('id')->on('activities');
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
        Schema::dropIfExists('activity_evaluation');
    }
}
