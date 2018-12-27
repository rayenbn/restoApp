<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->text(50),
        'order' => $faker->unique()->numberBetween($min = 1, $max = 100)
    ];
});
