{{-- @inject('remdest', 'App\Services\Remdest') --}}
@include('Facturas.mfactura')

<div class="row p-0">
    <div class="embarque-datalle col-sm-6 col-md-6 col-lg-6 col-xl-6 m-0">
        @include('ordenes.m-orden')
        <div class="card card-ordenes">
            <div class="card-header bg-primary text-white d-flex justify-content-between" data-toggle="collapse" data-target=".cardbodyordenes">
                <h4 class="ml-2">{{ __('Listado de ordenes')}}</h4>
            </div>
            <div class="card-body cardbodyordenes collapse show">
                <div class="col-12 contordenes p-0">
                    <div id="leyendaOrdenes" class="col-12 bg-dark text-white-50" hidden>
                        <p>{{ __("No existen ordenes para este embarque")}}</p>
                    </div>
                    <table class="table table-hover table-bordered table-sm table-responsive-sm tablelistadoordenes">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" colspan="4"  class="bg-light thtop"><button id="creaNorden" type="button" class="btn-nuevaorden btn btn-sm btn-primary rounded mr-2 btnAceptar " disabled><i class="fas fa-plus mr-1"></i>{{ __("Crear Nueva Orden") }}</button>
                                {{-- <a class="btn-expExcel btn btn-sm btn-success rounded ml-auto" href="{{route('generaexcel')}}">{{ __("Exportar a Excel") }}</a></th> --}}
                                {{-- <a class="btn-facturaorden btn btn-sm btn-success rounded ml-auto"><i class="far fa-lg fa-file-excel mr-1"></i>{{ __("Exportar a Excel") }}</a></th> --}}
                                <th scope="col" colspan="2" class="bg-light thdown">
                                    <div class="form-inline es-input" data-effects="slide">
                                        <label for="lblpeson">{{ __("No. Embarque:") }}</label>
                                        <select id="txtnoembarque_orden"
                                                name="txtnoembarque_orden"
                                                class="selectpicker show-menu-arrow form-control form-control-sm txtnoembarque_orden ml-2"
                                                data-live-search="true" required>
                                                <option></option>
                                                @foreach($vembarques as $vembarqueitem)
                                                    <option data-tokens="{{ $vembarqueitem->no_embarque }}" value="{{ $vembarqueitem->no_embarque }}"> {{ $vembarqueitem->no_embarque }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </th>

                            </tr>
                            <tr class="justify-content-between">
                                <th scope="col"  class="bg-light" style="width: 10%">{{ __("No. Orden") }}</th>
                                <th scope="col"  class="bg-light" style="width: 10%">{{ __("Fecha") }}</th>
                                <th scope="col"  class="bg-light" style="width: 25%">{{ __("Remitente") }}</th>
                                <th scope="col"  class="bg-light" style="width: 25%">{{ __("Destinatario") }}</th>
                                <th scope="col"  class="bg-light" style="width: 15%">{{ __("Estado") }}</th>
                                <th scope="col"  class="bg-light" style="text-align: right; width: 15%">{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        <tbody id="tableordenesBody">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button class="btn btn-dark ml-auto mt-0 btncerrar-embarquedetalle btnCerrar">{{ __("Cerrar")}}</button>
                </div>
                <a id="urlgetordenes" href="{{ route('ordenes.show','') }}" hidden></a>
                <a id="urldeleteorden" href="{{ route('ordenes.destroy','') }}" hidden></a>
            </div>
        </div>
    </div>
    @include('productos.listadoproductos')
    @include('productos.nuevoproducto')
</div>
