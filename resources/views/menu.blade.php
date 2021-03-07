<nav class="navbar-default navbar-side" role="navigation">
<div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
              <a @yield('menuGrafico') href="{{asset('index.php/Grafico')}}"><i class="fa fa-bar-chart-o" accesskey=""></i> Estadisticas</a>
            </li>
            <li>
                <a @yield('menuProyecto') href="{{asset('index.php/Voto')}}"><i class="fa fa-desktop" accesskey="p"></i> Votos</a>
            </li>
            <li>
                <a @yield('menuPersona') href="{{asset('index.php/Persona')}}"><i class="fa fa-bookmark" accesskey="p"></i> Personas</a>
            </li>

            <li>
                <a @yield('menuMesa') href="{{asset('index.php/Mesa')}}"><i class="fa fa-bookmark" accesskey=""></i> Mesas</a>
            </li>
            <li>
                <a @yield('menuRecinto') href="{{asset('index.php/Recinto')}}"><i class="fa fa-bookmark" accesskey=""></i> Recintos</a>
            </li>
            <li>
                <a @yield('menuZona') href="{{asset('index.php/Zona')}}"><i class="fa fa-bookmark" accesskey=""></i> Zonas</a>
            </li>
            <li>
                <a @yield('menuDistrito') href="{{asset('index.php/Distrito')}}"><i class="fa fa-bookmark" accesskey=""></i> Distritos</a>
            </li>
        </ul>
    </div>
</nav>
