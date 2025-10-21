import 'notyf/notyf.min.css';
import { Notyf } from 'notyf';

document.addEventListener("DOMContentLoaded", () => {
    const notyf = new Notyf({
            duration: 3500,
            position: {
                x: 'center',
                y: 'top'
            }
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
            minimumFractionDigits: 0,
        });
    }

    
    function aplicarFormatoATabla() {
        const celdasPrecio = document.querySelectorAll("td.precio");
        celdasPrecio.forEach(celda => {
            const valor = celda.textContent.trim();
            celda.textContent = formatearPesos(valor);
        });
    }

    aplicarFormatoATabla(); // Ejecutar al cargar

    editButtons.forEach(btn => {
        btn.addEventListener("click", e => {
            const fila = e.target.closest("tr");

            nombreEdit.value = fila.querySelector("td:nth-child(1)").textContent.trim();
            precioEdit.value = formatearPesos(fila.querySelector("td:nth-child(2)").textContent.trim());
            indicacionesEdit.value = fila.querySelector("td:nth-child(5)").textContent.trim();
            loteEdit.value = fila.querySelector("td:nth-child(6)").textContent.trim();
            presentacionEdit.value = fila.querySelector("td:nth-child(7)").textContent.trim();

            formEdit.scrollIntoView({ behavior: "smooth" });
        });
    });

    precioEdit.addEventListener("input", () => {
        const valor = precioEdit.value.replace(/[^\d]/g, ""); 
        precioEdit.value = formatearPesos(valor);
    });

    btnActualizar.addEventListener("click", ()=>{
        notyf.success("que pedo");
        let isValid =true; 
        if(!formEdit.checkValidity()){
            formEdit.classList.add('was-validated');
            isValid = false;
            notyf.error('Campos inválidos o no llenados');        
        }
        const datos = new FormData(formEdit);
        fetch('',{
            method: 'POST',
            body: datos,
            headers :{
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')// y esta belleza es obligatorio para proteger la app contra ataques csrf 
            },
            credentials: 'include'
        }).then(response => response.json())
        .then (data =>{
            if(data.success){
                notyf.success("Actualización de datos");
            
            }
        })
    });

   



    btnVaciar.addEventListener("click", () => {
        formEdit.reset();
    });
});
