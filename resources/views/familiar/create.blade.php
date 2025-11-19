@extends('layouts.dashboard_admin')

@section('title', 'Agregar Familiares')

@section('styles')
@vite(['resources/css/create/form_create.css',
'resources/js/familiar/familiar_registro.js'])
@endsection
@section('header', 'Agregar Familiar')

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
            <label>Nombre:</label>
            <input id="nombre" type="text" name="nombre" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Apellido:</label>
            <input id="apellido" type="text" name="apellido" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Correo:</label>
            <input id="correo" type="text" name="correo" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Telefono:</label>
            <input id="telefono" type="text" name="telefono" required>
        </div>


        <div class="actions">
            <button type="submit" class="btn">Enviar</button>
        </div>
    </form>
</div>






@endsection