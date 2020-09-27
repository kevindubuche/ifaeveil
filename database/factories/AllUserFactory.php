<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AllUser;
use Faker\Generator as Faker;

$factory->define(AllUser::class, function (Faker $faker) {

    return [
        'username' => $faker->word,
        'role' => $faker->word,
        'password' => $faker->word,
        'remember_token' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
