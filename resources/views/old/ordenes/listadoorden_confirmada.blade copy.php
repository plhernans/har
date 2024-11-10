@extends('layouts.app')
@inject('vembarques', 'App\Services\Embarques')

@section('content')
    <div class="listadoOrdenConfirmada col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="card card-listadoOrdenConfirmada">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Ordenes a Confirmar')}}</h4>
            </div>
            <div class="card-body row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 leftboxtOrdenesConfirmada">
                    <div class="card">
                        <div class="card-header bg-secondary d-flex justify-content-between">
                            <h5 id="title-orden">{{ __('Datos')}}</h5>
                        </div>
                        <div class="card-body">
                            <div id="fOrdenConfirmada">
                                @csrf
                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 m-0 p-0">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="embconf">{{ __("Embarque Confirmado") }}</label>
                                            <select id="txtembarqueconf"
                                                    name="txtembarqueconf"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm txtembarqueconf"
                                                    data-live-search="true">
                                                    @foreach ($vembarques->getEmbarques() as $embarque=>$no_embarque)
                                                        <option data-tokens="{{ $embarque }}" value="{{ $embarque }}"> {{ $embarque }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="ordenconf">{{ __("No. Orden a Confirmar") }}</label>
                                            <input type="text" id="txtordenconf" name="txtordenconf" class="form-control form-control-sm" autofocus>
                                        </div>
                                        <div id="respuesta">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5 col-sm-12 container_ordenes">
                    <div id="LeyendaOrdenConfirmada" class="col-12 bg-dark text-white-50" hidden>
                        <p>{{ __("No existen Facturas en este rango de fecha")}}</p>
                    </div>
                    <table class="table table-hover table-bordered table-sm table-responsive-sm tablaListadoOrdenes">
                        <thead class="thead-light">
                            <tr class="justify-content-between">
                                <th scope="col"  class="bg-light">{{ __("Bulto No.") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Orden No.") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Remitente") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Destinatario") }}</th>
                                <th scope="col"  class="bg-light">{{ __("bulto") }}</th>
                                <th scope="col"  class="bg-light">{{ __("cantidad") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Estado") }}</th>
                            </tr>
                        </thead>
                        <tbody class="TablaListaOrdenConfirmadaBody">

                        </tbody>
                    </table>
                </div>
                <div class="col-md-5 col-lg-5 col-sm-12 container_oprocesadas">
                    <table class="table table-hover table-bordered table-sm table-responsive-sm tablaListadoOrdenConfirmada">
                        <thead class="thead-light">
                            <tr class="justify-content-between">
                                <th scope="col"  class="bg-light">{{ __("Bulto No.") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Orden No.") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Remitente") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Destinatario") }}</th>
                                <th scope="col"  class="bg-light">{{ __("bulto") }}</th>
                                <th scope="col"  class="bg-light">{{ __("cantidad") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Estado") }}</th>
                            </tr>
                        </thead>
                        <tbody class="TablaListaOrdenConfirmadaBody">

                        </tbody>
                    </table>
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
    <script src="{{ asset('js/Orden/getOrdenToConfirm.js') }}"></script>
    <script src="{{ asset('js/DocEmbarque/main.js') }}"></script>
@endsection
