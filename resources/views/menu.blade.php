<nav class="navbar-default navbar-side" role="navigation">
<div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a @yield('menuProyecto') href="{{asset('index.php/Proyecto')}}"><i class="fa fa-desktop" accesskey="p"></i> <u>P</u>royectos</a>
            </li>
            <li>
                <a @yield('menuBoleta') href="{{asset('index.php/Boleta')}}"><i class="fa fa-bar-chart-o" accesskey="b"></i> <u>B</u>oletas</a>
            </li>
            <li>
                <a @yield('menuCambio') href="{{asset('index.php/Cambio')}}"><i class="fa fa-qrcode" accesskey="c"></i> <u>C</u>ambios</a>
            </li>
            <li>
                <a @yield('menuReporte') href="{{asset('index.php/Reporte')}}"><i class="fa fa-file" accesskey="r"></i> <u>R</u>eportes</a>
            </li>
        </ul>
    </div>
</nav>
