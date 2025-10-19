<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    @vite(['resources/css/login/login.css','resources/js/login/login.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}"><!-- esta mamada es para que reconozca la peticion del fetch por laravel-->
</head>

<body>
    <div id="main-navbar"></div>

    <div class="divMajor" aria-label="Fondo">
        <div class="content-login">
            <div class="left-login">
                <h1><span class="bienvendio">Bienvenido al</span></h1>
                <h1><span class="geriatrico"> Geriátrico Angeles V</span> </h1>
            </div>
            <div class="divlogin">
                <form class="form-login" id="form-validation" action="" novalidate>
                    <div class="contform">
                        <h2><span class="bienvendio">Ingreso de Usuario</span></h2>
                        <div class="form-group">
                            <span><a class="title-short">Correo</a></span>
                            <input type="text" name="correo" id="correo" placeholder="Digite su correo" required>
                            <small class="small-red correo-error">*</small>
                        </div>

                        <div class="form-group">
                            <span><a class="title-short">Contraseña</a></span>
                            <input type="password" id="password" name="password" placeholder="Digite su contraseña" required>
                            <small class="small-red">*</small>
                        </div>

                        <div class="divlinks">
                            <a href="#Recover_password.php" class="link">Olvidé mi contraseña</a>
                        </div>

                        <div class="div-buttonlogin">
                            <button class="inicio" type="submit">Iniciar Sesión</button>
                        </div>

                        <div class="divlinks nouser">
                            <a href="{{ route('User_register') }}" class="link">¿No tienes usuario? Regístrate</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>