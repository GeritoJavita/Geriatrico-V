@extends('layouts.dashboard_admin')

@section('title', 'Dashboard Administrador')
@section('header', 'Panel Administrativo')

@section('content')

<!-- Banner Mejorado -->
<div class="banner-dashboard">
    <div class="banner-content">
        <div class="banner-text">
            <h2>Bienvenido al Hogar Geriátrico</h2>
            <p>"Cuidar de quienes cuidaron de nosotros es un honor."</p>
           
        </div>
        <div class="banner-icon">
            <i class="fas fa-heart"></i>
        </div>
    </div>
</div>

<!-- Tarjetas Mejoradas -->
<div class="cards">

    <div class="card">
        <div class="card-icon">
            <i class="fas fa-users"></i>
        </div>
        <h3>Residentes Activos</h3>
        <p class="card-number">{{ $totalPacientes ?? '--' }}</p>
        <div class="card-footer">
            <span class="status-indicator active"></span>
            En cuidado
        </div>
    </div>

    <div class="card">
        <div class="card-icon">
            <i class="fas fa-user-md"></i>
        </div>
        <h3>Empleados Activos</h3>
        <p class="card-number">{{ $totalEmpleados ?? '--' }}</p>
        <div class="card-footer">
            <span class="status-indicator active"></span>
            Disponibles
        </div>
    </div>

    <div class="card">
        <div class="card-icon">
            <i class="fas fa-bed"></i>
        </div>
        <h3>Habitaciones Ocupadas</h3>
        <p class="card-number">{{ $habitacionesOcupadas ?? '--' }}</p>
        <div class="card-footer">
            <span class="status-indicator occupied"></span>
            Ocupación actual
        </div>
    </div>

    <div class="card">
        <div class="card-icon">
            <i class="fas fa-heartbeat"></i>
        </div>
        <h3>Controles Hoy</h3>
        <p class="card-number">{{ $controlesHoy ?? '--' }}</p>
        <div class="card-footer">
            <span class="status-indicator planned"></span>
            Realizados
        </div>
    </div>

</div>

<!-- Sección inferior mejorada -->
<div class="dashboard-lower">

    <div class="panel">
        <div class="panel-header">
            <h3>Estadísticas del Hogar</h3>
            <span class="panel-badge">Próximamente</span>
        </div>
        <p>Próximamente podrás visualizar estadísticas completas, gráficos de residentes, medicamentos y más.</p>
        <div class="placeholder-chart">
            <div class="chart-placeholder-text">
                <i class="fas fa-chart-bar"></i>
                <p>Gráficos de estadísticas disponibles pronto</p>
            </div>
        </div>
        <div class="panel-actions">
            <button class="btn-panel">Ver reportes</button>
            <button class="btn-panel outline">Exportar datos</button>
        </div>
    </div>

    <div class="panel">
        <div class="panel-header">
            <h3>Actividades del Día</h3>
            <span class="date-badge">Hoy</span>
        </div>
        <div class="activities-timeline">
            <div class="activity-item">
                <div class="activity-time">10:00 AM</div>
                <div class="activity-content">
                    <h4>Revisión médica general</h4>
                    <p>Área de consultas - Todos los residentes</p>
                </div>
                <div class="activity-status completed">
                    <i class="fas fa-check"></i>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-time">03:00 PM</div>
                <div class="activity-content">
                    <h4>Actividades recreativas</h4>
                    <p>Sala común - Grupo de terapia ocupacional</p>
                </div>
                <div class="activity-status pending">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-time">06:00 PM</div>
                <div class="activity-content">
                    <h4>Visitas familiares</h4>
                    <p>Salón de visitas - Horario hasta las 8:00 PM</p>
                </div>
                <div class="activity-status upcoming">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <a href="#" class="view-all-link">Ver calendario completo →</a>
        </div>
    </div>

</div>

<!-- Sección de recordatorios -->
<div class="reminders-panel">
    <div class="panel">
        <h3>Recordatorios Importantes</h3>
        <div class="reminders-list">
            <div class="reminder-item">
                <div class="reminder-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="reminder-content">
                    <h4>Reunión de equipo médico</h4>
                    <p>Viernes 10:00 AM - Sala de conferencias</p>
                </div>
            </div>
            <div class="reminder-item">
                <div class="reminder-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="reminder-content">
                    <h4>Revisión de equipos médicos</h4>
                    <p>Programar mantenimiento preventivo</p>
                </div>
            </div>
            <div class="reminder-item">
                <div class="reminder-icon">
                    <i class="fas fa-file-medical"></i>
                </div>
                <div class="reminder-content">
                    <h4>Actualización de expedientes</h4>
                    <p>Completar historiales del mes</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection