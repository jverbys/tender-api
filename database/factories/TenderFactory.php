<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tender;
use Faker\Generator as Faker;

$factory->define(Tender::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
    ];
});
