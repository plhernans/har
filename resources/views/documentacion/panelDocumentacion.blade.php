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
                        <thead>
                            <tr class="thead-light">
                                <th colspan="3">
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
                                <th colspan="6">
                                    <form class="form-inline px-0">
                                        <label class="mr-2">Buscar:</label>
                                        <input id="findTablaDoc" class="form-control mr-sm-2" type="text" placeholder="Search" style="width: 300px">
                                    </form>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="8"><a id="btnExportMftoExcel" class="btn btn-sm btn-success ml-auto" href="" hidden><i class="far fa-file-excel mr-2"></i>{{ __("Print Manifiesto")}}</a><a id="btnExportMftoExcelA" class="btn btn-sm btn-outline-success ml-auto" href="" hidden><i class="far fa-file-excel mr-2"></i>{{ __("Print Manifiesto")}}</a><button type="button" id="btnPrintAwb" class="btn btn-sm btn-outline-success ml-2" disabled><i class="far fa-file-excel mr-2"></i>{{ __("Print AWB")}}</button>
                                {{-- <th><input type="radio" id="rtipodoc" name="rtipodoc" value="1" class="mr-1"><label>{{ __("Original")}}</label><br> <input type="radio" id="rtipodoc" name="rtipodoc" value="1" class="mr-1"><label>{{ __("Copy not negociable")}}</label></th> --}}
                                <th></th>
                            </tr>
                            <tr class="thead-light justify-content-between">
                                <th scope="col"  class="bg-light" style="width: 40px; text-align: center"><input type="checkbox" class="chkboxFullDoc"></th>
                                <th scope="col"  class="bg-light" style="width: 200px; text-align: left">{{ __("Bill of Lading / Air Way Bill") }}</th>
                                <th scope="col"  class="bg-light" style="width: 130px;">{{ __("Master AWB") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Buque/Aeronave") }}</th>
                                <th scope="col"  class="bg-light">{{ __("Viaje/Vuelo") }}</th>
                                <th scope="col"  class="bg-light" style="width: 400px; text-align: left">{{ __("Remitente") }}</th>
                                <th scope="col"  class="bg-light" style="width: 300px; text-align: left">{{ __("Destinatario") }}</th>
                                <th scope="col"  class="bg-light" style="width: 260px; text-align: left">{{ __("Descripcion") }}</th>
                                <th scope="col"  class="bg-light" style="width: 180px;">{{ __("Opciones") }}</th>
                            </tr>
                        </thead>
                        <tbody class="tablaDocBody">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button type="button" class="btn btn-dark ml-auto btnCerrarPanelDoc">{{ __("Cerrar")}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/Doc/doc.js') }}"></script>
@endsection
