<?php

namespace campamento\Http\Controllers;

use campamento\Boleta;
use campamento\Campista;
use campamento\Gestion;
use campamento\Grupo;
use campamento\Iglesia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CampistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$campistas=Campista::_getCampistas()->paginate(10);
        $campistas=Campista::_getCampistas()->paginate(10);
        return view('campista.lista',compact('campistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iglesia=Iglesia::_getIglesias()->get()->pluck('nombre','cod');
        return view('campista.create',compact('iglesia'));//
    }
  
  public function searchCampistas(Request $request)
  {
    if($request->ajax()){
      $campistas = Campista::_buscarCampista($request['search'])->paginate(10);
      $search = $request['search'];
      $view = view('campista.getList', compact('campistas','search'));
      return Response($view);
    }
  }
  
  public function CampistaPaginatesearch(Request $request)
  {
    if($request->ajax()){
      $campistas = Campista::_buscarCampista($request['search'])->paginate(10);
      $search = $request['search'];
      return view('campista.getList', compact('campistas','search'));
    }
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
            'nombre'=>'required',
            'apellido'=>'required',
            'ci'=>'unique:campistas,ci|numeric|min:10000|max:999999999',
            'fecha_nacimiento'=>'required',
            'sexo'=>'required',
            'cod_iglesia'=>'required|numeric'
        ]);

        Campista::create([
            'nombre' =>$request['nombre'],
            'apellido'=>$request['apellido'],
            'ci' => $request['ci'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'sexo' => $request['sexo'],
            'telefono' => $request['telefono'],
            'cod_iglesia' => $request['cod_iglesia']
        ]);
        $campista = Campista::_getcampista()->get()->first();
        Session::flash('message','Campista registrado exitosamente...');
        return view('boleta.create',compact('campista'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ul_gestion = Gestion::_getGestiones()->get()->first();
        $verificar = Boleta::_getSiInscrito($id,$ul_gestion->id)->get();

        if(count($verificar)== 0){
            $campista = Campista::find($id);
            return view('boleta.create',compact('campista'));
        }
//        $ul_gestion = Gestion::_getGestiones()->get()->first();
//        $boletas= Boleta::_getBoletasCampista($id)->get;
//        $grupos = Grupo::_getColores($ul_gestion->id);
//        $sw =$boletas->join('')
        Session::flash('message','Campista ya Inscrito !!!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iglesia=Iglesia::_getIglesias()->get()->pluck('nombre','cod');
        $campista=Campista::find($id);
        return view('campista.edit',compact('iglesia','campista'));//
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
            'nombre'=>'required',
            'apellido'=>'required',
            'ci'=>'numeric|min:10000|max:999999999',
            'fecha_nacimiento'=>'required',
            'sexo'=>'required',
            'cod_iglesia'=>'required'
        ]);
        $campista=Campista::find($id);
        $campista->update($request->all());
        $campista->save();
        Session::flash('message','Campista actualizado exitosamente...');
        $campistas=Campista::_getCampistas()->paginate(10);
        return view('campista.lista',compact('campistas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Campista::destroy($id);
        Session::flash('message','Campista Eliminado Exitosamente...');
        return back();
    }
}
