<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HorarioTecnicoController extends Controller
{
    public function index()
    {
        return view('horario_tecnicos'); 
    }
}
