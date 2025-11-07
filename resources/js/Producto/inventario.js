import 'notyf/notyf.min.css';
import { Notyf } from 'notyf';

document.addEventListener("DOMContentLoaded", () => {
    const notyf = new Notyf({
        duration: 3500,
        position: { x: 'center', y: 'top' }
    });

    const editButtons = document.querySelectorAll(".btn-edit");
    const formEdit = document.getElementById("form-validation-edit");

    const nombreEdit = document.getElementById("nombre-edit");
    const precioEdit = document.getElementById("precio-edit");
    const indicacionesEdit = document.getElementById("indicaciones-edit");
    const loteEdit = document.getElementById("lote-edit");
    const presentacionEdit = document.getElementById("presentacion-edit");
    const btnVaciar = document.getElementById("btn-vaciar");
    const btnActualizar = document.getElementById("btn-actualizar");

    function formatearPesos(valor) {
        if (!valor) return "";
        const numero = parseFloat(String(valor).replace(/[^\d]/g, ""));
        if (isNaN(numero)) return "";
        return numero.toLocaleString("es-CO", {
            style: "currency",
            currency: "COP",
            minimumFractionDigits: 0
        });
    }

    function aplicarFormatoATabla() {
        const celdasPrecio = document.querySelectorAll("td.precio");
        celdasPrecio.forEach(celda => {
            const valor = celda.textContent.trim();
            celda.textContent = formatearPesos(valor);
        });
    }

    aplicarFormatoATabla();

    editButtons.forEach(btn => {
        btn.addEventListener("click", e => {
            const fila = e.target.closest("tr");
            document.getElementById("id").value = fila.dataset.id;
            nombreEdit.value = fila.querySelector(".nombre").textContent.trim();
            precioEdit.value = formatearPesos(fila.querySelector(".precio").textContent.trim());
            indicacionesEdit.value = fila.querySelector(".indicaciones").textContent.trim();
            loteEdit.value = fila.querySelector(".lote").textContent.trim();
            presentacionEdit.value = fila.querySelector(".presentacion").textContent.trim();

            formEdit.scrollIntoView({ behavior: "smooth" });
        });
    });

    precioEdit.addEventListener("input", () => {
        const valor = precioEdit.value.replace(/[^\d]/g, "");
        precioEdit.value = formatearPesos(valor);
    });

    btnActualizar.addEventListener("click", (e) => {
        notyf.success("ay");
        e.preventDefault();
        if (!formEdit.checkValidity()) {
            formEdit.classList.add('was-validated');
            notyf.error('Campos inválidos o no llenados');
            return;
        }else{
            
        }

        const datos = new FormData(formEdit);
        fetch('/Actualizar_pro', {
            method: 'POST',
            body: datos,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            notyf.success("paso fetch");
            if (data.success) {
                notyf.success("Actualización de datos");
                formEdit.reset();
                setTimeout(() => window.location.reload(), 1000);
            } else {
                notyf.error(data.message || 'Error en la actualización');
                console.error(data);
            }
        })
        .catch(error => {
            console.error(error);
            notyf.error('Error al conectar con el servidor');
        });
    });

    btnVaciar.addEventListener("click", () => formEdit.reset());
});
