<div class="modal mt-5 fade" id="mCliente">
    <div id="mClienteDialog" class="modal-dialog modal-lg-dialog mCliente">
        <div class="modal-content">
            {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                <form id="formCliente" class="formCliente" method="POST" action="{{ route('tccliente.store') }}">
                    @csrf
                    @include('partials._session-msg')
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card">
                            <div class="card-header bg-primary text-white d-flex justify-content-between">
                                <h3 id="titulocliente"><strong>{{ __('Nuevo Cliente')}}</strong></h3>
                            </div>
                            <div class="card-body">
                                <input id="idcliente" class="form-control form-control-sm idcliente" type="text" hidden disabled>
                                <div class="form-row">
                                    <div class="form-group col-sm-12">
                                        <label for="lblcliente"><strong>{{ __("Cliente o Proveedor") }}</strong></label>
                                        <input type="text" id="clientename" class="form-control form-control-sm clientename requerido" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12">
                                        <label for="lbladdress"><strong>{{ __("Direccion") }}</strong></label>
                                        <textarea row="5" id="clientedir" class="form-control form-control-sm clientedir requerido" placeholder="Eg: Calle miranda, no.1" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="car-footer ml-auto mr-4">
                                <button id="btnSaveCliente" class="btn btn-sm btn-primary mb-2">{{ __("Guardar") }}</button>
                                <button id="btnUpdateCliente" class="btn btn-sm btn-outline-primary mb-2" hidden>{{ __("Actualizar") }}</button>
                                <button type="button" class="btn btn-sm btn-danger mb-2 btnCloseCliente">{{ __("Cerrar") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <a id="urlclienteupdate" href="{{ route('tccliente.update','') }}" hidden></a>
            </div>

        </div>
    </div>
</div>
