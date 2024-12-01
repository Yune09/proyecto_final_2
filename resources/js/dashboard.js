window.onload = function() {
    const loggedInUser = localStorage.getItem('loggedInUser');

    if (loggedInUser) {
        // Mostrar elementos para usuarios logueados
        document.getElementById('login-link').style.display = 'none';
        document.getElementById('register-link').style.display = 'none';
        document.getElementById('user-info').style.display = 'flex';
        document.getElementById('logout-link').style.display = 'flex';
        document.getElementById('user-name').textContent = loggedInUser;
    } else {
        // Mostrar elementos para usuarios no logueados
        document.getElementById('login-link').style.display = 'block';
        document.getElementById('register-link').style.display = 'block';
        document.getElementById('user-info').style.display = 'none';
        document.getElementById('logout-link').style.display = 'none';
    }

    // Función para cerrar sesión
    document.getElementById('logout-link').addEventListener('click', function() {
        localStorage.removeItem('loggedInUser');
        window.location.href = "{{ route('dashboard') }}";
    });
};
