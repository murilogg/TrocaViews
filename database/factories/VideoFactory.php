<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'nameVideo' => $faker->title,
        'videoId' => 'KRTPBRHl258',
        'viewVideo' => $faker->randomDigit,
        'active' => 1,
        'counterHr' => Carbon::now(new DateTimeZone('America/Chicago')),
        'counterDay' => Carbon::now(),
        'created_at' => Carbon::now(new DateTimeZone('America/Cuiaba')),
        'updated_at' => Carbon::now(new DateTimeZone('America/Cuiaba')),
        'user_id' => factory(App\User::class)
    ];
});
