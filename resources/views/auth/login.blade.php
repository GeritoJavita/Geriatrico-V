@extends('layouts.auth')

@section('title', 'Inicio de Sesión')

@section('content')
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
                    <input type="email" name="correo" id="correo" required autofocus value="{{ old('correo') }}">
                </div>

                <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <input type="password" name="clave" id="clave" required>
                </div>

                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="btn-login">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</div>
@endsection