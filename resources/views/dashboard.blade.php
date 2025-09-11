<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Hogar Geriátrico</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body { background: #f8fafc; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .dashboard-container { background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 100%; max-width: 400px; text-align: center; }
        .dashboard-title { color: #2d3748; margin-bottom: 1.5rem; }
        .success { color: #38a169; margin-bottom: 1rem; }
        .btn { padding: .75rem 1.5rem; background: #3182ce; color: #fff; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; margin-top: 1rem; }
        .btn:hover { background: #2b6cb0; }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2 class="dashboard-title">Bienvenido al Hogar Geriátrico</h2>
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
        <p>Has iniciado sesión como <strong>{{ Auth::user()->name }}</strong>.</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>
