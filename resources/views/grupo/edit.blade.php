@extends('layouts.admin')
@section('content')
    @include('alerts.request')
    @include('alerts.success')
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading" align="center" style="font-size: 20px">
            <strong>Formulario Para Editar Grupo: {{$grupo->color}}</strong>
        </div>
        <div class="panel-body">
            {!! Form::model($grupo,['route' => ['grupo.update',$grupo->id],'method' => 'PUT']) !!}
            <div class="row">
                <div class="col-lg-4" style="padding-left: 30px">
                    {!! Form::label('Color:') !!}
                    {!! Form::text('color',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre...']) !!}
                    <span class="col-lg-6"  style="color: #ff0000;">Dato obligatorio</span>
                </div>
                <div class="col-lg-4" >
                    {!! Form::label('Codigo:') !!}
                    {!! Form::color('codigo',null,['class'=>'form-control','placeholder'=>'Ingresa el Nro. de Telefono...']) !!}
                    <span class="col-lg-6" style="color: #ff0000;">Dato obligatorio</span>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-4" >
                    {!! Form::label('Gestion:') !!}
                    {!! Form::select('id_gestion',$gestiones, null, ['class'=>'form-control','placeholder'=>'Seleccione una Gestion...']) !!}
                    <span class="col-lg-6" style="color: #ff0000;">Dato obligatorio</span>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <br>
            <div class="form-group" align="center">
                {!! Form::submit('Guardar Cambios' , ['class'=>'btn btn-primary btn-lg btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection