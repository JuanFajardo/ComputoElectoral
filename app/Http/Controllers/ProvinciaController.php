<?php

namespace App\Http\Controllers;

use App\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Provincia::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Provincia.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Provincia;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Provincia');
  }

  public function show($id){
    $datos = Provincia::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Provincia::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Provincia');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Provincia::find($id);
      $dato->delete();
      return "Provincia Eliminado";
    }else{
      return redirect('/Provincia');
    }
  }

}
