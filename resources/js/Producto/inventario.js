import 'notyf/notyf.min.css';
import { Notyf } from 'notyf';

document.addEventListener('DOMContentLoaded', () => {


    aplicarFormatoPesosColombianos('precio');
    const notyf = new Notyf({
        duration: 3500,
        position: {
            x: 'center',
            y: 'top'
        },
    });
    const addform = document.getElementById("form-validation-edit");

    addform.addEventListener('submit', (e) => {
        e.preventDefault();
        let usValid = true;

    });

})

function aplicarFormatoPesosColombianos(idInput) {
    const input = document.getElementById(idInput);

    const formatearPesos = (valor) => {
        const numero = parseFloat(valor.replace(/\D/g, ''));
        if (isNaN(numero)) return '';
        return new Intl.NumberFormat('es-CO', {
            style: 'currency',
            currency: 'COP',
            minimumFractionDigits: 0
        }).format(numero);
    };
    // Formatea mientras se escribe
    input.addEventListener('input', () => {
        const valorSinFormato = input.value.replace(/\D/g, '');
        input.value = formatearPesos(valorSinFormato);
    });

    // Limpia antes de enviar el formulario
    const form = input.form;
    if (form) {
        form.addEventListener('submit', () => {
            input.value = input.value.replace(/\D/g, '');
        });
    }
}

 