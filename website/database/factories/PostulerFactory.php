<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Postuler;
use Faker\Generator as Faker;

$factory->define(Postuler::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'nom' => $faker->word,
        'email' => $faker->word,
        'lien' => $faker->word,
        'cv' => $faker->word,
        'lettre' => $faker->word,
        'user_id' => $faker->randomDigitNotNull
    ];
});
