<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quiznote;
use Faker\Generator as Faker;

$factory->define(Quiznote::class, function (Faker $faker) {

    return [
        'id_eleve' => $faker->word,
        'quiz_id' => $faker->randomDigitNotNull,
        'score' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
