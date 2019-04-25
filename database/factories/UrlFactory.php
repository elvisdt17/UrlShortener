<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Url;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Url::class, function (Faker $faker) {
    return [
        'key' => Str::random(8),
        'url' => $faker->url,
        'accessed' => rand(1, 100),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
