<?php

use Illuminate\Database\Seeder;
use App\Volunteer;

class CreateVolunteersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $volunteer = [
            [
                'first_name' => 'George',
                'last_name' => 'Clooney',
                'email' => 'test.volunteer@v2o.com',
                'password' => bcrypt('password'),
            ],
            [
                'first_name' => 'Frank',
                'last_name' => 'Ocean',
                'email' => 'test.volunteer2@v2o.com',
                'password' => bcrypt('password'),
            ],
        ];
  
        foreach ($volunteer as $key => $value) {
            Volunteer::create($value);
        }
        
        // $volunteer = [
        //     [
        //         'user_id' => 1,
        //         'first_name' => 'George',
        //         'last_name' => 'Clooney',
        //         // 'profile_img' => '',
        //         'date_of_birth' => '1996-12-03',
        //         'street_address' => 'Black Rock',
        //         'state' => 'Saint Michael',
        //         'city' => 'Bridgetown',
        //         'country' => 'Barbados',
        //     ],
        //     // [
        //     //     'user_id' => '',
        //     //     'first_name' => '',
        //     //     'last_name' => '',
        //     //     // 'profile_img' => '',
        //     //     'date_of_birth' => '',
        //     //     'street_address' => '',
        //     //     'state' => '',
        //     //     'city' => '',
        //     //     'country' => '',
        //     // ],
        // ];
    }
}
