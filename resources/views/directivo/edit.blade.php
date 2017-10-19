@extends('layouts.admin')
@section('content')
    @include('alerts.request')
    @include('alerts.success')
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading" align="center" style="font-size: 20px">
            <strong>Formulario Para Editar Datos del Directivo :{{$directivo->nombre}} </strong>
        </div>
        <div class="panel-body">
            {!! Form::model($directivo,['route' => ['directivo.update',$directivo->ci],'method' => 'PUT']) !!}
            <div class="row">
                <div class="col-lg-6" style="padding-left: 30px">
                    {!! Form::label('Nombre:') !!}
                    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre...']) !!}
                    <span class="col-lg-6" style="color: #ff0000;">Dato obligatorio</span>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    {!! Form::label('Apellido:') !!}
                    {!! Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingresa el Apellido...']) !!}
                    <span class="col-lg-6" style="color: #ff0000;">Dato obligatorio</span>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <br>
            <div class="row">
                <div class="col-lg-6" style="padding-left: 30px">
                    {!! Form::label('CI:') !!}
                    {!! Form::number('ci',null,['class'=>'form-control','placeholder'=>'Ingresa el CI...']) !!}
                    <span class="col-lg-6" style="color: #ff0000;">Dato obligatorio</span>
                </div><!-- /.col-lg-6 -->

                <div class="col-lg-6" >
                    {!! Form::label('Fecha de Nacimiento: ') !!} <br>
                    {!! Form::date('fecha_nacimiento', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                    <span class="col-lg-6" style="color: #ff0000;">Dato obligatorio</span>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <br>
            <div class="form-group" >
                {!! Form::label('Telefono:') !!}
                {!! Form::number('telefono',null,['class'=>'form-control','placeholder'=>'Ingresa el Nro. de Telefono...']) !!}
            </div><!-- /.col-lg-6 -->
            <br>


            <div class="form-group" align="center">
                {!! Form::submit('Actualizar Datos' , ['class'=>'btn btn-primary btn-lg btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>

    </div>
@endsection