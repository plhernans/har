<div class="modal mt-5 fade" id="m-factura">
    <div id="m-facturaDialog" class="modal-dialog modal-lg-dialog m-factura">
        <div class="modal-content">
             {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet">--}}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                @include('partials._session-msg')
                <form id="formFactura" method="POST" action="{{ route('facturas.store') }}">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card contenedor-mfactura">
                            <div class="card-header d-flex justify-content-between bg-primary text-white">
                                <h4 id="title-factura">{{ __('Facturacion')}}</h4>
                                <div class="form-row pt-0">
                                    <div class="form-inline col-sm-6">
                                        <input id="txtnofactura" class="form-control bg-dark text-warning text-right" style="font-size: 14px" type="text" name="txtnofactura" hidden disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="containerFactura pl-2px row">
                                <div class="card-body col-sm-12 col-md-2 col-lg-2 cardbodyfacturaleft">
                                    <div class="gridNoFactura">
                                        <table class="table table-hover table-bordered table-sm table-responsive-sm table_listaNofactura">
                                            <thead class="thead-light hfact">
                                                <tr class="justify-content-between">
                                                    <th scope="col"  class="bg-light">{{ __("Factura") }}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table_listaNofacturaBody">
                                                <tr class="justify-content-between">

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-body col-sm-12 col-md-10 col-lg-10">
                                    <div class="form-row pt-2 mb-2 cardbodyfactura">
                                        <div class="form-group col-sm-2">
                                            <label for="lblblhouse">{{ __("No. Orden") }}</label>
                                            <input type="text" id="txtblhousefactura" name="txtblhousefactura" class="form-control form-control-sm requerido" disabled required>

                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="lblcliente">{{ __("Cliente") }}</label>
                                            <input id="txtclientefactura" name="txtclientefactura" class="form-control form-control-sm requerido" disabled required>

                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="lbldirfactura">{{ __("Direccion") }}</label>
                                            <input type="text" id="txtdirfactura" name="txtdirfactura" class="form-control form-control-sm requerido" disabled required>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="lblteleffactura">{{ __("Telefono") }}</label>
                                            <input type="text" id="txttelffactura" name="txttelffactura" class="form-control form-control-sm requerido" disabled required>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="lbltipopago">{{ __("Forma de Pago") }}</label>
                                            <select id="txttipopagofactura"
                                                    name="txttipopagofactura"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm requerido"
                                                    data-live-search="true"
                                                    required disabled>
                                                    <option value="EFECTIVO" selected>EFECTIVO</option>
                                                    <option value="TARJETA DE DEBITO">TARJETA DE DEBITO</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="gridListaConceptoFactura">
                                        <div class="container row p-0 m-0">
                                            {{-- <ul class="nav nav-pills">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link nav-link-sm dropdown-toggle" data-toggle="dropdown" href="#">Opciones</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" id="btn-addCargoToFactura" href="#"><i class="fas fa-file mr-1" data-toggle="tooltip" title="Nueva Factura"></i>Nueva Factura</a></li>
                                                        <li><a class="dropdown-item af" id="btnEditFactura" href="#"><i class="fas fa-edit mr-1" data-toggle="tooltip" title="Editar Factura"></i>Editar</a></li>
                                                        <li><a class="dropdown-item af" id="btnFacturaPdf" href="#"><i class="fas fa-file-pdf mr-1" data-toggle="tooltip" title="Imprimar Factura"></i>Imprimir</a></li>
                                                        <li><a class="dropdown-item af" id="btnCancelFactura" href="#"><i class="fas fa-trash mr-1" data-toggle="tooltip" title="Eliminar Factura"></i>Cancelar</a></li>
                                                    </ul>
                                                </li>
                                            </ul> --}}
                                            <div class="col-sm-12 col-lg-5 col-md-5 px-0 ml-3">
                                                <button type="button" id="btn-addCargoToFactura" class="btn btn-sm btn-primary mb-2 btnAceptar "><i class="fas fa-file" data-toggle="tooltip" title="Nueva Factura"></i> Nueva Factura</button>
                                                <button type="button" id="btnEditFactura" class="btn btn-sm btn-secondary mb-2 btnEditar" disabled><i class="fas fa-edit" data-toggle="tooltip" title="Editar Factura"></i> Editar</button>
                                                <button type="button" id="btnCancelFactura" class="btn btn-sm btn-secondary mb-2 btnEliminar" disabled><i class="fas fa-trash" data-toggle="tooltip" title="Eliminar Factura"></i> Cancelar</button>
                                                <button type="button" id="btnFacturaPdf" class="btn btn-sm btn-dark btnPdf mr-auto mb-2" disabled><i class="fas fa-file-pdf"></i> Imprimir</button>
                                            </div>
                                            <h5 class="col-sm-12 col-lg-3 col-md-3 px-0" id="etiqueta_estadoFac"><span id="festado" class="bg-secondary text-black-50">Factura: </span> <span id="festadovalor"></span> <span id="fcancelado"></span></h5>
                                            <h5 class="col-sm-12 col-lg-3 col-md-3" id="etiqueta_noFactura"><span class="bg-secondary text-black-50">No. </span> <span id="nofact"></span></h5>
                                        </div>

                                        <div class="row fixed-height px-0 mx-0">
                                            <div class=" col-sm-9 col-md-9 col-lg-9 ml-0">
                                                <table class="table table-hover table-bordered table-sm table-responsive-sm table_listaitemfactura">
                                                    <thead class="thead-light hfact">
                                                        <tr class="justify-content-between">
                                                            {{-- <th scope="col"  class="bg-light">Checkbox</th> --}}
                                                            <th scope="col"  class="bg-light">{{ __("Tipo Cargo") }}</th>
                                                            <th scope="col"  class="bg-light">{{ __("Tipo Pago") }}</th>
                                                            <th scope="col"  class="bg-light">{{ __("Moneda") }}</th>
                                                            <th scope="col"  class="bg-light">{{ __("Importe") }}</th>
                                                            <th scope="col"  class="bg-light">{{ __("UM") }}</th>
                                                            <th scope="col"  class="bg-light">{{ __("Ctdad") }}</th>
                                                            <th scope="col"  class="bg-light">{{ __("Total") }}</th>
                                                            <th scope="col"  class="bg-light" hidden>{{ __("idtipocargo") }}</th>
                                                            <th scope="col"  class="bg-light" hidden>{{ __("idpago") }}</th>
                                                            <th scope="col"  class="bg-light" hidden>{{ __("idmoneda") }}</th>
                                                            <th scope="col"  class="bg-light" hidden>{{ __("idcargo") }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table_listaitemfacturaBody">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="form-group col-sm-3 col-md-3 col-lg-3 p-0 m-0">
                                                <label><strong>{{ __("Observaciones") }}</strong></label><br>
                                                <textarea type="text" id="txtobsfact" cols="30" rows="10" name="txtobsfact" class="form-control form-control-sm" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-0 mb-2">
                                        <button type="button" id="resetVtotal" class="btn btn-sm btn-outline-success" disabled>{{ __("Actualizar Valor a Facturar") }}</button>
                                    </div>
                                    <div class="form-row pt-2 cardbodyfactura bfdetail">
                                        <div class="form-group col-sm-2">
                                            <label for="lblpreciosubtotalfact">{{ __("SubTotal") }}</label><br>
                                            <input type="text" id="txtpreciosubtotalfact" name="txtpreciosubtotalfact" class="form-control form-control-sm" value="0" disabled required>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="checkiva" class="custom-control-input m-auto" id="switchiva" disabled>
                                            <label class="custom-control-label mb-1" for="switchiva">{{ __("IVA") }}</label>
                                            <input type="text" id="txtivafact" name="txtivafact" class="form-control form-control-sm mt-2" value="18" disabled required>
                                        </div>
                                        <div class="form-group col-sm-3" style="padding-left: 50px">
                                            <label>{{ __("Valor Iva") }}</label><br>
                                            <input type="text" id="txtivavalor" name="txtivavalor" class="form-control form-control-sm" disabled required>
                                        </div>
                                        <div class="form-group col-sm-3" style="padding-left: 50px">
                                            <label for="lbltotalfact">{{ __("Total a pagar") }}</label><br>
                                            <input type="text" id="txttotalfact" name="txttotalfact" class="form-control form-control-sm" style="background-color: moccasin" disabled required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="card-footer ml-auto mr-4">
                                <button type="button" id="btn-facturara" class="btn btn-sm btn-primary mb-2" disabled>{{ __("Guardar") }}</button>
                                <button type="button" id="btn-actfactura" class="btn btn-sm btn-outline-primary mb-2" disabled>{{ __("Actualizar") }}</button>
                                <button type="button" id="btn-closeFactura" class="btn btn-sm btn-danger mb-2">{{ __("Cerrar") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <a id="urlfacturaupdate" href="{{ route('facturas.update','') }}" hidden></a>
                <a id="urlfacturadelete" href="{{ route('facturas.destroy','') }}" hidden></a>
            </div>
        </div>
    </div>
</div>
