<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Municipio::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Municipio.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Municipio;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Municipio');
  }

  public function show($id){
    $datos = Municipio::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Municipio::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Municipio');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Municipio::find($id);
      $dato->delete();
      return "Municipio Eliminado";
    }else{
      return redirect('/Municipio');
    }
  }

}
