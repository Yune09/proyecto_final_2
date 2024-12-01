<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportarController extends Controller
{
    // Método para mostrar la vista de reportar averías
    public function index()
    {
        return view('reportar_averia'); 
    }

}
