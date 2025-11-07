import '../bootstrap';
import 'notyf/notyf.min.css';
import { Notyf } from 'notyf';
import { validarCorreo } from '../app.js';

document.addEventListener('DOMContentLoaded', () => {

    const addform = document.getElementById('form-validation');
    const passwordInput = document.getElementById('password');
    const pwMsg = document.getElementById('password-msg');
    const correoInput = document.getElementById('correo');
    const correoError = document.querySelector('.correo-error');
    const telefonoInput = document.getElementById('telefono');
    const telefonoError = document.querySelector('.telefono-error');

    const notyf = new Notyf({
        duration: 3500,
        position: { x: 'center', y: 'top' },
    });

    // Validación de contraseña en vivo
    passwordInput.addEventListener('input', () => {
        if (passwordInput.value.length >= 8) {
            pwMsg.classList.add('valid');
            pwMsg.textContent = 'Contraseña válida';
        } else {
            pwMsg.classList.remove('valid');
            pwMsg.textContent = 'Mínimo 8 caracteres';
        }
    });

    addform.addEventListener('submit', (e) => {
        e.preventDefault();

        correoError.style.display = 'none';
        correoError.textContent = '';
        telefonoError.style.display = 'none';
        telefonoError.textContent = '';


        const correoTrim = correoInput.value.trim();
        let isValid = true;

         if (!validarCorreo(correoTrim)) {
            correoError.style.display = 'inline';
            correoError.textContent = 'Correo no válido: usa Gmail, Hotmail u Outlook.';
            isValid = false;
        } else {
            correoError.style.display = 'none';
        }
        

        // Validación HTML5 y contraseña
        if (!addform.checkValidity() || passwordInput.value.length < 8) {
            addform.classList.add('was-validated');
            isValid = false;
        }

        // Validación teléfono
        if (telefonoInput.value.length < 7 || telefonoInput.value.length > 15) {
            telefonoError.style.display = 'inline';
            telefonoError.textContent = 'Debe ingresar teléfono (7 dígitos) o celular (10-15 dígitos)';
            isValid = false;
        }

        if (!isValid) {
            notyf.error('Datos faltantes o formato incorrecto');
            return;
        }

        // Preparar FormData
        const datos = new FormData(addform);

        // Enviar datos al backend
        fetch('/Send_register', {
            method: 'POST',
            body: datos,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    notyf.success(data.message);
                    setTimeout(() => {
                        addform.reset();
                        addform.classList.remove('was-validated');
                        
                        setTimeout(()=>{
                            notyf.success("redirigiendo");
                        },200);
                        window.location.href = "/";
                    }, 2000);
                } else {
                    notyf.error(data.message || 'Error desconocido');
                    alert(data.message);
                }
            })
            .catch(error => {
                notyf.error('Error inesperado: ' + error.message);
                alert(error.message);
                
            });
    });

});
