@extends('layouts.admin')
@section('content')
    @include('alerts.success')
    @include('alerts.request')
    <br>
    <div class="panel panel-primary">
        <div class="panel-body">


            <h1 id="cabeza">Lista de Directivos y Pastores</h1>

            <br>
            <div class="panel panel-default">
                <div class="panel-body">
                    <input type="text" class="form-control" placeholder="Busqueda por nombre, apellido o carnet..." name="search" id="search">
                </div>
            </div>

            <div id="tbody">
                <table class="table table-hover">
                    <tr class="info">
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Carnet</th>
                        <th>Telefono</th>
                        <th>Opciones</th>
                    </tr>
                    @foreach($directivos as $directivo)
                        <tr class="warning">
                            <td>{{$directivo->nombre}}</td>
                            <td>{{$directivo->apellido}}</td>
                            <td>{{$directivo->ci}}</td>
                            <td>{{$directivo->telefono}}</td>
                            <td>

                                {!! Form::open(['method'=>'DELETE', 'route'=>['directivo.destroy',$directivo->ci]]) !!}
                                <a href="{{ route('directivo.edit', $directivo->ci) }}" class="btn btn-warning" aria-label="Skip to main navigation">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <button class="btn btn-danger" type="submit"
                                        data-toggle="confirmation"
                                        data-placement="left"
                                        data-title="¿Quieres continuar eliminando a {{$directivo->nombre}}?"
                                        data-btnOkClass="btn btn-primary"
                                        data-btnOkLabel='<i class="fa fa-check-circle"></i> Si'
                                        data-btnCancelClass="btn btn-default"
                                        data-btnCancelLabel='<i class="fa fa-times-circle" aria-hidden="true"></i> No'>
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$directivos->links()}}
            </div>
        </div>
    </div>
@endsection