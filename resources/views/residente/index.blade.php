@extends('layouts.dashboard_admin')

@section('title', 'Residentes')

@section('styles')
@vite([
'resources/css/inventario/inventario.css',
'resources/js/residente/residente_search.js'
])
@endsection
@section('header', 'Residentes')

@section('content')

<div class="inventory-header">
    <h2>Pacientes Registrados</h2>
    <div class="search-wrapper">
        <i class="fa fa-search search-icon"></i>
        <form method="GET" action="{{ route('residente.index') }}" id="search-form">
            <input type="text" name="search" id="search-input" placeholder="Buscar por Nombre, Apellido, ID..."
                value="{{ request('search') }}"
                autocomplete="off" class="search-input">
        </form>
    </div>
    <a href="{{ route('residente.create') }}" class="btn">Agregar Residente</a>
</div>

<div class="list-elements">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Habitación</th>
                <th>Cama</th>
                <th>Fecha de Ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="residentes-tbody">
            @forelse ($residentes as $residente)
            <tr data-id="{{ $residente->id }}">
                <td class="id">{{ $residente->id }}</td>
                <td class="nombre">{{ $residente->nombre }} {{ $residente->apellido }}</td>
                <td class="edad">{{ $residente->edad }}</td>
                <td class="genero">{{ $residente->genero }}</td>
                <td class="habitacion">{{ $residente->habitacion ?? 'N/A' }}</td>
                <td class="cama">{{ $residente->cama ?? 'N/A' }}</td>
                <td class="fecha_ingreso">{{ $residente->fecha_ingreso }}</td>
                <td>
                    <a href="{{ route('residente.show', $residente->id) }}" class="btn btn-edit">Ver</a>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8">No hay residentes registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection