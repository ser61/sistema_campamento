<?php

namespace campamento\Http\Controllers;

use campamento\Boleta;
use campamento\Campista;
use campamento\ColorHombre;
use campamento\ColorMujer;
use campamento\Gestion;
use campamento\Grupo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BoletaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

  }

  public function printBoleta($id_boleta)
  {
    $boleta = Boleta::_getBoleta($id_boleta)->get()->first();
    $boleta['fecha'] = Carbon::createFromFormat('Y-m-d', $boleta->fecha)->format('d M Y');
    $pdf = \PDF::loadView('boleta.pdf',compact('boleta'));
    return $pdf->stream('Boleta de la gestion: '.$boleta->fecha.'pdf');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $id_campista)
  {
    $ul_gestion=Gestion::_getGestiones()->get()->first();
    $verificar = Boleta::_getSiInscrito($id_campista,$ul_gestion->id)->get();
    if(count($verificar)==0){
      $this->validate($request,[
        'monto'=>'required|numeric|min:1|max:500'
      ]);
      $campista=Campista::find($id_campista);
      //asignar un color dependiendo si es hombre o mujer
      if($campista->sexo =='M'){
        $colorHombres=ColorHombre::all();
        if(count($colorHombres )== 0){
          ColorHombre::_reset($ul_gestion->id);
        }
        $color =ColorHombre::_getColor()->get()->first();
        ColorHombre::destroy($color->id);//return $color;
      }else{
        $colorMujeres=ColorMujer::all();
        if(count($colorMujeres )== 0){

          ColorMujer::_reset($ul_gestion->id);
        }
        $color =ColorMujer::_getColor()->get()->first();
        ColorMujer::destroy($color->id);//return $color;
      }

      $colorAsig = Grupo::_getIdColor($ul_gestion->id,$color->color)->get()->first();
      $fecha =Carbon::now()->format('Y-m-d');
      $hora =Carbon::now()->format('H:i:s');
      Boleta::create([
        'id_campista' => $campista->id,
        'id_grupo'    =>$colorAsig->id,
        'fecha'       =>$fecha,
        'hora'        => $hora,
        'monto'       =>$request['monto']
      ]);
      $monto = $request['monto'];
      $boleta = Boleta::select('id')->orderBy('created_at','desc')->get()->first()->id;
      Session::flash('message','Campista inscrito Exitosamente');
      return view('boleta.show',compact('campista','color','monto','boleta'));
    }
    Session::flash('message','Campista ya Inscrito !!!');
    $campistas=Campista::_getCampistas()->paginate(10);
    return view('campista.lista',compact('campistas'));
  }

  public function show($id)
  {
    return 'hola';
  }

  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
