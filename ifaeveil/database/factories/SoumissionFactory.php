<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Soumission;
use Faker\Generator as Faker;

$factory->define(Soumission::class, function (Faker $faker) {

    return [
        'exam_id' => $faker->randomDigitNotNull,
        'description' => $faker->word,
        'filename' => $faker->word,
        'eleve_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
