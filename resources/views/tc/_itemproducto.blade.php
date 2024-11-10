@extends('layouts.app')

@section('content')
    <div class="tablacontrol-producto col-sm-12 col-md-12 col-lg-12 col-xl-12">
        @include('modals.mItemProducto')

        <div class="card card-productos">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4 class="ml-2">{{ __('Listado de productos')}}</h4>
            </div>

            <div class="card-body">
                <div class="col-12 contProducto">
                    <div id="leyendaProductos" class="col-12 bg-dark text-white-50" hidden>
                        <p>{{ __("No existen productos activos o vigentes")}}</p>
                    </div>
                    <table id="tableItemProd" class="col-12 col-lg-12 table table-hover table-borderless table-sm table-responsive-sm tableItemProd">
                        <thead>
                            <tr>
                                <th colspan="10"><button id="btnAddItemProd" class="btn btn-sm btn-primary btnAddItemProd btnAceptar mb-1">{{ __("Agregar Producto") }}</button></th>
                            </tr>
                            <tr class="justify-content-between">
                                <th scope="col" class="bg-light" hidden>{{ __("Id.") }}</th>
                                <th scope="col" class="bg-light" hidden>{{ __("IdCapitulo.") }}</th>
                                <th scope="col" class="bg-light">{{ __("Producto") }}</th>
                                <th scope="col" class="bg-light">{{ __("Capitulo") }}</th>
                                <th scope="col" class="bg-light">{{ __("Articulo") }}</th>
                                <th scope="col" class="bg-light">{{ __("Fecha Inicio") }}</th>
                                <th scope="col" class="bg-light">{{ __("Fecha Fin") }}</th>
                                <th scope="col" class="bg-light" style="text-align: center"></th>
                            </tr>
                        </thead>
                        <tbody id="tableItemProdBody">
                            @foreach($itemprod as $itemproditem)
                                <tr data-idarticulo="{{ $itemproditem->idarticulo }}" data-idcapitulo="{{ $itemproditem->idcapitulo }}" data-producto="{{ $itemproditem->producto }}" data-capitulo="{{ $itemproditem->capitulo }}" data-articulo="{{ $itemproditem->articulo }}" data-f_inicio="{{ $itemproditem->f_inicio }}" data-f_ffin="{{ $itemproditem->f_ffin }}">
                                    <td class="rowtditemprod" hidden>{{ $itemproditem->idarticulo }}</td>
                                    <td class="rowtditemprod" hidden>{{ $itemproditem->idcapitulo }}</td>
                                    <td class="rowtditemprod">{{ $itemproditem->producto }}</td>
                                    <td class="rowtditemprod">{{ $itemproditem->capitulo }}</td>
                                    <td class="rowtditemprod">{{ $itemproditem->articulo }}</td>
                                    <td class="rowtditemprod">{{ Carbon\Carbon::parse($itemproditem->f_inicio)->format('Y-m-d') }}</td>
                                    <td class="rowtditemprod">{{ $itemproditem->f_ffin ? Carbon\Carbon::parse($itemproditem->f_ffin)->format('Y-m-d') : '' }}</td>
                                    <td style="text-align: center"><button class="btn btn-sm btn-secondary btn-EditarItemProd btnEditar"><i class="far fa-edit"></i><span class="ml-1">{{ __("Editar")}}</span></button></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="row d-flex justify-content-between align-items-center mr-2">
                    <button type="button" class="btn btn-dark btn-sm ml-auto btncerrar-producto btnCerrar">{{ __("Cerrar")}}</button>
                </div>
            </div>


            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/Tc/main.js') }}"></script>
    <script src="{{ asset('js/Tc/CreaTcProducto.js') }}"></script>
    <script src="{{ asset('js/Tc/ActualizaTcProducto.js') }}"></script>
@endsection
