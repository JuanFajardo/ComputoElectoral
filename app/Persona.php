<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  protected $table = 'personas';
  protected $fillable = ['id', 'id_mesa', 'persona', 'celular', 'ci', 'codigo_persona', 'codigo_celular'];
}
