import 'notyf/notyf.min.css';
import Swal from 'sweetalert2';
import { Notyf } from 'notyf';

document.addEventListener("DOMContentLoaded", () => {
    const notyf = new Notyf({
        duration: 3500,
        position: { x: 'center', y: 'top' }
    });

    // BOTONES Y FORMULARIO
    const editButtons = document.querySelectorAll(".btn-edit");
    const formEdit = document.getElementById("form-residente-edit");

    const btnActualizar = document.getElementById("btn-actualizar");
    const btnVaciar = document.getElementById("btn-vaciar");

    const idEdit = document.getElementById("id-edit");
    const identificacionEdit = document.getElementById("identificacion-edit");
    const nombreEdit = document.getElementById("nombre-edit");
    const apellidoEdit = document.getElementById("apellido-edit");
    const fechaNacimientoEdit = document.getElementById("fecha_nacimiento-edit");
    const tipoSangreEdit = document.getElementById("tipo_sangre-edit");
    const generoEdit = document.getElementById("genero-edit");
    const telefonoEdit = document.getElementById("telefono-edit");
    const epsEdit = document.getElementById("eps-edit");
    const fechaIngresoEdit = document.getElementById("fecha_ingreso-edit");
    // agrega los demás campos como habitación, cama, dirección, peso, altura...

    // RELLENAR FORMULARIO AL DAR CLICK EN "Editar"
    editButtons.forEach(btn => {
        btn.addEventListener("click", e => {
            const fila = e.target.closest("tr");

            idEdit.value = fila.dataset.id;
            identificacionEdit.value = fila.querySelector(".id").textContent.trim();
            nombreEdit.value = fila.querySelector(".nombre").textContent.trim().split(' ')[0];
            apellidoEdit.value = fila.querySelector(".nombre").textContent.trim().split(' ')[1] || '';
            generoEdit.value = fila.querySelector(".genero").textContent.trim();
            // si tienes edad, fecha de nacimiento, etc. puedes mapearlos aquí
            formEdit.scrollIntoView({ behavior: "smooth" });
        });
    });

    // BOTÓN ACTUALIZAR
    btnActualizar.addEventListener("click", (e) => {
        e.preventDefault();

        if (!formEdit.checkValidity()) {
            formEdit.classList.add('was-validated');
            notyf.error('Campos inválidos o no llenados');
            return;
        }

        Swal.fire({
            title: '¿Deseas actualizar los datos del residente?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Actualizar',
            denyButtonText: 'No actualizar'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const datos = new FormData(formEdit);

                fetch(`/residente/${idEdit.value}`, {
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
                        notyf.success("Residente actualizado correctamente");
                        formEdit.reset();
                        setTimeout(() => window.location.reload(), 1000);
                    } else {
                        notyf.error(data.message || 'Error al actualizar');
                        console.error(data);
                    }
                })
                .catch(error => {
                    console.error(error);
                    notyf.error('Error al conectar con el servidor');
                });
            } else if(result.isDenied){
                Swal.fire("Cambios no guardados", "", "info");
            }
        });
    });

    // BOTÓN VACIAR
    btnVaciar.addEventListener("click", () => formEdit.reset());
});
