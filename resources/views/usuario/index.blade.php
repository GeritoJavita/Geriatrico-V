@extends('layouts.dashboard_admin')

@section('title', 'Usuarios')

@section('styles')
@vite([
'resources/css/inventario/inventario.css',
'resources/js/residente/residente_search.js',
'resources/js/usuario/usuario_index.js'
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
                    <a href="{{ route('usuario.show', $usuario->id) }}" class="btn btn-edit">Contratar</a>
                    <button id="openRolModalBtn" class="btn btn-edit">Contratar</button>
                    <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-edit">Editar</a>
                </td>
            </tr>
            @endforeach
    </table>
</div>



@endsection

<div id="rolModal" class="pantalla-fondo" style="display: none;">
    <div class="box-center-flotante" id="rolModalContent">

        <div class="form-modal">
            <h2>Contratar a Auxiliar</h2>
            <form>
                @csrf
                <div class="form-group">
                    <small class="small-red">*</small>
                    <label>Fecha de ingreso:</label>
                    <input id="presion_sistolica" type="number" name="presion_sistolica" required>
                </div>
                <div class="form-group">
                    <small class="small-red">*</small>
                    <label>Salario:</label>
                    <input id="presion_diastolica" type="number" name="presion_diastolica" required>
                </div>
            </form>
        </div>
    </div>
</div>