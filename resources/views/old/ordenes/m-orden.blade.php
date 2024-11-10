@inject('envios', 'App\Services\Envios')
@inject('remdest', 'App\Services\Remdest')

<div class="modal mt-5 fade" id="m-orden">
    <div id="m-ordenDialog" class="modal-dialog modal-lg-dialog m-orden">
        <div class="modal-content">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                <form id="formOrden" class="formOrden" method="POST" action="{{ route("ordenes.store") }}">
                    @csrf
                    @include('partials._session-msg')
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card contenedor-morden">
                            <div class="card-header bg-primary text-white d-flex justify-content-between">
                                <h4 id="title-orden">{{ __('Nueva Orden')}}</h4>
                            </div>
                            <div class="card-body">

                                <div class="form-row pt-2">

                                    <div class="form-group col-sm-12">
                                        <label for="lblembarque-ordenmodal" class="lbl"><strong>{{ __("No. Embarque") }}</strong></label>
                                        <input type="text" id="txtembarque_ordenmodal" name="txtembarque_ordenmodal" class="form-control form-control-sm txtembarque_ordenmodal" disabled>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="lbltipoenvio">{{ __("Tipo de Embarque") }}</label>
                                                <select id="txttipoenvio"
                                                        name="txttipoenvio"
                                                        class="selectpicker show-menu-arrow form-control form-control-sm txttipoenvio"
                                                        data-live-search="true" required>
                                                    @foreach ($envios->getEnvios() as $idtenvio=>$categoria)
                                                        <option data-tokens="{{ $categoria }}" value="{{ $categoria }}"> {{ $categoria }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="lblfllegada">{{ __("Fecha de entrada al pais") }}</label>
                                                <input type="date" id="txtfentrada" name="txtfentrada" class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="div_reminput" class="form-group col-sm-12" hidden>
                                        <h6>{{ __("Remitente") }}</h6>
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="lblremitente-nombre" class="lbl"><strong>{{ __("Nombre") }}</strong></label>
                                                <input type="text" id="txtrem_nomb" name="txtrem_nomb" class="form-control form-control-sm txtrem_nomb" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="lblremitente-apellidop" class="lbl"><strong>{{ __("Primer Apellido") }}</strong></label>
                                                <input type="text" id="txtrem_apellp" name="txtrem_apellp" class="form-control form-control-sm txtrem_apellp" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="lblremitente-apellidom" class="lbl"><strong>{{ __("Segundo Apellido") }}</strong></label>
                                                <input type="text" id="txtrem_apellm" name="txtrem_apellm" class="form-control form-control-sm txtrem_apellm" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="div_remselect" class="form-group col-sm-12" hidden>
                                        <label for="lblremitente"><strong>{{ __("Remitente") }}</strong></label>
                                        <select id="txtremitente"
                                                name="txtremitente"
                                                class="selectpicker show-menu-arrow form-control form-control-sm txtremitente"
                                                data-live-search="true" required>
                                            @foreach ($remdest->getRemdest() as $idremdest=>$nombre_apellido)
                                                <option data-tokens="{{ $nombre_apellido }}" value="{{ $idremdest }}"> {{ $nombre_apellido }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="div_destselect" class="form-group col-sm-12" hidden>
                                        <label for="lbldestinatario"><strong>{{ __("Destinatario") }}</strong></label>
                                        <select id="txtdestinatario"
                                                name="txtdestinatario"
                                                class="selectpicker show-menu-arrow form-control form-control-sm txtdestinatario"
                                                data-live-search="true" required>
                                            @foreach ($remdest->getRemdest() as $idremdest=>$nombre_apellido)

                                                <option data-tokens="{{ $nombre_apellido }}" value="{{ $idremdest }}"> {{ $nombre_apellido }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="div_destinput" class="form-group col-sm-12" hidden>
                                        <label for="lbldestinatario_input" class="lbl"><strong>{{ __("Destinatario") }}</strong></label>
                                        <input type="text" id="txtdestinatario_input" name="txtdestinatario_input" class="form-control form-control-sm txtdestinatario_input" required>
                                        <input type="text" id="txtiddestinatario_input" name="txtiddestinatario_input" class="form-control form-control-sm txtiddestinatario_input" required hidden>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer bg-secondary">
                                <button id="btn-guardorden" type="button" class="btn-guardorden btn btn-sm btn-primary btnAceptar mb-2">{{ __("Guardar") }}</button>
                                <button id="btn-actorden" type="button" class="btn-actorden btn btn-sm btn-primary btnAceptar mb-2" hidden>{{ __("Actualizar") }}</button>
                                <button id="btn-closeorden" type="button" class="btn btn-sm btn-dark btnCerrar mb-2 btn-closeorden">{{ __("Cerrar") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- <a id="urlbuqueupdate" href="{{ route('tcvessel.update','') }}" hidden></a> --}}
            </div>

        </div>
    </div>
</div>
