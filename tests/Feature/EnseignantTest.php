<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EnseignantTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_Ajouter_Enseignant()
    {

         /*   $formData = [
                'nom' => 'Challal',
                'prenom'  => 'Yacine',
                'grade'  => 'Professeur',
                'numero' => '0668363532',
                'email' => 'y_challal@esi.dz',
                'bureau' => 'Direction d\'étude dernier bureau à droite',
                'sexe' => 'Homme',
           ];
            $response = $this->json('POST', 'api/prof/1', $formData);
            $response->assertStatus(201); 


    }
}
