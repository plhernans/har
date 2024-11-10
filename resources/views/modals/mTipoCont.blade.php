<div class="modal mt-5 fade" id="mTipoCont">
    <div id="mTipoContDialog" class="modal-dialog modal-lg-dialog mTipoCont">
        <div class="modal-content">
            {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                <form id="formTipoCont" class="formTipoCont" method="POST" action="{{ route('tccont.store') }}">
                    @csrf
                    @include('partials._session-msg')
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 id="titletipocont">{{ __('Nuevo tipo contenedor')}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <input type="text" id="idtipocont" class="form-control idtipocont requerido" name="idtipocont" required disabled hidden>
                                    <div class="form-group col-sm-12">
                                        <label for="lbltipocont"><strong>{{ __("Tipo Contenedor") }}</strong></label>
                                        <input type="text" id="txttipocont" class="form-control txttipocont requerido" name="txttipocont" required>
                                    </div>

                                </div>
                                <div class="form row">
                                    <div class="form-group col-sm-12">
                                        <label for="lblTipoContDescripcion"><strong>{{ __("Descripcion") }}</strong></label>
                                        <input type="text" id="txttipocontdescripcion" class="form-control txttipocontdescripcion requerido" name="txttipocontdescripcion" required>
                                    </div>
                                </div>
                                <div class="form row">
                                    <div class="form-group col-sm-12">
                                        <label for="lblteus"><strong>{{ __("Teus") }}</strong></label>
                                        <input type="text" id="txtteus" class="form-control txtteus requerido" name="txtteus" required>
                                    </div>
                                </div>
                            </div>
                            <div class="car-footer ml-auto mr-4">
                                <button type="button" id="btnSaveCont" class="btn btn-sm btn-primary mb-2">{{ __("Guardar") }}</button>
                                <button type="button" id="btnUpdateCont" class="btn btn-sm btn-outline-primary mb-2" hidden>{{ __("Actualizar") }}</button>
                                <button type="button" class="btn btn-sm btn-danger mb-2 btnCloseCont">{{ __("Cerrar") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <a id="urlcontupdate" href="{{ route('tccont.update','') }}" hidden></a>
            </div>

        </div>
    </div>
</div>




