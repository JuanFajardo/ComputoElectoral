<?php

namespace App\Http\Controllers;

use App\Cir;
use Illuminate\Http\Request;

class CirController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Cir::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Cir.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Cir;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Cir');
  }

  public function show($id){
    $datos = Cir::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Cir::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Cir');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Cir::find($id);
      $dato->delete();
      return "Circuncisión Eliminado";
    }else{
      return redirect('/Cir');
    }
  }
}
