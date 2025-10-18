<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hogar Geriátrico')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navbar.css') }}">
    @yield('styles')
</head>
<body>
    @include('components.navbar')
    
    <main>
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>