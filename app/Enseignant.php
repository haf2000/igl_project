<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $fillable = ['id','nom','prenom','grade','numero','email','bureau','sexe'];
}
