<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContentUs;
use Faker\Generator as Faker;

$factory->define(ContentUs::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'phone_number' => $faker->word,
        'message' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
