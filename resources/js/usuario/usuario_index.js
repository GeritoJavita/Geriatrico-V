import 'notyf/notyf.min.css';
import Swal from 'sweetalert2';
import { notyf } from '../app.js';


document.addEventListener('DOMContentLoaded', () => {



    notyf.success('¡Bienvenido al módulo de Residentes!');
    const modal = document.getElementById('openRolModalBtn');
    modal.addEventListener('click', () => {
        notyf.success('Abriendo el formulario de signos vitales...');
        document.getElementById('rolModal').style.display = 'block';
    });





});