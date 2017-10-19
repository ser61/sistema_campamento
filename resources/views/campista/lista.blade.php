@extends('layouts.admin')
@section('content')
  @include('alerts.success')
  @include('alerts.request')
  <br>
  <div class="panel panel-primary">
    <div class="panel-body">


      <h1 id="cabeza">Lista de Campistas</h1>

      <br>
      <div class="panel panel-default">
        <div class="panel-body">
          <input type="text" class="form-control" placeholder="Busqueda por nombre, apellido o carnet..." id="search">
        </div>
      </div>

      <div id="tbody">
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
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script type="text/javascript">
    $('#search').on('keyup',function(){
      $value = $(this).val();
      $.ajax({
        type : 'GET',
        url : "{{url('campista/searchCampistas/')}}",
        data : {'search':$value},
        success: function(data){
          console.log(data);
          $('#tbody').html(data);
        }
      });
    });

    $(document).on('click','.pagination a', function(e){
      e.preventDefault();
      var page=$(this).attr('href').split('page=')[1];
      campista(page,$('#search').val());
    });

    function campista(page, search){
      var url = "{{url('campista/CampistaPaginatesearch/')}}";
      $.ajax({
        type : 'GET',
        url : url+'?page='+page,
        data : {'search' : search},
      }).done(function(data){
        $('#tbody').html(data);
      })
    }
  </script>
@endsection