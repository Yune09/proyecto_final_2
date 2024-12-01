<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaAveriasController extends Controller
{
    public function index()
    {
        return view('agenda_averias');
    }

    public function consultarTecnicos(Request $request)
    {
        // Datos simulados (esto se puede reemplazar con datos dinámicos de la base de datos)
        $tecnicosData = [
            [
                'tecnico' => 'Carlos Zuñiga',
                'dia' => 'Lunes',
                'horario' => '9:00 a.m. - 12:00 p.m.'
            ],
            [
                'tecnico' => 'Luis Castro',
                'dia' => 'Martes',
                'horario' => '1:00 p.m. - 4:00 p.m.'
            ],
            [
                'tecnico' => 'David Ramírez',
                'dia' => 'Miércoles',
                'horario' => '10:00 a.m. - 1:00 p.m.'
            ]
        ];

        // Retornar la lista de técnicos como JSON
        return response()->json($tecnicosData);
    }
}
