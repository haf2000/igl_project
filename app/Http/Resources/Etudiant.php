<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Etudiant extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
    return [   
        'id'=> $this->id,   
        'nom' => $this->nom,
        'prenom' => $this->prenom,
        'matricule' => $this->matricule,
        'section' => $this->section,
        'groupe' => $this->groupe,
    ];
    }
}
