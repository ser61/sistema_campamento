@extends('layouts.admin')
@section('content')
    @include('alerts.success')
    @include('alerts.request')
    <br>
    <div class="panel panel-primary">
        <div class="panel-body">
            <h1 id="cabeza">Lista de Grupos</h1>
            <br>
            <div class="panel panel-default">
                <div class="panel-body">
                    <input type="text" class="form-control" placeholder="Busqueda por color..." name="search" id="search">
                </div>
            </div>
            <div id="tbody">
                <table class="table table-hover">
                    <tr class="info">
                        <th>Color</th>
                        <th>Gestion</th>
                        <th>Opciones</th>
                    </tr>
                    @foreach($grupos as $grupo)
                        <tr class="warning">
                            <td>{{$grupo->color}}</td>
                            <td>{{$grupo->gestion}}</td>
                            <td>

                                {!! Form::open(['method'=>'DELETE', 'route'=>['grupo.destroy',$grupo->id]]) !!}
                                <a href="{{ route('grupo.edit', $grupo->id) }}" class="btn btn-warning" aria-label="Skip to main navigation">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$grupos->links()}}
            </div>
        </div>
    </div>
@endsection