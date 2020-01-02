<?php

use Illuminate\Database\Seeder;
use App\Etudiant;

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
    }
}
