<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $fillable = ['id','titre','numero_chapitres','numero_pages','description','disponible','favoris'];

}
