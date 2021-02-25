<?php

namespace App\Http\Controllers;

use App\Recinto;
use Illuminate\Http\Request;

class RecintoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Recinto::all();
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

}
