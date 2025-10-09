<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Hogar Geriátrico</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  
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
