<div class="modal mt-5 fade" id="mTipocobro">
    <div id="mTipocobroDialog" class="modal-dialog modal-lg-dialog mTipocobro">
        <div class="modal-content">
            {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                <form id="formTipocobro" class="formTipocobro" method="POST" action="{{ route('tctipocobro.store') }}">
                    @csrf
                    @include('partials._session-msg')
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 id="title-mTipocbro"><strong>{{ __('Actualizar registro')}}</strong></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label><strong>{{ __("UM") }}</strong></label>
                                        <input type="text" id="txtipocobro" name="txtipocobro" class="form-control form-control-sm txtipocobro requerido" required disabled>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label><strong>{{ __("Importe") }}</strong></label>
                                        <input type="text" id="txtipocobroimporte" name="txtipocobroimporte" class="form-control form-control-sm txtipocobroimporte requerido" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label><strong>{{ __("Fecha Inicio") }}</strong></label>
                                        <input id="txtfiniciotipocobro" class="form-control form-control-sm txtfiniciotipocobro" type="date" name="txtfiniciotipocobro requerido" required disabled>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label><strong>{{ __("Fecha Fin") }}</strong></label>
                                        <input id="txtffintipocobro" class="form-control form-control-sm txtffintipocobro" type="date" name="txtffintipocobro" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="car-footer ml-auto mr-4">
                                <button id="btnCreaTipocobro" class="btn btn-sm btn-primary mb-2" hidden>{{ __("Crear") }}</button>
                                <button id="btnUpdateTipocobro" class="btn btn-sm btn-outline-primary mb-2">{{ __("Actualizar") }}</button>
                                <button id="btnCloseTipocobro" type="button" class="btn btn-sm btn-danger mb-2">{{ __("Cerrar") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <a id="urltipocobroupdate" href="{{ route('tctipocobro.update','') }}" hidden></a>
            </div>

        </div>
    </div>
</div>




