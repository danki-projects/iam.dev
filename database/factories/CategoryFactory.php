<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->words(2, true),
        'description' => $faker->text(160),
        'status' => $faker->randomElement([true, false]),
    ];
});
