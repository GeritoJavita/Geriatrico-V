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
</body>

</html>