@inject('paises', 'App\Services\Paises')
<form id="formTcPorts" name="formTcPorts" class="rounded" method="POST">
    @csrf
    <div class="col-12 col-lg-12 px-0 pb-1 mb-1">
        <input type="text"
        class="iduser"
        name="iduser"
        class="form-control iduser"
        disabled
        readonly
        hidden
        value="{{ Auth::user()? Auth::user()->id:'' }}">

        <div class="col-12 col-lg-12 pt-1">
            <div class="form-group">
                <label><strong>{{ __("Pais")}}</strong></label><br>
                <select name="tcpais"
                        class="selectpicker show-menu-arrow form-control pais"
                        data-live-search="true"
                        required>
                    @foreach ($paises->getPaises() as $pais)
                        <option data-tokens="{{ $pais }}" value="{{ $pais }}"> {{ $pais }}</option>
                    @endforeach    
                </select>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <div class="form-group">
                <label><strong>{{ __("Puerto")}}</strong></label><br>
                <input type="text" name="tcpuerto" class="required form-control tcpuerto">
            </div>
        </div>
        <div class="col-12 col-lg-12 pb-1">
            <div class="form-group">
                <label><strong>{{ __("Codigo")}}</strong></label><br>
                <input name="tccodigo"
                        class="form-control tccodigo"
                        required>
                </select>
            </div>
        </div>
    </div>
    <div class="tcport-footer btn-group">
        <button class="btn btn-success btn-sm rounded">{{ __("Guardar") }}</button>
        <button class="btn btn-secondary btn-sm rounded">{{ __("Cancelar") }}</button>
    </div>
</form>