@inject('caparts', 'App\Services\CapituloArticulo')

<div class="modal mt-5 fade" id="mItemProd">
    <div id="mItemProdDialog" class="modal-dialog modal-lg-dialog mItemProd">
        <div class="modal-content">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                <form id="formmItemProd" class="formmItemProd" method="POST" action="{{ route('itemprod.store') }}">
                    @csrf
                    @include('partials._session-msg')
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 id="title-mitemprod"><strong>{{ __('Nuevo Producto')}}</strong></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="lblmproducto"><strong>{{ __("Producto") }}</strong></label>
                                        <input type="text" id="txtmproducto" name="txtmproducto" class="form-control form-control-sm txtmproducto" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="lblmcapitulo"><strong>{{ __("Capitulo") }}</strong></label>
                                        <select id="txtmcapitulo"
                                                name="txtmcapitulo"
                                                class="selectpicker show-menu-arrow form-control form-control-sm txtmcapitulo"
                                                data-live-search="true"
                                                required>
                                            @foreach ($caparts->getCapitulo() as $idcap=>$capitulo)
                                                <option data-tokens="{{ $capitulo }}" value="{{ $idcap }}"> {{ $capitulo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="lblmarticulo"><strong>{{ __("Articulo") }}</strong></label>
                                        <select id="txtmarticulo"
                                                name="txtmarticulo"
                                                class="selectpicker show-menu-arrow form-control form-control-sm txtmarticulo"
                                                data-live-search="true"
                                                required>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="lblfinicio"><strong>{{ __("Desde") }}</strong></label>
                                        <input id="txtfinicio" class="form-control form-control-sm txtfinicio" type="date" name="txtfinicio" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="lblffin"><strong>{{ __("Hasta") }}</strong></label>
                                        <input id="txtffin" class="form-control form-control-sm txtffin" type="date" name="txtffin">
                                    </div>
                                </div>
                            </div>
                            <div class="car-footer ml-auto mr-4">
                                <button id="btn-guardaItemProd" class="btn btn-sm btn-primary mb-2">{{ __("Guardar") }}</button>
                                <button id="btnUpdateItemProd" class="btn btn-sm btn-outline-primary mb-2" hidden>{{ __("Actualizar") }}</button>
                                <button id="btnCloseItemProd" type="button" class="btn btn-sm btn-danger mb-2 btnCloseItemProd">{{ __("Cerrar") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <a id="urlitemprodupdate" href="{{ route('itemprod.update','') }}" hidden></a>
            </div>

        </div>
    </div>
</div>
