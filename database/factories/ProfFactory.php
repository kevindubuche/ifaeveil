<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Prof;
use Faker\Generator as Faker;

$factory->define(Prof::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'prenom' => $faker->word,
        'username' => $faker->word,
        'user_id' => $faker->word,
        'sexe' => $faker->word,
        'statusmatrimonial' => $faker->word,
        'datenaissance' => $faker->word,
        'tel' => $faker->word,
        'adresse' => $faker->word,
        'date_entree_en_service' => $faker->word,
        'religion' => $faker->word,
        'nif' => $faker->word,
        'niveau' => $faker->word,
        'option' => $faker->word,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
