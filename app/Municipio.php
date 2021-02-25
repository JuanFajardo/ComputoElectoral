<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
  protected $table = 'municipios';
  protected $fillable = ['id', 'municipio', 'id_departamento', 'id_provincia', 'id_circ'];


}
