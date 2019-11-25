<?php

use Illuminate\Database\Seeder;
use App\Volunteer;
use App\VolunteerProfile;

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
                'email' => 'test.volunteer@v2o.com',
                'password' => bcrypt('password'),
            ],
            [
                'email' => 'test.volunteer2@v2o.com',
                'password' => bcrypt('password'),
            ],
        ];
        
        $volunteerProfile = [
            [
                'volunteer_id' => 1,
                'first_name' => 'George',
                'last_name' => 'Clooney',
                // 'profile_img' => '',
                'date_of_birth' => '1996-12-03',
                'street_address' => 'Black Rock',
                'state' => 'Saint Michael',
                'city' => 'Bridgetown',
                'country' => 'Barbados',
            ],
            [
                'volunteer_id' => '2',
                'first_name' => 'Bob',
                'last_name' => 'Bobbinton',
                // 'profile_img' => '',
                'date_of_birth' => '1992-08-23',
                'street_address' => 'Grove',
                'state' => 'St. Philip',
                'city' => 'Bridgetown',
                'country' => 'Baarbados',
            ],
        ];
  
        // Create the volunteer user.
        foreach ($volunteer as $key => $value) {
            Volunteer::create($value);
        }

        // Create the volunteer profile.
        foreach ($volunteerProfile as $key => $value) {
            VolunteerProfile::create($value);
        }

        factory(App\Volunteer::class, 70)->create()->each(function($v) {
            $v->volunteerProfile()->save(
                factory(App\VolunteerProfile::class)->make(['volunteer_id' => NULL])
            );
        });

        $vols = VolunteerProfile::all();

        $activities = App\Activity::all();

        $vols->each(function ($vol) use ($activities) {
            $arr = $activities->random(rand(0, 2))->pluck('id')->toArray();
            $result = array_fill_keys($arr, [
                'volunteer_hours_earned' => 0,
                'hours_confirmed' => false,
                'is_complete' => false,
            ]);

            $vol->activities()->sync($result);
        });

        $causes = App\Cause::all();
        
        $vols->each(function ($vol) use ($causes) {
            $vol->causes()->sync(
                $causes->random(rand(1, 8))->pluck('id')->toArray()
            );
        });
    }
}
