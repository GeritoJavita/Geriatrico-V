<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    @vite(['resources/css/login.css', 'resources/js/User_register.js'])
    <title>Register</title>

</head>

<body>
   
    <div class="center">

        <form class="formRegisterUsers" id="form-validation" action="" novalidate>
            <div class="data-users">
                <div class="title-form">
                    <a>Crea tu cuenta</a>
                </div>
                <div class="contentR">
                    <div class="form-group">
                        <span>Nombres</span><input type="text" name="nombre" pattern="[A-Za-z\s]+" title="Solo letras"
                            placeholder="" required><small class="small-red">*</small>

                    </div>
                    <div class="form-group">
                        <span>Apellido</span>
                        <input type="text" name="apellido" pattern="[A-Za-z\s]+"
                            title="Solo letras" placeholder="" required>
                        <small class="small-red">*</small>
                    </div>
                    <div class="form-group">
                        <span>Teléfono</span><input type="text" id="telefono" name="telefono" pattern="^[1-9]\d*$"
                            title="solo números" placeholder="" required>
                        <small class="small-red telefono-error">*</small>
                    </div>
                    <div class="form-group">
                        <span>Identificación</span>
                        <div class="form-group-select">
                            <select id="tipo_id" name="tipo_id" class="select-id" required>
                                <option value="1">CC</option>
                                <option value="2">CE</option>
                            </select>
                            <input type="text" name="id" pattern="^[1-9]\d*$" title="solo números" placeholder=""
                                required>
                            <small class="small-red">*</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <span>Correo</span><input type="text" id="correo" name="correo" placeholder="" required>
                        <small class="small-red correo-error">*</small>
                    </div>
                    <div class="form-group">
                        <span>Contraseña</span><input id="password" type="password" name="contraseña" placeholder=""
                            required><small id="password-msg">Mínimo 8 carácteres</small>
                    </div>

                    <div class="div-buttonlogin">
                        <button class="inicio" type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script></script>

</body>

</html>