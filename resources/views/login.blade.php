<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Hogar Geriátrico</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body { background: #f8fafc; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-container { background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        .login-title { text-align: center; margin-bottom: 1.5rem; color: #2d3748; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: .5rem; color: #4a5568; }
        input[type="email"], input[type="password"] { width: 100%; padding: .75rem; border: 1px solid #cbd5e0; border-radius: 4px; }
        .btn { width: 100%; padding: .75rem; background: #3182ce; color: #fff; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; }
        .btn:hover { background: #2b6cb0; }
        .error { color: #e53e3e; margin-bottom: 1rem; text-align: center; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="login-title">Inicio de Sesión</h2>
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif
    <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" required autofocus value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="btn">Ingresar</button>
        </form>
    </div>
</body>
</html>
