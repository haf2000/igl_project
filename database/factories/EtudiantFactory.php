<?php

use Faker\Generator as Faker;
use App\Etudiant;

$factory->define(Etudiant::class, function (Faker $faker) {
	//$promos = ['1cp','2cp','1cs','2cs','3cs'];
$sections = ['A','B','C'];
$groupes = ['01','02','03','04','05','06','07','08','09','10'];

    return [
        	'nom' => $faker->name,
            'prenom' => $faker->name,
            'matricule' => $faker->randomNumber(6),
             'section' => $sections[array_rand($sections)],
        	'groupe' => $groupes[array_rand($groupes)],
    ];
});


