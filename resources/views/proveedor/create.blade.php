@extends('layouts.dashboard_admin')

@section('title', 'Agregar Proveedor')
@section('header', 'Agregar Proveedor')

@section('styles')
@vite(['resources/css/create/form_create.css'])
@endsection

@section('content')
<div class="container-proveedor">
    <h2><i class="fas fa-truck"></i> Agregar Proveedor</h2>

    {{-- Mensajes --}}
    @if(session('success'))
    <div class="alert success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert error">{{ session('error') }}</div>
    @endif

    {{-- Formulario --}}
    <div class="form_create">
        <form action="{{ route('proveedor.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre del proveedor" required>
                @error('nombre')
                <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion" placeholder="Dirección del proveedor" required>
                @error('direccion')
                <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" placeholder="Teléfono del proveedor" required>
                @error('telefono')
                <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" name="correo" id="correo" placeholder="Correo del proveedor" required>
                @error('correo')
                <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar Proveedor
                </button>
                <a href="{{ route('proveedor.index') }}" class="btn btn-cancel">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </form>
    </div>

</div>
@endsection