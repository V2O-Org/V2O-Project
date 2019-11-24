<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Organisation;
use App\OrganisationProfile;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Organisation::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('password'),
        'remember_token' => Str::random(10),
    ];
});


$factory->define(OrganisationProfile::class, function (Faker $faker) {
    return [
        'organisation_id' => function() {
            return factory(App\Organisation::class)->create()->id;
        },
        'name' => $faker->company,
        'description' => $faker->paragraph('4', true),
        'profile_img' => null,
        'street_address' => $faker->streetName,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'org_url' => $faker->url,
        'fax' => $faker->phoneNumber,
        'mailing_address' => $faker->streetAddress,
    ];
});
