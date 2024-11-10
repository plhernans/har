@extends('layouts.app')
@inject('vembarques', 'App\Services\Embarques')

@section('content')
    <div class="listadoOrdenConfirmada col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="card card-listadoOrdenConfirmada">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Ordenes a Confirmar')}}</h4>
            </div>
            <div class="card-body col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 leftboxtOrdenesConfirmada m-auto p-0">
                    <div class="card mb-2">
                        <div class="card-header bg-secondary d-flex justify-content-between">
                            <div class="form-inline col-sm-12 col-md-12 col-lg-12">
                                <label for="embconf" class="mr-1">{{ __("Cargar embarque: ") }}</label>
                                <select id="txtembarqueconf"
                                        name="txtembarqueconf"
                                        class="selectpicker show-menu-arrow form-control form-control-sm txtembarqueconf"
                                        data-live-search="true">
                                        @foreach ($vembarques->getEmbarques() as $embarque=>$no_embarque)
                                            <option data-tokens="{{ $embarque }}" value="{{ $embarque }}"> {{ $embarque }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-auto p-0">
                    <div class="col-md-6 col-lg-6 col-sm-6 p-1">
                        <div class="col-md-12 col-sm-12 col-lg-12 container_ordenes">
                            <table class="table table-hover table-bordered table-sm table-responsive-sm tablaListadoOrdenes">
                                <thead class="thead-light">
                                    <tr class="thead-light">
                                        <th colspan="5">Listado de ordenes</th>
                                        <th colspan="2">Cantidad: <span class="countordenes" style="color: lightseagreen"></span></th>
                                    </tr>
                                    <tr class="justify-content-between">
                                        <th scope="col"  class="bg-light">{{ __("Orden No.") }}</th>
                                        {{-- <th scope="col"  class="bg-light">{{ __("HBL No.") }}</th> --}}
                                        <th scope="col"  class="bg-light">{{ __("Embarque No.") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Remitente") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Destinatario") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Codigo") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Estado") }}</th>
                                    </tr>
                                </thead>
                                <tbody class="TablaListaOrdenConfirmadaBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 p-1">
                        <div class="col-md-12 col-sm-12 col-lg-12 container_ordenes">
                            <table class="table table-hover table-bordered table-sm table-responsive-sm tablaListadoOrdenConfirmada">
                                <thead class="thead-light">
                                    <tr>
                                        <th colspan="3">Ordenes confirmadas para embarque</th>
                                        <th colspan="2">
                                            <div class="form-inline col-sm-12 col-md-12 col-lg-12">
                                                <label class="mr-2">{{ __("Orden a Confirmar:") }}</label>
                                                <input type="text" id="txtordenconf" name="txtordenconf" class="form-control form-control-sm" autofocus>
                                            </div>
                                        </th>
                                        <th colspan="2">Cantidad: <span id="countordenesready" style="color: lightseagreen"></span></th>
                                    </tr>
                                    <tr class="justify-content-between">
                                        <th scope="col"  class="bg-light">{{ __("Orden No.") }}</th>
                                        {{-- <th scope="col"  class="bg-light">{{ __("HBL No.") }}</th> --}}
                                        <th scope="col"  class="bg-light">{{ __("Embarque No.") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Remitente") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Destinatario") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Codigo") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Estado") }}</th>
                                    </tr>
                                </thead>
                                <tbody class="TablaListaOrdenConfirmadaBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row m-auto p-0">
                    <div class="col-md-5 col-lg-5 col-sm-5 p-1">
                        <div class="col-md-12 col-sm-12 col-lg-12 container_ordenes">
                            <table class="table table-hover table-bordered table-sm table-responsive-sm TablaListaOrdenPdte">
                                <thead class="thead-light">
                                    <tr class="thead-light">
                                        <th colspan="5">Listado de ordenes pendientes</th>
                                        <th colspan="2">Cantidad: <span class="countordenesPdte" style="color: lightseagreen"></span></th>
                                    </tr>
                                    <tr class="justify-content-between">
                                        <th scope="col"  class="bg-light">{{ __("Orden No.") }}</th>
                                        {{-- <th scope="col"  class="bg-light">{{ __("HBL No.") }}</th> --}}
                                        <th scope="col"  class="bg-light">{{ __("Embarque No.") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Remitente") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Destinatario") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Codigo") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Estado") }}</th>
                                    </tr>
                                </thead>
                                <tbody class="TablaListaOrdenPdteBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2 p-1">
                        <table class="table table-hover table-bordered table-sm table-responsive-sm">
                            <thead class="thead-light">
                                <tr class="thead-light" style="height: 280px">
                                    <th style="text-align: center; vertical-align: middle"><button type="button" id="btnTransferOrden" class="btn btn-primary" disabled><i class="fas fa-file-import"></i> Mover ordenes</button></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="col-md-5 col-lg-5 col-sm-5 p-1">
                        <div class="col-md-12 col-sm-12 col-lg-12 container_ordenes">
                            <table class="table table-hover table-bordered table-sm table-responsive-sm tablaListadoOrdenTraspasada">
                                <thead class="thead-light">
                                    <tr>
                                        <th colspan="4">Listado de ordenes movidas a otro embarque</th>
                                        <th colspan="2">
                                            <div class="form-inline col-sm-12 col-md-12 col-lg-12">
                                                <label for="embconf" class="mr-2">{{ __("Mover a: ") }}</label>
                                                <select id="txtembarquenuevo"
                                                        name="txtembarquenuevo"
                                                        class="selectpicker show-menu-arrow form-control form-control-sm txtembarquenuevo"
                                                        data-live-search="true">
                                                        @foreach ($vembarques->getEmbarques() as $embarque=>$no_embarque)
                                                            <option data-tokens="{{ $embarque }}" value="{{ $embarque }}"> {{ $embarque }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </th>
                                        <th colspan="1">Cantidad: <span style="color: lightseagreen">0</span></th>
                                    </tr>
                                    <tr class="justify-content-between">
                                        <th scope="col"  class="bg-light">{{ __("Orden No.") }}</th>
                                        {{-- <th scope="col"  class="bg-light">{{ __("HBL No.") }}</th> --}}
                                        <th scope="col"  class="bg-light">{{ __("Embarque No.") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Remitente") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Destinatario") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Codigo") }}</th>
                                        <th scope="col"  class="bg-light">{{ __("Estado") }}</th>
                                    </tr>
                                </thead>
                                <tbody class="tablaListadoOrdenTraspasadaBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-header">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button type="button" class="btn btn-dark ml-auto btncerrar-listadoOrdenConfirmada">{{ __("Cerrar")}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/Orden/orden.js') }}"></script>
    <script src="{{ asset('js/Orden/getOrdenToConfirm.js') }}"></script>
    <script src="{{ asset('js/Orden/moveOrdene.js') }}"></script>
@endsection
