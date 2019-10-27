<?php

use Illuminate\Database\Seeder;
use App\Activity;

class CreateActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'email'=>'test.volunteer@v2o.com',
                'role'=> 'VOLUNTEER',
                'password'=> bcrypt('password'),
            ],
            [
                'email'=>'test.organisation@v2o.com',
                'role' => 'ORGANISATION',
                'password'=> bcrypt('password'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
