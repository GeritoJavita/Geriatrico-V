@extends('layouts.dashboard_admin')

@section('title', 'Agregar Producto')

@section('styles')
    @vite(['resources/css/create/form_create.css'])
@endsection

@section('header', 'Agregar Producto')

@section('content')

@if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('producto.store') }}" method="POST" class="form-container">
    @csrf

    <!-- Nombre -->
    <div class="form-group">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
    </div>

    <!-- Precio -->
    <div class="form-group">
        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" required>
    </div>

    <!-- Categoría -->
    <div class="form-group">
        <label>Categoría:</label>
        <select name="categoria_id" required>
            <option value="">Seleccione una categoría</option>
            @foreach ($categorias as $cat)
                <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
            @endforeach
        </select>
    </div>

    <!-- Proveedor -->
    <div class="form-group">
        <label>Proveedor:</label>
        <select name="proveedor_id" required>
            <option value="">Seleccione un proveedor</option>
            @foreach ($proveedores as $prov)
                <option value="{{ $prov->id }}">{{ $prov->nombre }}</option>
            @endforeach
        </select>
    </div>

    <!-- Stock y cantidad -->
    <div class="form-group">
        <label>Cantidad inicial:</label>
        <input type="number" name="cantidad" min="0" placeholder="Ej: 50" required>
    </div>

    <div class="form-group">
        <label>Stock disponible:</label>
        <input type="number" name="stock" min="0" placeholder="Ej: 50" required>
    </div>

    <!-- Otros campos -->
    <div class="form-group">
        <label>Lote:</label>
        <input type="text" name="lote">
    </div>

    <div class="form-group">
        <label>Fecha de Caducidad:</label>
        <input type="date" name="fecha_caducidad">
    </div>

    <div class="form-group">
        <label>Presentación:</label>
        <input type="text" name="presentacion">
    </div>

    <div class="form-group">
        <label>Dosis:</label>
        <input type="text" name="dosis">
    </div>

    <div class="form-group">
        <label>Indicaciones:</label>
        <textarea name="indicaciones"></textarea>
    </div>

    <!-- Acciones -->
    <div class="actions">
        <button type="submit" class="btn">💾 Guardar</button>
        <a href="{{ route('inventario.index') }}" class="btn cancel">❌ Cancelar</a>
    </div>
</form>

@endsection
