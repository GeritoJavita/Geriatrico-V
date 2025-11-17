@extends('layouts.dashboard_admin')

@section('title', 'Agregar Residentes')

@section('styles')
@vite(['resources/css/create/form_create.css',
'resources/js/producto/producto_regist.js'])
@endsection
@section('header', 'Agregar Residentes')

@section('content')

<div class="container-form">
    <form action="" id="form-validation" novalidate>
        @csrf
        <!-- Nombre -->
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Nombres:</label>
            <input id="nombre" type="text" name="nombre" required>
        </div>

        <!-- Precio -->
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Precio:</label>
            <input id="precio" type="text" step="0.01" name="precio" required>
        </div>

       
       

        <!-- Stock y cantidad -->
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Cantidad:</label>
            <input type="number" id="stock" name="stock" min="0" required>

        </div>

        <!-- Otros campos -->
        <div class="form-group">
            <small class="small-red">*</small>
            <label>Lote:</label>
            <input type="text" id="lote" name="lote" required>
        </div>

        <div class="form-group">
            <small class="small-red">*</small>
            <label>Fecha de Caducidad:</label>
            <input type="date" id="fecha_caducidad" name="fecha_caducidad" required>
        </div>

        <div class="form-group">
            <small class="small-red">*</small>
            <label>Presentación:</label>
            <input type="text" id="presentacion" name="presentacion" required>
        </div>

        <div class="form-group">
            <small class="small-red">*</small>
            <label>Dosis:</label>
            <input type="text" id="dosis" name="dosis" required>
        </div>

        <div class="form-group">
            <small class="small-red">*</small>
            <label>Indicaciones:</label>
            <textarea id="indicaciones" name="indicaciones" required></textarea>
        </div>

        <div class="actions">
            <button type="submit" class="btn">Enviar</button>
        </div>
    </form>
</div>





@endsection