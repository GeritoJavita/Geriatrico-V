@extends('layouts.dashboard_admin')

@section('title', 'Inventario - Hogar Geriátrico')

@section('styles')
@vite(['resources/css/inventario/inventario.css','resources/css/style.css'])
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
        <a href="{{ route('factura.index') }}" class="btn">📝Facturas</a>
        <a href="{{ route('proveedor.index') }}" class="btn">🏷️Proveedores</a>
        <button class="btn">📩Buzón de notificación</button>
    </div>
</div>
<div class="list-elements">
    <form name="product-list" id="form-validation" class="element-list" novalidate>
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
                       <!-- Botón editar -->
                       <a href="{{ route('producto.edit', $producto->id) }}" class="btn">Editar</a>

                           <!-- Botón eliminar -->
                       <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display:inline;">
                         @csrf
                            @method('DELETE')
                           <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
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
    </form>
</div>
<div class="edit">
    <div class="title-form">
        <a>Producto a editar</a>
    </div>
    <form id="form-validation-edit" novalidate>
        <div class="edit-content">
            <div class="item-input">
                <span>Nombre</span>
                <input id="nombre-edit" name="nombre" required>
            </div>
            <div class="item-input">
                <span>Precio</span>
                <input id="nombre-edit" name="nombre" required>
            </div>
            <div class="item-input">
                <span>Indicaciones</span>
                <input id="nombre-edit" name="nombre" required>
            </div>
            <div class="item-input">
                <span>Lote</span>
                <input id="nombre-edit" name="nombre" required>
            </div>
            <div class="item-input">
                <span>Presentación</span>
                <input id="nombre-edit" name="nombre" required>
            </div>

        </div>
        <div class="accion_edit">
            <div class="buttonlist">
                <button class="btn" type="submit" name="actualizar" value="actualizar">Actualizar</button>
            </div>
            <div class="buttonlist">
                <button class="btn" id="btn-vaciar" type="button" name="vaciar" value="vaciar">Vaciar</button>
            </div>
        </div>
    </form>
</div>
@endsection