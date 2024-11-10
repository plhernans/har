@inject('tipocargos', 'App\Services\TipoCargos')
@inject('tipomonedas', 'App\Services\TipoMonedas')
@inject('tipopagos', 'App\Services\TipoPagos')
@inject('tipocobros', 'App\Services\TipoCobro')

<div class="modal mt-5 fade m-cargos" id="m-cargos">
    <div id="m-cargosDialog" class="modal-dialog modal-lg-dialog m-cargos">
        <div class="modal-content">
            {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                @include('partials._session-msg')
                <form id="formCargos" method="POST" action="{{ route('cargos.store') }}">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card contenedor-mfactura">
                            <div class="card-header d-flex justify-content-between bg-primary text-white">
                                <h4 id="title-cargos">{{ __('Cargos')}}</h4>
                                <div class="form-row pt-0">
                                    <div class="form-inline col-sm-6">
                                        <input id="txtorden_cargos" class="form-control bg-white text-primary text-right" style="font-size: 14px" type="text" name="txtorden_cargos" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row p-0">
                                    <div class="col-md-4 col-lg-4 m-0 p-0">
                                        <button type="button" id="btnNuevoCargo" class="col-sm-4 btn btn-sm btn-success ml-3 mb-2 btnEtiqueta"><i class="fas fa-file mr-2" data-toggle="tooltip" title="Agregar Nuevo Cargo"></i>Nuevo Cargo</button>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <input type="text" id="txtidcargo" name="txtidcargo" class="form-control form-control-sm" hidden>
                                            <label for="lbltcargo">{{ __("Concepto") }}</label>
                                            <select id="txttipocargo"
                                                    name="txttipocargo"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm requerido"
                                                    data-live-search="true"
                                                    required
                                                    disabled>
                                                    @foreach ($tipocargos->getTipoCargos() as $idtipocargo=>$cargo)
                                                        <option data-tokens="{{ $cargo }}" value="{{ $idtipocargo }}"> {{ $cargo }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="lblpago">{{ __("Pago") }}</label>
                                            <select id="txttipopago"
                                                    name="txttipopago"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm requerido"
                                                    data-live-search="true"
                                                    required
                                                    disabled>
                                                    @foreach ($tipopagos->getTipoPagos() as $idpago=>$pago)
                                                        <option data-tokens="{{ $pago }}" value="{{ $idpago }}"> {{ $pago }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="lblmoneda">{{ __("Moneda") }}</label>
                                            <select id="txtmoneda"
                                                    name="txtmoneda"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm requerido"
                                                    data-live-search="true"
                                                    required>
                                                    @foreach ($tipomonedas->getTipoMonedas() as $idmoneda=>$moneda)
                                                        <option data-tokens="{{ $moneda }}" value="{{ $idmoneda }}"> {{ $moneda }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label>{{ __("Tipo de cambio al USD") }}</label>
                                            <input type="text" id="txttcambio" name="txttcambio" class="form-control form-control-sm" required disabled>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="lblcalculo">{{ __("UM") }}</label>
                                            <select id="txttipocobro"
                                                    name="txttipocobro"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm requerido"
                                                    required
                                                    disabled>
                                                    <option data-tokens="" value=""></option>
                                                    @foreach ($tipocobros->getTipoCobro() as $cobro=>$importe)
                                                        {{-- <option data-tokens="" value=""></option> --}}
                                                        <option data-tokens="{{$cobro}}" value="{{$importe}}"> {{$cobro}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="lblimporte">{{ __("Importe") }}</label>
                                            <input type="text" id="txtimporte" name="txtimporte" class="form-control form-control-sm requerido" required disabled>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="lblctdad">{{ __("Cantidad") }}</label>
                                            <input type="text" id="txtctdad" name="txtctdad" class="form-control form-control-sm requerido" required disabled>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label for="lbltotal">{{ __("Total") }}</label>
                                            <input type="text" id="txttotal" name="txttotal" class="form-control form-control-sm requerido" required disabled>
                                        </div>

                                        <div class="pt-2 pr-0 bfbutton mr-3 mt-2 d-flex flex-row-reverse">
                                            <button id="btn-addItemCargos" type="button" class="btn btn-sm btn-outline-primary btnAceptar ml-auto"><i class="fas fa-plus"></i> Agregar Concepto</button>
                                            <button id="btn-updItemCargos" type="button" class="btn btn-sm btnEditar ml-auto" hidden><i class="fas fa-sync-alt"></i> Actualizar</button>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-8 m-0 p-0">
                                        <div class="gridListaConceptoCargos col-md-12 col-lg-12" style="position: inherit">
                                            <table class="table table-hover table-bordered table-sm table-responsive-sm table_listaitemcargos">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th colspan="16"><button id="btnGeneraCargosAutomaticos" type="button" class="btn btn-sm btn-secondary btnEditar ml-auto"><i class="fas fa-cogs mr-1"></i>Generar cargos a cobrar</button></th>
                                                    </tr>
                                                    <tr class="justify-content-between">
                                                        <th scope="col"  class="bg-light" hidden>{{ __("No Orden") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("Tipo Cargo") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("Tipo Pago") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("Moneda") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("Importe") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("UM") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("Ctdad") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("Total") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("tipocambio") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("idtcargo") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("idpago") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("idmoneda") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("idcargo") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("fvencemoneda") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("Facturado") }}</th>
                                                        <th scope="col"  class="bg-light" style="text-align: center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table_listaitemcargosBody">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-footer ml-auto mr-4">
                                <button type="button" id="btn-closeCargos" class="btn btn-sm btn-dark btnCerrar mb-2">{{ __("Cerrar") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <a id="urlcargoupdate" href="{{ route('cargos.update','') }}" hidden></a>
                <a id="urlcargodelete" href="{{ route('cargos.destroy','') }}" hidden></a>
            </div>

        </div>
    </div>
</div>
