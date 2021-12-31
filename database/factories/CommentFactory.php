<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'stars' => $faker->numberBetween(1, 5),
        'content' => $faker->paragraphs(4, true),
        'item_type' => 'App\Model\Post',
        'item_id' => $faker->numberBetween(1, 50),
        'status' => $faker->randomElement([true, false]),
    ];
});
