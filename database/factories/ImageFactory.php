<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Model\Image::class, function (Faker $faker) {
    return [
        'slug' => $faker->imageUrl(640, 640, '640x640', true),
        'label' => $faker->words(2, true),
        'type' => 'gallery'
    ];
});
