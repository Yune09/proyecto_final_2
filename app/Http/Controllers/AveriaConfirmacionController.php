<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AveriaConfirmacionController extends Controller
{
    // Método para mostrar la vista de agendar averías confirmacion
    public function index()
    {
        return view('averias_confirmacion'); 
        


        
    }
    

}
