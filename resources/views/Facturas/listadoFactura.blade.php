@extends('layouts.app')

@inject('vembarques', 'App\Services\Embarques')

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
                        <div class="bg-secondary d-flex justify-content-between">
                            <h5 id="titulo">{{ __('Filtro de busqueda')}}</h5>
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
                                            <label>{{ __("No. Embarque:") }}</label>
                                            <select id="txtnoembarquelf"
                                                name="txtnoembarquelf"
                                                class="selectpicker show-menu-arrow form-control form-control-sm txtnoembarquelf"
                                                data-live-search="true" required>
                                                @foreach($vembarques->getEmbarques() as $embarque=>$no_embarque)
                                                    <option data-tokens="{{ $no_embarque }}" value="{{ $no_embarque }}"> {{ $no_embarque }}</option>
                                                @endforeach
                                            </select>
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
                                            <button id="btn-fbuscar" type="button" class="btnAceptar">{{ __("Relizar Busqueda")}}  <i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-8 contListadoFactura">
                    <div id="LeyendaFacturas" class="col-12 bg-red text-white-50" hidden>
                        <p>{{ __("No existen Facturas en este rango de fecha")}}</p>
                    </div>
                    <table class="table table-hover table-borderless table-sm table-responsive-sm tablaListadoFactura">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="6">
                                    <a type="button" class="btn btn-sm mr-auto btnSuccess btn-outline-success disabled">{{__("Exportar PDF")}}</a>
                                    <a id="btnFacturaExcel" type="button" class="btn btn-sm mr-auto btnSuccess btn-outline-success">{{__("Exportar Excel")}}</a>
                                    <a type="button" class="btn btn-sm mr-auto btnEliminar btn-outline-success" disabled>{{__("Cancelar")}}</a>
                                </th>
                                <th colspan="6">
                                    <form class="form-inline px-0">
                                        <label class="mr-2">Buscar:</label>
                                        <input id="findTablaFact" class="form-control mr-sm-2" type="text" placeholder="Search" style="width: 300px">
                                    </form>
                                </th>
                            </tr>
                            <tr class="justify-content-between">
                                <th scope="col"  class="bg-light"><input type="checkbox" class="chkboxFullF" disabled></th>
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
                                <th scope="col"  class="bg-light">{{ __("noorden") }}</th>
                                <th scope="col"  class="bg-light"></th>
                            </tr>
                        </thead>
                        <tbody class="tablaListadoFacturaBody">

                        </tbody>
                    </table>
                </div>
                <div class="col-2 contListadoFactura">
                    <table class="table table-hover table-borderless table-sm table-responsive-sm tablaValorTotal">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="2">Resumen</th>
                            </tr>
                        </thead>
                        <tbody class="tablaValorTotalBody">
                            <tr class="justify-content-between">
                                <td scope="col"  class="bg-light">Cantidad Facturas</td>
                                <td class="ctdadFact">0</td>
                            </tr>
                            <tr class="justify-content-between">
                                <td scope="col"  class="bg-light">Facturas Emitidas</td>
                                <td class="factEmit">0</td>
                            </tr>
                            <tr>
                                <td scope="col"  class="bg-light">Facturas Canceladas</td>
                                <td class="factCancel">0</td>
                            </tr>
                            <tr>
                                <td scope="col"  class="bg-light">Total Facturado</td>
                                <td class="importe">0.00</td>
                            </tr>
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
