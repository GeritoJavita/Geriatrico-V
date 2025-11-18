import 'notyf/notyf.min.css';
import Swal from 'sweetalert2';
import { notyf } from '../app.js';



document.addEventListener("DOMContentLoaded", () => {

    notyf.success('Bienvenido al registro de residentes');
    const addform = document.getElementById('form-validation');
    const submitBtn = addform.querySelector('button[type="submit"]');
    
    // Variables para almacenar alergias y patologías
    let alergias = [];
    let patologias = [];
    
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
        
        // Primero confirmar si quiere crear el residente
        Swal.fire({
            title: "¿Quieres crear este residente?",
            showCancelButton: true,
            confirmButtonText: "Continuar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                // Preguntar por alergias
                preguntarAlergias();
            } else {
                Swal.fire('Creación de residente cancelada');
                submitBtn.disabled = false;
            }
        });
    });
    
    // Función para preguntar si tiene alergias
    function preguntarAlergias() {
        Swal.fire({
            title: '¿El residente tiene alergias?',
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                mostrarFormularioAlergias();
            } else {
                // No tiene alergias, continuar con patologías
                preguntarPatologias();
            }
        });
    }
    
    // Función para mostrar formulario de alergias
    function mostrarFormularioAlergias() {
        // Generar HTML de alergias ya agregadas
        let alergiasHTML = '';
        if (alergias.length > 0) {
            alergiasHTML = alergias.map((a, index) => 
                `<li style="padding: 5px; background: #f0f0f0; margin: 5px 0; border-radius: 4px;">
                    ${index + 1}. ${a.nombre} - ${a.fecha}
                </li>`
            ).join('');
        } else {
            alergiasHTML = '<li style="color: #999;">Ninguna alergia agregada aún</li>';
        }
        
        Swal.fire({
            title: 'Registrar Alergias',
            html: `
                <div style="text-align: left;">
                    <div style="margin-bottom: 10px;">
                        <label style="display: block; margin-bottom: 5px;">Nombre de la alergia:</label>
                        <input id="alergia-nombre" class="swal2-input" style="width: 90%;" placeholder="Ej: Polen">
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label style="display: block; margin-bottom: 5px;">Fecha de diagnóstico:</label>
                        <input id="alergia-fecha" type="date" class="swal2-input" style="width: 90%;">
                    </div>
                </div>
                <div id="alergias-lista" style="margin-top: 15px; text-align: left;">
                    <strong>Alergias registradas (${alergias.length}):</strong>
                    <ul id="alergias-ul" style="list-style: none; padding: 0;">
                        ${alergiasHTML}
                    </ul>
                </div>
            `,
            showCancelButton: true,
            showDenyButton: true,
            confirmButtonText: 'Agregar otra',
            denyButtonText: 'Finalizar',
            cancelButtonText: 'Cancelar',
            preConfirm: () => {
                const nombre = document.getElementById('alergia-nombre').value;
                const fecha = document.getElementById('alergia-fecha').value;
                
                if (!nombre || !fecha) {
                    Swal.showValidationMessage('Por favor completa ambos campos');
                    return false;
                }
                
                return { nombre, fecha };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Agregar alergia a la lista
                alergias.push(result.value);
                notyf.success('Alergia agregada');
                // Mostrar el formulario de nuevo
                mostrarFormularioAlergias();
            } else if (result.isDenied) {
                // Finalizar alergias, continuar con patologías
                preguntarPatologias();
            } else {
                // Cancelar todo
                Swal.fire('Registro cancelado');
                submitBtn.disabled = false;
            }
        });
    }
    
    // Función para preguntar si tiene patologías
    function preguntarPatologias() {
        Swal.fire({
            title: '¿El residente tiene patologías?',
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                mostrarFormularioPatologias();
            } else {
                // No tiene patologías, enviar formulario
                enviarFormulario();
            }
        });
    }
    
    // Función para mostrar formulario de patologías
    function mostrarFormularioPatologias() {
        Swal.fire({
            title: 'Registrar Patologías',
            html: `
                <div style="text-align: left;">
                    <div style="margin-bottom: 10px;">
                        <label style="display: block; margin-bottom: 5px;">Nombre de la patología:</label>
                        <input id="patologia-nombre" class="swal2-input" style="width: 90%;" placeholder="Ej: Diabetes">
                    </div>
                    <div style="margin-bottom: 10px;">
                        <label style="display: block; margin-bottom: 5px;">Fecha de diagnóstico:</label>
                        <input id="patologia-fecha" type="date" class="swal2-input" style="width: 90%;">
                    </div>
                </div>
                <div id="patologias-lista" style="margin-top: 15px; text-align: left;">
                    <strong>Patologías registradas:</strong>
                    <ul id="patologias-ul" style="list-style: none; padding: 0;"></ul>
                </div>
            `,
            showCancelButton: true,
            showDenyButton: true,
            confirmButtonText: 'Agregar otra',
            denyButtonText: 'Finalizar',
            cancelButtonText: 'Cancelar',
            preConfirm: () => {
                const nombre = document.getElementById('patologia-nombre').value;
                const fecha = document.getElementById('patologia-fecha').value;
                
                if (!nombre || !fecha) {
                    Swal.showValidationMessage('Por favor completa ambos campos');
                    return false;
                }
                
                return { nombre, fecha };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Agregar patología a la lista
                patologias.push(result.value);
                notyf.success('Patología agregada');
                // Mostrar el formulario de nuevo
                mostrarFormularioPatologias();
            } else if (result.isDenied) {
                // Finalizar patologías, enviar formulario
                enviarFormulario();
            } else {
                // Cancelar todo
                Swal.fire('Registro cancelado');
                submitBtn.disabled = false;
            }
        });
    }
    
    // Función para enviar el formulario con alergias y patologías
    function enviarFormulario() {
        const formData = new FormData(addform);
        
        // Agregar alergias al formData
        if (alergias.length > 0) {
            formData.append('alergias', JSON.stringify(alergias));
        }
        
        // Agregar patologías al formData
        if (patologias.length > 0) {
            formData.append('patologias', JSON.stringify(patologias));
        }
        
        fetch('/residente', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                notyf.success('Residente creado con éxito');
                addform.reset();
                alergias = [];
                patologias = [];
                setTimeout(() => { window.location.reload() }, 1000);
            }
            else {
                let mensaje = data.message;

                if (data.errors) {
                    mensaje += "\n" + Object.entries(data.errors)
                        .map(([campo, errores]) => `${campo}: ${errores.join(', ')}`)
                        .join("\n");
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Error al crear residente',
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
            submitBtn.disabled = false;
        });
    }
}); 