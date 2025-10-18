<!-- Componente Hero/Slider -->
<section class="hero" style="background: url('{{ $backgroundImage }}') center/cover no-repeat;">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="hero-title">{{ $title }}</div>
        <div class="hero-desc">{{ $description }}</div>
        @if($showLoginButton)
            <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
        @endif
    </div>
</section>