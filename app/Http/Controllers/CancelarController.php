<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CancelarController extends Controller
{
    // Método para mostrar la vista de cancelar averías
    public function index()
    {
        return view('cancelar_cita'); 
    }
}
