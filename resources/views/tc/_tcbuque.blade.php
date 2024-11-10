@extends('layouts.app')

@section('content')
    <div class="tablacontrol-buque col-sm-12 col-md-12 col-lg-12 col-xl-12">
        @include('modals.mBuque')

        <div class="card card-buque">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Listado de buques / aeronaves')}}</h4>
            </div>

            <div class="card-body">
                <div class="col-12 contBuque">
                    <div id="leyendaBuque" class="col-12 bg-primary text-white-50" hidden>
                        <p>{{ __("La tabla de buques esta vacia")}}</p>
                    </div>
                    <table id="tableTcBuque" class="col-12 col-lg-12 table table-hover table-borderless table-sm table-responsive-sm tableTcBuque">
                        <thead>
                            <tr>
                                <th colspan="4"><button id="btnAddBuque" class="btn btn-sm btn-primary btnAddBuque mb-1 btnAceptar">{{ __("Agregar Buque / Aeronave") }}</button></th>
                            </tr>
                            <tr class="justify-content-between">
                                <th scope="col" class="bg-light" hidden>{{ __("No.") }}</th>
                                <th scope="col" class="bg-light">{{ __("Nombre Buque / Aeronave.") }}</th>
                                <th scope="col" class="bg-light" colspan="2" style="text-align: center">{{ __("Acciones")}}</th>
                            </tr>
                        </thead>
                        <tbody id="tableTcBuqueBody">
                            @foreach($tcbuque as $buqueitem)
                                <tr data-idbuque="{{ $buqueitem->idbuque }}" data-buque="{{ $buqueitem->buque }}" data-noimo="{{ $buqueitem->noimo }}">
                                    <td class="rowtdbuque" hidden>{{ $buqueitem->idbuque }}</td>
                                    <td class="rowtdbuque">{{ $buqueitem->buque }}</td>
                                    <td class="col-1" style="text-align: center"><button class="btn btn-sm btnEditar btnEditarBuque"><i class="far fa-edit"></i><span class="ml-1">{{ __("Editar")}}</span></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button id="btn-closeBuque" type="button" class="btn btn-dark btn-sm ml-auto btnCerrar">{{ __("Cerrar")}}</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/Tc/CreaTcBuque.js') }}"></script>
    <script src="{{ asset('js/Tc/ActualizaTcBuque.js') }}"></script>
@endsection
