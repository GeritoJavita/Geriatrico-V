import 'notyf/notyf.min.css';
import { Notyf } from 'notyf';

// Crear instancia única de Notyf para reutilizar en toda la app
export const notyf = new Notyf({
    duration: 3500,
    position: { x: 'center', y: 'top' },
    ripple: true,
    dismissible: true,
    types: [
        {
            type: 'success',
            backgroundColor: '#28a745',
            icon: {
                className: 'fas fa-check-circle',
                tagName: 'i',
                color: '#fff'
            }
        },
        {
            type: 'error',
            backgroundColor: '#dc3545',
            icon: {
                className: 'fas fa-times-circle',
                tagName: 'i',
                color: '#fff'
            }
        },
        {
            type: 'warning',
            backgroundColor: '#ffc107',
            icon: {
                className: 'fas fa-exclamation-triangle',
                tagName: 'i',
                color: '#000'
            }
        },
        {
            type: 'info',
            backgroundColor: '#17a2b8',
            icon: {
                className: 'fas fa-info-circle',
                tagName: 'i',
                color: '#fff'
            }
        }
    ]
});

export function formatearPesos(valor) {
    if (!valor) return "";
    const numero = parseFloat(String(valor).replace(/[^\d]/g, ""));
    if (isNaN(numero)) return "";
    return numero.toLocaleString("es-CO", {
        style: "currency",
        currency: "COP",
        minimumFractionDigits: 0
    });
}

export function limpiarFormatoPesos(valor) {
    return parseFloat(String(valor).replace(/[^\d]/g, "")) || 0;
}

export function formatearInputConSufijo(inputElement, sufijo, decimales = 2) {
    inputElement.addEventListener("input", () => {
        let valor = inputElement.value.replace(/[^\d.]/g, ""); // solo números y punto
        if (valor) {
            valor = parseFloat(valor).toLocaleString("es-CO", {
                minimumFractionDigits: decimales,
                maximumFractionDigits: decimales
            }) + " " + sufijo;
        }
        inputElement.value = valor;
    });
}

// Función para limpiar el valor y dejar solo el número
export function limpiarValor(inputValue) {
    // Quita todo lo que no sea dígito o punto
    const valorLimpio = inputValue.replace(/[^\d.]/g, "");
    return parseFloat(valorLimpio) || 0; // devuelve 0 si no hay número
}


export function validarCorreo(correoTrim) {
    const correoRegex = /^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|outlook\.com)$/;
    return correoRegex.test(correoTrim);
}