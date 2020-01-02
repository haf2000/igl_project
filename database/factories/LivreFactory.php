<?php

use Faker\Generator as Faker;
use App\Livre;
$factory->define(Livre::class, function (Faker $faker) {
  $dispo = ['1','0'];
    return [
        	'titre' => $faker->text(5),
            'numero_chapitres' => $faker->randomNumber(3),
            'numero_pages' => $faker->randomNumber(3),
            'description' => $faker->text(50),
             'disponible' => $dispo[array_rand($dispo)],
    ];
});

