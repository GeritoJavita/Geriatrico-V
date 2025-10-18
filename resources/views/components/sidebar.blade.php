<!-- Sidebar Component -->
<div class="sidebar">
    <h2><i class="fas fa-clinic-medical"></i> Hogar <span>Geriátrico</span></h2>
    <div class="menu">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-users"></i> Pacientes
        </a>
        <a href="{{ route('colaboradores') }}" class="{{ request()->routeIs('colaboradores') ? 'active' : '' }}">
            <i class="fas fa-user-nurse"></i> Colaboradores
        </a>
        <a href="{{ route('medicamentos') }}" class="{{ request()->routeIs('medicamentos') ? 'active' : '' }}">
            <i class="fas fa-pills"></i> Medicamentos
        </a>
        <a href="{{ route('inventario') }}" class="{{ request()->routeIs('inventario') ? 'active' : '' }}">
            <i class="fas fa-box"></i> Inventario
        </a>
        <a href="{{ route('reportes') }}" class="{{ request()->routeIs('reportes') ? 'active' : '' }}">
            <i class="fas fa-chart-line"></i> Reportes
        </a>
        <a href="{{ route('configuracion') }}" class="{{ request()->routeIs('configuracion') ? 'active' : '' }}">
            <i class="fas fa-cog"></i> Configuración
        </a>
    </div>
</div>