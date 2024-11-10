<nav class="navbar navbar-expand-sm navbar-white shadow-sm bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'HAR') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @Auth
            <ul id="ulmenu" class="navbar-nav mr-auto bg-primary">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ __('Embarques') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a id="Submenu-embarqueM" class="dropdown-item" href="{{route('embarques.index')}}">{{ __('Ver Embarques')}}</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ __('Solicitudes') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a id="Submenu-ordenM" class="dropdown-item" href="{{route('ordenes.index')}}">{{ __('Procesar Solicitudes')}}</a>
                        <a id="Submenu-ordenS" class="dropdown-item" href="{{route('ordenconfirm')}}">{{ __('Solicitudes a Embarcar')}}</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle disabled" data-toggle="dropdown" href="#">{{ __('Facturacion') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ __('Documentacion') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a id="etiquetamenu" class="dropdown-item" href="{{ route('etiqueta.index')}}">{{ __('Etiquetas')}}</a>
                        <a class="dropdown-item" href="{{ route('mftoybl.index')}}">{{ __('Manifiesto / BL / AWB')}}</a>
                        <a class="dropdown-item" href="{{ route('awb')}}">{{ __('awb_test')}}</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ __('Reportes') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a class="dropdown-item" href="{{ route('etiqueta.index')}}">{{ __('Listado de Etiquetas')}}</a>
                        {{-- <a class="dropdown-item"  href="{{route('facturas.index')}}">{{ __('Listado de Facturas')}}</a> --}}
                        <a class="dropdown-item" href="{{ route('ordenlistado')}}">{{ __('Listado de Ordenes')}}</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ __('Tablas de Control') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a id="btnvessel" class="dropdown-item" href="{{  route('tcvessel.index') }}">{{ __('Buques / Aeronaves')}}</a>
                        <a class="dropdown-item" href="{{  route('tcviaje.index') }}">{{ __('Crear Viaje / Vuelo')}}</a>
                        <a id="btncont" class="dropdown-item" href="{{  route('tccont.index') }}">{{ __('Contenedores') }}</a>
                        <a id="btnclient" class="dropdown-item" href="{{  route('tccliente.index') }}">{{ __('Clientes y Proveedores') }}</a>
                        <a id="btnrem" class="dropdown-item" href="{{  route('tcremdest.index') }}">{{ __('Remitentes y Destinatarios') }}</a>
                        <a id="btnprod" class="dropdown-item" href="{{  route('itemprod.index') }}">{{ __('Productos') }}</a>
                        {{-- <a id="btncargo" class="dropdown-item" href="{{  route('tccargos.index') }}">{{ __('Conceptos de Cobro') }}</a> --}}
                        {{-- <a id="btncob" class="dropdown-item" href="{{  route('tctipocobro.index') }}">{{ __('Precios por Tipo de productos') }}</a> --}}
                        {{-- <a id="btncam" class="dropdown-item" href="{{  route('tcmoneda.index') }}">{{ __('Tasas de Cambio') }}</a> --}}
                        <a id="btnAwbm" class="dropdown-item" href="{{  route('awb') }}">{{ __('AWB') }}</a>
                    </div>
                </li>
            </ul>
            @endAuth

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto bg-primary">
                <!--No Authentication Links -->
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Session') }}</a>
                        </li>

                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{  __('Registrarse')  }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right bg-primary" aria-labelledby="navbarDropdown">


                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Session') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>



                @endguest
            </ul>
        </div>
    </div>
</nav>
