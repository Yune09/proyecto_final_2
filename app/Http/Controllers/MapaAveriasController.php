<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapaAveriasController extends Controller
{
     // Método para mostrar la vista de mapa de averias
     public function index()
     {
         return view('mapa_con_averias'); 
     }
 
}
