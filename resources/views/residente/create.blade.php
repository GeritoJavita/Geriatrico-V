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
            <input id="habitacion" type="number" name="habitacion" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Cama:</label>
            <input id="cama" type="number" name="cama" required>
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
            <label>Peso:</label>
            <input id="peso" type="number" name="peso" placeholder="En kilos" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Altura:</label>
            <input id="altura" type="number" name="altura" placeholder="En centímetros" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Eps:</label>
            <input id="eps" type="text" name="eps" required>
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





@endsection