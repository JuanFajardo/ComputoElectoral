<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cir extends Model
{
  protected $table = 'cirs';
  protected $fillable = ['id', 'circ', 'id_departamento', 'id_provincia'];

}
