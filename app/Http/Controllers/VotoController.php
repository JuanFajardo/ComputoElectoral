<?php

namespace App\Http\Controllers;

use App\Voto;
use Illuminate\Http\Request;

class VotoController extends Controller
{


  public function index(Request $request){
    $datos = Voto::Where('tipo', '=', 'ALCALDE')->where('aceptado', '=', '1')
              ->join('mesas',     'votos.id_mesa',     '=', 'mesas.id')
              ->join('recintos',  'mesas.id_recinto', '=', 'recintos.id')
              ->join('zonas',     'mesas.id_zona',    '=', 'zonas.id')
              ->select('votos.*', 'mesas.mesa', 'mesas.habilitados', 'zonas.zona', 'recintos.recinto')
              ->orderBy('votos.id', 'asc')
              ->get();

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
    return $dato;

    /*if ($request->ajax()) {
        return $dato;
    }else{
      return redirect('/Voto');
    }*/

  }

  public function show($id){
    $datos = Voto::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    //return $request->all();
    $dato = Voto::find($request->id);

    $dato->as       = $request->as;
    $dato->cc       = $request->cc;
    $dato->mas      = $request->mas;
    $dato->adn      = $request->adn;
    $dato->jap      = $request->jap;
    $dato->mcp      = $request->mcp;
    $dato->ucs      = $request->ucs;
    $dato->puka     = $request->puka;
    $dato->mds      = $request->mds;
    $dato->mts      = $request->mts;
    $dato->fpv      = $request->fpv;
    $dato->mop      = $request->mop;
    $dato->nulo     = $request->nulo;
    $dato->blanco   = $request->blanco;
    $dato->total    = $request->total;
    $dato->observacion       = $request->observacion;
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

  public function votoVer($id){
    $datos = Voto::Where('votos.id', '=', $id)
              ->join('mesas',     'votos.id_mesa',     '=', 'mesas.id')
              ->join('recintos',  'mesas.id_recinto', '=', 'recintos.id')
              ->join('personas',     'votos.id_persona',    '=', 'personas.id')
              ->select('votos.*', 'recintos.recinto', 'personas.*', 'mesas.*', 'votos.id as votoId')
              ->get();
    return $datos;
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
