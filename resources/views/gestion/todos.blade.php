@extends('layouts.admin')
@section('content')
  @include('alerts.success')
  @include('alerts.request')
  <br>
  <div class="panel panel-primary">
    <div class="panel-body">
      <h1 id="cabeza">Lista de Campistas de la gestion: {{$campistas->first()->fecha}}</h1>
      <br>      <br>
      <div class="row" align="center">
        <div class="col-lg-6">
          <h4><strong> Total de Campistas: </strong>{{$datos['total']}}</h4>
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-6">
          <h4><strong> Total de Hombres: </strong>{{$datos['hombres']}}</h4>
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->

      <div class="row" align="center">
        <div class="col-lg-6">
          <h4><strong> Total Monto: </strong>{{$datos['monto']}}</h4>
        </div><!-- /.col-lg-6 -->
        <div class="col-lg-6">
          <h4><strong> Total de Mujeres: </strong>{{$datos['mujeres']}}</h4>
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->

      <br>
      <div class="panel panel-default">
        <div class="panel-body">
          <input type="text" class="form-control" placeholder="Busqueda por Fecha" name="search" id="search">
        </div>
      </div>
      <div id="tbody">
        <table class="table table-hover">
          <tr class="info">
            <th>Nombre</th>
            <th>Apellido</th>
            <th>CI</th>
            <th>Sexo</th>
            <th>Color</th>
            <th>Monto</th>
          </tr>
          @foreach($campistas as $campista)
            <tr class="warning">
              <td>{{$campista->nombre}}</td>
              <td>{{$campista->apellido}}</td>
              <td>{{$campista->ci}}</td>
              <td>{{$campista->sexo}}</td>
              <td>{{$campista->color}}</td>
              <td>{{$campista->monto}}</td>
            </tr>
          @endforeach
        </table>
        {{$campistas->links()}}
        <a href="{{route('gestion.printTodos',$campistas->first()->gestion)}}" class="btn btn-danger btn btn-block" aria-label="Skip to main navigation">
          <i class="fa fa-print" aria-hidden="true"></i> Imprimir
        </a>
      </div>
    </div>
  </div>
@endsection