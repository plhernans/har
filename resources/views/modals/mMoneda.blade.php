<div class="modal mt-5 fade" id="mMoneda">
    <div id="mMonedaDialog" class="modal-dialog modal-lg-dialog mMoneda">
        <div class="modal-content">
           {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                <form id="formMoneda" class="formMoneda" method="POST" action="{{ route('tcmoneda.store') }}">
                    @csrf
                    @include('partials._session-msg')
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 id="title-mMoneda"><strong>{{ __('Nueva Moneda de Cambio')}}</strong></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label>{{ __("Moneda") }}</label>
                                        <input type="text" id="txtmoneda" name="txtmoneda" class="form-control form-control-sm txtmoneda requerido" required disabled>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>{{ __("Tipo de Cambio") }}</label>
                                        <input type="text" id="txtipocambio" name="txtipocambio" class="form-control form-control-sm txtipocambio requerido" required disabled>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>{{ __("Desde") }}</label>
                                        <input id="txtfinicioMoneda" class="form-control form-control-sm txtfinicio requerido" type="date" name="txtfinicioMoneda" required disabled>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>{{ __("Hasta") }}</label>
                                        <input id="txtffinMoneda" class="form-control form-control-sm txtffin" type="date" name="txtffinMoneda" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="car-footer ml-auto mr-4">
                                <button id="btnSaveMoneda" type="button" class="btn btn-sm btn-primary mb-2">{{ __("Guardar") }}</button>
                                <button id="btnUpdateMoneda" type="button" class="btn btn-sm btn-outline-primary mb-2" hidden>{{ __("Actualizar") }}</button>
                                <button id="btnCloseMoneda" type="button" class="btn btn-sm btn-danger mb-2">{{ __("Cerrar") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <a id="urlmonedadupdate" href="{{ route('tcmoneda.update','') }}" hidden></a>
            </div>

        </div>
    </div>
</div>
