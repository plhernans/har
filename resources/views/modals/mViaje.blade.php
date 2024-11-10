<div class="modal mt-5 fade" id="mViaje">
    <div id="mViajeDialog" class="modal-dialog modal-lg-dialog mViaje">
        <div class="modal-content">
            {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
            {{-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}

            @inject('buques', 'App\Services\Buques')
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                <form id="formViaje" class="formViaje" method="POST" action="{{ route('tcviaje.store') }}">
                    @csrf
                    @include('partials._session-msg')
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 id="titleviaje">{{ __('Nuevo Viaje')}}</h4>
                            </div>
                            <div class="card-body">
                                <div id="fieldViaje" class="form-row">
                                    <div class="form-group col-sm-6 mr-4">
                                        <input id="idviaje" class="form-control form-control-sm idviaje" type="text" name="idviaje" hidden>
                                        <input id="idbuque" class="form-control form-control-sm idbuque" type="text" name="idbuque" hidden>
                                    </div>
                                    <div class="form-group col-sm-6 mr-4">
                                        <label for="lblbuque">{{ __("Buque") }}</label>
                                        <select id="buque"
                                                 name="buque"
                                                class="selectpicker show-menu-arrow form-control form-control-sm buque requerido"
                                                data-live-search="true"
                                                required>
                                            @foreach ($buques->getBuques() as $buque=>$name)
                                                <option data-tokens="{{ $buque }}" value="{{ $buque }}"> {{ $name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="buquetxt" class="form-control buquetxt requerido" type="text" name="buquetxt" required hidden disabled>
                                    </div>



                                    <div class="form-group col-sm-5">
                                        <label for="lblviaje">{{ __("Viaje") }}</label>
                                        <input type="text" id="viaje" class="form-control viaje requerido" type="text" name="viaje" required>
                                    </div>
                                </div>

                            </div>
                            <div class="car-footer ml-auto mr-4">
                                <button type="button" id="btnSaveViaje" class="btn btn-sm btn-primary mb-2">{{ __("Guardar") }}</button>
                                <button type="button" id="btnUpdateViaje" class="btn btn-sm btn-outline-primary mb-2" hidden>{{ __("Actualizar") }}</button>
                                <button type="button" class="btn btn-sm btn-danger mb-2 btnCloseViaje">{{ __("Cerrar") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <a id="urlviajeupdate" href="{{ route('tcviaje.update','') }}" hidden></a>
            </div>

        </div>
    </div>
</div>




