<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    $start_date = $faker->dateTimeThisYear;
    $end_date = $faker->dateTimeBetween($start_date, $start_date->format('Y-m-d H:i:s').' +30 days');
    $start_time = $faker->time('H:i:s');
    $end_time = $faker->time('H:i:s');
    $registration_deadline = $faker->dateTimeBetween($start_date->format('Y-m-d H:i:s').' -30 days');
    return [
        'name' => $faker->sentence(6, true),
        'description' => $faker->paragraph(12, true),
        'image' => NULL,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'location' => $faker->streetAddress,
        'co_host' => NULL,
        'registration_deadline' => $registration_deadline,
        'is_active' => true,
        'volunteer_hours' => $faker->numberBetween(0, 500),
    ];
});
