@extends('layouts.dashboard_admin')

@section('title', 'Usuarios')

@section('styles')
@vite([
'resources/css/inventario/inventario.css',
'resources/js/residente/residente_search.js',
'resources/js/usuario/usuario_index.js',
'resources/css/create/form_create.css',
])
@endsection

@section('header', 'Usuarios')

@section('content')
<div class="inventory-header">
    <h2>usuarios registrados</h2>
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
                <th>Direccion</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr data-user-id="{{ $usuario->id }}" data-user-name="{{ $usuario->nombre }} {{ $usuario->apellido }}">
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->apellido }}</td>
                <td>{{ $usuario->correo }}</td>
                <td>{{ $usuario->direccion }}</td>
                <td>
                    <a href="{{ route('usuario.show', $usuario->id) }}" class="btn btn-edit">Ver</a>
                    <button type="button" class="btn btn-edit open-contratar-btn" data-user-id="{{ $usuario->id }}">Contratar</button>
                    <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-edit">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


<div id="Modal" class="pantalla-fondo" style="display: none;">
    <div class="box-center-flotante">
        <div class="form-modal">
            <form class="form-modal">
                <input type="hidden" name="usuario_id" id="user_id_hidden" value="" required>
                <h2>Contratar a Auxiliar</h2>
                <div class="form-group">
                    <label>Usuario:</label>
                    <p id="nombreUsuario" style="font-weight: bold; color: #333;"></p>
                </div>
                <div class="form-group">
                    <label>Fecha de ingreso:</label>
                    <input id="fecha_ingreso" type="date" name="fecha_ingreso" required>
                </div>
                <div class="form-group">
                    <label>Salario:</label>
                    <input id="salario" type="number" name="salario" step="0.01" required>
                </div>
                <div class="acciones-form">
                    <button type="submit" class="btn">Enviar</button>
                    <button type="button" id="closeRolModalBtn" class="btn cancel">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>