<?php

namespace App\Http\Controllers;

use App\Distrito;
use Illuminate\Http\Request;

class DistritoController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Distrito::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Distrito.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Distrito;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Distrito');
  }

  public function show($id){
    $datos = Distrito::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Distrito::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Distrito');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Distrito::find($id);
      $dato->delete();
      return "Distrito Eliminado";
    }else{
      return redirect('/Distrito');
    }
  }

}
