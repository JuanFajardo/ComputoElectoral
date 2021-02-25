<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
  protected $table = 'zonas';
  protected $fillable = ['id', 'zona', 'id_departamento', 'id_provincia', 'id_circ', 'id_municipio', 'id_distrito'];

}
