<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCausesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('causes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
        });

        // Populate the table with predefined causes
        DB::table('causes')->insert([
            ['name' => 'Agriculture'],
            ['name' => 'Animals'],
            ['name' => 'Arts & Culture'],
            ['name' => 'Children & Youth'],
            ['name' => 'Community Development'],
            ['name' => 'Computers & IT'],
            ['name' => 'Crime & Safety'],
            ['name' => 'Disabilities'],
            ['name' => 'Disaster Relief'],
            ['name' => 'Education'], 
            ['name' => 'Environment & Sustainability'], 
            ['name' => 'Family'], 
            ['name' => 'Health & Fitness'], 
            ['name' => 'Hospitality'], 
            ['name' => 'Housing & Homelessness'], 
            ['name' => 'Human Rights & Civil Liberties'], 
            ['name' => 'Hunger & Food Security'], ['name' => 'Immigrants & Refugees'], 
            ['name' => 'International'], 
            ['name' => 'Men'], 
            ['name' => 'Mental Health'], 
            ['name' => 'Music'], 
            ['name' => 'Politics'], 
            ['name' => 'Poverty'], 
            ['name' => 'Religion & Spirituality'], 
            ['name' => 'School Clubs'], 
            ['name' => 'Science & Technology'], 
            ['name' => 'Senior Citizens'], 
            ['name' => 'Sports & Recreation'], 
            ['name' => 'Substance Abuse & Addiction'], 
            ['name' => 'Tutoring & Mentorship'], 
            ['name' => 'Victim Support'], 
            ['name' => 'Women'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('causes');
    }
}
