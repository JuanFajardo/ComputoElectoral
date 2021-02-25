<?php

namespace App\Http\Controllers;

use App\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Mesa::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Mesa.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Mesa;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Mesa');
  }

  public function show($id){
    $datos = Mesa::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Mesa::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Mesa');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Mesa::find($id);
      $dato->delete();
      return "Mesa Eliminado";
    }else{
      return redirect('/Mesa');
    }
  }

}
