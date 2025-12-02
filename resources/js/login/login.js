import 'notyf/notyf.min.css';
import { Notyf } from 'notyf';


document.addEventListener('DOMContentLoaded', () => {
    const addform = document.getElementById('form-validation');
    const correoInput = document.getElementById('correo');
    const passwordInput = document.getElementById('password');
    const correoError = document.querySelector('.correo-error');

    addform.addEventListener('submit', (e) => {
        e.preventDefault();
        const notyf = new Notyf({
            duration: 3500,
            position: {
                x: 'center',
                y: 'top'
            }
        });
        //notyf.success("le dio a iniciar");

        let isValid = true;

        if (!addform.checkValidity()) {
            addform.classList.add('was-validated');
            isValid = false;
            notyf.error('Campos inválidos o incompletos');
        }

        const correo = correoInput.value.trim();
        const dominiosPermitidos = ['@gmail.com', '@hotmail.com', '@outlook.com'];
        const dominioValido = dominiosPermitidos.some(d => correo.endsWith(d));

        if (!dominioValido || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo)) {
            correoError.textContent = "Correo no válido o dominio no permitido";
            correoError.style.display = "block";
            notyf.error('Correo no válido');
            isValid = false;
        } else {
            correoError.style.display = "none";
        }

        if (!isValid) return;

        const datos = new FormData(addform);

        fetch('/login_user', {
            method: 'POST',
            body: datos,
            headers: {//esto es para decirle al queridisimo laravel que queremos respuestas en formato json
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')// y esta belleza es obligatorio para proteger la app contra ataques csrf 
            },
            credentials: 'include'
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                   // notyf.success("Inicio de sesión exitoso");
/*
                    setTimeout(() => {
                        addform.reset();
                        addform.classList.remove('was-validated');
                        
                        notyf.success("Redirigiendo...");
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 1000); 
                    }, 2000); */
                    window.location.href = data.redirect;
                } else {
                    notyf.error(data.message);
                    alert(data.message);
                }
            })
    });
});
