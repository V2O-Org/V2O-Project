<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $seeders = array('CreateActivitiesSeeder', 'CreateOrganisationsSeeder', 'CreateVolunteersSeeder');

        foreach($seeders as $seeder)
        {
            $this->call($seeder);
        }
    }
}
