@extends('layouts.app')
@inject('vembarques', 'App\Services\Embarques')

@section('content')
    <div class="panelDocumentacion col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="card cardPanelDocumentacion">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Manifiesto y Bill of Lading')}}</h4>
            </div>
            <div class="card-body row">
                <div class="col-md-12 col-lg-12 col-sm-12 containerPanelDoc">
                    <div id="LeyendaDocumentos" class="col-12 bg-dark text-white-50" hidden>
                        <p>{{ __("No existen solicitudes programadas para el embarque seleccionado")}}</p>
                    </div>
                    <table class="table table-hover table-bordered table-sm table-responsive-sm tablaDoc">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="6">
                                    <div class="form-inline col-sm-12 col-md-12 col-lg-12">
                                        <label class="mr-2">{{ __("Embarque No.") }}</label>
                                        <select id="txtEmbarqueDoc"
                                                name="txtEmbarqueDoc"
                                                class="selectpicker show-menu-arrow form-control form-control-sm txtEmbarqueDoc"
                                                data-live-search="true">
                                                @foreach ($vembarques->getEmbarques() as $embarque=>$no_embarque)
                                                    <option data-tokens="{{ $embarque }}" value="{{ $embarque }}"> {{ $no_embarque }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th><a id="btnExportMftoExcel" class="btn btn-sm btn-success ml-auto" href="" hidden><i class="far fa-file-excel mr-2"></i>{{ __("Export MFTO")}}</a></th>
                                <th></th>
                                <th></th>
                                <th><input type="checkbox" id="original" name="original" value="1" class="mr-1"><label>{{ __("Original")}}</label></th>
                            </tr>
                            <tr class="justify-content-between">
                                <th scope="col"  class="bg-light">{{ __("Bill of Lading") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Remitente") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Destinatario") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Opciones") }}</th>
                            </tr>
                        </thead>
                        <tbody class="tablaDocBody">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-header">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button type="button" class="btn btn-dark ml-auto btnCerrarPanelDoc">{{ __("Cerrar")}}</button>
                </div>
            </div>
            {{-- <a id="urlgetSolicitudes" href="{{route('mftoybl.getSolicitudes')}}" hidden></a> --}}
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/Doc/doc.js') }}"></script>
@endsection
