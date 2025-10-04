<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geriátrico Angeles V</title>

    <!-- Fuente y Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS externo -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">
            <i class="fa-solid fa-hand-holding-heart"></i>
            Geriátrico <span>San Rafael</span>
        </div>
        <div class="navbar-links">
            <a href="#inicio"><i class="fa-solid fa-house"></i>Inicio</a>
            <a href="#nosotros"><i class="fa-solid fa-user-group"></i>Nosotros</a>
            <a href="#servicios"><i class="fa-solid fa-stethoscope"></i>Servicios</a>
            <a href="#valores"><i class="fa-solid fa-heart"></i>Valores</a>
            <a href="#contacto"><i class="fa-solid fa-envelope"></i>Contacto</a>
            <a href="{{ route('login') }}" class="btn-login"><i class="fa-solid fa-right-to-bracket"></i>Ingresar</a>
        </div>
    </nav>

    <!-- Hero -->
    <section id="inicio" class="hero">
        <img src="{{ asset('img/portada.jpeg') }}" alt="Adultos mayores felices" class="hero-image">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Bienvenidos al <span>Geriátrico Angeles V</span></h1>
            <p class="hero-desc">Cuidamos con amor, respeto y profesionalismo a quienes más lo merecen.</p>
            <a href="#nosotros" class="btn-hero">Conócenos <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </section>

    <!-- Sección Nosotros -->
    <section id="nosotros" class="about-section">
        <div class="about-content">
            <div class="about-text">
                <h2>Sobre Nosotros</h2>
                <p>En el Geriátrico Angeles V brindamos atención integral a las personas mayores, garantizando bienestar físico, emocional y social en un entorno seguro y acogedor.</p>
                <p>Nuestro equipo de profesionales trabaja día a día con dedicación y calidez para ofrecer una atención personalizada y de calidad.</p>
            </div>
            <div class="about-image">
                <img src="{{ asset('img/IndustriasAriova.jpg') }}" alt="Cuidado geriátrico">
            </div>
        </div>
    </section>

    <!-- Sección Valores -->
    <section id="valores" class="section">
        <h2 class="section-title">Nuestros Valores</h2>
        <div class="values">
            <div class="value-card">
                <i class="fa-solid fa-hand-holding-heart value-icon"></i>
                <h3 class="value-title">Amor</h3>
                <p class="value-desc">Cada acción y cuidado está guiado por el amor hacia nuestros residentes.</p>
            </div>
            <div class="value-card">
                <i class="fa-solid fa-handshake-angle value-icon"></i>
                <h3 class="value-title">Respeto</h3>
                <p class="value-desc">Valoramos la dignidad y experiencia de vida de cada adulto mayor.</p>
            </div>
            <div class="value-card">
                <i class="fa-solid fa-people-group value-icon"></i>
                <h3 class="value-title">Compromiso</h3>
                <p class="value-desc">Trabajamos con vocación y responsabilidad para ofrecer lo mejor día a día.</p>
            </div>
        </div>
    </section>

    <!-- Sección Servicios -->
    <section id="servicios" class="section">
        <h2 class="section-title">Nuestros Servicios</h2>
        <div class="services">
            <div class="service-card">
                <i class="fa-solid fa-user-nurse service-icon"></i>
                <h3 class="service-title">Atención Médica</h3>
                <p class="service-desc">Contamos con personal médico y de enfermería disponible las 24 horas.</p>
            </div>
            <div class="service-card">
                <i class="fa-solid fa-bowl-food service-icon"></i>
                <h3 class="service-title">Alimentación Balanceada</h3>
                <p class="service-desc">Ofrecemos menús saludables y adaptados a las necesidades de cada residente.</p>
            </div>
            <div class="service-card">
                <i class="fa-solid fa-person-walking service-icon"></i>
                <h3 class="service-title">Actividades Recreativas</h3>
                <p class="service-desc">Promovemos el bienestar emocional mediante actividades lúdicas y terapéuticas.</p>
            </div>
        </div>
    </section>

    <!-- Sección Contacto -->
    <section id="contacto" class="section">
        <h2 class="section-title">Contáctanos</h2>
        <div class="section-content">
            <p>📍 Dirección: Calle 45 #23-10, Bogotá, Colombia</p>
            <p>📞 Teléfono: +57 320 456 7890</p>
            <p>✉️ Correo: contacto@geriatricosanrafael.com</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Geriátrico San Rafael</h3>
                <p><i class="fa-solid fa-location-dot"></i> Calle 45 #23-10, Bogotá</p>
                <p><i class="fa-solid fa-phone"></i> +57 320 456 7890</p>
                <p><i class="fa-solid fa-envelope"></i> contacto@geriatricosanrafael.com</p>
            </div>
            <div class="footer-section">
                <h3>Enlaces Rápidos</h3>
                <p><a href="#nosotros">Nosotros</a></p>
                <p><a href="#servicios">Servicios</a></p>
                <p><a href="#valores">Valores</a></p>
                <p><a href="{{ route('login') }}">Ingresar</a></p>
            </div>
        </div>
        <div class="copyright">
            &copy; {{ date('Y') }} Geriátrico San Rafael. Todos los derechos reservados.
        </div>
    </footer>
</body>
</html>
