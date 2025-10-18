<!-- Componente Navbar -->
<nav class="navbar">
    <div class="navbar-brand">Hogar Geriátrico</div>
    <div class="navbar-links">
        <a href="#quienes-somos">Quiénes Somos</a>
        <a href="#servicios">Servicios</a>
        @auth
            <a href="{{ route('dashboard') }}" class="btn-login">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn-login">Cerrar sesión</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
        @endauth
    </div>
</nav>