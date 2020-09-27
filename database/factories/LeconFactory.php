<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lecon;
use Faker\Generator as Faker;

$factory->define(Lecon::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'matiere_id' => $faker->randomDigitNotNull,
        'description' => $faker->text,
        'contenu' => $faker->text,
        'publier' => $faker->randomDigitNotNull,
        'creer_par' => $faker->word,
        'filename' => $faker->word,
        'videoLink' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
