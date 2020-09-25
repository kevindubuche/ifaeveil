<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quiz_reponse;
use Faker\Generator as Faker;

$factory->define(Quiz_reponse::class, function (Faker $faker) {

    return [
        'id_question' => $faker->word,
        'explication' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
