<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{

  public function index(Request $request){
    $datos = Persona::all();

    $recintos = \App\Mesa::Join('recintos', 'mesas.id_recinto', '=', 'recintos.id')
                          ->select('mesas.*', 'recintos.recinto')->orderBy('recintos.recinto', 'asc' )->orderBy('mesas.id', 'asc' )->get();

    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Persona.index', compact('datos', 'recintos'));
    }
  }

  public function store(Request $request){
    $dato = new Persona;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Persona');
  }

  public function show($id){
    $datos = Persona::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Persona::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Persona');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Persona::find($id);
      $dato->delete();
      return "Persona Eliminado";
    }else{
      return redirect('/Persona');
    }
  }
  public function revisar($ci, $codigo){
    $dato  = Persona::Where('ci','=', $ci)->where('codigo_persona', '=', $codigo)->wher('codigo_celular', '=', '0')->get();

    if( count($dato) > 0 ){
      $dato = array('respuesta'=>'SI', 'codigo'=>$dato[0]->id);

      $actualizar = Persona::find($dato->id);
      $actualizar->codigo_celular = Request::ip();;
      $actualizar->save();

    }else{
      $dato = array('respuesta'=>'NO', 'codigo'=>'PUTORICHARD');
    }
    return $dato;
  }

}
