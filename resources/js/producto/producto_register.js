import 'notyf/notyf.min.css';
import Swal from 'sweetalert2';
import { Notyf } from 'notyf';
import { validarCorreo } from '../app.js';
import { formatearPesos } from '../app.js';

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
    const nombre = document.getElementById('nombre');
    const precioInput = document.getElementById('precio');
    const caategoria = document.getElementById('categoria_id');
    const stock = document.getElementById('stock');
    const lote = document.getElementById('lote');
    const fecha_caducidad = document.getElementById('fecha_caducidad');
    const presentacion = document.getElementById('presentacion');
    const dosis = document.getElementById('dosis');


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
            const input = grupo.querySelector('input, select');
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
        if(!isvalid){   
            notyf.error('Campos inválidos o no llenados');
            return;
        }
        // TODO CORRECTO
        notyf.success('Formulario válido');

        fetch



    });


});
