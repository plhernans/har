<nav class="navbar navbar-expand-sm navbar-white shadow-sm bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/index.php') }}">
            {{ config('app.name', 'Gloshima') }}
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
                        <a class="dropdown-item" href="{{  route('tcviaje.index') }}">{{ __('Crear Viaje')}}</a>
                        <a id="Submenu-embarqueM" class="dropdown-item" href="{{route('embarques.index')}}">{{ __('Lista de Embarques')}}</a>
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
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" disabled>{{ __('Facturacion') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a class="dropdown-item" href="{{route('facturas.index')}}">{{ __('Listado de Facturas')}}</a>
                        {{-- <a class="dropdown-item" href="#">{{ __('Imprimir Factura')}}</a> --}}
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ __('Documentacion') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a id="etiquetamenu" class="dropdown-item" href="{{ route('etiqueta.index')}}">{{ __('Etiquetas')}}</a>
                        {{-- <a class="dropdown-item" href="#">{{ __('Lista de Empaque')}}</a> --}}
                        {{-- <a class="dropdown-item" href="{{ route('ordenconfirm')}}">{{ __('Manifiesto')}}</a> --}}
                        <a class="dropdown-item" href="{{ route('mftoybl.index')}}">{{ __('Manifiesto y BL')}}</a>
                        {{-- <a class="dropdown-item" href="{{ route('bl')}}">{{ __('Bill of Lading')}}</a> --}}
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ __('Tablas de Control') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a id="btnvessel" class="dropdown-item" href="{{  route('tcvessel.index') }}">{{ __('Buques')}}</a>
                        <a id="btncont" class="dropdown-item" href="{{  route('tccont.index') }}">{{ __('Contenedores') }}</a>
                        <a id="btnguest" class="dropdown-item" href="{{  route('tccliente.index') }}">{{ __('Clientes y Proveedores') }}</a>
                        <a id="btngoods" class="dropdown-item" href="{{  route('tcremdest.index') }}">{{ __('Remitentes y Destinatarios') }}</a>
                        <a id="btngoods" class="dropdown-item" href="{{  route('itemprod.index') }}">{{ __('Productos') }}</a>
                        <a id="btngoods" class="dropdown-item" href="{{  route('tccargos.index') }}">{{ __('Cargos') }}</a>
                        <a id="btngoods" class="dropdown-item" href="{{  route('tctipocobro.index') }}">{{ __('Cobros') }}</a>
                    </div>
                </li>



                {{-- menu viejo --}}

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ __('Booking') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a class="dropdown-item" href="{{  route('booking.index') }}">{{ __('Booking')}}</a>
                        <a class="dropdown-item" href="{{  route('tcviaje.index') }}">{{ __('Voyage')}}</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ __('Documentation') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a class="dropdown-item" href="{{ route('bill.index') }}">{{ __('Bill of Lading')}}</a>
                        <a class="dropdown-item" href="#">{{ __('Etiquetas')}}</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ __('Invoice') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a class="dropdown-item" href="{{ route('invoice') }}">{{ __('Bill of Invoice')}}</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{  route('admin')  }}">{{ __('Administration') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a class="dropdown-item" href="{{ route('register') }}">{{ __('Create User') }}</a>
                        <a class="dropdown-item" href="#">{{ __('Editar Permisos') }}</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ __('Tables') }}</a>
                    <div class="dropdown-menu bg-primary">
                        <a id="btnvessel" class="dropdown-item" href="{{  route('tcvessel.index') }}">{{ __('Vessels')}}</a>
                        <a id="btncont" class="dropdown-item" href="{{  route('tccont.index') }}">{{ __('Containers') }}</a>
                        <a id="btndelivery" class="dropdown-item" href="{{  route('tccondentrega') }}" hidden>{{ __('Delivery Cond.')}}</a>
                        <a id="btnport" class="dropdown-item" href="{{  route('tcport.index') }}">{{ __('Ports') }}</a>
                        <a id="btnguest" class="dropdown-item" href="{{  route('tccliente.index') }}">{{ __('Customers') }}</a>
                        <a id="btngoods" class="dropdown-item" href="{{  route('tcgoods.index') }}">{{ __('Goods') }}</a>
                    </div>
                </li> --}}
            </ul>

            <!-- con menus botones -->
            <!--   <div class="btn-group mr-auto">
                <div class="btn-group">
                <button type="button" id="docmenu" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">{{ __('Documentacion')}}</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{ route('billoflading') }}">{{ __('Bill of Lading')}}</a>
                        <a class="dropdown-item" href="#">{ __('Etiquetas')}}</a>
                        <a class="dropdown-item" href="#">{ __('Registrar Viaje')}}</a>
                        <a class="dropdown-item" href="#">{ __('Reportes')}}</a>
                    </div>
                </div>
                <div class="btn-group">
                <button type="button" id="factmenu" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">{{ __('Facturacion')}}</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">{ __('Facturas')}}</a>
                        <a class="dropdown-item" href="#">{ __('Reportes')}}</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" id="adminmenu" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    { __('Administracion')}}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">{ __('Registrar Usuario')}}</a>
                        <a class="dropdown-item" href="#">{ __('Editar Permisos') }}</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" id="tcmenu" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    { __('Tablas de Control')}}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">{ __('Buque')}}</a>
                        <a class="dropdown-item" href="#">{ __('Puertos') }}</a>
                        <a class="dropdown-item" href="#">{ __('Condicion de Entrega') }}</a>
                        <a class="dropdown-item" href="#">{ __('Tipo de Contenedor') }}</a>
                    </div>
                </div>
            </div>  -->
            @endAuth

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
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

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


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
