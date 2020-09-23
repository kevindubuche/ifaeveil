<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Eleve;
use Faker\Generator as Faker;

$factory->define(Eleve::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'prenom' => $faker->word,
        'class_id' => $faker->randomDigitNotNull,
        'username' => $faker->word,
        'sexe' => $faker->word,
        'tel' => $faker->word,
        'adresse' => $faker->word,
        'religion' => $faker->word,
        'nom_pere' => $faker->word,
        'nom_mere' => $faker->word,
        'tel_mere' => $faker->word,
        'nom_reponsable' => $faker->word,
        'tel_responsable' => $faker->word,
        'date_naissance' => $faker->word,
        'date_admission' => $faker->word,
        'user_id' => $faker->word,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
