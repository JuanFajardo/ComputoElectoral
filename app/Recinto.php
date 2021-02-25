<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recinto extends Model
{
  protected $table = 'recintos';
  protected $fillable = ['id', 'recinto', 'id_departamento', 'id_provincia', 'id_circ', 'id_municipio', 'id_distrito', 'id_zona'];

}
