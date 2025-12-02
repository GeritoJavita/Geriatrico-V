import 'notyf/notyf.min.css';
import Swal from 'sweetalert2';
import { notyf } from '../app.js';

document.addEventListener('DOMContentLoaded', () => {
    notyf.success('¡Bienvenido al módulo de Usuarios!');

    const modal = document.getElementById('Modal');
    const closeModal = document.getElementById('closeRolModalBtn');
    const addForm = modal.querySelector('form');
    const submitBtn = addForm.querySelector('button[type="submit"]');
    const nombreUsuario = document.getElementById('nombreUsuario');


    const openButtons = document.querySelectorAll('.open-contratar-btn');
    const userIdInput = addForm.querySelector('#user_id_hidden');
    openButtons.forEach(button => {
        button.addEventListener('click', () => {
            const userId = button.getAttribute('data-user-id');
            userIdInput.value = userId;
            const tr = button.closest('tr');
            const userName = tr.getAttribute('data-user-name');

            // Llenar datos del usuario específico
            nombreUsuario.textContent = userName;

            // Guardar ID en el modal (para uso futuro)
            modal.dataset.userId = userId;

            notyf.success(`Abriendo formulario para: ${userName}`);
            modal.style.display = 'block';
        });
    });

    // Cerrar modal - botón
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
        // Limpiar datos
        nombreUsuario.textContent = '';
        modal.dataset.userId = '';
    });

    // Cerrar modal - clic fuera
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
            nombreUsuario.textContent = '';
            modal.dataset.userId = '';
        }
    });

    // Cerrar con Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display === 'block') {
            modal.style.display = 'none';
            nombreUsuario.textContent = '';
            modal.dataset.userId = '';
        }
    });
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

        // Deshabilitar botón para evitar múltiples envíos
        submitBtn.disabled = true;

        const formData = new FormData(addForm);
        formData.append('user_id', modal.dataset.userId);

        try {
            const response = await fetch('/empleado', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                credentials: 'include'
            });

            const data = await response.json();

            if (data.success) {
                notyf.success('Usuario contratado exitosamente');
                // Cerrar modal y limpiar
                modal.style.display = 'none';
                nombreUsuario.textContent = '';
                modal.dataset.userId = '';
                addForm.reset();
            } else {
                notyf.error(data.message || 'Error al contratar usuario');
            }
        } catch (error) {
            console.error('Error en la solicitud:', error);
            notyf.error('Error en la solicitud. Intenta nuevamente.');
        } finally {
            // Rehabilitar botón
            submitBtn.disabled = false;
        }
    });

});
