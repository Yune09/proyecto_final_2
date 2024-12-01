<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Averías</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <!-- Menú de navegación superior -->
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
                    <li><a href="{{ route('mapa_con_averias') }}"><i class="fas fa-exclamation-triangle"></i> Reportar Avería </a></li>
                    <li><a href="{{ route('agenda_averias') }}"><i class="fas fa-calendar-check"></i> Agendar de Averías </a></li>
                    <li><a href="{{ route('agenda_instalaciones') }}"><i class="fas fa-calendar-check"></i> Agenda de instalaciones</a></li>
                    <li><a href="{{ route('cancelar_cita') }}"><i class="fas fa-times-circle"></i> Cancelar  Cita</a></li>
                </ul>
            </li>
            
            <li><a href="soporte.html"><i class="fas fa-headset"></i> Soporte </a></li>

            <li><a href="pago_factura.html"><i class="fas fa-money-bill-wave"></i> Pago Factura </a></li>    <!-- Sección de pago de factura, requerimiento a futuro -->
    
            <!-- Estas opciones se muestran cuando no se ha iniciado sesión -->
            <li id="login-link"><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a></li>
            <li id="register-link"><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registrarse</a></li>
    
            <!-- Estas opciones se muestran cuando el usuario ha iniciado sesión -->
            <li id="user-info" class="user-info" style="display: none;">
                <a href="#"><i class="fas fa-user"></i> <span id="user-name"></span></a>
            </li>
            <li id="logout-link" style="display: none;"><a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
        </ul>
    </nav>

    




    <script>
        function getQueryParams() {
            const params = new URLSearchParams(window.location.search);
            return {
                cedula: params.get('cedula'),
                fecha: params.get('fecha'),
                hora: params.get('hora'),
                provincia: params.get('provincia'),
                
            };
        }

        window.onload = function() {
            const datos = getQueryParams();
            document.getElementById('cedula').textContent = datos.cedula;
            document.getElementById('fecha').textContent = datos.fecha;
            document.getElementById('hora').textContent = datos.hora;
            document.getElementById('provincia').textContent = datos.provincia;
        }; 
    </script>
</body>
</html>


    
    <!-- Contenedor para la Agenda de Averías -->
    <div class="agenda-container">
        <h1>Confirmación de Avería</h1>
        <form id="averia-form">

            

            <p><strong>Identificación:</strong> <span id="indetificacion"></span></p>
            <p><strong>Nombre:</strong> <span id="nombre"></span></p>
            <p><strong>Fecha:</strong> <span id="fecha"></span></p>
            <p><strong>Hora:</strong> <span id="hora"></span></p>
            <p><strong>Dirección:</strong> <span id="direccion"></span></p>

        

            <label for="Telefono">Telefono</label>
            <input type="text" id="telefono" placeholder="Número de telefono">
            <label for="Correo">Correo</label>
            <input type="text" id="Correo" placeholder="Correo Electrónico">

            <button onclick="location.href='{{ route('averia_confirmada') }}'">Confirmar</button>


        </form>


    </div>


</body>
</html>