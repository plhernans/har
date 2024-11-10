@extends('layouts.app')
@inject('vembarques', 'App\Services\Embarques')

@section('content')
    <div class="listadoEtiquetas col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="card card-listadoEtiquetas">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Listado de Etiquetas')}}</h4>
            </div>
            <div class="card-body row">
                <div class="col-2 leftboxtListadoEtiquetas p-0">
                    <div class="card">
                        <div class="card-header bg-secondary d-flex justify-content-between">
                            <h5 id="title-orden">{{ __('Filtro de busqueda')}}</h5>
                        </div>
                        <div class="card-body">
                            <form id="fbusquedaEtiqueta" action="{{route("listaEtiquetas")}}" method="POST">
                                @csrf
                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                                    <div class="col-md-12 col-lg-12 m-0 p-0">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="edesdelbl">{{ __("Desde") }}</label>
                                            <input type="date" id="txtedesde" name="txtedesde" class="form-control form-control-sm" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="ehastalbl">{{ __("Hasta") }}</label>
                                            <input type="date" id="txtehasta" name="txtehasta" class="form-control form-control-sm" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="enolbl">{{ __("No. BL") }}</label>
                                            <input type="text" id="txtenobl" name="txtenobl" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="enoembarqlbl">{{ __("No. Embarque") }}</label>
                                            <select id="txtenoEmbarque"
                                                    name="txtenoEmbarque"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm"
                                                    data-live-search="true"
                                                    required>
                                                    @foreach ($vembarques->getEmbarques() as $embarque=>$no_embarque)
                                                        <option data-tokens="{{ $embarque }}" value="{{ $embarque }}"> {{ $no_embarque }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label>{{ __("Tipo de envio") }}</label>
                                            <select id="txttenvio"
                                                    name="txttenvio"
                                                    class="form-control form-control-sm"
                                                    data-live-search="true"
                                                    required>
                                                    <option value="">{{__("TODOS")}}</option>
                                                    <option value="ENV">{{__("ENVIO")}}</option>
                                                    <option value="ENA">{{__("ENA")}}</option>
                                                    <option value="MNJ">{{__("MENAJE")}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="eestadolbl">{{ __("Estado") }}</label>
                                            <select id="txteestado"
                                                    name="txteestado"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm"
                                                    data-live-search="true"
                                                    required>
                                                    <option value="">{{__("TODOS")}}</option>
                                                    <option value="EN ALMACEN">{{__("EN ALMACEN")}}</option>
                                                    <option value="CONFIRMADO">{{__("CONFIRMADO")}}</option>
                                            </select>
                                        </div>
                                        <div class="row d-flex justify-content-between align-items-center mr-2">
                                            <button id="btn-ebuscar" type="button" class="btn btn-sm btnAceptar ml-auto">{{ __("Relizar Busqueda")}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-10 contListadoEtiquetas">
                    <div id="LeyendaEtiqueta" class="col-12 bg-dark text-white-50" hidden>
                        <p>{{ __("No existen Etiquetas para estos criterios de busqueda")}}</p>
                    </div>
                    <table class="table table-hover table-borderless table-sm table-responsive-sm tablaListadoEtiquetas">
                        <thead class="thead-light">
                            {{-- <tr>
                                <th colspan="11">
                                    <button type="button" class="btn btn-sm mr-auto btn-outline-dark btn-facturaorden"><i class="fas fa-file-invoice-dollar mr-2" data-toggle="tooltip" title="Facturar"></i>{{__("Nueva Factura")}}</button>
                                </th>
                            </tr> --}}
                            <tr class="justify-content-between">
                                <th scope="col"  class="bg-light">{{ __("Embarque") }}</th>
                                <th scope="col"  class="bg-light">{{ __("BL") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Remitente") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Destinatario") }}</th>
                                <th scope="col"  class="bg-light">{{ __("ci") }}</th>
                                <th scope="col"  class="bg-light">{{ __("No. Bulto") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Estado") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Fecha") }}</th>
                                <th scope="col"  class="bg-light" hidden>{{ __("idetiqueta") }}</th>
                                <th scope="col"  class="bg-light" hidden>{{ __("idorden") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        <tbody class="tablaListadoEtiquetaBody">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-secondary">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button class="btn btn-dark btnCerrar ml-auto btncerrar-listadoE">{{ __("Cerrar")}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/Etiquetas/etiqueta.js') }}"></script>
@endsection


