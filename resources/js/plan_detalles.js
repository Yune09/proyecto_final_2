// Obtener el parámetro de plan desde PHP
const planSeleccionado = "{{ $plan }}";

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
    const nombre = document.getElementById('name');
    const cedula = document.getElementById('cedula');
    const correo = document.getElementById('email');
    const telefono = document.getElementById('telefono');

    // Variable para comprobar si los campos están vacíos
    let valid = true;

    // Validar campos vacíos
    if (!nombre.value.trim()) {
        nombre.placeholder = 'Por favor, ingresa tu nombre y apellido';
        nombre.classList.add('input-error'); // Agregar clase para marcar el campo
        valid = false;
    } else {
        nombre.classList.remove('input-error'); // Quitar clase si el campo está lleno
    }

    if (!cedula.value.trim()) {
        cedula.placeholder = 'Por favor, ingresa tu número de cédula';
        cedula.classList.add('input-error');
        valid = false;
    } else {
        cedula.classList.remove('input-error');
    }

    if (!correo.value.trim()) {
        correo.placeholder = 'Por favor, ingresa tu correo electrónico';
        correo.classList.add('input-error');
        valid = false;
    } else {
        correo.classList.remove('input-error');
    }

    if (!telefono.value.trim()) {
        telefono.placeholder = 'Por favor, ingresa tu número de teléfono';
        telefono.classList.add('input-error');
        valid = false;
    } else {
        telefono.classList.remove('input-error');
    }

    // Si no hay campos vacíos
    if (valid) {
        // Simular el envío del correo
        console.log(`Enviando correo con los datos:
            Nombre: ${nombre}
            Cédula: ${cedula}
            Correo: ${correo}
            Teléfono: ${telefono}
            Plan seleccionado: ${planes[planSeleccionado].nombre}
        `);
        

        // Mostrar la burbuja de confirmación
        const mensajeConfirmacion = document.getElementById('mensaje-confirmacion');
        mensajeConfirmacion.style.display = 'block';

        // Hacer que la burbuja desaparezca después de 2 segundos
        setTimeout(() => {
            mensajeConfirmacion.style.opacity = 1;
            mensajeConfirmacion.style.transition = 'opacity 1s';
            mensajeConfirmacion.style.opacity = 0;
        }, 1000);

        // Quitar completamente el mensaje del DOM después de la animación
        setTimeout(() => {
            mensajeConfirmacion.style.display = 'none';
            mensajeConfirmacion.style.opacity = 1; // Restablecer para el próximo uso
        }, 2000);

        // Limpiar los campos de entrada del usuario, pero dejar la información del plan
        nombre.value = '';
        cedula.value = '';
        correo.value = '';
        telefono.value = '';
    }
});