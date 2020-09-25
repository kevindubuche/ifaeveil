<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Exam;
use Faker\Generator as Faker;

$factory->define(Exam::class, function (Faker $faker) {

    return [
        'matiere_id' => $faker->randomDigitNotNull,
        'title' => $faker->word,
        'description' => $faker->text,
        'filename' => $faker->word,
        'creer_par' => $faker->word,
        'publier' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
