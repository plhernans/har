@extends('layouts.app')

@section('content')
    <form id="formcond" name="formcond" class="_tccondentrega">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-6 col-xl-6 m-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ __("Condiciones de Entrega") }}</h3>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-sm-6 mr-4">
                            <label for="lbltcguest">{{ __("Condicion") }}</label>
                            <input class="form-control" type="text">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="lbltcaddress">{{ __("Direccion") }}</label>
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="car-footer">
                    <button class="btn btn-primary mb-2" style="align-items: right">{{ __("Guardar") }}</button>
                </div>
            </div>
        </div>
    </form>
@endsection