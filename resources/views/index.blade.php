<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hogar Geriátrico Ángeles V</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-black: #32b4a8;
            --primary-beige: #ffffff;
            --primary-orange: #0097b2;
            --light-bg: #f8f9fa;
            --dark-text: #333333;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--light-bg);
            color: var(--dark-text);
            line-height: 1.6;
        }
        
        .navbar {
            background: var(--primary-black);
            color: var(--primary-beige);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            color: var(--primary-beige);
        }
        
        .navbar-brand span {
            color: var(--primary-orange);
        }
        
        .navbar-brand i {
            margin-right: 10px;
            font-size: 1.5rem;
            color: var(--primary-orange);
        }
        
        .navbar-links {
            display: flex;
            align-items: center;
        }
        
        .navbar-links a {
            color: var(--primary-beige);
            text-decoration: none;
            margin-left: 2rem;
            font-weight: 500;
            transition: color 0.2s;
            display: flex;
            align-items: center;
        }
        
        .navbar-links a i {
            margin-right: 5px;
        }
        
        .navbar-links a:hover {
            color: var(--primary-orange);
        }
        
        .btn-login {
            background: var(--primary-orange);
            color: white;
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }
        
        .btn-login i {
            margin-right: 5px;
        }
        
        .btn-login:hover {
            background: var(--primary-beige);
            color: var(--primary-black);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-top: 70px;
        }
        
        .hero-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5));
            z-index: 2;
        }
        
        .hero-content {
            position: relative;
            z-index: 3;
            color: #fff;
            text-align: center;
            max-width: 800px;
            padding: 0 2rem;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            color: var(--primary-beige);
        }
        
        .hero-title span {
            color: var(--primary-orange);
        }
        
        .hero-desc {
            font-size: 1.5rem;
            margin-bottom: 2.5rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
        
        .btn-hero {
            background: var(--primary-orange);
            color: white;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        
        .btn-hero i {
            margin-left: 8px;
        }
        
        .btn-hero:hover {
            background: var(--primary-beige);
            color: var(--primary-black);
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }
        
        .section {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .section-title {
            font-size: 2.5rem;
            color: var(--primary-black);
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            padding-bottom: 1rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--primary-orange);
            border-radius: 2px;
        }
        
        .section-content {
            font-size: 1.2rem;
            color: var(--dark-text);
            text-align: center;
            line-height: 1.8;
        }
        
        .values {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .value-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            border-top: 4px solid var(--primary-orange);
        }
        
        .value-card:hover {
            transform: translateY(-10px);
        }
        
        .value-icon {
            font-size: 2.5rem;
            color: var(--primary-orange);
            margin-bottom: 1.5rem;
        }
        
        .value-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary-black);
        }
        
        .value-desc {
            color: var(--dark-text);
            line-height: 1.6;
        }
        
        .services {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .service-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
        }
        
        .service-icon {
            font-size: 3rem;
            color: var(--primary-orange);
            margin-bottom: 1.5rem;
        }
        
        .service-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary-black);
        }
        
        .service-desc {
            color: var(--dark-text);
            line-height: 1.6;
        }
        
        .about-section {
            background: var(--primary-beige);
            padding: 5rem 2rem;
        }
        
        .about-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }
        
        .about-text h2 {
            font-size: 2.5rem;
            color: var(--primary-black);
            margin-bottom: 1.5rem;
        }
        
        .about-text p {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }
        
        .about-image {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .about-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .footer {
            background: var(--primary-black);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: left;
        }
        
        .footer-section h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
            color: var(--primary-beige);
        }
        
        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--primary-orange);
        }
        
        .footer-section p {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        
        .footer-section i {
            margin-right: 10px;
            color: var(--primary-orange);
        }
        
        .copyright {
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            color: var(--primary-beige);
        }
        
        .image-help {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 800px;
            text-align: center;
            display: none;
        }
        
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 1rem;
            }
            
            .navbar-links {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .navbar-links a {
                margin: 0.5rem;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-desc {
                font-size: 1.2rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .services, .values {
                grid-template-columns: 1fr;
            }
            
            .about-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <i class="fas fa-home-heart"></i>Hogar Geriátrico&nbsp; <span> Ángeles V</span>
        </div>
        <div class="navbar-links">
            <a href="#quienes-somos"><i class="fas fa-info-circle"></i>Quiénes Somos</a>
            <a href="#servicios"><i class="fas fa-concierge-bell"></i>Servicios</a>
            <a href="#contacto"><i class="fas fa-map-marker-alt"></i>Contacto</a>
            <a href="{{ route('login') }}" class="btn-login"><i class="fas fa-sign-in-alt"></i>Iniciar Sesión</a>
        </div>
    </nav>
    
    <div class="image-help" id="imageHelp">
        <p><strong>Nota:</strong> Para que la imagen funcione correctamente en Laravel:</p>
        <p>1. Asegúrate de que tu imagen esté en la carpeta <code>public/</code> con el nombre <code>Industrias.jpg</code></p>
        <p>2. Si la imagen no se muestra, verifica que el archivo exista y tenga los permisos correctos</p>
    </div>
    
    <section class="hero">
        <!-- Imagen usando asset() de Laravel para la ruta correcta -->
        <img src="{{ asset('portada.jpeg') }}" alt="Hogar Geriátrico Ángeles V" class="hero-image" onerror="document.getElementById('imageHelp').style.display='block'">
        
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Hogar Geriátrico <span> Ángeles V</span></h1>
            <p class="hero-desc">Cuidamos de quienes más lo necesitan, con amor y profesionalismo.</p>
            <a href="#contacto" class="btn-hero">Contáctenos <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>
    
    <section class="about-section" id="quienes-somos">
        <div class="about-content">
            <div class="about-text">
                <h2>Nuestra Historia</h2>
                <p>Ángeles V nació del compromiso y pasión de Anny Villarreal Vanegas, profesional en enfermería, quien junto con sus hermanos, decidió crear varios hogares geriátricos privados en la localidad de Kennedy, Bogotá.</p>
                <p>Nuestro objetivo ha sido brindar un ambiente digno y cálido para los adultos mayores, donde se prioriza la calidad de vida y el cuidado integral.</p>
            </div>
            <div class="about-image">
                <<img src="{{ asset('IndustriasAriova.jpg') }}" alt="Hogar Geriátrico Ángeles V"  onerror="document.getElementById('imageHelp').style.display='block'">
            </div>
        </div>
    </section>
    
    <section class="section">
        <h2 class="section-title">Nuestra Misión y Visión</h2>
        <div class="values">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3 class="value-title">Misión</h3>
                <p class="value-desc">Brindar cuidado integral, dignidad y calidad de vida a los adultos mayores, creando un entorno cálido, seguro y familiar.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h3 class="value-title">Visión</h3>
                <p class="value-desc">Ser líderes en atención geriátrica en Bogotá, reconocidos por nuestra excelencia, humanidad e innovación en el cuidado.</p>
            </div>
        </div>
    </section>
    
    <section class="section" id="valores">
        <h2 class="section-title">Nuestros Valores</h2>
        <div class="values">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="value-title">Respeto</h3>
                <p class="value-desc">Tratamos a cada residente con dignidad y consideración.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="value-title">Compromiso</h3>
                <p class="value-desc">Entregamos lo mejor de nosotros en cada detalle del cuidado.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="value-title">Honestidad</h3>
                <p class="value-desc">Actuamos con transparencia y ética en todo lo que hacemos.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="value-title">Innovación</h3>
                <p class="value-desc">Buscamos mejorar continuamente nuestros procesos.</p>
            </div>
        </div>
    </section>
    
    <section class="section" id="servicios">
        <h2 class="section-title">Nuestros Servicios</h2>
        <div class="services">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h3 class="service-title">Alojamiento</h3>
                <p class="service-desc">Habitaciones cómodas y acogedoras diseñadas para la seguridad y comodidad de nuestros residentes.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h3 class="service-title">Alimentación</h3>
                <p class="service-desc">Dietas balanceadas y personalizadas según las necesidades nutricionales de cada residente.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <h3 class="service-title">Atención Médica</h3>
                <p class="service-desc">Atención médica especializada y seguimiento continuo de la salud de nuestros residentes.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h3 class="service-title">Actividades</h3>
                <p class="service-desc">Programa variado de actividades recreativas, terapéuticas y sociales para el bienestar integral.</p>
            </div>
        </div>
    </section>
    
    <footer class="footer" id="contacto">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contacto</h3>
                <p><i class="fas fa-map-marker-alt"></i> Carrera 78 #56A-25 Sur, Kennedy, Bogotá</p>
                <p><i class="fas fa-phone"></i> Tel: 311 821 6846</p>
                <p><i class="fas fa-envelope"></i> hogargariatricoongeles@gmail.com</p>
            </div>
            <div class="footer-section">
                <h3>Horario de Visitas</h3>
                <p><i class="fas fa-clock"></i> Lunes a Viernes: 9:00 - 18:00</p>
                <p><i class="fas fa-clock"></i> Sábados y Domingos: 10:00 - 16:00</p>
            </div>
            <div class="footer-section">
                <h3>NIT</h3>
                <p>11115721221-3</p>
                <h3>Titular</h3>
                <p>Anny Villarreal Vanegas</p>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2023 Hogar Geriátrico Ángeles V. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        // Verificar si la imagen se cargó correctamente
        document.addEventListener('DOMContentLoaded', function() {
            const heroImage = document.querySelector('.hero-image');
            if (heroImage && heroImage.complete && heroImage.naturalHeight === 0) {
                // Si la imagen no se cargó, mostrar el mensaje de ayuda
                document.getElementById('imageHelp').style.display = 'block';
            }
        });
    </script>
</body>
</html>