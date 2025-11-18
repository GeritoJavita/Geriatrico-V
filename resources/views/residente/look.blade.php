@extends('layouts.dashboard_admin')

@section('title', 'Detalle Residente')

@section('styles')
@vite([
'resources/css/inventario/inventario.css',
'resources/js/residente/residente_search.js'
])
@endsection

@section('header', 'Detalle del Residente')

@section('content')

<div>
    <div class="inventory-header">
        <h2>Detalles del residente</h2>
    </div>
    <div class="first-data">
        <div class="img-residente">
            <img src="{{ asset('images/residente.png') }}" alt="Imagen Residente" width="150px">
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
            <h3>Alergias</h3>
            

        </div>
    </div>


    <div class="third-data">
        <h3>Información adicional</h3>
        <p><span>EPS:</span> {{ $residente->eps }}</p>
        <p><span>Altura:</span> {{ $residente->altura }} cm</p>
        <p><span>Peso:</span> {{ $residente->peso ?? 'N/A'}} kg</p>
        <p><span>Fecha de Nacimiento:</span> {{ $residente->fecha_nacimiento }}</p>
        <p><span>Dirección:</span> {{ $residente->direccion }}</p>
        <p><span>Teléfono:</span> {{ $residente->telefono }}</p>

    </div>
</div>

@endsection