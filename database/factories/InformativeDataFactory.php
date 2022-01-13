<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\InformativeData;
use Faker\Generator as Faker;

$factory->define(InformativeData::class, function (Faker $faker) {

    return [
        'about_en' => $faker->word,
        'about_ar' => $faker->word,
        'our_mission_en' => $faker->word,
        'our_mission_ar' => $faker->word,
        'privecy_policy_en' => $faker->word,
        'privecy_policy_ar' => $faker->word,
        'contact_email' => $faker->word,
        'phone_number' => $faker->word,
        'facebook_link' => $faker->word,
        'facebook_link' => $faker->word,
        'youtube_link' => $faker->word,
        'twitter_link' => $faker->word,
        'instgram_link' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
