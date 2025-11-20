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
    const editSection = document.getElementById("edit-paciente-form");

    const btnActualizar = document.getElementById("btn-actualizar-paciente");
    const btnVaciar = document.getElementById("btn-vaciar-paciente");

    // Campos del formulario
    const idHiddenEdit = document.getElementById("id-hidden-edit");
    const cedulaEdit = document.getElementById("cedula-edit");
    const nombreEdit = document.getElementById("nombre-edit");
    const apellidoEdit = document.getElementById("apellido-edit");
    const fechaNacimientoEdit = document.getElementById("fecha_nacimiento-edit");
    const tipoSangreEdit = document.getElementById("tipo_sangre-edit");
    const generoEdit = document.getElementById("genero-edit");
    const telefonoEdit = document.getElementById("telefono-edit");
    const telefonoEmergEdit = document.getElementById("telefono_emerg-edit");

    const camaEdit = document.getElementById("cama-edit");
    const condicionMedicaEdit = document.getElementById("condicion_medica-edit");
    const direccionEdit = document.getElementById("direccion-edit");
    const pesoEdit = document.getElementById("peso-edit");
    const alturaEdit = document.getElementById("altura-edit");
    const epsEdit = document.getElementById("eps-edit");
    const fechaIngresoEdit = document.getElementById("fecha_ingreso-edit");
    const fotoEdit = document.getElementById("foto-edit");
    const fotoPreview = document.getElementById("foto-preview-edit");

    // PREVIEW DE FOTO
    fotoEdit.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            // Validar tamaño (2MB)
            if (file.size > 2 * 1024 * 1024) {
                notyf.error('La imagen no debe superar 2MB');
                fotoEdit.value = '';
                return;
            }

            // Validar tipo
            if (!file.type.startsWith('image/')) {
                notyf.error('Solo se permiten archivos de imagen');
                fotoEdit.value = '';
                return;
            }

            // Mostrar preview
            const reader = new FileReader();
            reader.onload = (event) => {
                fotoPreview.src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // RELLENAR FORMULARIO AL DAR CLICK EN "Editar"
    editButtons.forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();
            
            // Solo procesar si es el botón de editar, no el de "Ver"
            if (!e.target.classList.contains('btn-edit') || e.target.tagName === 'A') {
                return;
            }

            const fila = e.target.closest("tr");

            // Rellenar campos
            idHiddenEdit.value = fila.dataset.id;
            cedulaEdit.value = fila.dataset.cedula || '';
            
            const nombreCompleto = fila.querySelector(".nombre").textContent.trim().split(' ');
            nombreEdit.value = nombreCompleto[0] || '';
            apellidoEdit.value = nombreCompleto.slice(1).join(' ') || '';
            
            generoEdit.value = fila.querySelector(".genero").textContent.trim();
            
            camaEdit.value = fila.querySelector(".cama").textContent.trim();
            
            // Datos de los data-attributes
            fechaNacimientoEdit.value = fila.dataset.fechaNacimiento || '';
            tipoSangreEdit.value = fila.dataset.tipoSangre || '';
            telefonoEdit.value = fila.dataset.telefono || '';
            telefonoEmergEdit.value = fila.dataset.telefonoEmergencia || '';
            condicionMedicaEdit.value = fila.dataset.condicionMedica || '';
            direccionEdit.value = fila.dataset.direccion || '';
            pesoEdit.value = fila.dataset.peso || '';
            alturaEdit.value = fila.dataset.altura || '';
            epsEdit.value = fila.dataset.eps || '';
            fechaIngresoEdit.value = fila.dataset.fechaIngreso || '';

            // Cargar foto si existe
            const fotoUrl = fila.dataset.foto || '/images/default-avatar.png';
            fotoPreview.src = fotoUrl;

            // Limpiar el input de archivo
            fotoEdit.value = '';

            // Mostrar formulario y hacer scroll
            editSection.style.display = 'block';
            editSection.scrollIntoView({ behavior: "smooth", block: "start" });
        });
    });

    // BOTÓN ACTUALIZAR
    btnActualizar.addEventListener("click", (e) => {
        e.preventDefault();

        if (!formEdit.checkValidity()) {
            formEdit.classList.add('was-validated');
            notyf.error('Por favor completa todos los campos requeridos');
            return;
        }

        Swal.fire({
            title: '¿Deseas actualizar los datos del residente?',
            text: "Los cambios se guardarán permanentemente",
            icon: 'question',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Sí, actualizar',
            denyButtonText: 'No actualizar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#32b4a8',
            denyButtonColor: '#6c757d',
            cancelButtonColor: '#e74c3c'
        }).then(async (result) => {
            if (result.isConfirmed) {
                const datos = new FormData(formEdit);
                datos.append('_method', 'PUT'); // Importante para Laravel

                // Mostrar loading
                Swal.fire({
                    title: 'Actualizando...',
                    text: 'Por favor espera',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch(`/residente/${idHiddenEdit.value}`, {
                    method: 'POST',
                    body: datos,
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    Swal.close();
                    
                    if (data.success) {
                        Swal.fire({
                            title: '¡Actualizado!',
                            text: 'Residente actualizado correctamente',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false,
                            confirmButtonColor: '#32b4a8'
                        });
                        
                        formEdit.reset();
                        formEdit.classList.remove('was-validated');
                        editSection.style.display = 'none';
                        
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: data.message || 'Error al actualizar',
                            icon: 'error',
                            confirmButtonColor: '#32b4a8'
                        });
                        console.error('Error:', data);
                    }
                })
                .catch(error => {
                    Swal.close();
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'Error al conectar con el servidor',
                        icon: 'error',
                        confirmButtonColor: '#32b4a8'
                    });
                });
            } else if(result.isDenied){
                Swal.fire({
                    title: 'Cambios no guardados',
                    icon: 'info',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        });
    });

    // BOTÓN VACIAR
    btnVaciar.addEventListener("click", () => {
        Swal.fire({
            title: '¿Limpiar formulario?',
            text: "Se borrarán todos los cambios no guardados",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, limpiar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#6c757d',
            cancelButtonColor: '#32b4a8'
        }).then((result) => {
            if (result.isConfirmed) {
                formEdit.reset();
                formEdit.classList.remove('was-validated');
                fotoPreview.src = '/images/default-avatar.png';
                notyf.success('Formulario limpiado');
            }
        });
    });
});