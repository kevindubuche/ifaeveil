<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Assignations;
use Faker\Generator as Faker;

$factory->define(Assignations::class, function (Faker $faker) {

    return [
        'prof_id' => $faker->word,
        'class_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
