@extends('layouts.admin')
@section('content')
  @include('alerts.success')
  @include('alerts.request')
  <br>
  <div class="panel panel-primary">
    <div class="panel-body">
      <h1 id="cabeza">Lista de Campistas por Colores<br>de la Gestion: {{$grupos[1]->first()->fecha}}</h1>
      <br>

      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        @foreach($grupos as $grupo)
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="btn btn-info" role="button" data-toggle="collapse" data-parent="#accordion"
                   href="#{{$grupo->first()->color}}"
                   style="width: 100%; height: 40px; background-color: {{$grupo->first()->codigo}}">
                  <strong>Grupo: {{$grupo->first()->color}}</strong>
                </a>
              </h4>
            </div>

            <div id="{{$grupo->first()->color}}" class="panel-collapse collapse">
              <div class="panel-body">

                  <table class="table table-hover">
                    <tr class="info">
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>CI</th>
                      <th>Sexo</th>
                      <th>Monto</th>
                    </tr>
                    @foreach($grupo as $campista)
                      <tr class="warning">
                        <td>{{$campista->nombre}}</td>
                        <td>{{$campista->apellido}}</td>
                        <td>{{$campista->ci}}</td>
                        <td>{{$campista->sexo}}</td>
                        <td>{{$campista->monto}}</td>
                      </tr>
                    @endforeach
                  </table>
                  {{$grupo->links()}}

                <a href="{{route('gestion.printColores',[$grupo->first()->gestion,$grupo->first()->grupo])}}" class="btn btn-danger btn btn-block" aria-label="Skip to main navigation">
                  <i class="fa fa-print" aria-hidden="true"></i> Imprimir
                </a>

              </div>
            </div>
          </div>

        @endforeach
      </div>

    </div>
  </div>
@endsection