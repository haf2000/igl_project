<?php

use Faker\Generator as Faker;
use App\Livre;

$factory->define(Livre::class, function (Faker $faker) {

    $dispo = ['0','1'];

    return [
        'titre' => $faker->text(6),
            'numero_chapitres' => $faker->randomNumber(3),
            'numero_pages' => $faker->randomNumber(3),
             'description' =>  $faker->text(100),
        	'disponible' => $dispo[array_rand($dispo)],
    ];
});
