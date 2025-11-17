@extends('layouts.dashboard_admin')

@section('title', 'Residentes')

@section('styles')
@vite([
'resources/css/inventario/inventario.css'
])
@endsection
@section('header', 'Residentes')

@section('content')

<div class="inventory-header">
    <h2>Pacientes Registrados</h2>
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
                <th>Fecha de Ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($residentes as $residente)
            <tr data-id="{{ $residente->id }}">
                <td class="id">{{ $residente->id }}</td>
                <td class="nombre">{{ $residente->nombre }}</td>
                <td class="edad">{{ $residente->edad }}</td>    
                <td class="genero">{{ $residente->genero }}</td>
                <td class="habitacion">{{ $residente->habitacion }}</td>
                <td class="fecha_ingreso">{{ $residente->fecha_ingreso }}</td> 
            </tr>
            @empty
            <tr>
                <td colspan="7">No hay residentes registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection