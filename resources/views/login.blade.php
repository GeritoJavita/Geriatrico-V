<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Hogar Geriátrico</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-page">
        <div class="login-image">
            <img src="{{ asset('img/login-bg.jpg') }}" alt="Hogar Geriátrico">
        </div>

        <div class="login-container">
            <div class="login-content">
                <h2 class="login-title">Bienvenido al <span>Hogar Geriátrico</span></h2>
                <p class="login-subtitle">Por favor, inicia sesión para continuar</p>

                @if ($errors->any())
                    <div class="error-message">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="correo">Correo electrónico</label>
                        <input type="correo" name="correo" id="correo" required autofocus value="{{ old('correo') }}">
                    </div>

                    <div class="form-group">
                        <label for="clave">Contraseña</label>
                        <input type="clave" name="clave" id="clave" required>
                    </div>

                    <div class="forgot-password">
                        <a href="Aqui va la ruta al pasword request para cambiarlaxd">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="btn-login-form">Ingresar</button>
                </form>
            </div>

            <footer class="login-footer">
                <p>&copy; {{ date('Y') }} Hogar Geriátrico. Todos los derechos reservados. Angeles-V</p>
            </footer>
        </div>
    </div>
</body>
</html>