<?php

namespace App\Http\Controllers;
use App\Etudiant;
use Illuminate\Http\Request;
use App\Http\Resources\Etudiant as EtudiantResource;
use App\Http\Requests;

class EtudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
     //$etudiants = Etudiant::paginate(1);
     $etudiants = Etudiant::All();
     return EtudiantResource::collection($etudiants); 

    }

    public function store(Request $request)
    {
        $etudiant = new Etudiant;
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->matricule = $request->input('matricule');
        $etudiant->section = $request->input('section');
        $etudiant->groupe = $request->input('groupe');
        if($etudiant->save()){
        return new EtudiantResource($etudiant);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
 
        $etudiant = Etudiant::findOrFail($id);
        return new EtudiantResource($etudiant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        
    }
    public function update(Request $request, $id)
    {
        $etudiant =Etudiant::find($id);
        //-----------------------------------------
       $etudiant->nom = $request->input('nom');
       $etudiant->prenom = $request->input('prenom');
       $etudiant->matricule = $request->input('matricule');
       $etudiant->section = $request->input('section');
       $etudiant->groupe = $request->input('groupe');
       //--------------------------
       if($etudiant->save()){
       return new EtudiantResource($etudiant);
       }
    }
    
    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
     if($etudiant->delete()){
        return new EtudiantResource($etudiant);
      }
    }
}
