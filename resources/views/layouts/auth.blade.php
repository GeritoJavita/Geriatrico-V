<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Autenticación') - Hogar Geriátrico</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @yield('styles')
</head>
<body>
    <div class="auth-container">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>