<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entreprise;
use Faker\Generator as Faker;

$factory->define(Entreprise::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'nom' => $faker->word,
        'registrecommerce' => $faker->word,
        'contact' => $faker->randomDigitNotNull,
        'localisation' => $faker->word,
        'infoentrepriseactivite' => $faker->word
    ];
});
