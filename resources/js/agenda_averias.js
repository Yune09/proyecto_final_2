document.getElementById('agenda-form').addEventListener('click', function () {
    const container = document.getElementById('averias-table-container');

    // Verificar si la tabla está visible y ocultarla si es necesario
    if (container.innerHTML) {
        container.innerHTML = ''; // Ocultar la tabla al hacer clic si ya está visible
        return;
    }

    // Datos simulados de técnicos y horarios
    const tecnicosData = [
        {
            tecnico: 'Carlos Zuñiga',
            dia: 'Lunes',
            horario: '9:00 a.m. - 12:00 p.m.'
        },
        {
            tecnico: 'Luis Castro',
            dia: 'Martes',
            horario: '1:00 p.m. - 4:00 p.m.'
        },
        {
            tecnico: 'David Ramírez',
            dia: 'Miércoles',
            horario: '10:00 a.m. - 1:00 p.m.'
        }
    ];

    // Crear la estructura de la tabla
    let tableHTML = `
        <h2>Técnicos Disponibles</h2>
        <table>
            <thead>
                <tr>
                    <th>Técnico</th>
                    <th>Fecha</th>
                    <th>Horario</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
    `;

    // Llenar la tabla con los datos simulados
    tecnicosData.forEach(tecnico => {
        tableHTML += `
            <tr>
                <td>${tecnico.tecnico}</td>
                <td>${tecnico.dia}</td>
                <td>${tecnico.horario}</td>
                <td><button onclick="seleccionarTecnico('${tecnico.tecnico}', '${tecnico.dia}', '${tecnico.horario}')">Seleccionar</button></td>
            </tr>
        `;
    });

    tableHTML += `
            </tbody>
        </table>
        <p>*Horarios sujetos a cambios</p>
    `;

    // Insertar la tabla en el contenedor
    container.innerHTML = tableHTML;
});

// Función para manejar la selección de un técnico
function seleccionarTecnico(tecnico, dia, horario) {
    alert(`Has seleccionado al técnico ${tecnico} el día ${dia} en el horario ${horario}.`);
    window.location.href = '/averias_confirmacion';
}


