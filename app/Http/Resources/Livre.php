<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Livre extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {    
        if($this->disponible == '1'){
            $dispo="oui";
        }else{
            $dispo = "non";
        }
        
        return [
            'name' => $this->titre,
            'numero_chapitres' => $this->numero_chapitres,
            'numero_pages' => $this->numero_pages,
            'description' => $this->description,
            'disponible' => $dispo,
        ];
    }
}
