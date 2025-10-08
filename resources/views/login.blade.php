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
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="email" id="email" required autofocus value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <button type="submit" class="btn-login-form">Ingresar</button>
            </form>
        </div>
    </div>
</body>
</html>
