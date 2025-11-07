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

export function validarCorreo(correoTrim) {
    const correoRegex = /^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com|outlook\.com)$/;
    return correoRegex.test(correoTrim);
}