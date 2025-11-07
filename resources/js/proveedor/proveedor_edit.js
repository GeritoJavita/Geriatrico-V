import 'notyf/notyf.min.css';
import Swal from 'sweetalert2';
import { Notyf } from 'notyf';
import { validarCorreo } from '../app.js';

document.addEventListener("DOMContentLoaded", () => {
    const notyf = new Notyf({
        duration: 3500,
        position: { x: 'right', y: 'top' }
    });

    const editButtons = document.querySelectorAll(".btn-edit");
    const formEdit = document.getElementById("form-validation-edit");
    const idEdit = document.getElementById("id-edit");
    const nombreEdit = document.getElementById("nombre-edit");
    const direccionEdit = document.getElementById("direccion-edit");
    const telefonoEdit = document.getElementById("telefono-edit");
    const correoEdit = document.getElementById("correo-edit");
    const correoError = document.querySelector('.correo-error');
    const btnActualizar = document.getElementById("btn-actualizar");

    // Cuando se hace clic en editar → cargar datos en el formulario
    editButtons.forEach(btn => {
        btn.addEventListener("click", e => {
            const fila = e.target.closest("tr");
            //document.getElementById("id-edit").value = fila.dataset.id;
            idEdit.value = fila.querySelector(".id").textContent.trim();
            nombreEdit.value = fila.querySelector(".nombre").textContent.trim();
            direccionEdit.value = fila.querySelector(".direccion").textContent.trim();
            telefonoEdit.value = fila.querySelector(".telefono").textContent.trim();
            correoEdit.value = fila.querySelector(".correo").textContent.trim();

            formEdit.scrollIntoView({ behavior: "smooth" });
        });
    });

    // Actualizar proveedor
    btnActualizar.addEventListener("click", async (e) => {
        e.preventDefault();
        correoError.style.display = 'none';
        correoError.textContent = '';

        const id = document.getElementById("id-edit").value;
       // notyf.success("el id es"+idEdit.value);
        const correoTrim = correoEdit.value.trim();

        // Validar correo
        if (!validarCorreo(correoTrim)) {
            correoError.style.display = 'inline';
            correoError.textContent = 'Correo no válido: usa Gmail, Hotmail u Outlook.';
            notyf.error('Correo no válido');
            return;
        }

        Swal.fire({
            title: "¿Quieres actualizar este proveedor?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Actualizar",
            denyButtonText: `No actualizar`
        }).then(async (result) => {
            if (result.isConfirmed) {

                const formData = new FormData(formEdit);
                formData.append('_method', 'PUT'); // importante para Laravel

                try {
                    const response = await fetch(`/proveedores/${id}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: formData
                    });

                    if (response.ok) {
                        notyf.success('Datos actualizados con éxito');
                        setTimeout(() => location.reload(), 1500);
                    } else {
                        notyf.error('Error al actualizar proveedor');
                        console.error(await response.text());
                    }

                } catch (error) {
                    console.error('Error:', error);
                    notyf.error('Error inesperado al actualizar');
                }

            } else if (result.isDenied) {
                Swal.fire("Cambios no guardados", "", "info");
            }
        });
    });
});
