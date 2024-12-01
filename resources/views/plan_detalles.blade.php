<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Plan</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <nav class="top-nav">
        <ul id="menu-items">
            <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Inicio</a></li>
            <li class="submenu-container">
                <a href="#"><i class="fas fa-wifi"></i> Planes de Servicio</a>
                <ul class="submenu">
                    <li><a href="{{ route('plan_detalles', ['plan' => 'internet100']) }}"><i class="fas fa-signal"></i> Internet 100 Mbps</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'tvInternet']) }}"><i class="fas fa-tv"></i> Paquete TV + Internet</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'movil10GB']) }}"><i class="fas fa-mobile-alt"></i> Móvil 10GB</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'movilPrepago5GB']) }}"><i class="fas fa-sim-card"></i> Móvil Prepago 5GB</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'internet150']) }}"><i class="fas fa-network-wired"></i> Internet 150 Mbps</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'tvInternetMovil']) }}"><i class="fas fa-tv"></i> Paquete TV + Internet + Móvil</a></li>
                </ul>
            </li>
            <!-- Submenú de Visitas Técnicas -->
            <li class="submenu-container">
                <a href="#"><i class="fas fa-tools"></i> Visitas Técnicas</a>
                <ul class="submenu">
                    <li><a href="{{ route('mapa_con_averias') }}"><i class="fas fa-exclamation-triangle"></i> Reportar Avería</a></li>
                    <li><a href="{{ route('agenda_averias') }}"><i class="fas fa-calendar-check"></i> Agendar de Avería </a></li>
                    <li><a href="{{ route('agenda_instalaciones') }}"><i class="fas fa-calendar-check"></i> Agenda de instalaciones</a></li>
                    <li><a href="{{ route('cancelar_cita') }}"><i class="fas fa-times-circle"></i> Cancelar Cita</a></li>
                </ul>
            </li>
            <li><a href="soporte.html"><i class="fas fa-headset"></i> Ayuda por WhatsApp</a></li>
            <li id="login-link"><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a></li>
            <li id="register-link"><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registrarse</a></li>
        </ul>
    </nav>

    <!-- Contenedor para los detalles del plan -->
    <div class="plan-container">
        <h1>Detalles del Plan</h1>
        <p><strong id="plan-nombre"></strong></p>
        <p id="plan-precio"></p>
        <p id="plan-descripcion"></p>

        <p><strong>Ingresa tus datos para ser contactado</strong></p>

        <!-- Formulario con el ID correcto -->
        <form id="plan-form">
            <label for="name">Nombre y Apellido</label>
            <input type="text" id="name" placeholder="Ejemplo: Yuneyry Vasquez">

            <label for="cedula">Número de Cédula</label>
            <input type="text" id="cedula" placeholder="0XXXXXXXXX">

            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" placeholder="ejemplo@correo.com">

            <label for="telefono">Número de Teléfono</label>
            <input type="tel" id="telefono" placeholder="+506 8888-8888">

            <button type="submit">Enviar Solicitud</button>
        </form>

        <!-- Contenedor para el mensaje de confirmación -->
        <p id="mensaje-confirmacion" style="display:none;">¡Correo enviado exitosamente!</p>

    </div>

    <script>
        // Obtener los parámetros de la URL para saber qué plan fue seleccionado
        const urlParams = new URLSearchParams(window.location.search);
        const planSeleccionado = urlParams.get('plan');

        const planes = {
            'internet100': {
                nombre: 'Internet 100 Mbps',
                precio: '₡20,000',
                descripcion: 'Disfruta de 100 Mbps de velocidad para navegar sin límites en todos tus dispositivos.'
            },
            'tvInternet': {
                nombre: 'Paquete TV + Internet',
                precio: '₡15,000',
                descripcion: 'Acceso a TV con más de 100 canales y 50 Mbps de velocidad de Internet.'
            },
            'movil10GB': {
                nombre: 'Móvil 10GB',
                precio: '₡12,000',
                descripcion: 'Plan móvil con 10GB de datos para navegar, llamadas y mensajes ilimitados.'
            },
            'movilPrepago5GB': {
                nombre: 'Móvil Prepago 5GB',
                precio: '₡5,000',
                descripcion: 'Plan móvil prepago con 5GB de datos para navegar y llamadas nacionales.'
            },
            'internet150': {
                nombre: 'Internet 150 Mbps',
                precio: '₡29,000',
                descripcion: 'Internet con velocidad de 150 Mbps para descargar, jugar y hacer streaming sin interrupciones.'
            },
            'tvInternetMovil': {
                nombre: 'Paquete TV + Internet + Móvil',
                precio: '₡35,000',
                descripcion: 'El paquete más completo con más de 100 canales de TV, 50 Mbps de Internet y plan móvil con datos ilimitados.'
            }
        };

        // Mostrar la información del plan seleccionado
        if (planSeleccionado && planes[planSeleccionado]) {
            document.getElementById('plan-nombre').textContent = planes[planSeleccionado].nombre;
            document.getElementById('plan-precio').textContent = 'Precio: ' + planes[planSeleccionado].precio;
            document.getElementById('plan-descripcion').textContent = planes[planSeleccionado].descripcion;
        }

        // Lógica para manejar el envío del formulario y mostrar mensaje de confirmación
        document.getElementById('plan-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita que el formulario recargue la página

            // Obtener los valores del formulario
            const nombre = document.getElementById('name').value;
            const cedula = document.getElementById('cedula').value;
            const correo = document.getElementById('email').value;
            const telefono = document.getElementById('telefono').value;

            // Validar campos vacíos
            if (!nombre || !cedula || !correo || !telefono) {
                alert('Por favor completa todos los campos.');
                return; // Salir si no están todos los campos llenos
            }

            // Simular el envío del correo
            console.log(`Enviando correo con los datos:
                Nombre: ${nombre}
                Cédula: ${cedula}
                Correo: ${correo}
                Teléfono: ${telefono}
                Plan seleccionado: ${planes[planSeleccionado].nombre}
            `);

            // Mostrar el mensaje de confirmación
            document.getElementById('mensaje-confirmacion').style.display = 'block';

            // Limpiar los campos de entrada del usuario, pero dejar la información del plan
            document.getElementById('name').value = '';
            document.getElementById('cedula').value = '';
            document.getElementById('email').value = '';
            document.getElementById('telefono').value = '';
        });
    </script>

</body>
</html>