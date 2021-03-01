<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
  protected $table = 'votos';
  protected $fillable = ['id', 'id_mesa', 'id_persona', 'als', 'pan', 'cc', 'mas', 'adn', 'jap', 'mcp', 'ucs', 'puka', 'mds', 'mts', 'fpv', 'mop', 'nulo', 'blanco', 'total', 'codigo_celular', 'latitud', 'longitud', 'acta', 'observacion', 'aceptado', 'tipo' ];


    public function setActaAttribute($acta){
      $this->attributes['Acta'] = md5(date('Y_m_d_H_i_s_')).'_'.$acta->getClientOriginalName();
      $name = md5(date('Y_m_d_H_i_s_')).'_'.$acta->getClientOriginalName();
      \Storage::disk('local')->put($name, \File::get($acta));
    }

}
