import 'notyf/notyf.min.css';
import Swal from 'sweetalert2';
import { notyf } from '../app.js';



document.addEventListener("DOMContentLoaded", () => {

    notyf.success('Bienvenido al registro de empleado');
    const addform = document.getElementById('form-validation');
    const submitBtn = addform.querySelector('button[type="submit"]');
    
    addform.addEventListener('submit', (e) => {

        e.preventDefault();
        let isvalid = true;
        const grupos = addform.querySelectorAll('.form-group');
        grupos.forEach(g => {
            const s = g.querySelector('.small-red');
            if (s) s.classList.remove('mostrar-error');
        });
        for (const grupo of grupos) {
            const input = grupo.querySelector('input, select, textarea');
            const small = grupo.querySelector('.small-red');

            if (input && input.hasAttribute("required") && !input.value.trim()) {
                small.classList.add('mostrar-error');
                input.focus();
                isvalid = false;
            }
        }

        if (!isvalid) {
            notyf.error('Campos inválidos o no llenados');
            return;
        }
            submitBtn.disabled = true;
        Swal.fire({
            title: "¿Quieres crear este empleado?",
            showCancelButton: true,
            confirmButtonText: "Crear",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData(addform);
                fetch('/empleado', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',//es para json
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            notyf.success('Empleado creado con éxito');
                            addform.reset();
                            setTimeout(() => { window.location.reload() }, 1000);
                        }
                        else {
                            let mensaje = data.message;

                            // Si hay errores de validación, concatenarlos
                            if (data.errors) {
                                mensaje += "\n" + Object.entries(data.errors)
                                    .map(([campo, errores]) => `${campo}: ${errores.join(', ')}`)
                                    .join("\n");
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Error al crear el empleado',
                                text: mensaje
                            });

                            console.error(data);
                        }

                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error en la solicitud',
                            text: error.message || 'Error desconocido'
                        });
                        console.error('Error:', error);
                    })
                    .finally(() => {
                        // Volver a activar el botón siempre
                        submitBtn.disabled = false;
                    });;
            } else if (result.isDismissed) {
                Swal.fire('Creación de el empleado cancelada');
            }

        });
    });
}); 