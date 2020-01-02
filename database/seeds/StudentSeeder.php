<?php

use Illuminate\Database\Seeder;
use App\Etudiant;
use App\Enseignant;
use App\Livre;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Etudiant::class , 10 )->create();
       factory(Enseignant::class , 10 )->create();
        factory(Livre::class , 10 )->create();
    }
}
