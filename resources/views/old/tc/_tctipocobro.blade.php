@extends('layouts.app')

@section('content')
    <div class="tablacontrol-tcobros col-sm-12 col-md-12 col-lg-12 col-xl-12">
        @include('modals.mTipocobro')

        <div class="card card-tcobro">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Listado Concepto de Cobro')}}</h4>
            </div>

            <div class="card-body">
                <div class="col-12 contTcobro">
                    <div id="leyendaTcobro" class="col-12 bg-dark text-white-50" hidden>
                        <p>{{ __("No existen Tipo de cobro activos o vigentes")}}</p>
                    </div>
                    <table id="tableTcTipocobro" class="col-12 col-lg-12 table table-hover table-borderless table-sm table-responsive-sm tableTcTipocobro">
                        <thead class="thead-light">
                            {{-- <tr>
                                <button id="btnAddTipocobro" class="btn btn-sm btn-outline-primary btnAddTipocobro mb-1">{{ __("Agregar Ti") }}</button>
                            </tr> --}}
                            <tr class="justify-content-between">
                                <th scope="col" class="bg-light" hidden>{{ __("No") }}</th>
                                <th scope="col" class="bg-light">{{ __("Detalle") }}</th>
                                <th scope="col" class="bg-light">{{ __("Importe") }}</th>
                                <th scope="col" class="bg-light">{{ __("Fecha inicio") }}</th>
                                <th scope="col" class="bg-light">{{ __("Fecha fin") }}</th>
                                <th scope="col" class="bg-light" colspan="2" style="text-align: center">{{__("Eventos")}}</th>
                            </tr>
                        </thead>
                        <tbody id="tableTcGoodsBody">
                            @foreach($tipocobros as $tipocobro)
                                <tr data-idtipocobro="{{ $tipocobro->idtipocobro }}" data-tipocobro="{{ $tipocobro->tipocobro }}" data-importe="{{ $tipocobro->importe }}" data-finicio="{{ $tipocobro->finicio }}" data-ffin="{{ $tipocobro->ffin }}">
                                    <td class="rowtipocobro" hidden>{{ $tipocobro->idtipocobro }}</td>
                                    <td class="rowtipocobro" style="width:30%">{{ $tipocobro->tipocobro }}</td>
                                    <td class="rowtipocobro" style="width:10%">{{ $tipocobro->importe}}</td>
                                    <td class="rowtipocobro" style="width:20%">{{ Carbon\Carbon::parse($tipocobro->finicio)->format('Y-m-d') }}</td>
                                    <td class="rowtipocobro" style="width:20%">{{ $tipocobro->ffin ? Carbon\Carbon::parse($tipocobro->ffin)->format('Y-m-d') : '' }}</td>
                                    <td style="text-align: center; width:20%"><button class="btn btn-sm btn-secondary btnEditarTcobro btnEditar"><i class="far fa-edit"></i><span class="ml-1">{{ __("Editar")}}</span></button><button class="btn btn-sm btn-primary btnAgregarTcobro btnAceptar ml-1"><i class="fas fa-plus mr-1"></i><span class="ml-1">{{ __("Crear Nuevo")}}</span></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-secondary">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button type="button" class="btn btn-dark btn-sm ml-auto btncerrar-tcobro btnCerrar">{{ __("Cerrar")}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/Tc/main.js') }}"></script>
    <script src="{{ asset('js/Tc/CreaTcTipocobro.js') }}"></script>
    <script src="{{ asset('js/Tc/ActualizaTcTipocobro.js') }}"></script>
@endsection
