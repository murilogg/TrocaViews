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
        'contador' => Carbon::now(new DateTimeZone('America/Sao_Paulo')),
        'user_id' => factory(App\User::class)
    ];
});
