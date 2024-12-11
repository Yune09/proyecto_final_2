<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class AgendaAveriasController extends Controller
{


    public function index()
    {
        return view('agenda_averias');
    }

    public function consultarTecnicos()
{
    // Consulta para obtener los datos de la tabla 'tecnicos'
    $tecnicos = DB::table('tecnicos')->get();

    // Retorna los datos como respuesta JSON
    return response()->json($tecnicos);
}
}
