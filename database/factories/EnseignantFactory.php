<?php

use Faker\Generator as Faker;
use App\Enseignant;

$factory->define(Enseignant::class, function (Faker $faker) {
    $grades = ['Professeur','Docteur','Chargé-TD'];
    $sexes = ['Homme','Femme'];

        return [
        	'nom' => $faker->name,
            'prenom' => $faker->name,
            'grade' => $grades[array_rand($grades)],
             'numero' => $faker->randomNumber(9),
             'email' => $faker->email,
             'bureau' =>$faker->text(150),
             'sexe' => $sexes[array_rand($sexes)],
            ];
   
});
