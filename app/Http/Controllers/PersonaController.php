<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Persona::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Persona.index', compact('datos'));
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

}
