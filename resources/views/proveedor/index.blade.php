@extends('layouts.dashboard_admin')

@section('title', 'Listado de Proveedores')
@section('header', 'Listado de Proveedores')

@section('styles')
@vite(['resources/css/proveedor/proveedor.css'])
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
                            <td>{{ $proveedor->id }}</td>
                            <td>{{ $proveedor->nombre }}</td>
                            <td>{{ $proveedor->direccion }}</td>
                            <td>{{ $proveedor->telefono }}</td>
                            <td>{{ $proveedor->correo }}</td>
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
@endsection
