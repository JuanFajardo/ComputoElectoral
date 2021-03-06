<?php

namespace App\Http\Controllers;

use App\Voto;
use App\Distrito;
use Illuminate\Http\Request;
use App\Mesa;
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

    $mesas = \App\Mesa::Join('recintos', 'mesas.id_recinto', 'recintos.id')
                        ->select('mesas.*', 'recintos.recinto')->get();

    if ($request->ajax()) {
      return $datos;
    }else{
      return view('Voto.index', compact('datos', 'mesas'));
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

    if($request->total>220)
    return redirect('/Voto')->with("mensaje","El total sobrepasa el limite de la mesa vuelva a verificar la mesa");
    $dato = Voto::find($request->id);
    $dato->aceptado =10;
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
    $dato->id_mesa    = $request->id_mesa;

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
  $tipo=$request->tipo;

  $mop=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mop");//1
  $puka=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("puka");//2
  $fpv=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("fpv");//3
  $jap=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("jap");//4
  $ucs=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("ucs");//6
  $panbol=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("pan");//5
  $mas=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mas");//7
  $mcp=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mcp");//8
  $mds=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mds");//9
  $mts=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mts");//10
  $cc=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("cc");//11
  $as=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("als");//12
  $adn=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("adn");//13
  $nulo=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("nulo");//14
  $blanco=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("blanco");//15
  $total=$mop+$puka+$fpv+$jap+$panbol+$ucs+$mas+$mcp+$mds+$mts+$cc+$as+$adn+$nulo+$blanco;
  $validos=$mop+$puka+$fpv+$jap+$panbol+$ucs+$mas+$mcp+$mds+$mts+$cc+$as+$adn;
  $conteo=Voto::where("tipo",$tipo)->where("aceptado",10)->count("id");
  $mesas=Mesa::count("id");
  $porcentaje=($conteo*100)/$mesas;
  $porcentaje=round($porcentaje,2);
  $grafico=round($porcentaje,PHP_ROUND_HALF_EVEN);
  return view("grafico.grafico",compact("mop","puka","fpv","jap","panbol","ucs","mas","mcp","mds","mts","cc","as","adn","nulo","blanco","total","validos","conteo","porcentaje","mesas","grafico","tipo"));
}

public function ContarVotos($tipo)
{
  $mop=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mop");//1
  $puka=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("puka");//2
  $fpv=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("fpv");//3
  $jap=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("jap");//4
  $panbol=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("pan");//5
  $uc=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("ucs");//6

  $mas=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mas");//7
  $mcp=Voto::where("tipo",$tipo)->where("aceptado",10)->where("aceptado",10)->sum("mcp");//8
  $mds=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mds");//9
  $mts=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mts");//10
  $cc=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("cc");//11
  $as=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("als");//12
  $adn=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("adn");//13
  $nulo=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("nulo");//14
  $blanco=Voto::where("tipo",$tipo)->sum("blanco");//15
  $total=$mop+$puka+$fpv+$jap+$panbol+$uc+$mas+$mcp+$mds+$mts+$cc+$as+$adn+$nulo+$blanco;
  $validos=$mop+$puka+$fpv+$jap+$panbol+$uc+$mas+$mcp+$mds+$mts+$cc+$as+$adn;

  $conteo=Voto::where("tipo",$tipo)->where("aceptado",10)->count("id");
  $mesas=Mesa::count("id");
  $porcentaje=($conteo*100)/$mesas;
  $porcentaje=round($porcentaje,2);
  $grafico=round($porcentaje,PHP_ROUND_HALF_EVEN);
  $datos=array(
              "mop"=>$mop,
              "puka"=>$puka,
              "fpv"=>$fpv,
              "jap"=>$jap,
              "panbol"=>$panbol,
              "uc"=>$uc,
              "mas"=>$mas,
              "mcp"=>$mcp,
              "mds"=>$mds,
              "mts"=>$mts,
              "cc"=>$cc,
              "as"=>$as,
              "adn"=>$adn,
              "nulo"=>$nulo,
              "blanco"=>$blanco,
              "total"=>$total,
              "validos"=>$validos,
              "conteo"=>$conteo,
              "mesas"=>$mesas,
              "porcentaje"=>$porcentaje,
              "grafico"=>$grafico
              );
    return $datos;
}


public function VerVotoAlcalde()
{
  $tipo="ALCALDE";

  $mop=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mop");//1
  $puka=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("puka");//2
  $fpv=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("fpv");//3
  $jap=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("jap");//4
  $ucs=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("ucs");//6
  $panbol=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("pan");//5
  $mas=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mas");//7
  $mcp=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mcp");//8
  $mds=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mds");//9
  $mts=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mts");//10
  $cc=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("cc");//11
  $as=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("als");//12
  $adn=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("adn");//13
  $nulo=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("nulo");//14
  $blanco=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("blanco");//15
  $total=$mop+$puka+$fpv+$jap+$panbol+$ucs+$mas+$mcp+$mds+$mts+$cc+$as+$adn+$nulo+$blanco;
  $validos=$mop+$puka+$fpv+$jap+$panbol+$ucs+$mas+$mcp+$mds+$mts+$cc+$as+$adn;
  $conteo=Voto::where("tipo",$tipo)->where("aceptado",10)->count("id");
  $mesas=Mesa::count("id");
  $porcentaje=($conteo*100)/$mesas;
  $porcentaje=round($porcentaje,2);
  $grafico=round($porcentaje,PHP_ROUND_HALF_EVEN);
  return view("grafico.grafico",compact("mop","puka","fpv","jap","panbol","ucs","mas","mcp","mds","mts","cc","as","adn","nulo","blanco","total","validos","conteo","porcentaje","mesas","grafico","tipo"));
}

public function VerVotoConcejal()
{
  $tipo="CONCEJAL";

  $mop=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mop");//1
  $puka=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("puka");//2
  $fpv=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("fpv");//3
  $jap=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("jap");//4
  $ucs=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("ucs");//6
  $panbol=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("pan");//5
  $mas=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mas");//7
  $mcp=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mcp");//8
  $mds=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mds");//9
  $mts=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("mts");//10
  $cc=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("cc");//11
  $as=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("als");//12
  $adn=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("adn");//13
  $nulo=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("nulo");//14
  $blanco=Voto::where("tipo",$tipo)->where("aceptado",10)->sum("blanco");//15
  $total=$mop+$puka+$fpv+$jap+$panbol+$ucs+$mas+$mcp+$mds+$mts+$cc+$as+$adn+$nulo+$blanco;
  $validos=$mop+$puka+$fpv+$jap+$panbol+$ucs+$mas+$mcp+$mds+$mts+$cc+$as+$adn;
  $conteo=Voto::where("tipo",$tipo)->where("aceptado",10)->count("id");
  $mesas=Mesa::count("id");// agragar un campo para diferenciar mesa alcalde/concejal
  $porcentaje=($conteo*100)/$mesas;
  $porcentaje=round($porcentaje,2);
  $grafico=round($porcentaje,PHP_ROUND_HALF_EVEN);
  return view("grafico.grafico",compact("mop","puka","fpv","jap","panbol","ucs","mas","mcp","mds","mts","cc","as","adn","nulo","blanco","total","validos","conteo","porcentaje","mesas","grafico","tipo"));
}

}
