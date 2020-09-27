<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Matiere;
use Faker\Generator as Faker;

$factory->define(Matiere::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'class_id' => $faker->randomDigitNotNull,
        'prof_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
