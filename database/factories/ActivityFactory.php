<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    $start_date = $faker->dateTimeBetween('-1 year', '+1 year');
    $end_date = $faker->dateTimeBetween($start_date, $start_date->format('Y-m-d H:i:s').' +5 days');
    $start_time = $faker->time($start_date->format('H:i:s'));
    $end_time = $faker->time($end_date->format('H:i:s'));
    $registration_deadline = $faker->dateTimeBetween($start_date->format('Y-m-d H:i:s').' -30 days', $start_date);
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
        'is_active' => ($end_date > Carbon::now()) ? true : false,
        'volunteer_hours' => $faker->numberBetween(0, 500),
    ];
});
