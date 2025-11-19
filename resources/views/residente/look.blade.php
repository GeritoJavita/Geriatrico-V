@extends('layouts.dashboard_admin')

@section('title', 'Detalle Residente')

@section('styles')
@vite([
'resources/css/inventario/inventario.css',
'resources/js/residente/residente_search.js',
'resources/js/residente/look.js',
'resources/css/create/form_create.css',

])
@endsection

@section('header', 'Detalle del Residente')

@section('content')

<div class="container-r">
    <div class="inventory-header">
        <h2>Detalles del residente</h2>
        <a href="{{ route('residente.signos_create', $residente->id) }}"
            class="btn btn-normal">
            Resumen reciente
        </a>
    </div>
    <div class="first-data">
        <div class="img-residente">
            <img src="{{ asset('images/residente.png') }}" alt="Imagen Residente" width="150px">
            <button id="openRolModalBtn" class="btn btn-primary">
                Registrar signos vitales
            </button>
        </div>
        <div class="principal-data">
            <h2>{{ $residente->nombre }} {{ $residente->apellido }}</h2>
            <p><span>Documento:</span> {{ $residente->id }}</p>
            <p><span>Tipo de sangre:</span> {{ $residente->tipo_sangre }}</p>
            <p><span>Habitación:</span> {{ $residente->habitacion ?? 'N/A' }}</p>
            <p><span>Género:</span> {{ $residente->genero }}</p>
            <p><span>Edad:</span> {{ $residente->edad }}</p>
            <p><span>Cama:</span> {{ $residente->cama ?? 'N/A' }}</p>
            <p><span>Contacto de Emergencia:</span> {{ $residente->telefono_emerg }}</p>
        </div>
        <div class="secundary-data">
            <div class="alergias">
                <h3>Alergias</h3>
                <ul>
                    @forelse($residente->alergias as $alergia)
                    <li>{{ $alergia->nombre }}</li>
                    @empty
                    <li>No registra alergias</li>
                    @endforelse
                </ul>
            </div>
            <div class="patologias">
                <h3>Patologías</h3>
                <ul>
                    @forelse($residente->patologias as $patologia)
                    <li>{{ $patologia->nombre }}</li>
                    @empty
                    <li>No registra patologías</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <h3>Información adicional</h3>
    <div class="third-data">
        <p><span>EPS:</span> {{ $residente->eps }}</p>
        <p><span>Altura:</span> {{ $residente->altura }} cm</p>
        <p><span>Peso:</span> {{ $residente->peso ?? 'N/A'}} kg</p>
        <p><span>Fecha de Nacimiento:</span> {{ $residente->fecha_nacimiento }}</p>
        <p><span>Teléfono:</span> {{ $residente->telefono }}</p>
        <p><span>Dirección:</span> {{ $residente->direccion }}</p>
    </div>
</div>
<h3>Diagnósticos</h3>
<div class="general-data">
    <p><span></span> {{ $residente->ep."diagnositco de la tabla" }}</p>
</div>
<h3>Historial clínico</h3>
<div class="general-data">
    <p><span></span> {{ $residente->ep."diagnositco de Historial clínico" }}</p>
</div>
<h3>Signos vitales</h3>
<div class="general-data">
    <p><span></span> {{ $residente->ep."diagnositco Signos vitales" }}</p>
</div>


@endsection

<div id="rolModal" class="pantalla-fondo" style="display: none;">
    <div class="box-center-flotante" id="rolModalContent">
        
        <div class="form-modal">
            <h2>Registrar Signos Vitales</h2>
            <form>
                @csrf
                <div class="form-group">
                    <small class="small-red">*</small>
                    <label>Presión sistólica   :</label>
                    <input id="presion_sistolica" type="number" name="presion_sistolica" required>
                </div>
                <div class="form-group">
                    <small class="small-red">*</small>
                    <label>Presión diastólica:</label>
                    <input id="presion_diastolica" type="number" name="presion_diastolica" required>
                </div>
                <div class="form-group">
                    <small class="small-red">*</small>
                    <label>Temperatura:</label>
                    <input id="temperatura" type="number" name="temperatura " required>
                </div>
                <div class="form-group">
                    <small class="small-red">*</small>
                    <label>Frecuencia Respiratoria:</label>
                    <input id="frecuencia_respiratoria" type="number" name="frecuencia_respiratoria" required>
                </div>
                <div class="form-group">
                    <small class="small-red">*</small>
                    <label>Frecuencia cardiaca:</label>
                    <input id="frecuencia_cardiaca" type="number" name="frecuencia_cardiaca" required>
                </div>
                <div class="form-group">
                    <small class="small-red">*</small>
                    <label>Reporte general:</label>
                    <textarea id="reporte_general" name="reporte_general" required></textarea>
                </div>
            </form>
        </div>
    </div>
</div>