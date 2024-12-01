<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Estilos para la sección de bienvenida */
        .welcome-section {
            background-color: rgba(0, 0, 0, 0.6); /* Fondo negro semitransparente */
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            max-width: 800px;
            margin: 20px auto; /* Centrado de la sección */
        }
        
        /* Estilos para el título y subtítulo */
        .main-title {
            font-size: 2em;
            margin-bottom: 10px;
        }
        
        .subtitle {
            font-size: 1.2em;
            color: #e0e0e0;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <nav class="top-nav">
        <ul id="menu-items">
            <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Inicio</a></li>
            <li class="submenu-container">
                <a href="{{ route('plan_detalles') }}"><i class="fas fa-wifi"></i> Planes de Servicio</a>
                <ul class="submenu">
                    <li><a href="{{ route('plan_detalles', ['plan' => 'internet100']) }}">
    <i class="fas fa-signal"></i> Internet 100 Mbps
</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'tvInternet']) }}"><i class="fas fa-tv"></i> Paquete TV + Internet</a>
                    </li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'movil10GB']) }}"><i class="fas fa-mobile-alt"></i> Móvil 10GB</a>
                    </li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'movilPrepago5GB']) }}"><i class="fas fa-sim-card"></i> Móvil Prepago
                            5GB</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'internet150GB']) }}"><i class="fas fa-network-wired"></i> Internet 150
                            Mbps</a></li>
                    <li><a href="{{ route('plan_detalles', ['plan' => 'tvInternetMovil']) }}"><i class="fas fa-tv"></i> Paquete TV +
                            Internet + Móvil</a></li>
                </ul>
            </li>
  <!-- Submenú de Visitas Técnicas -->
  <li class="submenu-container">
    <a href="#"><i class="fas fa-tools"></i> Visitas Técnicas</a>
    <ul class="submenu">
        <li><a href="{{ route('mapa_con_averias') }}"><i class="fas fa-exclamation-triangle"></i>  Reportar Avería  </a></li>
        <li><a href="{{ route('agenda_averias') }}"><i class="fas fa-calendar-check"></i>Agenda de Averías</a></li>
        <li><a href="{{ route('agenda_instalaciones') }}"><i class="fas fa-calendar-check"></i> Agenda de instalaciones</a></li>
        <li><a href="{{ route('cancelar_cita') }}"><i class="fas fa-times-circle"></i> Cancelar Cita</a></li>
    </ul>
</li>



            <li><a href="soporte.html"><i class="fas fa-headset"></i> Soporte </a></li>

            <li><a href="pago_factura.html"><i class="fas fa-money-bill-wave"></i> Pago Factura </a></li>
            <!-- Sección de pago de factura, requerimiento a futuro -->

            <!-- Estas opciones se muestran cuando no se ha iniciado sesión -->
            <li id="login-link"><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a></li>
            <li id="register-link"><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registrarse</a></li>

            <!-- Estas opciones se muestran cuando el usuario ha iniciado sesión -->
            <li id="user-info" class="user-info" style="display: none;">
                <a href="#"><i class="fas fa-user"></i> <span id="user-name"></span></a>
            </li>
            <li id="logout-link" style="display: none;"><a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar
                    Sesión</a></li>
        </ul>
    </nav>

    <!-- Sección de bienvenida -->
    <section class="welcome-section">
        <h1 class="main-title">Bienvenido a nuestra plataforma</h1>
        <h2 class="subtitle">Soluciones avanzadas en telecomunicaciones</h2>
    </section>

    <!-- Sección de planes -->
    <h2 class="section-title">Nuestros Planes</h2>
    <section class="highlighted-plans">
        <div class="plan" onclick="location.href='{{ route('plan_detalles', ['plan' => 'internet100']) }}'">
            <i class="fas fa-wifi"></i>
            <h3>Internet 100 Mbps</h3>
            <p>Precio: ₡20,000</p>
        </div>
        <div class="plan" onclick="location.href='{{ route('plan_detalles', ['plan' => 'tvInternet']) }}'">
            <i class="fas fa-tv"></i>
            <h3>Paquete TV + Internet</h3>
            <p>Precio: ₡15,000</p>
        </div>
        <div class="plan" onclick="location.href='{{ route('plan_detalles', ['plan' => 'movil10GB']) }}'">
            <i class="fas fa-mobile-alt"></i>
            <h3>Móvil 10GB</h3>
            <p>Precio: ₡12,000</p>
        </div>
        <div class="plan" onclick="location.href='{{ route('plan_detalles', ['plan' => 'movilPrepago5G']) }}'">
            <i class="fas fa-mobile-alt"></i>
            <h3>Móvil Prepago 5GB</h3>
            <p>Precio: ₡5,000</p>
        </div>
        <div class="plan" onclick="location.href='{{ route('plan_detalles', ['plan' => 'internet150']) }}'">
            <i class="fas fa-wifi"></i>
            <h3>Internet 150 Mbps</h3>
            <p>Precio: ₡29,000</p>
        </div>
        <div class="plan" onclick="location.href='{{ route('plan_detalles', ['plan' => 'tvInternetMovil']) }}'">
            <i class="fas fa-tv"></i>
            <h3>Paquete TV + Internet + Móvil</h3>
            <p>Precio: ₡35,000</p>
        </div>
    </section>

    <section class="services-section">
        <h2 style="text-align: center; color: #E0E0E0; font-size: 2.5em; margin-bottom: 30px;">Nuestros Servicios</h2>

        <div class="services">
            <div class="service-item" onmouseover="mostrarInfo('televisionDigital')" onmouseout="ocultarInfo()">
                <i class="fas fa-satellite-dish"></i>
                <h3>Televisión Digital</h3>
                <p>Disfruta de más de 200 canales con la mejor calidad de imagen y sonido.</p>
                <!-- Cuadro de información emergente -->
                <div class="info-box" id="info-televisionDigital">
                    <h3>Detalles del Servicio</h3>
                    <p>
                        - Más de 200 canales en alta definición, incluyendo deportes, películas y series.<br>
                        - Funcionalidades avanzadas como grabación en la nube y pausa en vivo.<br>
                        - Canales Premium disponibles como HBO, FOX y deportes internacionales.<br>
                    </p>
                </div>
            </div>

            <div class="service-item" onmouseover="mostrarInfo('internetAltaVelocidad')" onmouseout="ocultarInfo()">
                <i class="fas fa-wifi"></i>
                <h3>Internet de Alta Velocidad</h3>
                <p>Conéctate a la máxima velocidad con nuestros planes de hasta 300 Mbps.</p>
                <!-- Cuadro de información emergente -->
                <div class="info-box" id="info-internetAltaVelocidad">
                    <h3>Detalles del Servicio</h3>
                    <p>
                        - Velocidades de hasta 300 Mbps para descargas rápidas y streaming en 4K.<br>
                        - Sin límites de datos, descarga y navega sin interrupciones.<br>
                        - Incluye router Wi-Fi de última generación y control de calidad de red.
                    </p>
                </div>
            </div>

            <div class="service-item" onmouseover="mostrarInfo('planesMoviles')" onmouseout="ocultarInfo()">
                <i class="fas fa-mobile-alt"></i>
                <h3>Planes Móviles</h3>
                <p>Elige entre nuestros planes móviles con cobertura en todo el país.</p>
                <!-- Cuadro de información emergente -->
                <div class="info-box" id="info-planesMoviles">
                    <h3>Detalles del Servicio</h3>
                    <p>
                        - Planes con datos ilimitados para navegar sin preocupaciones.<br>
                        - Llamadas y mensajes ilimitados a nivel nacional.<br>
                        - Cobertura 5G en todo el país.<br>
                        - Acceso a aplicaciones de streaming sin consumir datos.<br>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cuadro para mostrar la información -->
    <div class="info-box" id="info-box">
        <h3 id="info-title">Detalles del Servicio</h3>
        <p id="info-description">Pasa el mouse sobre un servicio para ver los detalles aquí.</p>
    </div>

   <!-- Contenedor principal para Sobre Nosotros y Consultas -->
<section class="about-us-container">
    <!-- Area de consultas -->
    <div class="consultas">
        <h3>¿Tenés consultas?</h3>
        <div class="contacto-item">
            <a href="tel:123456789" target="_blank" class="social-icon"><i class="fas fa-phone"></i></a>
            <a href="tel:1693">1763</a>
        </div>
        <div class="contacto-item">
            <a href="#" target="_blank" class="social-icon"><i class="fab fa-whatsapp"></i></a>
            <a href="https://wa.me/63111693" target="_blank">6199-1763</a>
        </div>
        <div class="contacto-item">
            <a href="/sucursales" target="_blank" class="social-icon"><i class="fas fa-store"></i></a>
            <a href="/sucursales">Sucursales</a>
        </div>
    </div>
        

        <!-- Ícono de WhatsApp -->
        <a href="https://wa.me/86478654" target="_blank" class="whatsapp-icon">
            <i class="fab fa-whatsapp"></i>
            <span class="whatsapp-text">Contáctanos</span>
        </a>
        <!-- Area de consultas -->
        <!-- Sección de Sobre Nosotros -->
    <div class="about-us">
        <h2>Sobre Nosotros</h2>
        <p>
            Somos una teleoperadora líder en la industria de telecomunicaciones, ofreciendo planes de Internet, TV y
            móvil de alta calidad. Nuestro objetivo es brindar el mejor servicio a nuestros clientes con tecnología de
            vanguardia y soporte técnico altamente calificado.
        </p>
        <!-- Íconos de redes sociales -->
        <div class="social-icons">
            <a href="#" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>
            <a href="#" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank" class="social-icon"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
</section>

    </section>


    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
        // Información de los servicios
        const info = {
            'televisionDigital': {
                title: 'Televisión Digital',
                description: 'Ofrecemos más de 200 canales en alta definición, incluyendo deportes, películas y entretenimiento para toda la familia. Disfruta de funciones avanzadas como grabación en la nube y guía interactiva.'
            },
            'internetAltaVelocidad': {
                title: 'Internet de Alta Velocidad',
                description: 'Navega sin límites con nuestras conexiones de hasta 300 Mbps. Ideal para trabajar desde casa, streaming en 4K y gaming online sin interrupciones. Además, ofrecemos soporte 24/7 y actualizaciones automáticas de velocidad.'
            },
            'planesMoviles': {
                title: 'Planes Móviles',
                description: 'Nuestros planes móviles incluyen llamadas ilimitadas, mensajes de texto y datos móviles en toda la región. Con cobertura 5G en las principales ciudades y la opción de compartir datos con otros dispositivos.'
            }
        };

        // Función para mostrar la información cuando se pasa el mouse
        function mostrarInfo(servicio) {
            const infoBox = document.getElementById('info-box');
            const title = document.getElementById('info-title');
            const description = document.getElementById('info-description');

            title.textContent = info[servicio].title;
            description.textContent = info[servicio].description;

            infoBox.style.display = 'block'; // Muestra el cuadro de información
        }

        // Función para ocultar la información cuando se quita el mouse
        function ocultarInfo() {
            const infoBox = document.getElementById('info-box');
            infoBox.style.display = 'none'; // Oculta el cuadro de información
        }
    </script>
</body>

</html>