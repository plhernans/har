@extends('layouts.app')

@inject('vembarques', 'App\Services\Embarques')

@section('content')
    <div class="listadoOrdenesR col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="card card-listadoOrdenesR">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="titulo">{{ __('Listado de Ordenes')}}</h4>
            </div>
            <div class="card-body row">
                <div class="col-2 leftboxtListadoOrdenesR p-0">
                    <div class="card">
                        <div class="bg-secondary d-flex justify-content-between">
                            <h5 id="ml-2">{{ __('Filtro de busqueda')}}</h5>
                        </div>
                        <div class="card-body">
                            <form id="fbusquedaOrden" action="{{route("listaordenes")}}" method="POST">
                                @csrf
                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                                    <div class="col-md-12 col-lg-12 m-0 p-0">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label>{{ __("No. Embarque:") }}</label>
                                            <select id="txtnoembarquelo"
                                                name="txtnoembarquelo"
                                                class="selectpicker show-menu-arrow form-control form-control-sm txtnoembarquelo"
                                                data-live-search="true" required>
                                                @foreach($vembarques->getEmbarques() as $embarque=>$no_embarque)
                                                    <option data-tokens="{{ $no_embarque }}" value="{{ $no_embarque }}"> {{ $no_embarque }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label>{{ __("No. MAWB / MBL") }}</label>
                                            <input type="text" id="txtnodocOrden" name="txtnodocOrden" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="festadolbl">{{ __("Estado de Factura") }}</label>
                                            <select id="txtfestado"
                                                    name="txtfestado"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm"
                                                    data-live-search="true"
                                                    required>
                                                    <option value="">{{__("TODOS")}}</option>
                                                    <option value="EMITIDA">{{__("EMITIDA")}}</option>
                                                    <option value="CANCELADA">{{__("CANCELADA")}}</option>
                                                    <option value="PENDIENTE">{{__("PENDIENTE")}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="fconceptolbl">{{ __("Estado de Ordenes") }}</label>
                                            <select id="txtfestadoO"
                                                    name="txtfestadoO"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm"
                                                    data-live-search="true"
                                                    required>
                                                    <option value="">{{__("TODOS")}}</option>
                                                    <option value="EMBARCADAS">{{__("EMBARCADAS")}}</option>
                                                    <option value="PENDIENTE">{{__("PENDIENTE")}}</option>
                                            </select>
                                        </div>
                                        <div class="row d-flex justify-content-between align-items-center mr-2">
                                            <button id="btn-fbuscarO" type="button" class="btnAceptar">{{ __("Relizar Busqueda")}}  <i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-8 contListadoFacturaOrden">
                    <div id="LeyendaFacturas" class="col-12 bg-red text-white-50" hidden>
                        <p>{{ __("No existen Ordenes para estos filtros de busqueda")}}</p>
                    </div>
                    <table class="table table-hover table-borderless table-sm table-responsive-sm tablaListadoFacturaOrden">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="6">
                                    <a type="button" class="btn btn-sm mr-auto btnSuccess btn-outline-success disabled">{{__("Exportar PDF")}}</a>
                                    <a id="btnFacturaOrdenExcel" type="button" class="btn btn-sm mr-auto btnSuccess btn-outline-success">{{__("Exportar Excel")}}</a>
                                    <a type="button" class="btn btn-sm mr-auto btnEliminar btn-outline-success disabled">{{__("Cancelar")}}</a>
                                </th>
                                <th colspan="6">
                                    <form class="form-inline px-0">
                                        <label class="mr-2">Buscar:</label>
                                        <input id="findTablaFactOrden" class="form-control mr-sm-2" type="text" placeholder="Search" style="width: 300px">
                                    </form>
                                </th>
                            </tr>
                            <tr class="justify-content-between">
                                <th scope="col"  class="bg-light"><input type="checkbox" class="chkboxFullF" disabled></th>
                                <th scope="col"  class="bg-light">{{ __("No. Embarque") }}</th>
                                <th scope="col"  class="bg-light">{{ __("No. MFTO") }}</th>
                                <th scope="col"  class="bg-light">{{ __("MAWB / MBL") }}</th>
                                <th scope="col"  class="bg-light">{{ __("No. Orden") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Fecha Orden") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Remitente") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Consignatario") }}</th>
                                <th scope="col"  class="bg-light">{{ __("No. Factura") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Total Facturado") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Estado Factura") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Estado Orden") }}</th>
                            </tr>
                        </thead>
                        <tbody class="tablaListadoFacturaOrdenBody">

                        </tbody>
                    </table>
                </div>
                <div class="col-2 contListadoFacturaOrden">
                    <table class="table table-hover table-borderless table-sm table-responsive-sm tablaValorTotalO">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="2">Resumen</th>
                            </tr>
                        </thead>
                        <tbody class="tablaValorTotalBodyO">
                            <tr class="justify-content-between">
                                <td scope="col"  class="bg-light">Cantidad Ordenes</td>
                                <td class="ctdadOrden">0</td>
                            </tr>
                            <tr class="justify-content-between">
                                <td scope="col"  class="bg-light">Ordenes Facturadas</td>
                                <td class="ordenFact">0</td>
                            </tr>
                            <tr>
                                <td scope="col"  class="bg-light">Ordenes Pendiente a Facturar</td>
                                <td class="ordenPdtFact">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button id="btncerrar-listadoFactO" class="btn btn-dark btnCerrar ml-auto">{{ __("Cerrar")}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/Orden/orden.js') }}"></script>
@endsection
