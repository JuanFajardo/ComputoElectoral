<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
  protected $table = 'distritos';
  protected $fillable = ['id', 'distrito', 'id_departamento', 'id_provincia', 'id_circ', 'id_municipio'];

}
