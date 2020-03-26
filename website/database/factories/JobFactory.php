<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {

    return [
        'titre' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'typeoffre' => $faker->word,
        'secteuractivite' => $faker->word,
        'niveauetude' => $faker->word,
        'lieu' => $faker->word,
        'datelimite' => $faker->word,
        'description' => $faker->word
    ];
});
