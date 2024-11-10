@extends('layouts.app')

@section('content')
    <div class="tablacontrol-cliente col-sm-12 col-md-12 col-lg-12 col-xl-12">
        @include('modals.mCliente')
        <div class="card card-cliente">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Listado de Embarcadores y Consignatarios')}}</h4>
            </div>

            <div class="card-body">
                <div class="col-12 ContEmbConsig">
                    <div id="leyendaProveedores" class="col-12 bg-dark text-white-50" hidden>
                        <p>{{ __("La tabla de proveedores y consignatarios esta vacia")}}</p>
                    </div>
                    <table id="tableTcCliente" class="col-12 col-lg-12 table table-hover table-borderless table-sm table-responsive-sm tableTcCliente">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="4"><button id="btnAddCliente" class="btn btn-sm btn-primary btnAddCliente btnAceptar mb-1">{{ __("Agregar Cliente") }}</button></th>
                            </tr>
                            <tr class="justify-content-between">
                                <th scope="col" class="bg-light" hidden>{{ __("No.") }}</th>
                                <th scope="col" class="bg-light">{{ __("Nombre Cliente.") }}</th>
                                <th scope="col" class="bg-light">{{ __("Direccion") }}</th>
                                <th scope="col" class="bg-light" colspan="2" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tableTcClienteBody">
                            @foreach($tccliente as $clienteitem)
                                <tr data-idcliente="{{ $clienteitem->idcliente }}" data-nombre="{{ $clienteitem->nombre }}" data-dir="{{ $clienteitem->dir }}">
                                    <td class="rowtdCliente" hidden>{{ $clienteitem->idcustomers }}</td>
                                    <td class="rowtdCliente">{{ $clienteitem->nombre }}</td>
                                    <td class="rowtdCliente">{{ $clienteitem->dir }}</td>
                                    <td style="text-align: center"><button class="btn btn-sm btn-secondary btnEditar btnEditarCliente"><i class="far fa-edit"></i><span class="ml-1">{{ __("Editar")}}</span></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-secondary">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button id="btn-closeCliente" type="button" class="btn btn-dark btn-sm btnCerrar ml-auto">{{ __("Cerrar")}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/Tc/CreaTcCliente.js') }}"></script>
    <script src="{{ asset('js/Tc/ActualizaTcCliente.js') }}"></script>
@endsection
