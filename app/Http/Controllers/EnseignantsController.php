<?php

namespace App\Http\Controllers;
use App\Enseignant;
use Illuminate\Http\Request;
use App\Http\Resources\Enseignant as EnseignantResource;
use App\Http\Requests;
class EnseignantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profs = Enseignant::All();
        return EnseignantResource::collection($profs); 
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prof = new Enseignant;
        $prof->nom = $request->input('nom');
        $prof->prenom = $request->input('prenom');
        $prof->grade = $request->input('grade');
        $prof->numero = $request->input('numero');
        $prof->email = $request->input('email');
        $prof->bureau = $request->input('bureau');
        $prof->sexe = $request->input('sexe');
        if($prof->save()){
        return new EnseignantResource($prof);
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
        $prof = Enseignant::findOrFail($id);
        return new EnseignantResource($prof);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prof = Enseignant::find($id);
        //-----------------------------------------
       $prof->nom = $request->input('nom');
       $prof->prenom = $request->input('prenom');
       $prof->grade = $request->input('grade');
       $prof->numero = $request->input('numero');
       $prof->email = $request->input('email');
       $prof->bureau = $request->input('bureau');
       $prof->sexe = $request->input('sexe');
       //--------------------------
       if($prof->save()){
       return new EnseignantResource($prof);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prof = Enseignant::findOrFail($id);
        if($prof->delete()){
           return new EnseignantResource($prof);
         }
    }
}
