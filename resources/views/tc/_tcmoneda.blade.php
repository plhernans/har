@extends('layouts.app')

@section('content')
    <div class="tablacontrol-producto col-sm-12 col-md-12 col-lg-12 col-xl-12">
        @include('modals.mMoneda')

        <div class="card card-moneda">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Listado de Monedas de Cambio')}}</h4>
            </div>

            <div class="card-body">
                <div class="col-12 contmoneda">
                    <div id="leyendaMoneda" class="col-12 bg-dark text-white-50" hidden>
                        <p>{{ __("No existen monedas de cambio activas o vigentes")}}</p>
                    </div>
                    <table id="tableMoneda" class="col-12 col-lg-12 table table-hover table-borderless table-sm table-responsive-sm tableMoneda">
                        <thead>
                            <tr>
                                <th colspan="10"><button id="btnAddMoneda" class="btn btn-sm btn-primary btnAddMoneda btnAceptar mb-1">{{ __("Agregar Moneda y Tipo de cambio") }}</button></th>
                            </tr>
                            <tr class="justify-content-between">
                                <th scope="col" class="bg-light" hidden>{{ __("No") }}</th>
                                <th scope="col" class="bg-light">{{ __("Moneda") }}</th>
                                <th scope="col" class="bg-light">{{ __("Tipo de Cambio (USD)") }}</th>
                                <th scope="col" class="bg-light">{{ __("Fecha Inicio") }}</th>
                                <th scope="col" class="bg-light">{{ __("Fecha Fin") }}</th>
                                <th scope="col" class="bg-light" style="text-align: center; width: 180px"></th>
                            </tr>
                        </thead>
                        <tbody id="tableItemProdBody">
                            @foreach($monedas as $moneda)
                                <tr data-id_moneda="{{ $moneda->id_moneda }}" data-moneda="{{ $moneda->moneda }}" data-tipocambio="{{ $moneda->tipocambio }}" data-finicio="{{ $moneda->finicio }}" data-ffin="{{ $moneda->ffin }}">
                                    <td class="rowtdmoneda" hidden>{{ $moneda->id_moneda }}</td>
                                    <td class="rowtdmoneda">{{ $moneda->moneda }}</td>
                                    <td class="rowtdmoneda">{{ number_format($moneda->tipocambio,2) }}</td>
                                    <td class="rowtdmoneda">{{ Carbon\Carbon::parse($moneda->finicio)->format('Y-m-d') }}</td>
                                    <td class="rowtdmoneda">{{ $moneda->ffin ? Carbon\Carbon::parse($moneda->ffin)->format('Y-m-d') : '' }}</td>
                                    <td style="text-align: center" style="width: 180px"><button class="btn btn-sm btn-secondary btnEditarMoneda btnEditar"><i class="far fa-edit"></i><span class="ml-1">{{ __("Actualizar tipo de cambio")}}</span></button></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button type="button" class="btn btn-dark btn-sm ml-auto btnCerrarMoneda btnCerrar">{{ __("Cerrar")}}</button>
                </div>
            </div>


            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/Tc/main.js') }}"></script>
    <script src="{{ asset('js/Tc/CreaTcMoneda.js') }}"></script>
    <script src="{{ asset('js/Tc/ActualizaTcMoneda.js') }}"></script>
@endsection
