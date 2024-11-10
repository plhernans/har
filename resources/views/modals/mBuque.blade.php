<div class="modal mt-5 fade" id="mBuque">
    <div id="mBuqueDialog" class="modal-dialog modal-lg-dialog mBuque">
        <div class="modal-content">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                <form id="formAV" class="formAV" method="POST" action="{{ route('tcvessel.store') }}">
                    @csrf
                    @include('partials._session-msg')
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 id="lbl-titlebuque" class="text-white">{{ __('Agregar Buque / Aeronave')}}</h3>
                            </div>
                            <div class="card-body">
                                <div id="fieldTcBuque" class="form-row">
                                    <div class="form-group col-sm-6 mr-4">
                                        <input type="text"  id="txttcidbuque" class="form-control form-control-sm txttcidbuque" name="txttcidbuque" hidden>
                                    </div>
                                    <div class="form-group col-sm-6 mr-4">
                                        <label for="lbltcbuque"><strong>{{ __("Nombre del Buque / Aeronave") }}</strong></label>
                                        <input type="text"  id="txttcbuque" class="form-control form-control-sm txttcbuque requerido" name="txttcbuque" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto">
                                <button id="btnSaveBuque" class="btn btn-sm btn-primary mb-2">{{ __("Guardar") }}</button>
                                <button id="btnUpdateBuque" class="btn btn-sm btn-outline-primary mb-2" hidden>{{ __("Actualizar") }}</button>
                                <button type="button" class="btn btn-sm btn-danger mb-2 btnCloseBuque">{{ __("Cerrar") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <a id="urlbuqueupdate" href="{{ route('tcvessel.update','') }}" hidden></a>
            </div>

        </div>
    </div>
</div>




