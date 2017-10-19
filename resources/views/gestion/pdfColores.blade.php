<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  {!!Html::style('css/myStyle.css')!!}
</head>
<style type="text/css">
  table {
    width: 100%;
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid black;
    padding: 4px;
    text-align: left;
  }
</style>
<body>

<h1 id="cabeza">Lista del Grupo: {{$campistas->first()->color}} <br> De la Gestion: {{$campistas->first()->fecha}}</h1>

<br>
<div>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>CI</th>
      <th>Sexo</th>
    </tr>
    @foreach($campistas as $campista)
      <tr>
        <td style="padding-left: 10px">{{$campista->nombre}}</td>
        <td style="padding-left: 10px">{{$campista->apellido}}</td>
        <td style="padding-left: 10px">{{$campista->ci}}</td>
        <td style="padding-left: 10px">{{$campista->sexo}}</td>
    @endforeach
  </table>
</div>
</body>
</html>