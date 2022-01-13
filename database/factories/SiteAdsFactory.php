<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SiteAds;
use Faker\Generator as Faker;

$factory->define(SiteAds::class, function (Faker $faker) {

    return [
        'image' => $faker->word,
        'url' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
