<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  {!!Html::style('css/myStyle.css')!!}
</head>
<body>

<h1 class="cabeza" align="center">Boleta del Campista <br> {{$boleta->nombre}} {{$boleta->apellido}}</h1>
<br>
<table border="1" width="100%">
  <tr style="width: 50%">
    <td>
      <strong> Grupo: </strong> {{$boleta['color']}}
    </td>
    <td>
      <strong> Monto: </strong> {{$boleta['monto']}} bs
    </td>
  </tr>
  <tr>
    <td>
      <strong> Fecha de Inscripcion: </strong> {{$boleta['fecha']}}
    </td>
    <td>
      <strong> Hora de Inscripcion: </strong> {{$boleta['hora']}}
    </td>
  </tr>
</table>
</body>
</html>