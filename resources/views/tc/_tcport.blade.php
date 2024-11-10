@extends('layouts.app')

@section('content')


<div class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-xl-8 m-auto rounded">
    <div class="card">
        <div class="card-body">
            @include('partials._session-msg')
            <h3 class="card-title">{{ __("Agregar Puerto") }}</h3>

            <div class="col-*-12 row formpuerto">
                <form id="formtcpuerto" name="formtcpuerto" class="formtcpuerto col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" method="POST" action="{{ route('tcport.store') }}">
                    @csrf
                    <div class="col-*-12 m-auto">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 mr-4">
                                        <label for="lblpais"><strong>{{ __("Pais") }}</strong></label>
                                        <input id="txtpais"  class="form-control form-control-sm" type="text" required>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12">
                                        <label for="lblpuerto"><strong>{{ __("Puerto") }}</strong></label>
                                        <input id="txtpuerto" class="form-control form-control-sm" type="text" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12">
                                        <label for="lblcodigo"><strong>{{ __("Codigo") }}</strong></label>
                                        <input id="txtcodigo" class="form-control form-control-sm" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="car-footer mr-4 ml-auto">
                                <button id="btnAddPort" class="btn btn-sm btn-outline-primary mb-2">{{ __("Agregar") }}</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mx-0 px-0">
                    <button id="btnSavePort" type="button" class="btn btn-sm btn-primary mb-2" hidden>{{ __("Guardar") }}</button>

                    <table id="tableTcPort" class="col-12 col-lg-12 table table-hover table-sm">
                        <thead class="thead-light">
                            <tr class="justify-content-between">
                                <th scope="col">{{ __("Pais") }}</th>
                                <th scope="col">{{ __("Puerto") }}</th>
                                <th scope="col">{{ __("Codigo") }}</th>
                                <th scope="col" colspan="2" style="text-align: center"></th>
                            </tr>
                        </thead>
                        <tbody id="tableTcPortBody">
                           <!-- <tr>
                                <td id="tdguestname" class="rowtdguest"></td>
                                <td id="tdguestlastname" class="rowtdguest"></td>
                                <td id="tdguestnationality" class="rowtdguest"></td>
                                <td id="tdguestpassport" class="rowtdguest"></td>
                            </tr> -->
                        </tbody>
                    </table>

                </div>



            </div>
           <!-- <div class="car-footer">
                <div class="justify-content-between align-items-right">
                    <button class="btn btn-sm btn-primary">{ __("Guardar") }}</button>
                </div>

            </div>-->
        </div>

    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('js/Tc/CreaTcPort.js') }}"></script>
@endsection
