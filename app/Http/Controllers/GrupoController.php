<?php

namespace campamento\Http\Controllers;

use campamento\Gestion;
use campamento\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::_getAllGrupos()->paginate(10);
        return view('grupo.lista',compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gestiones = Gestion::orderBy('fecha','desc')->get()->pluck('fecha','id');
        return view('grupo.create',compact('gestiones'));
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
            'color'=>'required',
            'id_gestion'=>'required'
        ]);

        Grupo::create([
            'color' =>$request['color'],
            'codigo' =>$request['codigo'],
            'id_gestion' => $request['id_gestion']
        ]);

        return back()->with('message','Grupo Registrado Exitosamente...');
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
        $grupo = Grupo::find($id);
        $gestiones = Gestion::orderBy('fecha','desc')->get()->pluck('fecha','id');
        return view('grupo.edit',compact('grupo','gestiones'));
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
            'color'=>'required',
            'id_gestion'=>'required'
        ]);
        $grupo = Grupo::find($id);
        $grupo->update($request->all());
        $grupo->save();
        Session::flash('message','Grupo Modificado Exitosamente...');
        $grupos = Grupo::_getAllGrupos()->paginate(10);
        return view('grupo.lista',compact('grupos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grupo::destroy($id);

        Session::flash('message','Grupo Eliminado Exitosamente...');
        return back();
    }
}
