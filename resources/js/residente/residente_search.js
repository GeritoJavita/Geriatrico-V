


document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');
    const tbody = document.getElementById('residentes-tbody');
    let timeout = null;

    if (!searchInput || !tbody) return;

    searchInput.addEventListener('input', function() {
        clearTimeout(timeout);
        
        const searchValue = this.value.trim();


        timeout = setTimeout(() => {
            const url = window.location.pathname + '?search=' + encodeURIComponent(searchValue);
            
            fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    actualizarTabla(data.residentes);
                }
            })
            .catch(error => console.error('Error en búsqueda:', error));
        }, 300);
    });

    function actualizarTabla(residentes) {
        if (residentes.length === 0) {
            tbody.innerHTML = '<tr><td colspan="8">No se encontraron residentes.</td></tr>';
            return;
        }

        tbody.innerHTML = residentes.map(residente => `
            <tr data-id="${residente.id}">
                <td class="id">${residente.id}</td>
                <td class="nombre">${residente.nombre} ${residente.apellido}</td>
                <td class="edad">${residente.edad || 'N/A'}</td>
                <td class="genero">${residente.genero}</td>
                <td class="habitacion">${residente.habitacion || 'N/A'}</td>
                <td class="cama">${residente.cama || 'N/A'}</td>
                <td class="fecha_ingreso">${residente.fecha_ingreso}</td>
                <td>
                    <button type="button" class="btn btn-edit">Ver</button>
                </td>
            </tr>
        `).join('');
    }
});