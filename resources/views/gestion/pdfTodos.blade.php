<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  {!!Html::style('css/myStyle.css')!!}
</head>
<style type="text/css">
  .table-ser {
    width: 100%;
    border-collapse: collapse;
  }
  .th-ser, .td-ser {
    border: 1px solid black;
    padding: 4px;
    text-align: left;
  }
</style>
<body>

<h1 id="cabeza">Lista de Campistas<br>De la Gestion: {{$campistas->first()->fecha}}</h1>

<table align="center" width="70%">
  <tr>
    <td>
      <strong> Total de Campistas:</strong> {{$datos['total']}}
    </td>
    <td>
      <strong> Total de Hombres:</strong> {{$datos['hombres']}}
    </td>
  </tr>
  <tr>
    <td>
      <strong> Total Monto:</strong> {{$datos['monto']}}
    </td>
    <td>
      <strong> Total de Mujeres:</strong> {{$datos['mujeres']}}
    </td>
  </tr>
</table>

<br>
<div>
  <table class="table-ser">
    <tr>
      <th class="th-ser">Nombre</th>
      <th class="th-ser">Apellido</th>
      <th class="th-ser">Carnet</th>
      <th class="th-ser">Sexo</th>
      <th class="th-ser">Grupo</th>
      <th class="th-ser">Monto</th>
    </tr>
    @foreach($campistas as $campista)
      <tr>
        <td  class="td-ser">{{$campista->nombre}}</td>
        <td  class="td-ser">{{$campista->apellido}}</td>
        <td  class="td-ser" style="text-align: center;">{{$campista->ci}}</td>
        <td  class="td-ser" style="text-align: center;"> {{$campista->sexo}}</td>
        <td  class="td-ser">{{$campista->color}}</td>
        <td  class="td-ser">{{$campista->monto}}</td>
      </tr>
    @endforeach
  </table>
</div>
</body>
</html>