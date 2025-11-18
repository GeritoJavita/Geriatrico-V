@extends('layouts.dashboard_admin')

@section('title', 'Agregar Residentes')

@section('styles')
@vite(['resources/css/create/form_create.css',
'resources/js/empleado/empleado_registro.js'])
@endsection
@section('header', 'Agregar Empleados')

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
            <label>Fecha de ingrreso:</label>
            <input id="fecha_ingreso" type="date" name="fecha_ingreso" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>salario :</label>
            <input id="salario" type="number" name="salario" required>
        </div>
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Fecha de salida:</label>
            <input id="fecha_salida" type="date" name="fecha_salida" required>
        </div>
         <div class="form-group">
            <small class="small-red">*</small>
            <label>usuario:</label>
            <input id="usuario_id" type="number" name="usuario_id" required>
        </div>
        <div class="actions">
            <button type="submit" class="btn">Enviar</button>
        </div>
    </form>
</div>






@endsection