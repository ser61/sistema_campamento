@extends('layouts.admin')
@section('content')
    @include('alerts.request')
    @include('alerts.success')
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading" align="center" style="font-size: 20px">
            <strong>Formulario Para editar Gestion: {{$gestion->fecha}}</strong>
        </div>
        <div class="panel-body">
            {!! Form::model($gestion,['route' => ['gestion.update',$gestion->id],'method' => 'PUT']) !!}
            <div class="form-group"  >
                {!! Form::label('gestion') !!} <br>
                {!! Form::date('fecha', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                <span class="col-lg-6" style="color: #ff0000;">Dato obligatorio</span>
            </div><!-- /.col-lg-6 -->
            <br>
            <div class="form-group" align="center">
                {!! Form::submit('Registrar' , ['class'=>'btn btn-primary btn-lg btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection