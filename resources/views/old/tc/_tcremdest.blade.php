@extends('layouts.app')

@section('content')
    <div class="tablacontrol-cliente col-sm-12 col-md-12 col-lg-12 col-xl-12">
        @include('modals.mRemDest')

        <div class="card card-remdest">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Listado de Clientes')}}</h4>
            </div>

            <div class="card-body">
                <div class="col-12 contRemDest">
                    <div id="leyendaCliente" class="col-12 bg-dark text-white-50" hidden>
                        <p>{{ __("La tabla de clientes esta vacia")}}</p>
                    </div>
                    <table id="tableTcRemDest" class="col-12 col-lg-12 table table-hover table-borderless table-sm table-responsive-sm tableTcRemDest">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="14">
                                    <button id="btnAddRemDest" class="btn btn-sm btn-primary btnAddRemDest btnAceptar mb-1">{{ __("Agregar Remitente / Destinatario") }}</button>
                                </th>
                            </tr>
                            <tr class="justify-content-between">
                                <th scope="col" class="bg-light" hidden>{{ __("Id.") }}</th>
                                <th scope="col" class="bg-light">{{ __("CI") }}</th>
                                <th scope="col" class="bg-light">{{ __("Nombre Cliente") }}</th>
                                <th scope="col" class="bg-light">{{ __("Pasaporte") }}</th>
                                <th scope="col" class="bg-light">{{ __("Nacionalidad") }}</th>
                                <th scope="col" class="bg-light">{{ __("Provincia") }}</th>
                                <th scope="col" class="bg-light" hidden>{{ __("Municipio.") }}</th>
                                <th scope="col" class="bg-light" hidden>{{ __("Telef") }}</th>
                                <th scope="col" class="bg-light" hidden>{{ __("Calle") }}</th>
                                <th scope="col" class="bg-light" hidden>{{ __("No.") }}</th>
                                <th scope="col" class="bg-light" hidden>{{ __("Entre Calles") }}</th>
                                <th scope="col" class="bg-light" hidden>{{ __("Apto") }}</th>
                                <th scope="col" class="bg-light" hidden>{{ __("Cp") }}</th>
                                <th scope="col" class="bg-light" colspan="2" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tableTcRemDestBody">
                            @foreach($tcremdest as $clienteitem)
                                <tr class="@if ($clienteitem->ci != null) w @else noci @endif" data-idremdest="{{ $clienteitem->idremdest }}" data-ci="{{ $clienteitem->ci }}" data-nombre="{{ $clienteitem->nombre }}" data-apellidop="{{ $clienteitem->apellidop }}" data-apellidom="{{ $clienteitem->apellidom }}" data-pasaporte="{{ $clienteitem->pasaporte }}" data-nacionalidad="{{ $clienteitem->nacionalidad }}" data-provincia="{{ $clienteitem->provincia }}" data-municipio="{{ $clienteitem->municipio }}" data-telefono="{{ $clienteitem->telefono }}" data-calle="{{ $clienteitem->calle }}" data-no_calle="{{ $clienteitem->no_calle }}" data-apto="{{ $clienteitem->apto }}" data-entrecalle="{{ $clienteitem->entrecalle }}" data-cp="{{ $clienteitem->cp }}">
                                    <td class="rowtdremdest" hidden>{{ $clienteitem->idremdest }}</td>
                                    <td class="rowtdremdest" style="width: 20%">{{ $clienteitem->ci }}</td>
                                    <td class="rowtdremdest" style="width: 20%">{{ $clienteitem->nombre." ".$clienteitem->apellidop." ".$clienteitem->apellidom }}</td>
                                    <td class="rowtdremdest" style="width: 10%">{{ $clienteitem->pasaporte }}</td>
                                    <td class="rowtdremdest" style="width: 20%">{{ $clienteitem->nacionalidad }}</td>
                                    <td class="rowtdremdest" style="width: 20%">{{ $clienteitem->provincia }}</td>
                                    <td class="rowtdremdest" hidden>{{ $clienteitem->municipio }}</td>
                                    <td class="rowtdremdest" hidden>{{ $clienteitem->telefono }}</td>
                                    <td class="rowtdremdest" hidden>{{ $clienteitem->calle }}</td>
                                    <td class="rowtdremdest" hidden>{{ $clienteitem->no_calle }}</td>
                                    <td class="rowtdremdest" hidden>{{ $clienteitem->entrecalle }}</td>
                                    <td class="rowtdremdest" hidden>{{ $clienteitem->apto }}</td>
                                    <td class="rowtdremdest" hidden>{{ $clienteitem->cp }}</td>
                                    <td style="text-align: center; width: 10%"><button class="btn btn-sm btn-secondary btnEditarRemDest btnEditar mr-1"><i class="far fa-edit"></i><span class="ml-1">{{ __("Editar")}}</span></button><button class="btn btn-sm btn-danger btnEliminarRemDest btnEliminar"><i class="fas fa-trash-alt"></i><span class="ml-1">{{ __("Eliminar")}}</span></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-secondary">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button id="btn-closeRemdest" type="button" class="btn btn-dark btn-sm ml-auto btnCerrar">{{ __("Cerrar")}}</button>
                </div>
            </div>
            <a id="urldeleteremdest" href="{{ route('tcremdest.destroy','')}}"></a>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/Tc/CreaTcRemDest.js') }}"></script>
    <script src="{{ asset('js/Tc/ActualizaTcRemDest.js') }}"></script>
    <script src="{{ asset('js/Tc/deleteTcRemDest.js') }}"></script>
@endsection
