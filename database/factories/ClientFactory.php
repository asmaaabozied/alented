<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {

    return [
        'email' => $faker->word,
        'name' => $faker->word,
        'phone_number' => $faker->word,
        'image' => $faker->word,
        'password' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
