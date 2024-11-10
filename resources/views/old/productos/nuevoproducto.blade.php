@inject('productos', 'App\Services\Productos')

<div class="orden-nuevoproducto col-sm-6 col-md-6 col-lg-6 col-xl-6" hidden>
    <div class="card cardnuevoproducto">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <h5 class="ml-2 col-2">{{ __('Productos')}}</h5>

            <div class="row d-flex justify-content-between align-items-center col-10">
                <div class="form-inline col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <label for="lblproductono" class="lbl">{{ __("No Bulto: ") }}</label>
                    <input id="txtproductono" class="form-control form-control-sm txtproductono ml-1" type="text" name="txtproductono" disabled>
                </div>

                <div class="form-inline col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <label for="lblnoorden_prod_nuevo" class="lbl">{{ __("Orden: ") }}</label>
                    <input type="text" id="txtnoorden_prod_nuevo" name="txtnoorden_prod_nuevo" class="form-control form-control-sm txtnoorden_prod_nuevo ml-1" disabled>
                </div>

                <div class="form-inline col-sm-5 col-md-5 col-lg-5 col-xl-5">
                    <label for="lbldest_producto_nuevo" class="lbl">{{ __("Dest: ") }}</label>
                    <input type="text" id="txtdest_prod_nuevo" name="txtdest_prod_nuevo" class="form-control form-control-sm txtdest_prod_nuevo ml-1" disabled>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="col-12 panelNuevoProducto">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0 cardbodyNuevoProducto">
                    <form id="formProducto" class="formProducto" method="POST" action="{{ route('producto.store')}}">
                        @csrf
                        @include('partials._session-msg')
                        <div class="col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                            <div class="card contenedor-mproducto">
                                <div class="card-body">
                                    <div class="formfieldproducto col-12">
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label for="lblproducto" class="lbl">{{ __("Producto") }}</strong></label>
                                                <select id="txtproducto"
                                                    name="txtproducto"
                                                    class="selectpicker show-menu-arrow form-control form-control-sm"
                                                    data-live-search="true" required>
                                                    @foreach ($productos->getProductosCombo() as $id=>$producto)
                                                        <option data-tokens="{{ $producto }}" value="{{ $id }}"> {{ $producto }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label for="lblarticulo" class="lbl">{{ __("Articulo") }}</label>
                                                <input id="txtarticulo" class="form-control form-control-sm txtarticulo" type="text" name="txtarticulo" disabled required>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label for="lblcategoria" class="lbl">{{ __("Categoria") }}</label>
                                                <input id="txtcategoria" class="form-control form-control-sm txtcategoria" type="text" name="txtcategoria" disabled required>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label for="lblumedida" class="lbl">{{ __("UM") }}</label>
                                                <input id="txtumedida" class="form-control form-control-sm txtumedida" type="text" name="txtumedida" disabled required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <label for="lblcantidad" class="lbl">{{ __("Cantidad") }}</label>
                                                <input id="txtcantidad" class="form-control form-control-sm txtcantidad" type="text" name="txtcantidad" required>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <label for="lblmcubico" class="lbl">{{ __("M3/Unidad") }}</label>
                                                <input id="txtmcubico" class="form-control form-control-sm txtmcubico" type="text" name="txtmcubico" required disabled>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                <label for="lblmcubicokg" class="lbl">{{ __("PVolumen/Unidad") }}</label>
                                                <input id="txtmcubicokg" class="form-control form-control-sm txtmcubicokg" type="text" name="txtmcubicokg" required disabled>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label for="lblvaduana" class="lbl">{{ __("Valor Aduana") }}</label>
                                                <input id="txtvaduana" class="form-control form-control-sm txtvaduana" type="text" name="txtvaduana" required disabled>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label for="lblpesokg" class="lbl">{{ __("Peso KG/Unidad") }}</label>
                                                <input id="txtpesokg" class="form-control form-control-sm txtpesokg" type="text" name="txtpesokg" required>
                                            </div>
                                            <input id="txtidproducto" class="form-control form-control-sm txtidproducto" type="text" name="txtidproducto" required disabled hidden>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label class="lbl">{{ __("Largo (cm)") }}</label>
                                                <input id="txtlargom3" class="form-control form-control-sm txtm3" type="text" name="txtlargom3" required>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label class="lbl">{{ __("Ancho (cm)") }}</label>
                                                <input id="txtanchom3" class="form-control form-control-sm txtm3" type="text" name="txtanchom3" required>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label class="lbl">{{ __("Alto (cm)") }}</label>
                                                <input id="txtaltom3" class="form-control form-control-sm txtm3" type="text" name="txtaltom3" required>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <label class="lbl" hidden>{{ __("BTN_M3") }}</label><br>
                                                <button type="button" id="btnCalculaM3" class="btn btn-sm btnCalcula mr-1 rounded"><i class="far fa-save mr-1"></i>{{ __('Calcular M3 y KG')}}</button>
                                                <input type="checkbox" id="ow" name="ow" value="1" class="mr-1"><label>{{ __("OverW")}}</label>
                                            </div>
                                            <input id="txtidproducto" class="form-control form-control-sm txtidproducto" type="text" name="txtidproducto" required disabled hidden>
                                            <input id="idembarque" class="form-control form-control-sm idembarque" type="text" name="idembarque" required disabled hidden>
                                        </div>
                                    </div>
                                    <div class="footerproducto mt-1 mb-3">
                                        <button type="button" id="btn-saveProducto" class="btn btn-sm btnAceptar mr-1 rounded"><i class="far fa-save mr-1"></i>{{ __('Guardar')}}</button>
                                        <button type="button" id="btn-updateProducto" class="btn btn-sm btnEditar mr-1" hidden><i class="far fa-edit mr-1"></i>{{ __("Actualizar") }}</button>
                                        <button type="button" id="btn-clearProducto" class="btn btn-sm btn-dark btnCerrar mr-1"><i class="fas fa-sync mr-1"></i>{{ __("Reset") }}</button>
                                    </div>

                                    {{-- <div class="divtableproducto row pt-4">  --}}
                                        <div class="gridNProducto">
                                            <table class="table table-bordered table-hover table-sm table-responsive-sm tablanewprod">
                                                <thead class="thead-primary">
                                                    <tr class="justify-content-between">
                                                        <th scope="col"  class="bg-light">{{ __("No") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("Producto") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("Articulo") }}</th>
                                                        <th scope="col"  class="bg-light" style="width: 20%">{{ __("Cat") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("UM") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("Ctdad") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("M3") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("VA") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("Peso KG") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("idproducto") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("largo") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("alto") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("ancho") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("pesovolumen") }}</th>
                                                        <th scope="col"  class="bg-light" hidden>{{ __("ow") }}</th>
                                                        <th scope="col"  class="bg-light">{{ __("Accion") }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tablanewprodBody">

                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer bg-light">
            <div class="row d-flex justify-content-between align-items-center mr-2">
                <button class="btn btn-dark ml-auto btncerrar-nuevoproducto btnCerrar"></i>{{ __("Cerrar")}}</button>
            </div>
            {{-- <a id="urlgetdatosprod" href="{{ route('producto.show','') }}" hidden></a> --}}
            <a id="urlactualizadatosprod" href="{{ route('producto.update','') }}" hidden></a>
            <a id="urldeletedatosprod" href="{{ route('producto.destroy','') }}" hidden></a>
        </div>
    </div>
</div>
