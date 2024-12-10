<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Averías</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <nav class="top-nav">
        <ul id="menu-items">
            <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Inicio</a></li>
            <li class="submenu-container">
                <a href="{{ route('plan_detalles') }}"><i class="fas fa-wifi"></i> Planes de Servicio</a>
                <ul class="submenu">
                    <li><a href="{{ route('plan_detalles', ['plan' => 'internet100']) }}"><i class="fas fa-signal"></i> Internet 100 Mbps</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'tvInternet']) }}"><i class="fas fa-tv"></i> Paquete TV + Internet</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'movil10GB']) }}"><i class="fas fa-mobile-alt"></i> Móvil 10GB</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'movilPrepago5GB']) }}"><i class="fas fa-sim-card"></i> Móvil Prepago 5GB</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'internet150GB']) }}"><i class="fas fa-network-wired"></i> Internet 150 Mbps</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'tvInternetMovil']) }}"><i class="fas fa-tv"></i> Paquete TV + Internet + Móvil</a></li>
                </ul>
            </li>
            <li class="submenu-container">
                <a href="#"><i class="fas fa-tools"></i> Visitas Técnicas</a>
                <ul class="submenu">
                    <li><a href="{{ route('mapa_con_averias') }}"><i class="fas fa-exclamation-triangle"></i>Reportar Avería</a></li>
                    <li><a href="{{ route('agenda_averias') }}"><i class="fas fa-calendar-check"></i> Agendar de Averías</a></li>
                    <li><a href="{{ route('agenda_instalaciones') }}"><i class="fas fa-calendar-check"></i> Agenda de instalaciones</a></li>
                    <li><a href="{{ route('cancelar_cita') }}"><i class="fas fa-times-circle"></i> Cancelar Cita</a></li>
                </ul>
            </li>
            <li><a href="soporte.html"><i class="fas fa-headset"></i> Soporte </a></li>
            <li><a href="pago_factura.html"><i class="fas fa-money-bill-wave"></i> Pago Factura </a></li>
            <li id="login-link"><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a></li>
            <li id="register-link"><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registrarse</a></li>
            <li id="user-info" class="user-info" style="display: none;">
                <a href="#"><i class="fas fa-user"></i> <span id="user-name"></span></a>
            </li>
            <li id="logout-link" style="display: none;"><a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
        </ul>
    </nav>

    <div class="agenda-container">
        <h1>Agendar Avería</h1>
        <form>
            <label for="cedula">Número de Identificación</label>
            <input type="text" id="cedula" placeholder="0XXXXXXXXX">
            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" placeholder="Ingrese la dirección">
            <label for="fecha">Elige una fecha:</label>
            <input type="date" id="fecha" name="fecha">
            <button type="button" id="agenda-form">Consultar</button>
        </form>
        <div id="averias-table-container"></div>
    </div>

    <script>
        document.getElementById('agenda-form').addEventListener('click', function () {
            const container = document.getElementById('averias-table-container');

            // Verificar si la tabla está visible y ocultarla si es necesario
            if (container.innerHTML) {
                container.innerHTML = ''; // Ocultar la tabla al hacer clic si ya está visible
                return;
            }

            // Realizar una solicitud POST para obtener datos de técnicos
            fetch('{{ route('agenda_averias.consultar') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({})
            })
                .then(response => response.json())
                .then(data => {
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

                    // Llenar la tabla con los datos obtenidos
                    data.forEach(tecnico => {
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
                })
                .catch(error => console.error('Error:', error));
        });

        // Función para manejar la selección de un técnico
        function seleccionarTecnico(tecnico, dia, horario) {
    alert(`Has seleccionado al técnico ${tecnico} el día ${dia} en el horario ${horario}.`);
    window.location.href = '/averias_confirmacion';
    
}

    </script>
</body>
</html>