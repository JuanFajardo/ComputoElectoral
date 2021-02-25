<?php

namespace App\Http\Controllers;

use App\Voto;
use Illuminate\Http\Request;

class VotoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Voto::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Voto.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Voto;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Voto');
  }

  public function show($id){
    $datos = Voto::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Voto::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Voto');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Voto::find($id);
      $dato->delete();
      return "Voto Eliminado";
    }else{
      return redirect('/Voto');
    }
  }

}
