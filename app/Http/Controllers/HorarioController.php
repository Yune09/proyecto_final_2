<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\HorarioTecnico;


class HorarioController extends Controller
{
    public function guardarHorario(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date_format:Y-m-d', 
            'horario' => 'required|date_format:H:i',
        ]);

        // Guardar en la base de datos
        $horario = new HorarioTecnico();
        $horario->nombre = $request->nombre;
        $horario->fecha = $request->fecha;
        $horario->horario = $request->horario;
        $horario->save();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Horario agregado exitosamente.');

        
    }
    public function mostrarHorario()
    {
        // Obtener todas las averías desde la base de datos
        $horarios = HorarioTecnico::all();

        // Retornar la vista con las averías
        return view('agenda_averias', compact('horarios'));
    }
  
}
