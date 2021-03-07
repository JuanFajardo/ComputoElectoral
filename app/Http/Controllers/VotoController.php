<?php

namespace App\Http\Controllers;

use App\Voto;
use App\Distrito;
use Illuminate\Http\Request;

class VotoController extends Controller
{


  public function index(Request $request){
    $datos = Voto::Where('aceptado', '=', '1')
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

    $mesa = \App\Mesa::find($dato->id_mesa);
    $mesa->contador = $mesa->contador  + 1;
    $mesa->save();

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

    $dato->als      = $request->als;
    $dato->pan      = $request->pan;
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

    $dato->tipo    = $request->tipo;

    $dato->observacion = $request->observacion;
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
  $distrito=Distrito::orderBy("id")->get();

  return view("grafico.index",compact("distrito"));
}

public function BuscarZona($id)
{
  $datos=\DB::table("zonas")->where("id_distrito",$id)->orderBy("id")->get();
  return $datos;
}

public function BuscarRecinto($id)
{
  $datos=\DB::table("recintos")->where("id_zona",$id)->orderBy("id")->get();
  return $datos;
}

public function VerGrafico(Request $request)
{
  $mop=Voto::sum("mop");//1
  $puka=Voto::sum("puka");//2
  $fpv=Voto::sum("fpv");//3
  $jap=Voto::sum("jap");//4
  //$panbol=Voto::sum("panbol");//5
  $ucs=Voto::sum("ucs");//6
  $mas=Voto::sum("mas");//7
  $mcp=Voto::sum("mcp");//8
  $mds=Voto::sum("mds");//9
  $mts=Voto::sum("mts");//10
  $cc=Voto::sum("cc");//11
  $as=Voto::sum("als");//12
  $adn=Voto::sum("adn");//13
  $nulo=Voto::sum("nulo");//14
  $blanco=Voto::sum("blanco");//15
  return view("grafico.grafico",compact("mop","puka","fpv","jap","ucs","mas","mcp","mds","mts","cc","as","adn","nulo","blanco"));
}

public function ContarVotos()
{
  $mop=Voto::sum("mop");//1
  $puka=Voto::sum("puka");//2
  $fpv=Voto::sum("fpv");//3
  $jap=Voto::sum("jap");//4
  //$panbol=Voto::sum("panbol");//5
  $ucs=Voto::sum("ucs");//6
  $mas=Voto::sum("mas");//7
  $mcp=Voto::sum("mcp");//8
  $mds=Voto::sum("mds");//9
  $mts=Voto::sum("mts");//10
  $cc=Voto::sum("cc");//11
  $as=Voto::sum("als");//12
  $adn=Voto::sum("adn");//13
  $nulo=Voto::sum("nulo");//14
  $blanco=Voto::sum("blanco");//15
  $datos=array(
              "mop"=>$mop,
              "puka"=>$puka,
              "fpv"=>$fpv,
              "jap"=>$jap,
              //"panbol"=>$panbol,
              "ucs"=>$ucs,
              "mas"=>$mas,
              "mcp"=>$mcp,
              "mds"=>$mds,
              "mts"=>$mts,
              "cc"=>$cc,
              "as"=>$as,
              "adn"=>$adn,
              "nulo"=>$nulo,
              "blanco"=>$blanco,
              );
    return $datos;
}


}
