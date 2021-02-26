<?php

namespace App\Http\Controllers;

use App\Voto;
use Illuminate\Http\Request;

class VotoController extends Controller
{


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

public function Grafico()
{
  $as=Voto::sum("as");
  $mas=Voto::sum("mas");
  $adn=Voto::sum("adn");
  $jap=Voto::sum("jap");
  $mcp=Voto::sum("mcp");
  $ucs=Voto::sum("ucs");
  $puka=Voto::sum("puka");
  $mds=Voto::sum("mds");
  $mts=Voto::sum("mts");
  $fpv=Voto::sum("fpv");
  $mop=Voto::sum("mop");
  $nulo=Voto::sum("nulo");
  $blanco=Voto::sum("blanco");

  return view("grafico.index",compact("as","mas","adn","jap","mcp","ucs","puka","mds","mts","fpv","mop","nulo","blanco"));
}

}
