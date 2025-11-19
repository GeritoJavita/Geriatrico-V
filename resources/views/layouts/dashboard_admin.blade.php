<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hogar Geriátrico')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/a2e0b5a52a.js" crossorigin="anonymous"></script>
    @vite(['resources/css/dashboard/dashboard.css'])
    @yield('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a class="no-decor" href="{{ route('dashboard_admin') }}">
            <h2>Hogar <span>Geriátricos</span></h2>
        </a>

        <div class="menu">
            <a href="{{ route('residente.index') }}"><i class="fas fa-users"></i> Pacientes</a>
            <a href="{{ route('empleado.index') }}"><i class="fas fa-users"></i> Empleados</a>
            <a href="#"><i class="fas fa-user-nurse"></i> Colaboradores</a>
            <a href="{{ route('inventario.index') }}" class="{{ request()->is('inventario') ? 'active' : '' }}">
                <i class="fas fa-boxes"></i> Inventario
            </a>
            <a href="#"><i class="fas fa-pills"></i> Medicamentos</a>
            <a href="#"><i class="fas fa-chart-line"></i> Reportes</a>
            <a href="#"><i class="fas fa-cog"></i> Configuración</a>
        </div>
    </div>

    <!-- Main -->
    <div class="main">
        <div class="header">
            <h1>@yield('header', 'Panel')</h1>

            <div class="user-info">
                <span>{{ Auth::user()->nombre ?? 'Invitado' }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"><i class="fas fa-sign-out-alt"></i> Salir</button>
                </form>
            </div>
        </div>

        <div class="dashboard-content">
            @yield('content')
        </div>
    </div>

    @yield('scripts')
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

</body>

</html>