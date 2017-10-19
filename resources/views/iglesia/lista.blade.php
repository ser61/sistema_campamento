@extends('layouts.admin')
@section('content')
    @include('alerts.success')
    @include('alerts.request')
    <br>
    <div class="panel panel-primary">
        <div class="panel-body">


            <h1 id="cabeza">Lista de Iglesias</h1>

            <br>
            <div class="panel panel-default">
                <div class="panel-body">
                    <input type="text" class="form-control" placeholder="Busqueda por nombre..." name="search" id="search">
                </div>
            </div>

            <div id="tbody">
                <table class="table table-hover">
                    <tr class="info">
                        <th>Nombre</th>
                        <th>Pais</th>
                        <th>Departamento</th>
                        <th>Ciudad</th>
                        <th>Direccion</th>
                        <th>Opciones</th>
                    </tr>
                    @foreach($iglesias as $iglesia)
                        <tr class="warning">
                            <td>{{$iglesia->nombre}}</td>
                            <td>{{$iglesia->pais}}</td>
                            <td>{{$iglesia->departamento}}</td>
                            <td>{{$iglesia->ciudad}}</td>
                            <td>{{$iglesia->direccion}}</td>
                            <td>

                                {!! Form::open(['method'=>'DELETE', 'route'=>['iglesia.destroy',$iglesia->cod]]) !!}
                                <a href="{{ route('iglesia.edit', $iglesia->cod) }}" class="btn btn-warning" aria-label="Skip to main navigation">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <button class="btn btn-danger" type="submit"
                                        data-toggle="confirmation"
                                        data-placement="left"
                                        data-title="¿Quieres continuar eliminando a {{$iglesia->nombre}}?"
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
                {{$iglesias->links()}}
            </div>
        </div>
    </div>
@endsection