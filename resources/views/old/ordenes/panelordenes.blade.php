@extends('layouts.app')

@section('content')
    @include('ordenes.listadoordenes')
    {{-- @include('embarques.listadoproductos') --}}
    {{-- @include('embarques.nuevoproducto') --}}
@endsection

@section('script')
    <script src="{{ asset('js/embarques/main.js') }}"></script>
    <script src="{{ asset('js/Orden/crearOrden.js') }}"></script>
    <script src="{{ asset('js/Orden/orden.js') }}"></script>
    <script src="{{ asset('js/Orden/deleteOrden.js') }}"></script>
    <script src="{{ asset('js/Producto/producto.js') }}"></script>
    <script src="{{ asset('js/Producto/creaProductoOrden.js') }}"></script>
    <script src="{{ asset('js/Producto/updateProductoOrden.js') }}"></script>
    <script src="{{ asset('js/Producto/deleteProductoOrden.js') }}"></script>
    <script src="{{ asset('js/Etiquetas/etiqueta.js') }}"></script>
    <script src="{{ asset('js/Facturas/factura.js') }}"></script>
    <script src="{{ asset('js/Facturas/crearFactura.js') }}"></script>
    <script src="{{ asset('js/Facturas/updateFactura.js') }}"></script>
    <script src="{{ asset('js/Facturas/DeleteFactura.js') }}"></script>
    <script src="{{ asset('js/Facturas/creaCargos.js') }}"></script>
    <script src="{{ asset('js/Facturas/updateCargos.js') }}"></script>
    <script src="{{ asset('js/Facturas/deleteCargos.js') }}"></script>
@endsection

