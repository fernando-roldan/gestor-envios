@extends('layouts.app')

@section('content')
    <h3>Nuevo Usuario</h3>
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        @include('admin.users.partials.form', ['button' => 'Crear'])
    </form>
@endsection