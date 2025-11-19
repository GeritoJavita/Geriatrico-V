@extends('layouts.dashboard_admin')

@section('title', 'Agregar Residentes')

@section('styles')
@vite(['resources/css/create/form_create.css',
'resources/js/residente/residente_register.js'])
@endsection
@section('header', 'Agregar Residentes')

@section('content')

<div class="container-form">
    <form action="" id="form-validation" novalidate>
        @csrf
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Identificación:</label>
            <input id="id" type="number" name="id" required>
        </div>

        <div class="form-group">
            <small class="small-red">*</small>
            <label>Nombres:</label>
            <input id="nombre" type="text" name="nombre" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Apellidos:</label>
            <input id="apellido" type="text" name="apellido" required>
        </div>

        <div class="form-group">
            <small class="small-red">*</small>
            <label>Fecha de nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Tipo de sangre:</label>
            <select id="tipo_sangre" name="tipo_sangre" required>
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
            <small class="small-red">*</small>
            <label>Genero:</label>
            <select id="genero" name="genero" required>
                <option value="">Selecciona un tipo</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>

        <div class="form-group">
            <small class="small-red">*</small>
            <label>Telefono:</label>
            <input id="telefono" type="number" name="telefono" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Telefono de emergencia:</label>
            <input id="telefono_emerge" type="number" name="telefono_emerg" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Habitación:</label>
            <select id="habitacion" name="habitacion" required>
                <option value="">Selecciona #habitacion</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Cama:</label>
            <select id="cama" name="cama" required>
                <option value="">Selecciona #cama</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Condicion médica:</label>
            <input id="condicion_medica" type="text" name="condicion_medica" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Dirección:</label>
            <input id="direccion" type="text" name="direccion" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Peso kg:</label>
            <input id="peso" type="number" name="peso" placeholder="En kilos" required>
        </div>
        <div class="form-group">

            <small class="small-red">*</small>
            <label>Altura m:</label>
            <input id="altura" type="number" name="altura" placeholder="En centímetros" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Eps:</label>
            <select id="eps" name="eps" class="form-control" required>
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
            </select>

        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Fecha de ingreso:</label>
            <input type="date" id="fecha_ingreso" name="fecha_ingreso" required>
        </div>
        <div class="actions">
            <button type="submit" class="btn">Enviar</button>
        </div>
    </form>
</div>

<script>
    const rutaResidenteIndex = "{{ route('residente.index') }}";
</script>
@endsection