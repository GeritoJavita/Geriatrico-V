@extends('layouts.dashboard_admin')

@section('title', 'Listado de Proveedores')
@section('header', 'Listado de Proveedores')

@section('styles')
@vite(['resources/css/proveedor/proveedor.css','resources/css/style.css'])
@endsection

@section('content')
<div class="container-proveedor">

    {{-- Card principal --}}
    <div class="card">
        <div class="inventory-header">
            <h2><i class="fas fa-truck"></i> Proveedores</h2>
            <a href="{{ route('proveedor.create') }}" class="btn btn-success">+ Agregar Proveedor</a>
        </div>

        {{-- Mensajes --}}
        @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert error">{{ session('error') }}</div>
        @endif

        {{-- Tabla de proveedores --}}
        <div class="inventory-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proveedores as $proveedor)
                    <tr>
                        <td id="id">{{ $proveedor->id }}</td>
                        <td id="nombre">{{ $proveedor->nombre }}</td>
                        <td id="direccion">{{ $proveedor->direccion }}</td>
                        <td id="telefono">{{ $proveedor->telefono }}</td>
                        <td id="correo">{{ $proveedor->correo }}</td>
                        <td>
                            <a href="{{ route('proveedor.edit', $proveedor->id) }}" class="btn btn-edit btn-small">Editar</a>

                            <form action="{{ route('proveedor.destroy', $proveedor->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-small" onclick="return confirm('¿Estás seguro de eliminar este proveedor?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No hay proveedores registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="edit">
    <div class="title-form">
        <a>Proveedor a editar</a>
    </div>
    <form id="form-validation-edit" novalidate>
        @csrf
        <input type="hidden" id="id" name="id">

        <div class="edit-content">
            <div class="item-input">
                <span>Nombre</span>
                <input id="nombre-edit" name="nombre" required>
            </div>

            <div class="item-input">
                <span>Direccion</span>
                <input id="precio-edit" name="precio" required>
            </div>

            <div class="item-input">
                <span>Telefono</span>
                <input id="indicaciones-edit" name="indicaciones" required>
            </div>

            <div class="item-input">
                <span>Correo</span>
                <input id="lote-edit" name="lote" required>
            </div>
        </div>

        <div class="accion_edit">
            <button class="btn" id="btn-actualizar" type="button">Actualizar</button>
            <button class="btn" id="btn-vaciar" type="button">Vaciar</button>
        </div>
    </form>
</div>

@endsection