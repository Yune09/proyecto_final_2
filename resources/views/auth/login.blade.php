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
    <!-- Session Status -->
    <h2>Iniciar sesión</h2>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-group">
            <label for="username">
                <i class="fas fa-user input-icon"></i>
                Ingresar correo
            </label>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        

        <!-- Password -->
        <div class="input-group">
            <label for="password">
                <i class="fas fa-lock input-icon"></i>
                Ingresar contraseña
            </label>
            <x-text-input id="password" class="block mt-1 w-full"
            type="password"
            name="password"
            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordarme') }}</span>
            </label>
        </div>
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
            <x-primary-button class="ms-3">
                {{ __('Ingresar') }}
            </x-primary-button>
        
            @if (Route::has('password.request'))
                <a style="text-decoration: none;" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Olvido su contraseña?') }}
                </a>
            @endif
        
            <a href="{{ route('register') }}" style="text-decoration: none;color:#2196F3;">Registrarse</a>
        </div>
        
    </form>
</div>
</body>
</html>