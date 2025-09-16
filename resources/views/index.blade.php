

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hogar Geriátrico - Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body { margin: 0; font-family: 'Segoe UI', Arial, sans-serif; background: #f8fafc; }
        .navbar { background: #3182ce; color: #fff; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        .navbar-brand { font-size: 1.5rem; font-weight: bold; }
        .navbar-links a { color: #fff; text-decoration: none; margin-left: 2rem; font-weight: 500; transition: color 0.2s; }
        .navbar-links a:hover { color: #cbd5e0; }
    .hero { position: relative; height: 60vh; display: flex; align-items: center; justify-content: center; }
        .hero-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(49, 130, 206, 0.5); }
        .hero-content { position: relative; z-index: 2; color: #fff; text-align: center; }
        .hero-title { font-size: 2.5rem; font-weight: bold; margin-bottom: 1rem; }
        .hero-desc { font-size: 1.2rem; margin-bottom: 2rem; }
        .btn-login { background: #fff; color: #3182ce; padding: 0.75rem 2rem; border: none; border-radius: 4px; font-size: 1.1rem; font-weight: bold; cursor: pointer; transition: background 0.2s, color 0.2s; }
        .btn-login:hover { background: #3182ce; color: #fff; border: 1px solid #fff; }
        .section { padding: 3rem 2rem; max-width: 900px; margin: 0 auto; }
        .section-title { font-size: 2rem; color: #2d3748; margin-bottom: 1rem; text-align: center; }
        .section-content { font-size: 1.1rem; color: #4a5568; text-align: center; }
        @media (max-width: 600px) {
            .hero-title { font-size: 1.5rem; }
            .section-title { font-size: 1.3rem; }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Hogar Geriátrico</div>
        <div class="navbar-links">
            <a href="#quienes-somos">Quiénes Somos</a>
            <a href="#servicios">Servicios</a>
            <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
        </div>
    </nav>
    <section class="hero">
        <img src="./IndustriasAriova.jpg" alt="">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-title">Bienvenido al Hogar Geriátrico</div>
            <div class="hero-desc">Cuidamos de quienes más lo necesitan, con amor y profesionalismo.</div>
            <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
        </div>
    </section>
    <section class="section" id="quienes-somos">
        <div class="section-title">Quiénes Somos</div>
        <div class="section-content">
            Somos un hogar geriátrico dedicado al bienestar y cuidado integral de adultos mayores. Nuestro equipo está formado por profesionales comprometidos con brindar atención personalizada, respeto y calidad de vida a nuestros residentes.
        </div>
    </section>
    <section class="section" id="servicios">
        <div class="section-title">Servicios</div>
        <div class="section-content">
            Ofrecemos servicios de alojamiento, alimentación balanceada, atención médica, actividades recreativas, fisioterapia y apoyo emocional. Nuestro objetivo es crear un ambiente seguro, cálido y familiar para todos.
        </div>
    </section>
</body>
</html>