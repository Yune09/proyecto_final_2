<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportar Avería</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            <li><a href="#"><i class="fas fa-headset"></i> Soporte</a></li>
            <li><a href="#"><i class="fas fa-money-bill-wave"></i> Pago Factura</a></li>
            <li id="login-link"><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a></li>
            <li id="register-link"><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registrarse</a></li>
        </ul>
    </nav>

    <!-- Contenedor principal -->
    <div class="averia-container">
        <h1>Reportar Avería</h1>

        <!-- Mensajes de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulario para reportar avería -->
        <form id="averia-form" action="{{ route('enviar.averia') }}" method="POST">
            @csrf
            <label for="nombre">Nombre y Apellido</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre completo" required>

            <label for="cedula">Número de Cédula</label>
            <input type="text" id="cedula" name="cedula" placeholder="0XXXXXXXXX" required>

            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>

            <label for="telefono">Número de Teléfono</label>
            <input type="tel" idnnnn="telefono" name="telefono" placeholder="+506 8888-8888" required>

            <label for="descripcion">Descripción de la Avería</label>
            <textarea id="descripcion" name="descripcion" placeholder="Describa brevemente el problema" required></textarea>

            <button type="submit">Enviar Solicitud</button>
        </form>
    </div>
</body>
</html>