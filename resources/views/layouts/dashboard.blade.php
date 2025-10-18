<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de Administración') - Hogar Geriátrico</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://kit.fontawesome.com/a2e0b5a52a.js" crossorigin="anonymous"></script>
    @yield('styles')
</head>
<body>
    @include('components.sidebar')
    
    <div class="main">
        @include('components.dashboard-header')
        
        <div class="dashboard-content">
            @yield('content')
        </div>
    </div>

    @yield('scripts')
</body>
</html>