<?php

namespace campamento\Http\Controllers;

use campamento\Gestion;
use campamento\Grupo;
use Illuminate\Foundation\Console\IlluminateCaster;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Array_;

class GestionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $gestiones= Gestion::_getGestiones()->paginate(10);
    return view('gestion.lista',compact('gestiones'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    return view('gestion.create');
  }

  public function todos($id_gestion)
  {
    $campistas = Gestion::_getTodos($id_gestion)->paginate(10);
    $datos = $this->datos($id_gestion);
    return view('gestion.todos', compact('campistas','datos'));
  }

  public function colores($id_gestion)
  {
    $colores = Grupo::_getColores($id_gestion)->get();
    $var = 1;
    foreach($colores as $color){
      $grupos[''.$var] = (Gestion::_getTodos($id_gestion)->where('g.id',$color->id)->paginate(10));
      $var = $var +1;
    }
    return view('gestion.colores', compact('grupos'));
  }

  public function printColores($gestion, $grupo)
  {
    $campistas = Gestion::_getTodos($gestion)->where('g.id',$grupo)->orderBy('sexo','asc')->get();
    $pdf = \PDF::loadView('gestion.pdfColores',compact('campistas'));
    return $pdf->stream('Grupo: '.$campistas->first()->color.' '.$campistas->first()->fecha.'.pdf');
  }

  public function printTodos($id_gestion)
  {
    $campistas = Gestion::_getTodos($id_gestion)->get();
    $datos = $this->datos($id_gestion);
    $pdf = \PDF::loadView('gestion.pdfTodos',compact('campistas','datos'));
    return $pdf->stream('Lista de Campistas de la gestion: '.$campistas->first()->fecha.'.pdf');
  }

  private function datos($id_gestion){
    $datos['total'] = count(Gestion::_getTodos($id_gestion)->get());
    $datos['monto'] = Gestion::_getTodos($id_gestion)->select(DB::raw('sum(monto) as totalMonto'))->get()->first()->totalMonto;
    $datos['hombres'] = Gestion::_getTodos($id_gestion)->select(DB::raw('count(if(sexo = "M",sexo,null)) as totalHombres'))->get()->first()->totalHombres;
    $datos['mujeres'] = Gestion::_getTodos($id_gestion)->select(DB::raw('count(if(sexo = "F",sexo,null)) as totalMujeres'))->get()->first()->totalMujeres;
    return $datos;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request,[
      'fecha'=>'required|date|unique:gestions,fecha'
    ]);

    Gestion::create([
      'fecha' => $request['fecha']
    ]);

    return back()->with('message','Gestion Registrada Exitosamente...');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {

    $gestion=Gestion::find($id);
    return view('gestion.edit',compact('gestion'));//
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
    $this->validate($request,[
      'fecha'=>'required|date|unique:gestions,fecha'
    ]);

    $gestion=Gestion::find($id);
    $gestion->update($request->all());
    $gestion->save();
    Session::flash('message','Gestion actualizada exitosamente...');
    $gestiones=Gestion::_getGestiones()->paginate(10);
    return view('gestion.lista',compact('gestiones'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Gestion::destroy($id);
    Session::flash('message','Gestion Eliminada Exitosamente...');
    return back();
  }
}
