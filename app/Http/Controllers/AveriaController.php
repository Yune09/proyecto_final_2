<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReporteAveria;

class AveriaController extends Controller
{
    public function guardarAveria(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:50',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string', 
        ]);

        // Guardar en la base de datos
        $averia = new ReporteAveria();
        $averia->Nombre = $request->nombre;
        $averia->Cedula = $request->cedula;
        $averia->Correo = $request->correo;
        $averia->Telefono = $request->telefono;
        $averia->Descripcion = $request->descripcion;
        $averia->Ubicacion = $request->ubicacion;
        $averia->save();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Avería reportada exitosamente.');

        
    }
    // Método para mostrar las averías confirmadas y el mapa
    public function mostrarAverias()
    {
        // Obtener todas las averías desde la base de datos
        $averias = ReporteAveria::all();

        // Retornar la vista con las averías
        return view('mapa_con_averias', compact('averias'));
    }
}