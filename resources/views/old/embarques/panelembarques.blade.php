@extends('layouts.app')

@section('content')
    @include('embarques.listadoembarques')
@endsection

@section('script')
    <script src="{{ asset('js/embarques/main.js') }}"></script>
    <script src="{{ asset('js/embarques/crearEmbarque.js') }}"></script>
    <script src="{{ asset('js/embarques/obtenerEmbarque.js') }}"></script>
    <script src="{{ asset('js/embarques/actualizaEmbarque.js') }}"></script>
@endsection
