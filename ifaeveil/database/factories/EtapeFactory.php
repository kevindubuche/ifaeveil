<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Etape;
use Faker\Generator as Faker;

$factory->define(Etape::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'annee' => $faker->word,
        'duree' => $faker->word,
        'description' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
