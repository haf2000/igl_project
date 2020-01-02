<?php
namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Etudiant;

class EtudiantTest extends TestCase
{
    /*****************tester si on peut ajouter un etudiant (POST request)************************************/
    public function test_Ajouter_Etudiant()
    {
               $student =factory(Etudiant::class)->make()->toArray();
                $this->response = $this->json('POST', 'api/etudiant/1',$student);
                error_log('Test API REsponse');
            $this->assertJson(json_encode($student));
           
            $this->response->assertStatus(201);       
     error_log('Test Statuts code');
    }
    /*****************tester si on peut recuperer la liste des etudiants (GET request)************************************/    
    public function test_Lister_Etudiants()
    {
               $student =factory(Etudiant::class)->create();

                 $this->response = $this->json('GET', 'api/etudiant/'.$student->id);
                 error_log('Test API REsponse');
                  $this->assertJson(json_encode($student));
                 $this->response->assertStatus(200);       
               error_log('Test Statuts code');
    }
/*****************tester si on peut supprimer un etudiant (DELETE request)************************************/    
    public function test_supprimer_Etudiant()
    {
               $student =factory(Etudiant::class)->create();
                 $this->response = $this->json('DELETE', 'api/etudiant/'.$student->id);
                   error_log('Test API REsponse'); 
                     $this->response = $this->json('GET', 'api/etudiant/'.$student->id);
                    $this->response->assertStatus(404);       
                   error_log('Test Statuts code');

    }


}




