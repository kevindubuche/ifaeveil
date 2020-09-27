<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quiz_proposition;
use Faker\Generator as Faker;

$factory->define(Quiz_proposition::class, function (Faker $faker) {

    return [
        'id_question' => $faker->word,
        'content_prop' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
