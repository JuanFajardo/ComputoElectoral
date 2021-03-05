<?php

namespace App\Http\Controllers;
use App\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
  public function index(Request $request){

    $datos = Log::all();

    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Log.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Log;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Log');
  }

  public function show($id){
    $datos = Log::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Log::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Log');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Log::find($id);
      $dato->delete();
      return "Log Eliminado";
    }else{
      return redirect('/Log');
    }
  }
}
