<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'description' => $faker->text(160),
        'content' => $faker->paragraphs(33, true),
        'company_name' => $faker->company,
        'company_url' => "https://{$faker->domainName}",
        'status' => $faker->randomElement([true, false]),
    ];
});
