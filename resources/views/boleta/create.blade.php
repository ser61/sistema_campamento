@extends('layouts.admin')
@section('content')
  @include('alerts.request')
  @include('alerts.success')
  @include('alerts.existfail')
  <br>
  <div class="panel panel-primary">
    <div class="panel-heading" align="center" style="font-size: 20px">
      <strong>Formulario Para Inscripcion a {{$campista->nombre}} {{$campista->apellido}}</strong>
    </div>
    <div class="panel-body">
      {!! Form::open(['route' => ['boleta.guardar',$campista->id],'method' => 'POST']) !!}
      <br>
      <div class="form-group">
        {!! Form::label('Monto a Pagar:') !!}
        {!! Form::number('monto','195.00',['class'=>'form-control','placeholder'=>'Ingresa el monto a pagar...','step'=>'any']) !!}
        <span class="col-lg-6" style="color: #ff0000;">Dato obligatorio</span>
      </div>
      <br>
      <div class="form-group" align="center">
        {!! Form::submit('Registrar Inscripcion' , ['class'=>'btn btn-primary btn-lg btn-block']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection