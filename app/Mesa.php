<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
  protected $table = 'mesas';
  protected $fillable = ['id', 'mesa', 'id_departamento', 'id_provincia', 'id_circ', 'id_municipio', 'id_distrito', 'id_zona', 'id_recinto', 'habilitados', 'contador'];

}
