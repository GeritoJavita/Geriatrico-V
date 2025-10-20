@extends('layouts.dashboard_admin')

@section('title', 'Inventario - Hogar Geriátrico')

@section('styles')
    @vite(['resources/css/inventario/inventario.css'])
@endsection

@section('header', 'Inventario')

@section('content')

<div class="inventory-header">
    <h2>Productos Registrados</h2>
    <div style="display:flex; gap:10px; flex-wrap:wrap;">
        <form method="GET" action="{{ route('inventario.index') }}" style="display:flex; gap:5px;">
            <input type="text" name="search" placeholder="Buscar por Nombre, ID o Proveedor" 
                value="{{ request('search') }}" 
                style="padding:0.5rem 1rem; border-radius:10px; border:1px solid #ccc; outline:none;">
            <button type="submit" class="btn">Buscar</button>
        </form>
        <a href="{{ route('producto.create') }}" class="btn">➕Agregar Producto</a>
        <button class="btn">📝Importar Factura</button>
        <button class="btn">🏷️Asignar Proveedor</button>
        <button class="btn">📩Buzón de notificación</button>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Fecha Caducidad</th>
            <th>Dosis</th>
            <th>Indicaciones</th>
            <th>Lote</th>
            <th>Presentación</th>
            <th>Proveedor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($productos as $producto)
        <tr>
            <td>{{ $producto->nombre }}</td>
            <td>${{ number_format($producto->precio, 2) }}</td>
            <td>{{ $producto->fecha_caducidad ?? 'N/A' }}</td>
            <td>{{ $producto->dosis ?? 'N/A' }}</td>
            <td>{{ $producto->indicaciones ?? 'N/A' }}</td>
            <td>{{ $producto->lote ?? 'N/A' }}</td>
            <td>{{ $producto->presentacion ?? 'N/A' }}</td>
            <td>{{ $producto->proveedor_id ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('producto.edit', $producto->id) }}" class="btn">Editar</a>
                <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" style="text-align:center;">No hay productos registrados.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
