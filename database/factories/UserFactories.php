<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Panchayath;
use App\Models\Pincode;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});


$factory->define(Country::class, function (Faker $faker) {
    return [
        'country' => $faker->name,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});


$factory->define(State::class, function (Faker $faker) {
    return [
        'country_id' => function() {
            return factory(Country::class)->create()->id;
        },
        'state' => $faker->name,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});

$factory->define(City::class, function (Faker $faker) {
    return [
        'country' => function() {
            return factory(Country::class)->create()->id;
        },
        'state' => function() {
            return factory(State::class)->create()->id;
        },
        'city' => $faker->name,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});

$factory->define(Panchayath::class, function (Faker $faker) {
    return [
        'country' => function() {
            return factory(Country::class)->create()->id;
        },
        'state' => function() {
            return factory(State::class)->create()->id;
        },
        'city' => function() {
            return factory(City::class)->create()->id;
        },
        'panchayath' => $faker->name,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});

$factory->define(Pincode::class, function (Faker $faker) {
    return [
        'country' => function() {
            return factory(Country::class)->create()->id;
        },
        'state' => function() {
            return factory(State::class)->create()->id;
        },
        'city' => function() {
            return factory(City::class)->create()->id;
        },
        'panchayath' => function() {
            return factory(Panchayath::class)->create()->id;
        },
        'pincode' => $faker->numberBetween($min = 600000, $max = 900000),
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});

?>