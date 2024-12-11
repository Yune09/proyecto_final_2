<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Verifica que la ruta del CSS sea correcta -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Incluyendo Font Awesome para los iconos -->
</head>
<body>
    <div class="form-container">
        <h2>Registro de Usuario</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="input-group">
            <label for="username"><i class="fas fa-user input-icon"></i> Nombre de usuario</label>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
       

        <!-- Email Address -->
        <div class="input-group">
            <label for="email"><i class="fas fa-envelope input-icon"></i> Correo electrónico</label>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
       

        <!-- Password -->
        <div class="input-group">
            <label for="password"><i class="fas fa-lock input-icon"></i> Contraseña</label>
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="input-group">
            <label for="confirmPassword"><i class="fas fa-lock input-icon"></i> Confirmar contraseña</label>
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
       

        <!-- Role Selection -->
        <div class="input-group">
            <label for="role">
                <i class="fas fa-user-tag input-icon"></i>
                Rol
            </label>
            <select id="role" required>
                <option value="">Seleccionar</option>
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
            <a style="text-decoration: none;" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('Ya se ha registrado?') }}
            </a>

        </div>
    </form>
</body>
</html>