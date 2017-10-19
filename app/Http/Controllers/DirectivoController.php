<?php

namespace campamento\Http\Controllers;

use campamento\Directivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DirectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directivos=Directivo::_getDirectivos()->paginate(10);
        return view('directivo.lista',compact('directivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('directivo.create');//
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
            'ci'=>'unique:directivos,ci|required|numeric|min:10000|max:999999999',
            'nombre'=>'required',
            'apellido'=>'required',
            'fecha_nacimiento'=>'required'
        ]);

        Directivo::create([
            'ci' => $request['ci'],
            'nombre' =>$request['nombre'],
            'apellido'=>$request['apellido'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'telefono' => $request['telefono'],
        ]);
        Session::flash('message','Directivo Registrado Exitosamente!!');
        return back();
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

        $directivo=Directivo::find($id);
        return view('directivo.edit',compact('directivo'));//
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
            'ci'=>'required|numeric|min:10000|max:999999999',
            'nombre'=>'required',
            'apellido'=>'required',
            'fecha_nacimiento'=>'required'
        ]);
        $directivo =Directivo::find($id);
        $directivo->update($request->all());
        $directivo->save();
        Session::flash('message','Directivo actualizado exitosamente...');
        $directivos=Directivo::_getDirectivos()->paginate(10);
        return view('directivo.lista',compact('directivos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Directivo::destroy($id);
        Session::flash('message','Directivo Eliminado Exitosamente...');
        return back();
    }
}
