@extends('layouts.app')
<title>Envios</title>
@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Envíos</h1>
    <a href="{{ route('admin.shipping.create') }}" class="btn btn-primary mb-3">Nuevo Envío</a>
    <div id="shipping-table">
        @include('admin.shipping.table', ['shippings' => $shippings]) <!-- Carga la tabla inicial -->
    </div>
</div>
@endsection
