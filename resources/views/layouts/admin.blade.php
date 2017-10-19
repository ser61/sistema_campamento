<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Campamento Emanuel</title>
  <title>SB Admin 2 - Bootstrap Admin Theme</title>

  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/metisMenu.min.css')!!}
  {!!Html::style('css/bootstrap-datetimepicker.min.css')!!}
  {!!Html::style('css/sb-admin-2.css')!!}
  {!!Html::style('css/myStyle.css')!!}
  {!!Html::style('css/ie8.css')!!}
  {!!Html::style('css/font-awesome.min.css')!!}
  {!!Html::style('css/bootstrap-responsive.css')!!}
  {!!Html::style('css/bootstrap-timepicker.min.css')!!}
</head>

<body>
<div id="wrapper">

  <nav  class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <!-- Aqui el nav o cabezera -->
    
    <!-- Lado Izquierdo -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/home') }}">Campamento Emanuel</a>
    </div>
    <!-- Fin del Lado Izquierdo -->

    <!-- Lado Derecho -->
    <ul class="nav navbar-top-links navbar-right">

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          {{ Auth::user()->name }} <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
        </a>

        <ul class="dropdown-menu dropdown-user">

          <li>
            <a href="{{ url('/login') }}"><i class="fa fa-gear fa-fw"></i> Registrar</a>
          </li>

          <li class="divider"></li>

          <li>
            <a href="{{ url('/login') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-sign-out fa-fw"></i> Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>

        </ul>
      </li>
    </ul>
    <!-- Fin Lado Derecho -->
    <!-- Aqui Finaliza el nav o cabezera -->


    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

          <!-- *************************************-->
          <!-- * G E S T I O N  D E  C A M P I S T A  *-->
          <!-- *************************************-->
          <li>
            <a href="#">
              <i class="fa fa-users fa-fw"></i> Campista<span class="fa arrow"></span>
            </a>

            <ul class="nav nav-second-level">
              <li>
                <a href="{{ route('campista.create') }}">
                  <i class="fa fa-user-plus" aria-hidden="true"></i> Registrar Campista
                </a>
              </li>

              <li>
                <a href="{{ url('campista') }}">
                  <i class='fa fa-list-ol fa-fw'></i> Listar Campistas
                </a>
              </li>


            </ul>
          </li>



          <!-- *******************************************-->
          <!-- * G E S T I O N  D E  D I R E C T I V O S *-->
          <!-- *******************************************-->
          <li>
            <a href="#">
              <i class="fa fa-child fa-fw"></i> Directivos<span class="fa arrow"></span>
            </a>

            <ul class="nav nav-second-level">
              <li>
                <a href="{{ route('directivo.create')}}">
                  <i class="fa fa-user-plus" aria-hidden="true"></i> Registrar Directivo
                </a>
              </li>

              <li>
                <a href="{{ url('directivo')}}">
                  <i class='fa fa-list-ol fa-fw'></i> Listar Directivos
                </a>
              </li>
            </ul>
          </li>

          <!-- *************************************-->
          <!-- * G E S T I O N  D E  i g l e s i a s  *-->
          <!-- *************************************-->
          <li>
            <a href="#">
              <i class="fa fa-child fa-fw"></i>Iglesias<span class="fa arrow"></span>
            </a>

            <ul class="nav nav-second-level">
              <li>
                <a href="{{ route('iglesia.create')}}">
                  <i class='fa fa-plus fa-fw'></i> Registrar Iglesia
                </a>
              </li>

              <li>
                <a href="{{ url('iglesia')}}">
                  <i class='fa fa-list-ol fa-fw'></i> Listar iglesia
                </a>
              </li>
            </ul>
          </li>

          <!-- *********************************************************-->
          <!-- *      G E S T I O N  D E  G E S T I O N                *-->
          <!-- *********************************************************-->
          <li>
            <a href="#">
              <i class="fa fa-child fa-fw"></i> Gestion<span class="fa arrow"></span>
            </a>

            <ul class="nav nav-second-level">
              <li>
                <a href="{{ route('gestion.create') }}">
                  <i class='fa fa-plus fa-fw'></i> Registrar gestion
                </a>
              </li>

              <li>
                <a href="{{ url('gestion') }}">
                  <i class='fa fa-server'></i> Listar Gestiones
                </a>
              </li>




            </ul>
          </li>


          <!-- *****************************************-->
          <!-- *      G E S T I O N  D E  G R U P O    *-->
          <!-- *****************************************-->
          <li>
            <a href="#">
              <i class="fa fa-child fa-fw"></i> Grupo <span class="fa arrow"></span>
            </a>

            <ul class="nav nav-second-level">
              <li>
                <a href={{ route('grupo.create')}}>
                  <i class='fa fa-plus fa-fw'></i> Registrar Grupo
                </a>
              </li>

              <li>
                <a href={{ url('grupo')}}>
                  <i class='fa fa-list-ol fa-fw'></i> Listar Grupos
                </a>
              </li>

            </ul>
          </li>

          <!-- *****************************************-->
          <!-- *      G E S T I O N  D E  A R E A      *-->
          <!-- *****************************************-->
          <li>
            <a href="#">
              <i class="fa fa-child fa-fw"></i> Area <span class="fa arrow"></span>
            </a>

            <ul class="nav nav-second-level">
              <li>
                <a href={{ url('reunion/')}}>
                  <i class='fa fa-plus fa-fw'></i>  Registrar Area
                </a>
              </li>

              <li>
                <a href={{ url('reunion/')}}>
                  <i class='fa fa-list-ol fa-fw'></i> Listar Areas
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </div>
    </div>

  </nav>

  <div id="page-wrapper" role="main">
    <br><br>
    @yield('content')
  </div>
</div>
{!!Html::script('js/jquery.min.js')!!}
{!!Html::script('js/bootstrap-tooltip.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
{!!Html::script('js/bootstrap-datetimepicker.min.js')!!}
{!!Html::script('js/bootstrap-timepicker.min.js')!!}
{!!Html::script('js/metisMenu.min.js')!!}
{!!Html::script('js/sb-admin-2.js')!!}
{!!Html::script('js/bootstrap-confirmation.min.js')!!}

@yield('script')

<script>
  $('[data-toggle="confirmation"]').confirmation({
    href: function(elem){
      return $(elem).attr('href');
    }
  });
</script>

</body>

</html>
