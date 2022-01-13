<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Packages;
use Faker\Generator as Faker;

$factory->define(Packages::class, function (Faker $faker) {

    return [
        'title_en' => $faker->word,
        'title_ar' => $faker->word,
        'duration' => $faker->randomDigitNotNull,
        'ads_number' => $faker->randomDigitNotNull,
        'ads_url_number' => $faker->randomDigitNotNull,
        'ad_charater_number' => $faker->randomDigitNotNull,
        'price' => $faker->randomDigitNotNull,
        'offer' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
