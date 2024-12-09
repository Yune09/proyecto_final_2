<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Averías</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Contenedor principal centrado */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 60px 20px; /* Espacio adicional en la parte superior */
            text-align: center;
        }

        /* Estilos para el contenedor del título y subtítulo */
        .page-title-container {
            background-color: rgba(0, 0, 0, 0.6); /* Fondo semitransparente */
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .page-title-container h1 {
            font-size: 2em;
            margin: 0;
        }

        .page-title-container p {
            color: #e0e0e0; /* Color gris claro para contraste */
            font-size: 1.2em;
            margin-top: 10px;
        }

        /* Estilos adicionales para el mapa */
        .map-container {
            height: 300px;
            width: 100%;
            border-radius: 10px;
            margin: 30px 0; /* Espacio extra alrededor del mapa */
            background-color: #f0f0f0;
        }

        /* Estilos para el cuadro de averías */
        .averias-info {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            text-align: center; /* Centrar el texto */
        }

        .averias-info table {
            width: 100%;
            margin: 0 auto; /* Centrar la tabla */
            border-collapse: collapse;
        }

        .averias-info th, .averias-info td {
            padding: 10px;
            text-align: center; /* Centrar el texto de cada celda */
        }

        /* Botón centrado */
        .averias-info button {
            display: block;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .averias-info button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Menú de navegación superior completo -->
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
                    <li><a href="{{ route('plan_detalles', ['plan' => 'internet150GB']) }}"><i class="fas fa-network-wired"></i> Internet 150 Mbps</a></li>
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
            <li><a href="soporte.html"><i class="fas fa-headset"></i> Soporte</a></li>
            <li><a href="pago_factura.html"><i class="fas fa-money-bill-wave"></i> Pago Factura</a></li>
            <li id="login-link"><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a></li>
            <li id="register-link"><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registrarse</a></li>
        </ul>
    </nav>

    <!-- Contenedor principal centrado -->
    <div class="container">
        <!-- Título de la página con fondo y subtítulo -->
        <div class="page-title-container">
            <h1>Averías Activas</h1>
            <p>A continuación, se muestra el estado de las averías confirmadas en las distintas comunidades afectadas.</p>
        </div>

        <!-- Mapa de Averías -->
        <div class="map-container" id="map"></div>

        <!-- Cuadro Informativo de Averías Reportadas -->
        <div class="averias-info">
            <h2>Averías Confirmadas</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre del Lugar</th>
                        <th>Número de Avería</th>
                        <th>Tipo de Avería</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($averias as $averia)
                        <tr>
                            <td>{{ $averia->Nombre }}</td> 
                            <td>{{ $averia->idReporte_averia }}</td> 
                            <td>{{ $averia->Descripcion }}</td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>*Estimaciones sujetas a imprevistos en la zona de reparación</p>

            <!-- Botón para reportar una nueva avería -->
            <button onclick="location.href='{{ route('reportar_averia') }}'">Reportar Avería</button>
        </div>
    </div>

    <!-- Script de Google Maps -->
    <script>
        let map;

        // Función para inicializar el mapa
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 9.748917, lng: -83.753428 }, // Centro en Costa Rica
                zoom: 15
            });
        
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzXKfX2DHS1_xKCK5iDM0FUXGZO3WCL64&callback=initMap">
    </script>

</body>
</html>
