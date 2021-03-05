<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
      protected $table = 'logs';
      protected $fillable = ['id', 'ip', 'latitud', 'longitud', 'codigo', 'celular', 'foto'];


        public function setFotoAttribute($foto){
          $this->attributes['Foto'] = md5(date('Y_m_d_H_i_s_')).'_'.$foto->getClientOriginalName();
          $name = md5(date('Y_m_d_H_i_s_')).'_'.$foto->getClientOriginalName();
          \Storage::disk('local')->put($name, \File::get($foto));
        }



}
