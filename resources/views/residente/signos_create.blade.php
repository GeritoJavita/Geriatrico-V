@extends('layouts.dashboard_admin')

@section('title', 'Agregar Signos vitales')

@section('styles')
@vite(['resources/css/create/form_create.css',
'resources/js/residente/residente_register.js'])
@endsection
@section('header', 'Agregar Signos vitales')

@section('content')

<div class="modal fade" id="signosModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Registrar Signos Vitales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <!-- Aquí va tu formulario -->
                <form id="form-modal">
                    @csrf
                    <input type="hidden" id="id_residente" name="residente_id" value="">


                    <label>Temperatura</label>
                    <input type="text" class="form-control" name="temperatura">

                    <label>Frecuencia cardiaca</label>
                    <input type="text" class="form-control" name="fc">

                    <!-- Más campos... -->
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" onclick="guardarSignos()">Guardar</button>
            </div>

        </div>
    </div>
</div>


@endsection