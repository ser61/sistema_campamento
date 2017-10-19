<?php

namespace campamento\Http\Controllers;

use campamento\Directivo;
use campamento\Iglesia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IglesiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iglesias=Iglesia::_getIglesias1()->paginate(10);
        return view('iglesia.lista',compact('iglesias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pastores=Directivo::_getPastores()->get()->pluck('nombre','ci');

        return view('iglesia.create',compact('pastores'));
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
            'nombre'=>'required|unique:iglesias,nombre',
            'ci_pastor'=>'numeric|min:10000|max:999999999',
            'pais'=>'required',
            'departamento'=>'required'
        ]);
        if($request['ci_pastor']  ==   null){
            Iglesia::create([
                'nombre' =>$request['nombre'],
                'pais'=>$request['pais'],
                'departamento' => $request['departamento'],
                'ciudad' => $request['ciudad'],
                'direccion' => $request['direccion']
            ]);
        }else{
            Iglesia::create([

                'nombre' =>$request['nombre'],
                'ci_pastor' => $request['ci_pastor'],
                'pais'=>$request['pais'],
                'departamento' => $request['departamento'],
                'ciudad' => $request['ciudad'],
                'direccion' => $request['direccion']
            ]);

        }
        return back()->with('message','Iglesia Registrada exitosamente...');
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
        $iglesia =Iglesia::find($id);
        $pastores=Directivo::_getPastores()->get()->pluck('nombre','ci');
        return view('iglesia.edit',compact('iglesia','pastores'));
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
            'ci_pastor'=>'numeric|min:10000|max:999999999',
            'pais'=>'required',
            'departamento'=>'required'
        ]);
        $iglesia=Iglesia::find($id);
        $iglesia->update($request->all());
        $iglesia->save();
        Session::flash('message','Iglesia actualizada exitosamente...');
        $iglesias=Iglesia::_getIglesias1()->paginate(10);
        return view('iglesia.lista',compact('iglesias'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Iglesia::destroy($id);
        Session::flash('message','Iglesia Eliminada Exitosamente...');
        return back();
    }
}
