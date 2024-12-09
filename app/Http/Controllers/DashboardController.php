<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
    {
        // Verifica si el usuario está autenticado
        if (!auth()->check()) {
            return redirect('/login'); // Redirige a la página de inicio de sesión si no está autenticado
        }

        // Verifica el rol del usuario
        if (auth()->user()->role === 'administrador') {
            return view('dashboard_admi'); // Vista del dashboard para administradores
        } else {
            return view('dashboard'); // Vista del dashboard para usuarios normales
        }
    }
}
