<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->numberBetween($min = 1, $max = 1000),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
