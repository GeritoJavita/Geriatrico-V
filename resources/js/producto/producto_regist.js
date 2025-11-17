import 'notyf/notyf.min.css';
import Swal from 'sweetalert2';
import { Notyf } from 'notyf';
import { formatearPesos } from '../app.js';
import { limpiarFormatoPesos } from '../app.js';

document.addEventListener("DOMContentLoaded", () => {

    const notyf = new Notyf({
        duration: 3500,
        position: { x: 'center', y: 'top' }
    });
    /*FORMA DE PONER PRECIO COLOMBIANO A LOS INPUTS*/
    const precio = document.getElementById("precio");
    precio.addEventListener("input", () => {
        const valor = precio.value.replace(/[^\d]/g, "");
        precio.value = formatearPesos(valor);
    });
    /*FORMA DE PONER PRECIO COLOMBIANO A LOS INPUTS*/

    const addform = document.getElementById('form-validation');
    const stock = document.getElementById('stock');
   


    addform.addEventListener('submit', (e) => {
        e.preventDefault();
        let isvalid = true;
        const grupos = addform.querySelectorAll('.form-group');

        // LIMPIAR TODOS LOS ERRORES
        grupos.forEach(g => {
            const s = g.querySelector('.small-red');
            if (s) s.classList.remove('mostrar-error');
        });

        // VALIDACIÓN UNO A UNO
        for (const grupo of grupos) {
            const input = grupo.querySelector('input, select, textarea');
            const small = grupo.querySelector('.small-red');

            if (input && input.hasAttribute("required") && !input.value.trim()) {
                small.classList.add('mostrar-error');
                input.focus();
                isvalid = false;
            }
        }

        if (stock.value <= 0) {
            notyf.error('El stock no puede ser 0 o negativo');
            stock.focus();
            isvalid = false;
        }
        if (!isvalid) {
            notyf.error('Campos inválidos o no llenados');
            return;
        }
        Swal.fire({
            title: "¿Quieres crear este producto?",
            showCancelButton: true,
            confirmButtonText: "Sí, crear",
        }).then(async (result) => {

            if (result.isConfirmed) {
                const formData = new FormData(addform);
                formData.set("precio", limpiarFormatoPesos(precio.value));

                fetch('/producto', {
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
                            notyf.success('Producto creado con éxito');
                            addform.reset();
                            setTimeout(() => { window.location.reload() }, 1000);
                        } else {
                            notyf.error(data.message || 'Error al crear el producto');
                            console.error(data);
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        notyf.error('Error al conectar con el servidor');
                        alert(error);
                    });
            }else if (result.isDismissed) {
                Swal.fire("Producto no creado", "", "info");
            }
        });




    });


});
