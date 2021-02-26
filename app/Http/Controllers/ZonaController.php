<?php

namespace App\Http\Controllers;

use App\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{

  public function index(Request $request){
    $datos = Zona::Join('distritos', 'zonas.id_distrito', 'distritos.id')
                   ->select('zonas.*', 'distritos.distrito')
                   ->orderBy('zonas.zona', 'asc')
                   ->get();

    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Zona.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Zona;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Zona');
  }

  public function show($id){
    $datos = Zona::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Zona::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Zona');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Zona::find($id);
      $dato->delete();
      return "Zona Eliminado";
    }else{
      return redirect('/Zona');
    }
  }

}
