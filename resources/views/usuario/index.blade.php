@extends('layouts.dashboard_admin')

@section('title', 'Usuarios')

@section('styles')
@vite([
'resources/css/inventario/inventario.css',
'resources/js/residente/residente_search.js'
])
@endsection
@section('header', 'Usuarios')

@section('content')


<div class="inventory-header">
    <h2>usuarios registrados </h2>
    <div class="search-wrapper">
        <i class="fa fa-search search-icon"></i>
        <form method="GET" action="{{ route('usuario.index') }}" id="search-form">
            <input type="text" name="search" id="search-input" placeholder="Buscar por Nombre, Apellido, ID..."
                value="{{ request('search') }}"
                autocomplete="off" class="search-input">
        </form>
    </div>
    <a href="{{ route('empleado.create') }}" class="btn">aaaa</a>
</div>


<div class="list-elements">
    <table>
        <thead>
            <tr>
                 <th>ID</th>
                <th>nombre</th>
                <th>Apellido</th>
                <th>correo</th>
                <th>Direccion </th>
                <th>acciones</th>
            </tr>
        </thead>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->apellido }}</td>
                <td>{{ $usuario->correo }}</td>
                <td>{{ $usuario->direccion }}</td>
                <td>
                    <a href="{{ route('usuario.show', $usuario->id) }}" class="btn btn-view">Ver</a>
                    <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-edit">Editar</a>
                </td>
            </tr>
            @endforeach
    </table>
</div>



@endsection