@extends('layouts.dashboard_admin')

@section('title', 'Dashboard Administrador')
@section('header', 'Panel Administrativo')

@section('content')

<!-- Banner -->
<div class="banner-dashboard">
    <div class="banner-text">
        <h2>Bienvenido al Hogar Geriátrico</h2>
        <p>“Cuidar de quienes cuidaron de nosotros es un honor.”</p>
    </div>
</div>

<!-- Tarjetas -->
<div class="cards">

    <div class="card">
        <i class="fas fa-users"></i>
        <h3>Pacientes Registrados</h3>
        <p>{{ $totalPacientes ?? '--' }}</p>
    </div>

    <div class="card">
        <i class="fas fa-user-md"></i>
        <h3>Empleados Activos</h3>
        <p>{{ $totalEmpleados ?? '--' }}</p>
    </div>

    <div class="card">
        <i class="fas fa-bed"></i>
        <h3>Habitaciones Ocupadas</h3>
        <p>{{ $habitacionesOcupadas ?? '--' }}</p>
    </div>

    <div class="card">
        <i class="fas fa-heartbeat"></i>
        <h3>Controles Hoy</h3>
        <p>{{ $controlesHoy ?? '--' }}</p>
    </div>

</div>

<!-- Sección inferior -->
<div class="dashboard-lower">

    <div class="panel">
        <h3>Estadísticas del Hogar</h3>
        <p>Próximamente podrás visualizar estadísticas completas, gráficos de residentes, medicamentos y más.</p>
        <div class="placeholder-chart"></div>
    </div>

    <div class="panel">
        <h3>Notas del Día</h3>
        <ul class="daily-notes">
            <li>✔ Revisión médica general a las 10:00 AM</li>
            <li>✔ Actividades recreativas a las 3:00 PM</li>
            <li>✔ Visitas familiares habilitadas hasta las 6:00 PM</li>
        </ul>
    </div>

</div>

@endsection
