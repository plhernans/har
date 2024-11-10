@extends('layouts.app')

@section('content')
    <div class="tablacontrol-cargos col-sm-12 col-md-12 col-lg-12 col-xl-12">
        @include('modals.mItemCargo')

        <div class="card card-cargos">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Listado de Cargos')}}</h4>
            </div>

            <div class="card-body">
                <div class="col-12 contCargos">
                    <div id="leyendaCargos" class="col-12 bg-dark text-white-50" hidden>
                        <p>{{ __("No existen cargos activos o vigentes")}}</p>
                    </div>
                    <table id="tableItemCargo" class="col-12 col-lg-12 table table-hover table-borderless table-sm table-responsive-sm tableItemCargo">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="10"><button id="btnAddItemCargo" class="btn btn-sm btn-primary btnAddItemCargo btnAceptar mb-1">{{ __("Agregar Cargo") }}</button></th>
                            </tr>
                            <tr class="justify-content-between">
                                <th scope="col" class="bg-light" hidden>{{ __("Id.") }}</th>
                                <th scope="col" class="bg-light">{{ __("Tipo de Cargos") }}</th>
                                <th scope="col" class="bg-light">{{ __("Fecha Inicio") }}</th>
                                <th scope="col" class="bg-light">{{ __("Fecha Fin") }}</th>
                                <th scope="col" class="bg-light" colspan="2" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tableItemCargoBody">
                            @foreach($itemcargos as $itemcargoitem)
                                <tr data-id_tipocargo="{{ $itemcargoitem->id_tipocargo }}" data-tipo_cargo="{{ $itemcargoitem->tipo_cargo }}" data-finicio="{{ $itemcargoitem->finicio }}" data-ffin="{{ $itemcargoitem->ffin }}">
                                    <td class="rowtditemprod" hidden>{{ $itemcargoitem->id_tipocargo }}</td>
                                    <td class="rowtditemprod">{{ $itemcargoitem->tipo_cargo }}</td>
                                    <td class="rowtditemprod">{{ Carbon\Carbon::parse($itemcargoitem->finicio)->format('Y-m-d') }}</td>
                                    <td class="rowtditemprod">{{ $itemcargoitem->ffin ? Carbon\Carbon::parse($itemcargoitem->ffin)->format('Y-m-d') : '' }}</td>
                                    <td style="text-align: center" colspan="2"><button class="btn btn-sm btn-secondary btn-EditarItemCargo btnEditar"><i class="far fa-edit"></i><span class="ml-1">{{ __("Editar")}}</span></button></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-secondary">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button type="button" class="btn btn-dark btn-sm ml-auto btncerrar-cargo btnCerrar">{{ __("Cerrar")}}</button>
                </div>
            </div>


            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/Tc/main.js') }}"></script>
    <script src="{{ asset('js/Tc/CreaTcCargo.js') }}"></script>
    <script src="{{ asset('js/Tc/ActualizaTcCargo.js') }}"></script>
@endsection
