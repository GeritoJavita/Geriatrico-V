@extends('layouts.dashboard_admin')

@section('title', 'Listado de Proveedores')
@section('header', 'Listado de Proveedores')

@section('styles')
@vite([
    'resources/css/proveedor/proveedor.css',
    'resources/css/style.css',
    'resources/js/proveedor/proveedor_edit.js'
])
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
                        <td class="id">{{ $proveedor->id }}</td>
                        <td class="nombre">{{ $proveedor->nombre }}</td>
                        <td class="direccion">{{ $proveedor->direccion }}</td>
                        <td class="telefono">{{ $proveedor->telefono }}</td>
                        <td class="correo">{{ $proveedor->correo }}</td>
                        <td>
                            <button type="button" class="btn btn-edit">Editar</button>
                            
                            {{-- Formulario individual para eliminar --}}
                            <form action="{{ route('proveedor.destroy', $proveedor->id) }}" 
                                  method="POST" 
                                  class="delete-proveedor-form" 
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center;">No hay proveedores registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Formulario para editar proveedor --}}
<div class="edit">
    <div class="title-form">
        <a>Proveedor a editar</a>
    </div>
    <form id="form-validation-edit" novalidate>
        @csrf
        <input type="hidden" id="id-edit" name="id">

        <div class="edit-content">
            <div class="item-input">
                <span>Nombre</span>
                <input id="nombre-edit" name="nombre" required>
                <small class="small-red">*</small>
            </div>

            <div class="item-input">
                <span>Dirección</span>
                <input id="direccion-edit" name="direccion" required>
                <small class="small-red">*</small>
            </div>

            <div class="item-input">
                <span>Teléfono</span>
                <input type="number" id="telefono-edit" name="telefono" required>
                <small class="small-red telefono-error">*</small>
            </div>

            <div class="item-input">
                <span>Correo</span>
                <input type="email" id="correo-edit" name="correo" required>
                <small class="small-red correo-error">*</small>
            </div>
        </div>

        <div class="accion_edit">
            <button class="btn btn-edit" id="btn-actualizar" type="button">Actualizar</button>
            <button class="btn btn-danger" id="btn-vaciar" type="button">Vaciar</button>
        </div>
    </form>
</div>
@endsection
