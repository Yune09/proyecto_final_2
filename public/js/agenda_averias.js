document.getElementById('consultar').addEventListener('click', function () {
    const tabla = document.getElementById('tabla-tecnicos');

    // Mostrar u ocultar la tabla
    if (tabla.style.display === 'none' || !tabla.style.display) {
        fetch('/consultar-tecnicos')
            .then(response => response.json())
            .then(data => {
                // Limpiar la tabla
                tabla.innerHTML = `
                    <tr>
                        <th>Técnico</th>
                        <th>Fecha</th>
                        <th>Horario</th>
                        <th>Acción</th>
                    </tr>
                `;

                // Agregar las filas
                data.forEach(tecnico => {
                    tabla.innerHTML += `
                        <tr>
                            <td>${tecnico.nombre}</td>
                            <td>${tecnico.fecha}</td>
                            <td>${tecnico.horario}</td>
                            <td><button class="seleccionar">Seleccionar</button></td>
                        </tr>
                    `;
                });

                // Mostrar la tabla
                tabla.style.display = 'block';
            })
            .catch(error => console.error('Error al consultar los técnicos:', error));
    } else {
        // Ocultar la tabla
        tabla.style.display = 'none';
    }
});