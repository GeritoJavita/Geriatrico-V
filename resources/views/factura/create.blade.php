@extends('layouts.dashboard_admin')

@section('title', 'Registrar Factura')
@section('header', 'Registrar Factura')

@section('styles')
@vite(['resources/css/factura/factura.css'])
@endsection

@section('content')
<div class="container-factura">
    <div class="card">
        <h2><i class="fas fa-file-invoice"></i> Registrar Factura</h2>

        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('factura.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="id_producto">Producto asociado:</label>
                <select name="id_producto" id="id_producto" required>
                    <option value="">Seleccione un producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre de la factura:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Factura proveedor" required>
            </div>

            <div class="form-group">
                <label for="precio">Valor total:</label>
                <input type="number" name="precio" id="precio" min="0" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" required>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo de factura:</label>
                <input type="text" name="tipo" id="tipo" placeholder="Compra, servicio, etc." required>
            </div>

            <div class="form-group">
                <label for="archivo_pdf">Archivo PDF:</label>
                <input type="file" name="archivo_pdf" id="archivo_pdf" accept="application/pdf" required>
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Guardar Factura
                </button>
                <a href="{{ route('inventario.index') }}" class="btn-cancel">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
