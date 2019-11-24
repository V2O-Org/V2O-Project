<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Volunteer;
use App\VolunteerProfile;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Volunteer::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('password'),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(VolunteerProfile::class, function (Faker $faker) {
    return [
        'volunteer_id' => function() {
            return factory(App\Volunteer::class)->create()->id;
        },
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'date_of_birth' => $faker->dateTimeBetween('-40 years', '-18 years'),
        'profile_img' => null,
        'street_address' => $faker->streetName,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
    ];
});
