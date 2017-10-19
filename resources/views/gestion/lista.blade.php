@extends('layouts.admin')
@section('content')
  @include('alerts.success')
  @include('alerts.request')
  <br>
  <div class="panel panel-primary">
    <div class="panel-body">


      <h1 id="cabeza">Lista de Gestiones</h1>

      <br>
      <div class="panel panel-default">
        <div class="panel-body">
          <input type="text" class="form-control" placeholder="Busqueda por Fecha" name="search" id="search">
        </div>
      </div>

      <div id="tbody">
        <table class="table table-hover">
          <tr class="info">
            <th style="width: 50%">Fecha</th>
            <th>Opciones</th>
          </tr>
          @foreach($gestiones as $gestion)
            <tr class="warning">
              <td>{{$gestion->fecha}}</td>
              <td>

                {!! Form::open(['method'=>'DELETE', 'route'=>['gestion.destroy',$gestion->id]]) !!}
                <a href="{{ route('gestion.edit', $gestion->id) }}" class="btn btn-warning" aria-label="Skip to main navigation">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>
                <a href="{{ route('gestion.todos',$gestion->id) }}" class="btn btn-info" aria-label="Skip to main navigation">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Todos
                </a>
                <a href="{{ route('gestion.colores',$gestion->id) }}" class="btn btn-info" aria-label="Skip to main navigation">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Colores
                </a>
                <a href="#" class="btn btn-info" aria-label="Skip to main navigation">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cargos
                </a>
                <button class="btn btn-danger" type="submit"
                        data-toggle="confirmation"
                        data-placement="left"
                        data-title="¿Quieres continuar eliminando a {{$gestion->fecha}}?"
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
        {{$gestiones->links()}}
      </div>
    </div>
  </div>
@endsection