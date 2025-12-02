@extends('layouts.dashboard_admin')

@section('title', 'Detalle Residentes')

@section('styles')
@vite([
'resources/css/inventario/inventario.css',
'resources/js/residente/residente_search.js',
'resources/js/residente/look.js',
'resources/css/create/form_create.css',
])
@endsection

@section('header', 'Detalle del Usuario')

@section('content')

<div class="container-r">


    <div class="first-data">

        {{-- Foto + botón --}}
        <div class="img-usuario">
            <img src="{{ $usuario->foto ? asset('storage/' . $usuario->foto) : asset('images/default-avatar.png')}}" alt="Imagen Usuario" width="150px">
        </div>

        {{-- Datos principales --}}
        <div class="principal-data">
            <h2>{{ $usuario->nombre }} {{ $usuario->apellido }}</h2>
            <p><span>Documento:</span> {{ $usuario->id }}</p>
            <p><span>Correo:</span> {{ $usuario->correo }}</p>
            <p><span>Direccion:</span> {{ $usuario->direccion }}</p>
        </div>
    </div>
</div>

@endsection


