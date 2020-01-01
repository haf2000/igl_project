<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Enseignant extends Resource
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
            'id' => $this->id, 
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'grade' => $this->grade,
            'numero' => $this->numero,
            'email' => $this->email,
            'bureau' => $this->bureau,
            'sexe' => $this->sexe,
        ];
    }
}
