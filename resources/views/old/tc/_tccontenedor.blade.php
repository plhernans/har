@extends('layouts.app')

@section('content')
    <div class="tablacontrol-tipocontenedor col-sm-12 col-md-12 col-lg-12 col-xl-12">
        @include('modals.mTipoCont')
        <div class="card card-cliente">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Listado de Contenedores')}}</h4>
            </div>

            <div class="card-body">
                <div class="col-12 contContainer">
                    <div id="leyendaContenedores" class="col-12 bg-dark text-white-50" hidden>
                        <p>{{ __("La tabla de contenedores esta vacia")}}</p>
                    </div>
                    <table id="tablaTcCont" class="col-12 col-lg-12 table table-hover table-borderless table-sm table-responsive-sm tablaTcCont">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="5"><button class="btn btn-sm btn-primary btnAceptar btnAddCont mb-1">{{ __('Agregar Contenedor')}}</button></th>
                            </tr>
                            <tr class="justify-content-between">
                                <th scope="col" class="bg-light" hidden>{{ __("No.") }}</th>
                                <th scope="col" class="bg-light">{{ __("Tipo Contenedor.") }}</th>
                                <th scope="col" class="bg-light">{{ __("Descripcion") }}</th>
                                <th scope="col" class="bg-light">{{ __("TEUS") }}</th>
                                <th scope="col" class="bg-light" colspan="2" style="text-align: center">{{ __("Acciones") }}</th>
                            </tr>
                        </thead>
                        <tbody id="tableTcTipoContBody">
                            @foreach($tccont as $contitem)
                                <tr data-idcontainer="{{ $contitem->idcontainer }}" data-type="{{ $contitem->type }}" data-description="{{ $contitem->description }}" data-teus="{{ $contitem->teus }}">
                                    <td class="rowtdtipocont" hidden>{{ $contitem->idcontainer }}</td>
                                    <td class="rowtdtipocont">{{ $contitem->type }}</td>
                                    <td class="rowtdtipocont">{{ $contitem->description }}</td>
                                    <td class="rowtdtipocont">{{ $contitem->teus }}</td>
                                    <td class="col-1" style="text-align: center"><button class="btn btn-sm btn-secondary btnEditar btnEditarCont"><i class="far fa-edit"></i><span class="ml-1">{{ __("Editar")}}</span></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-secondary">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button id="btn-closeCont" type="button" class="btn btn-dark btn-sm ml-auto btnCerrar">{{ __("Cerrar")}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/Tc/CreaTcCont.js') }}"></script>
    <script src="{{ asset('js/Tc/ActualizaTcCont.js') }}"></script>
@endsection
