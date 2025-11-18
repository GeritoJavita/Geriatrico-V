@extends('layouts.dashboard_admin')

@section('title', 'Residentes')

@section('styles')
@vite([
'resources/css/inventario/inventario.css',
'resources/js/residente/residente_search.js'
])
@endsection
@section('header', 'Empleados')

@section('content')


<div class="inventory-header">
    <h2>Empleados registrados</h2>
    <div class="search-wrapper">
        <i class="fa fa-search search-icon"></i>
        <form method="GET" action="{{ route('residente.index') }}" id="search-form">
            <input type="text" name="search" id="search-input" placeholder="Buscar por Nombre, Apellido, ID..."
                value="{{ request('search') }}"
                autocomplete="off" class="search-input">
        </form>
    </div>
    <a href="{{ route('empleado.create') }}" class="btn">Agregar Empleado</a>
</div>


<div class="list-elements">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de ingreso</th>
                <th>Salario</th>
                <th>Fecha de salida</th>
                <th>Usuario ID</th>
            </tr>
        </thead>
   </thead>
        <tbody id="empleado-tbody">
            @forelse ($empleados as $empleado)
            <tr data-id="{{ $empleado->id }}">
                <td class="id">{{ $empleado->id }}</td>
                <td class="fecha_ingreso">{{ $empleado->fecha_ingreso ?? 'N/A' }}</td>
                <td class="salario">{{ $empleado->salario ?? 'N/A' }}</td>
                <td class="fecha_salida">{{ $empleado->fecha_salida ?? 'N/A' }}</td>
                <td class="usuario_id">{{ $empleado->usuario_id ?? $empleado->user_id ?? 'N/A' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No hay empleados registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>



@endsection

