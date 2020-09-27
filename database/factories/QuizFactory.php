<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quiz;
use Faker\Generator as Faker;

$factory->define(Quiz::class, function (Faker $faker) {

    return [
        'titre' => $faker->word,
        'class_id' => $faker->randomDigitNotNull,
        'duree' => $faker->randomDigitNotNull,
        'categorie' => $faker->word,
        'nombre_questions' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
