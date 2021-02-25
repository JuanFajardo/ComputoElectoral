<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
  protected $table = 'votos';
  protected $fillable = ['id', 'id_mesa', 'id_persona', 'as', 'cc', 'mas', 'adn', 'jap', 'mcp', 'ucs', 'puka', 'mds', 'mts', 'fpv', 'mop', 'nulo', 'blanco', 'total', 'codigo_celular', 'latitud', 'longitud', 'acta_votos', 'observacion', 'aceptado', 'tipo' ];

}
