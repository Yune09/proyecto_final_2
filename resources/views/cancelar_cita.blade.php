<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelar una Cita Previa</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <!-- Menú de navegación superior -->
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
            <!-- Submenú de Visitas Técnicas -->
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

    <!-- Contenedor para Cancelar Cita Previa -->
    <div class="cancelar-container">
        <h1>Cancelar una Cita Previa</h1>
        <p>Introduce los detalles de tu cita para proceder con la cancelación.</p>
        <form id="cancelar-form">
            <label for="cita-id">ID de la Cita</label>
            <input type="text" id="cita-id" placeholder="Ingresa el ID de la cita">

            <label for="motivo">Motivo de Cancelación</label>
            <textarea id="motivo" placeholder="Describe brevemente el motivo de la cancelación"></textarea>

            <button type="submit">Cancelar Cita</button>
        </form>
    </div>

</body>
</html>