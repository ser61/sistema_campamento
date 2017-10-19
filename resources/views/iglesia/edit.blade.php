@extends('layouts.admin')
@section('content')
    @include('alerts.request')
    @include('alerts.success')
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading" align="center" style="font-size: 20px">
            <strong>Formulario Para Editar la Iglesia: {{$iglesia->nombre}}</strong>
        </div>
        <div class="panel-body">
            {!! Form::model($iglesia,['route' => ['iglesia.update',$iglesia->cod],'method' => 'PUT']) !!}
            <div class="row">

                <div class="col-lg-6" style="padding-left: 30px">
                    {!! Form::label('Nombre:') !!}
                    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre de la Iglesia...']) !!}
                    <span class="col-lg-6" style="color: #ff0000;">Dato obligatorio</span>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6" style="...">
                    {!! Form::label('Pastor:') !!}
                    {!! Form::select('ci_pastor',$pastores, null, ['class'=>'form-control','placeholder'=>'Seleccione Pastor...']) !!}


                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <br>
            <div class="row">
                <div class="col-lg-6" style="padding-left: 30px">
                    {!! Form::label('Pais:') !!}
                    {!! Form::text('pais',null,['class'=>'form-control','placeholder'=>'Ingresa el Pais...']) !!}
                    <span class="col-lg-6" style="color: #ff0000;">Dato obligatorio</span>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6" style="padding-left: 30px">
                    {!! Form::label('Departamento:') !!}
                    {!! Form::text('departamento',null,['class'=>'form-control','placeholder'=>'Ingresa el Departamento...']) !!}
                    <span class="col-lg-6" style="color: #ff0000;">Dato obligatorio</span>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <br>

            <div class="row">
                <div class="col-lg-6" style="padding-left: 30px">
                    {!! Form::label('Ciudad:') !!}
                    {!! Form::text('ciudad',null,['class'=>'form-control','placeholder'=>'Ingresa la Ciudad...']) !!}

                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6" style="padding-left: 30px">
                    {!! Form::label('Direccion:') !!}
                    {!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingresa la Direccion...']) !!}

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