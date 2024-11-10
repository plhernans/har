<div class="orden-datalle col-sm-6 col-md-6 col-lg-6 col-xl-6 m-0">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <h4 class="ml-2">{{ __('Detalles de la orden')}}</h4>
        </div>
        <div class="card-body">
            <div class="col-12 panelProducto">
                <div id="leyendaProductos" class="col-12 bg-dark text-white-50" hidden>
                    <p>{{ __("No existen productos para esta orden")}}</p>
                </div>
                <div class="col-12 p-0">
                    <div class="col-12 div-mdetalle pl-0">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="form-group col-sm-3">
                                <label for="lblnoembarque_prod" class="lbl">{{ __("No. Embarque") }}</label>
                                <input type="text" id="txtnoembarque_prod" name="txtnoembarque_prod" class="form-control form-control-sm txtnoembarque_prod" disabled>
                            </div>

                            <div class="form-group ml-2 col-sm-3">
                                <label for="lblnoorden-prod" class="lbl">{{ __("No. Orden") }}</label>
                                <input type="text" id="txtnoorden_prod" name="txtnoorden-prod" class="form-control form-control-sm txtnoorden_prod" disabled>
                            </div>

                            <div class="form-group ml-2 col-sm-3">
                                <label for="lbldest_producto" class="lbl">{{ __("Destinatario") }}</label>
                                <input type="text" id="txtdest_prod" name="txtdest_prod" class="form-control form-control-sm txtdest_prod" disabled>
                            </div>

                        </div>
                    </div>

                    <div class="gridListadoProducto">
                        <table class="table table-hover table-bordered table-sm table-responsive-sm table_listadoproducto">
                            <thead class="thead-light">
                                <tr>
                                    <th colspan="6">
                                        <button type="button" class="btn-nuevoproducto btn btn-sm btn-outline-primary rounded ml-auto btnAceptar" disabled><i class="fas fa-plus mr-1"></i>{{ __("Agregar Bulto") }}</button>
                                        {{-- <button type="button" class="btn-cargos btn btn-sm rounded ml-auto btnCargos" disabled><i class="fab fa-uncharted mr-1"></i>{{ __("Cargos") }}</button> --}}
                                    </th>
                                </tr>
                                <tr class="justify-content-between">
                                    <th scope="col"  class="bg-light">{{ __("Bulto No.") }}</th>
                                    <th scope="col"  class="bg-light">{{ __("Cantidad") }}</th>
                                    <th scope="col"  class="bg-light">{{ __("Metros Cubicos") }}</th>
                                    <th scope="col"  class="bg-light">{{ __("Valor Aduana") }}</th>
                                    <th scope="col"  class="bg-light">{{ __("Peso KG") }}</th>
                                    <th scope="col"  class="bg-light" style="text-align: center">{{__("Etiquetas")}}</th>
                                </tr>
                            </thead>
                            <tbody class="table-listadoProductosBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-light">
            <div class="row d-flex justify-content-between align-items-center mr-2">
                <button type="button" class="btn btn-dark ml-auto btncerrar-listadoProducto btnCerrar">{{ __("Cerrar")}}</button>
            </div>
            {{-- <a id="urlgetordenes" href="{{ route('ordenes.show','') }}" hidden></a> --}}
        </div>
    </div>
</div>








