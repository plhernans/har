<div class="modal mt-5 fade" id="mItemCargo">
    <div id="mItemCargoDialog" class="modal-dialog modal-lg-dialog mItemCargo">
        <div class="modal-content">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                <form id="formmItemCargo" class="formmItemCargo" method="POST" action="{{ route('tccargos.store') }}">
                    @csrf
                    @include('partials._session-msg')
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 id="title-mitemcargo"><strong>{{ __('Nuevo Cargo')}}</strong></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label><strong>{{ __("Cargo") }}</strong></label>
                                        <input type="text" id="txtmcargo" name="txtmcargo" class="form-control form-control-sm txtmcargo" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label><strong>{{ __("Fecha Inicio") }}</strong></label>
                                        <input id="txtfiniciocargo" class="form-control form-control-sm txtfiniciocargo" type="date" name="txtfiniciocargo" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label><strong>{{ __("Fecha Fin") }}</strong></label>
                                        <input id="txtffincargo" class="form-control form-control-sm txtffincargo" type="date" name="txtffincargo">
                                    </div>
                                </div>
                            </div>
                            <div class="car-footer ml-auto mr-4">
                                <button id="btn-guardaItemCargo" class="btn btn-sm btn-primary mb-2">{{ __("Guardar") }}</button>
                                <button id="btnUpdateItemCargo" class="btn btn-sm btn-outline-primary mb-2" hidden>{{ __("Actualizar") }}</button>
                                <button id="btnCloseItemCargo" type="button" class="btn btn-sm btn-danger mb-2">{{ __("Cerrar") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <a id="urlitemcargoupdate" href="{{ route('tccargos.update','') }}" hidden></a>
            </div>

        </div>
    </div>
</div>
