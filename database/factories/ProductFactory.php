<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    return [
        'title_en' => $faker->word,
        'title_ar' => $faker->word,
        'description_en' => $faker->word,
        'description_ar' => $faker->text,
        'category_id' => $faker->randomDigitNotNull,
        'region_id' => $faker->randomDigitNotNull,
        'url' => $faker->word,
        'image' => $faker->word,
        'status' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
