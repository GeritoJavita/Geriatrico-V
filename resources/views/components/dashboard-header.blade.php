<!-- Header Component -->
<div class="header">
    <h1>@yield('header_title', 'Panel de Control')</h1>
    <div class="user-info">
        <span>{{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"><i class="fas fa-sign-out-alt"></i> Salir</button>
        </form>
    </div>
</div>