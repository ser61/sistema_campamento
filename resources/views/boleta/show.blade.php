@extends('layouts.admin')
@section('content')
  @include('alerts.request')
  @include('alerts.success')
  <br>
  <div class="panel panel-primary" style="background:{{$color->codigo}}">
    <div class="panel-heading" align="center" style="font-size: 40px " >
      <strong>Boleta de Inscripcion</strong>
    </div>
    <h3 >
      <div class="panel-body" align="center" style="font-size: 30px;color:black" >
        <div class="form-group" >
          {!! Form::label('Nombre:') !!}
          {{$campista->nombre }} {{$campista->apellido}}
        </div>
        <br>
        <div class="form-group" style="padding-left: 30px">
          {!! Form::label('Grupo:') !!}
          {{$color->color}}
        </div>
        <br>
        <div class="form-group" style="padding-left: 30px">
          {!! Form::label('Monto:') !!}
          {{$monto}}
        </div>
        <br>
      </div>
    </h3>
    <div class="form-group" align="center">
      <a href="{{ route('campista.create') }}" class="btn btn-primary" aria-label="Skip to main navigation" style="width: 32%; height: 50px">
        <i class="fa fa-user-plus" aria-hidden="true"></i> <strong style="font-size: 20px">Continuar Registrando</strong>
      </a>

      <a href="{{ url('campista') }}" class="btn btn-primary" aria-label="Skip to main navigation" style="width: 32%; height: 50px">
        <i class="fa fa-bars" aria-hidden="true"></i> <strong style="font-size: 20px">Ir a Lista</strong>
      </a>

      <a href="{{route('boleta.print',$boleta)}}" class="btn btn-danger"
         style="width: 32%; height: 50px" target="_blank">
        <i class="fa fa-print" aria-hidden="true"></i> <strong style="font-size: 20px">Imprimir</strong>
      </a>
    </div>
  </div>
@endsection