<?php

use Illuminate\Database\Seeder;
use App\Activity;
use Illuminate\Support\Facades\DB;

class CreateActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $activity = [
        //     [
        //         'name' => 'Test Activity',
        //         'description' => 'Here are some details',
        //         'start_date' => '2019-11-25',
        //         'end_date' => '2019-11-25',
        //         'start_time' => '10:00:00', 
        //         'end_time' => '15:30:00',
        //         'location' => "Queen's Park, Bridgetown, Barbados",
        //         'co_host' => 'Dummy Organisation',
        //         'registration_deadline' => '2019-11-18',
        //         'volunteer_hours' => 5,
        //     ],
        //     [
        //         'name' => 'Help the Elderly',
        //         'description' => 'Old people need help guys.',
        //         'start_date' => '2019-12-10',
        //         'end_date' => '2019-12-16',
        //         'start_time' => '8:30:00', 
        //         'end_time' => '16:30:00',
        //         'location' => "Geriatric Hospital, Bridgetown Barbados",
        //         'co_host' => 'Dummy Organisation',
        //         'registration_deadline' => '2019-11-30',
        //         'volunteer_hours' => 8*7,
        //     ],
        // ];

        // $cause = [
        //     [
        //         4, 10, 12
        //     ],
        //     [
        //         8, 28
        //     ]
        // ];

        // $organisation = [
        //     [
        //         DB::table('organisations')->select('id')->first()->id,
        //     ],
        //     [
        //         DB::table('organisations')->select('id')->first()->id,
        //     ]
        // ];
  
        // $activities = [];

        // foreach ($activity as $key => $value) {
        //     array_push($activities, Activity::create($value));
        // }

        // for ($i = 0; $i < sizeof($activities); $i++) {
        //     $activities[$i]->causes()->sync($cause[$i]);
        //     $activities[$i]->organisations()->sync($organisation[$i]);
        // }

        factory(App\Activity::class, 75)->create();

        $activities = Activity::all();
        
        $causes = App\Cause::all();

        $activities->each(function ($activity) use ($causes) {
            $activity->causes()->sync(
                $causes->random(rand(1, 4))->pluck('id')->toArray()
            );
        });

    }
}
