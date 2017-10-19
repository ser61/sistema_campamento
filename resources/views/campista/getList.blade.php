@if (count($campistas) > 0)
  <table class="table table-hover">
    <tr class="info">
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Carnet</th>
      <th>Sexo</th>
      <th>Telefono</th>
      <th>Iglesia</th>
      <th>Opciones</th>
    </tr>
    @foreach($campistas as $campista)
      <tr class="warning">
        <td>{{$campista->nombre}}</td>
        <td>{{$campista->apellido}}</td>
        <td>{{$campista->ci}}</td>
        <td>{{$campista->sexo}}</td>
        <td>{{$campista->telefono}}</td>
        <td>{{$campista->iglesia}}</td>
        <td>

          {!! Form::open(['method'=>'DELETE', 'route'=>['campista.destroy',$campista->id]]) !!}
          <a href="{{ route('campista.edit', $campista->id) }}" class="btn btn-warning" aria-label="Skip to main navigation">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </a>
          <button class="btn btn-danger" type="submit"
                  data-toggle="confirmation"
                  data-placement="left"
                  data-title="¿Quieres continuar eliminando a {{$campista->nombre}}?"
                  data-btnOkClass="btn btn-primary"
                  data-btnOkLabel='<i class="fa fa-check-circle"></i> Si'
                  data-btnCancelClass="btn btn-default"
                  data-btnCancelLabel='<i class="fa fa-times-circle" aria-hidden="true"></i> No'>
            <i class="fa fa-trash-o" aria-hidden="true"></i>
          </button>
          <a href="{{ route('campista.show', $campista->id) }}" class="btn btn-success" aria-label="Skip to main navigation">
            <i class="fa fa-bookmark" aria-hidden="true"> Inscribir</i>
          </a>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
  {{$campistas->links()}}

  <script>
    $('[data-toggle="confirmation"]').confirmation({
      href: function(elem){
        return $(elem).attr('href');
      }
    });
  </script>
@else
  <br>
  <div class="panel panel-default">
    <div class="panel-body">
      <h3 style="text-align: center;">
        <b style="text-align: center;">{{$search}}</b> no fue encontrado!!!.
      </h3>
    </div>
  </div>
@endif