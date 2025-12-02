@extends('layouts.dashboard_admin')

@section('title', 'Residentes')

@section('styles')
@vite([
    'resources/css/inventario/inventario.css',
    'resources/js/residente/residente_search.js',
    'resources/js/residente/residente_edit.js'
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
                <th>Foto</th>
                <th>Cédula</th>
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
            <tr 
                data-id="{{ $residente->id }}"
                data-cedula="{{ $residente->id }}"
                data-fecha-nacimiento="{{ $residente->fecha_nacimiento }}"
                data-tipo-sangre="{{ $residente->tipo_sangre }}"
                data-telefono="{{ $residente->telefono }}"
                data-telefono-emergencia="{{ $residente->telefono_emerg }}"
                data-condicion-medica="{{ $residente->condicion_medica }}"
                data-direccion="{{ $residente->direccion }}"
                data-peso="{{ $residente->peso }}"
                data-altura="{{ $residente->altura }}"
                data-eps="{{ $residente->eps }}"
                data-fecha-ingreso="{{ $residente->fecha_ingreso }}"
                data-foto="{{ $residente->foto ? asset('storage/' . $residente->foto) : asset('images/default-avatar.png') }}"
            >
                <td>
                   <img src="{{ $residente->foto ? asset('storage/' . $residente->foto) : asset('images/default-avatar.png') }}" 
     alt="Foto de {{ $residente->nombre }}"
     style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; border: 2px solid var(--primary-teal);">
                </td>
                <td class="cedula">{{ $residente->id }}</td>
                <td class="nombre">{{ $residente->nombre }} {{ $residente->apellido }}</td>
                <td class="edad">{{ $residente->edad }}</td>
                <td class="genero">{{ $residente->genero }}</td>
                <td class="habitacion">{{ $residente->habitacion ?? 'N/A' }}</td>
                <td class="cama">{{ $residente->cama ?? 'N/A' }}</td>
                <td class="fecha_ingreso">{{ $residente->fecha_ingreso }}</td>
                <td>
                    <button type="button" class="btn btn-edit">Editar</button>
                    <a href="{{ route('residente.show', $residente->id) }}" class="btn">Ver</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9">No hay residentes registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Formulario de edición --}}
<div class="edit" id="edit-paciente-form" style="display:none;">
    <div class="title-form">
        <a>Editar Residente</a>
    </div>
    <form id="form-residente-edit" novalidate enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="id-hidden-edit" name="id">

        <div class="edit-content">
            {{-- Foto del residente --}}
            <div class="form-group-photo">
                <img id="foto-preview-edit" src="/images/default-avatar.png" alt="Foto del residente" class="photo-preview">
                <label for="foto-edit" class="photo-upload-btn">
                     Cambiar Foto
                </label>
                <input type="file" id="foto-edit" name="foto" accept="image/*">
                <small style="margin-top: 10px; color: #666;">JPG, PNG o GIF (máx. 2MB)</small>
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Cédula / Identificación
                </label>
                <input id="cedula-edit" type="text" name="cedula" required>
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Nombres
                </label>
                <input id="nombre-edit" type="text" name="nombre" required>
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Apellidos
                </label>
                <input id="apellido-edit" type="text" name="apellido" required>
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Fecha de Nacimiento
                </label>
                <input type="date" id="fecha_nacimiento-edit" name="fecha_nacimiento" required>
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Tipo de Sangre
                </label>
                <select id="tipo_sangre-edit" name="tipo_sangre" required>
                    <option value="">Selecciona un tipo</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Género
                </label>
                <select id="genero-edit" name="genero" required>
                    <option value="">Selecciona</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Teléfono
                </label>
                <input id="telefono-edit" type="tel" name="telefono" placeholder="Ej: 3001234567" required>
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Teléfono de Emergencia
                </label>
                <input id="telefono_emerg-edit" type="tel" name="telefono_emerg" placeholder="Ej: 3001234567" required>
            </div>

            

            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Cama
                </label>
                <select id="cama-edit" name="cama" required>
                    <option value="">Selecciona cama</option>
                    <option value="1">Cama 1</option>
                    <option value="2">Cama 2</option>
                    <option value="3">Cama 3</option>
                    <option value="4">Cama 4</option>
                </select>
            </div>

            <div class="form-group">
                <label>
                    Condición Médica
                </label>
                <input id="condicion_medica-edit" type="text" name="condicion_medica" placeholder="Ej: Diabetes tipo 2">
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Dirección
                </label>
                <input id="direccion-edit" type="text" name="direccion" placeholder="Calle, número, ciudad" required>
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Peso (kg)
                </label>
                <input id="peso-edit" type="number" step="0.1" name="peso" placeholder="Ej: 70.5" required>
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Altura (m)
                </label>
                <input id="altura-edit" type="number" step="0.01" name="altura" placeholder="Ej: 1.75" required>
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    EPS
                </label>
                <select id="eps-edit" name="eps" required>
                    <option value="">Selecciona una EPS</option>
                    <option>Aliansalud EPS</option>
                    <option>Anas Wayuu EPSI</option>
                    <option>Asmet Salud</option>
                    <option>Asociación Indígena del Cauca EPSI</option>
                    <option>Capital Salud EPS-S</option>
                    <option>Cajacopi Atlántico</option>
                    <option>Capresoca</option>
                    <option>Comfachocó</option>
                    <option>Comfaoriente</option>
                    <option>Comfenalco Valle</option>
                    <option>Compensar EPS</option>
                    <option>Coosalud EPS</option>
                    <option>Dusakawi EPSI</option>
                    <option>Emssanar E.S.S.</option>
                    <option>Empresas Públicas de Medellín (EPM)</option>
                    <option>EPS Familiar de Colombia</option>
                    <option>EPS Sanitas</option>
                    <option>EPS Sura</option>
                    <option>Famisanar</option>
                    <option>Fondo de Pasivo Social de Ferrocarriles</option>
                    <option>Mallamas EPSI</option>
                    <option>Mutual Ser</option>
                    <option>Nueva EPS</option>
                    <option>Pijaos Salud EPSI</option>
                    <option>Salud Mía</option>
                    <option>Salud Total EPS S.A.</option>
                    <option>Savia Salud EPS</option>
                    <option>Servicio Occidental de Salud (SOS)</option>
                </select>
            </div>

            <div class="form-group">
                <label>
                    <small class="small-red">*</small>
                    Fecha de Ingreso
                </label>
                <input type="date" id="fecha_ingreso-edit" name="fecha_ingreso" required>
            </div>

            <div class="accion_edit">
                <button class="btn" type="button" id="btn-actualizar-paciente">💾 Actualizar</button>
                <button class="btn" type="button" id="btn-vaciar-paciente">🗑️ Limpiar</button>
            </div>
        </div>
    </form>
</div>
@endsection
