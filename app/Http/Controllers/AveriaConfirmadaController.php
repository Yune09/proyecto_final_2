<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AveriaConfirmadaController extends Controller
{
      // Método para mostrar la vista de averias confirmada
      public function index()
      {
          return view('averia_confirmada'); 
      }
}
