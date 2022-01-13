<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

App\Models\User;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'password' => $faker->word,
        'role_id' => $faker->randomDigitNotNull,
        'active' => $faker->randomDigitNotNull,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
