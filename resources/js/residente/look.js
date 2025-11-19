import 'notyf/notyf.min.css';
import Swal from 'sweetalert2';
import { notyf } from '../app.js';

document.addEventListener('DOMContentLoaded', () => {

    notyf.success('¡Bienvenido al módulo de Residentes!');

    const openModal = document.getElementById('openRolModalBtn');
    const closeModal = document.getElementById('closeRolModalBtn');
    const modal = document.getElementById('Modal');
    const addForm = document.querySelector('#form-modal form');  // FORM REAL
    const submitBtn = addForm.querySelector('button[type="submit"]');

    // Abrir modal
    openModal.addEventListener('click', () => {
        notyf.success('Abriendo el formulario de signos vitales...');
        modal.style.display = 'block';
    });

    // Cerrar modal
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Enviar formulario
    addForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        // --- Validación ---
        let isValid = true;
        const grupos = addForm.querySelectorAll('.form-group');

        // Quitar errores previos
        grupos.forEach(g => {
            const s = g.querySelector('.small-red');
            if (s) s.classList.remove('mostrar-error');
        });

        // Validar inputs requeridos
        for (const grupo of grupos) {
            const input = grupo.querySelector('input, select, textarea');
            const small = grupo.querySelector('.small-red');

            if (input && input.required && !input.value.trim()) {
                small.classList.add('mostrar-error');
                input.focus();
                isValid = false;
                break;
            }
        }

        if (!isValid) {
            notyf.error('Debes llenar todos los campos obligatorios');
            return;
        }

        // Deshabilitar botón
        submitBtn.disabled = true;

        // Confirmación
        const result = await Swal.fire({
            title: "¿Quieres agregar estos signos vitales?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Sí, agregar",
            cancelButtonText: "Cancelar",
        });

        // Canceló → reactivar botón
        if (!result.isConfirmed) {
            submitBtn.disabled = false;
            Swal.fire("Proceso cancelado", "", "info");
            return;
        }

        // --- Envío ---
        try {

            const ahora = new Date();

            const fecha = ahora.toISOString().slice(0, 10);      // "2025-11-18"
            const hora = ahora.toTimeString().slice(0, 5);       // "20:41"

            document.getElementById('fecha_actual').value = fecha;
            document.getElementById('hora_actual').value = hora;

            // --- Enviar formulario ---
            const formData = new FormData(addForm);


            const response = await fetch('/signos_vitales', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                }
            });

            // Validación 422
            if (response.status === 422) {
                const data = await response.json();
                let messages = [];

                for (let campo in data.errors) {
                    messages.push(data.errors[campo].join("\n"));
                }

                notyf.error(messages.join("\n"));
                submitBtn.disabled = false;
                return;
            }

            // Errores generales
            if (!response.ok) {
                const data = await response.json();
                const message = data.message || `Error HTTP ${response.status}`;
                notyf.error(message);
                submitBtn.disabled = false;
                return;
            }

            // OK
            const data = await response.json();

            if (data.success) {
                notyf.success('Signos vitales agregados con éxito');
                addForm.reset();
                setTimeout(() => window.location.reload(), 1000);
            } else {
                notyf.error(data.message || "Error al agregar signos vitales");
            }

        } catch (error) {
            console.error(error);
            notyf.error('Ocurrió un error inesperado');
        } finally {
            submitBtn.disabled = false;
        }

    });

});
