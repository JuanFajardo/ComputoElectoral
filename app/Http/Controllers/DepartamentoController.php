<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Departamento::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Departamento.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Departamento;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Departamento');
  }

  public function show($id){
    $datos = Departamento::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Departamento::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Departamento');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Departamento::find($id);
      $dato->delete();
      return "Departamento Eliminado";
    }else{
      return redirect('/Departamento');
    }
  }

}
