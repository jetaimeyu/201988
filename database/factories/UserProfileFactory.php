<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProfile;
use Faker\Generator as Faker;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'user_id' => mt_rand(1,10),
        'bio' => 'sing',
        'city' => 'jinan',
        'hobby' => 'make'
        //
    ];
});
