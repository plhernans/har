@extends('layouts.app')

@section('content')
    <div class="listadoFacturas col-sm-12 col-md-12 col-lg-12 col-xl-12">
        @include('Facturas.mfactura')
        @include('Facturas.mfacturapdf')

        <div class="card card-listadofactura">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Listado de Facturas')}}</h4>
            </div>
            <div class="card-body row">
                <div class="col-2 leftboxtListadoFact p-0">
                    <div class="card">
                        <div class="card-header bg-secondary d-flex justify-content-between">
                            <h5 id="title-orden">{{ __('Filtro de busqueda')}}</h5>
                        </div>
                        <div class="card-body">
                            <form id="fbusquedafact" action="{{route("listafacturas")}}" method="POST">
                                @csrf
                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                                    <div class="col-md-12 col-lg-12 m-0 p-0">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="fdesdelbl">{{ __("Desde") }}</label>
                                            <input type="date" id="txtfdesde" name="txtfdesde" class="form-control form-control-sm" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="fhastalbl">{{ __("Hasta") }}</label>
                                            <input type="date" id="txtfhasta" name="txtfhasta" class="form-control form-control-sm" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="fnolbl">{{ __("No. Factura") }}</label>
                                            <input type="text" id="txtnofact" name="txtnofact" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="festadolbl">{{ __("Estado") }}</label>
                                            <select id="txtfestado"
                                                    name="txtfestado"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm"
                                                    data-live-search="true"
                                                    required>
                                                    <option value="">{{__("TODOS")}}</option>
                                                    <option value="EMITIDA">{{__("EMITIDA")}}</option>
                                                    <option value="COBRADA">{{__("COBRADA")}}</option>
                                                    <option value="CANCELADA">{{__("CANCELADA")}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="fconceptolbl">{{ __("Concepto") }}</label>
                                            <select id="txtfconcepto"
                                                    name="txtfconcepto"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm"
                                                    data-live-search="true"
                                                    required>
                                                    <option value="">{{__("TODOS")}}</option>
                                                    <option value="ORDEN">{{__("DOC FEE")}}</option>
                                                    <option value="BULTOS">{{__("ENVIO PAQUETERIA")}}</option>
                                                    <option value="KG">{{__("FREIGHT")}}</option>
                                            </select>
                                        </div>


                                        <div class="row d-flex justify-content-between align-items-center mr-2">
                                            <button id="btn-fbuscar" type="button" class="btn btn-sm btnAceptar ml-auto">{{ __("Relizar Busqueda")}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-10 contListadoFactura">
                    <div id="LeyendaFacturas" class="col-12 bg-dark text-white-50" hidden>
                        <p>{{ __("No existen Facturas en este rango de fecha")}}</p>
                    </div>
                    <table class="table table-hover table-borderless table-sm table-responsive-sm tablaListadoFactura">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="12">
                                    <button type="button" class="btn btn-sm mr-auto btnAceptar btn-facturaorden"><i class="fas fa-file-invoice-dollar mr-2" data-toggle="tooltip" title="Facturar"></i>{{__("Nueva Factura")}}</button>
                                </th>
                            </tr>
                            <tr class="justify-content-between">
                                <th scope="col"  class="bg-light">{{ __("No") }}</th>
                                <th scope="col"  class="bg-light">{{ __("No.Factura") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Facturado a") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Concepto") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Total") }}</th>
                                <th scope="col"  class="bg-light">{{ __("F.Pago") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Estado") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Emitida") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Modificada") }}</th>
                                <th scope="col"  class="bg-light" hidden>{{ __("idorden") }}</th>
                                <th scope="col"  class="bg-light" hidden>{{ __("idfpago") }}</th>
                                <th scope="col"  class="bg-light" hidden>{{ __("noorden") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        <tbody class="tablaListadoFacturaBody">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button id="btncerrar-listadoFact" class="btn btn-dark btnCerrar ml-auto">{{ __("Cerrar")}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/Facturas/factura.js') }}"></script>
    <script src="{{ asset('js/Facturas/crearFactura.js') }}"></script>
    <script src="{{ asset('js/Facturas/updateFactura.js') }}"></script>
    <script src="{{ asset('js/Facturas/deleteFactura.js') }}"></script>
    <script src="{{ asset('js/Etiquetas/etiqueta.js') }}"></script>
    <script src="{{ asset('js/lib/jsPDF132/dist/jspdf.min.js')}}"></script>
    <script src="{{ asset('js/Facturas/facturaPdf.js') }}"></script>
    <script src="{{ asset('js/Facturas/facture.js') }}"></script>
@endsection
