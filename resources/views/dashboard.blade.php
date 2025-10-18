<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Hogar Geriátrico</title>
    @vite(['resources/css/dashboard.css'])
    <script src="https://kit.fontawesome.com/a2e0b5a52a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="sidebar">
        <h2><i class="fas fa-clinic-medical"></i> Hogar <span>Geriátrico</span></h2>
        <div class="menu">
             <a href="#" class="active"><i class="fas fa-users"></i> Panel de Control</a>
            <a href="#" ><i class="fas fa-users"></i> Pacientes</a>
            <a href="#"><i class="fas fa-user-nurse"></i> Colaboradores</a>
            <a href="#"><i class="fas fa-pills"></i> Medicamentos</a>
            <a href="#"><i class="fas fa-box"></i> Inventario</a>
            <a href="#"><i class="fas fa-chart-line"></i> Reportes</a>
            <a href="#"><i class="fas fa-cog"></i> Configuración</a>
        </div>
    </div>

    <div class="main">
        <div class="header">
            <h1>Panel de Control</h1>
            <div class="user-info">
                <span>{{ Auth::user()->nombre }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"><i class="fas fa-sign-out-alt"></i> Salir</button>
                </form>
            </div>
        </div>

        <div class="dashboard-content">
            <div class="cards">
                <div class="card">
                    <i class="fas fa-users"></i>
                    <h3>Pacientes</h3>
                    <p>Gestione la información y el historial médico de los residentes.</p>
                </div>

                <div class="card">
                    <i class="fas fa-user-nurse"></i>
                    <h3>Colaboradores</h3>
                    <p>Administre el personal médico, cuidadores y empleados.</p>
                </div>

                <div class="card">
                    
                   <a href="{{ route('inventario.index') }}" class="{{ request()->is('inventario') ? 'active' : '' }}">
    <i class="fas fa-boxes"></i> Inventario
</a>

                    <p>Controle los suministros, alimentos y elementos del hogar.</p>
                </div>

                <div class="card">
                    <i class="fas fa-pills"></i>
                    <h3>Medicamentos</h3>
                    <p>Registre y administre medicamentos y dosis por paciente.</p>
                </div>

                <div class="card">
                    <i class="fas fa-chart-line"></i>
                    <h3>Reportes</h3>
                    <p>Revise estadísticas y reportes sobre el funcionamiento general.</p>
                </div>

                <div class="card">
                    <i class="fas fa-cog"></i>
                    <h3>Configuración</h3>
                    <p>Ajuste los parámetros generales del sistema y usuarios.</p>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Toast Notificación  Toca revisar esta notificacion
    <div class="toast" id="loginToast">
        <i class="fas fa-check-circle"></i> Sesión iniciada correctamente
    </div>

 <script>
    document.addEventListener('DOMContentLoaded', () => {
        @if (session('success'))
            const toast = document.getElementById('loginToast');
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 4000);
        @endif
    });
</script>-->
</body>
</html>
