@extends('layouts.dashboard_admin')

@section('title', 'Residentes')

@section('styles')
@vite([
'resources/css/inventario/inventario.css',
'resources/js/residente/residente_search.js'
])
@endsection
@section('header', 'Familiares')

@section('content')


<div class="inventory-header">
    <h2>Familiares registrados </h2>
    <div class="search-wrapper">
        <i class="fa fa-search search-icon"></i>
        <form method="GET" action="{{ route('familiar.index') }}" id="search-form">
            <input type="text" name="search" id="search-input" placeholder="Buscar por Nombre, Apellido, ID..."
                value="{{ request('search') }}"
                autocomplete="off" class="search-input">
        </form>
    </div>
    <a href="{{ route('familiar.create') }}" class="btn">Agregar Familiares</a>
</div>


<div class="list-elements">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Telefono</th>
            </tr>
        </thead>
        </thead>
        <tbody id="empleado-tbody">
            @forelse ($familiares as $familiar)
            <tr data-id="{{ $familiar->id }}">
                <td class="id">{{ $familiar->id }}</td>
                <td class="nombre">{{ $familiar->nombre }}</td>
                <td class="apellido">{{ $familiar->apellido }}</td>
                <td class="correo">{{ $familiar->correo }}</td>
                <td class="telefono">{{ $familiar->telefono }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No hay familiares registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>



@endsection