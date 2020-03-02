<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'nomeVideo' => $faker->title,
        'videoId' => 'KRTPBRHl258',
        'vistoVideo' => $faker->randomDigit,
        'ativo' => 1,
        'contadorHr' => Carbon::now(new DateTimeZone('America/Chicago')),
        'contadorDia' => Carbon::now(),
        'created_at' => Carbon::now(new DateTimeZone('America/Cuiaba')),
        'updated_at' => Carbon::now(new DateTimeZone('America/Cuiaba')),
        'user_id' => factory(App\User::class)
    ];
});
