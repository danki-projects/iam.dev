<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->words(4, true),
        'description' => $faker->text(160),
        'content' => $faker->paragraphs(20, true),
        'status' => $faker->randomElement([true, false]),
    ];
});
