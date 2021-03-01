<?php

namespace App\Http\Controllers;

use App\Recinto;
use App\Mesa;
use Illuminate\Http\Request;

class RecintoController extends Controller
{

  public function index(Request $request){
    //'recinto', 'id_departamento', 'id_provincia', 'id_circ', 'id_municipio', 'id_distrito', 'id_zona'];
    $datos = Recinto::Join('distritos', 'recintos.id_distrito', '=', 'distritos.id')
                      ->join('zonas',   'recintos.id_zona', '=', 'zonas.id')
                      ->select('recintos.*', 'distritos.distrito', 'zonas.zona')
                      ->orderBy('recintos.recinto', 'asc')
                      ->get();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Recinto.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Recinto;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Recinto');
  }

  public function show($id){
    $datos = Recinto::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Recinto::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Recinto');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Recinto::find($id);
      $dato->delete();
      return "Recinto Eliminado";
    }else{
      return redirect('/Recinto');
    }
  }

  public function getRecintos(){
    $datos = Recinto::Select('id', 'recinto')->orderBy('recinto', 'asc')->get();
    return $datos;
  }

  public function getMesa($id){
    $datos = Mesa::Where('id_recinto', $id)->select('id', 'mesa', 'habilitados')->orderBy('id', 'asc')->get();
    return $datos;
  }

}
