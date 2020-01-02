<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'image' => $faker->imageUrl($width = 200, $height = 200),
        'type' => $faker->name,
        'price' => $faker->randomDigit


    ];
});
