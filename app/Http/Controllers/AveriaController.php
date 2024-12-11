<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReporteAveria;
use Illuminate\Support\Facades\Mail;

class AveriaController extends Controller
{
    public function enviarFormularioAveria(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:20',
            'email' => 'required|email',
            'telefono' => 'required|string|max:20',
            'descripcion' => 'required|string|max:1000',
        ]);
    
        // Capturar los datos del formulario
        $datos = [
            'nombre' => $request->input('nombre'),
            'cedula' => $request->input('cedula'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'descripcion' => $request->input('descripcion'),
        ];
    
        // Enviar el correo al destinatario fijo
        try {
            Mail::send([], [], function ($message) use ($datos) {
                $message->to('yune0809@hotmail.com') // Aquí estableces el correo fijo
                        ->subject('Reporte de Avería')
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                        ->setBody(
                            "<h1>Reporte de Avería</h1>
                            <p><strong>Nombre:</strong> {$datos['nombre']}</p>
                            <p><strong>Cédula:</strong> {$datos['cedula']}</p>
                            <p><strong>Correo Electrónico:</strong> {$datos['email']}</p>
                            <p><strong>Teléfono:</strong> {$datos['telefono']}</p>
                            <p><strong>Descripción:</strong> {$datos['descripcion']}</p>",
                            'text/html'
                        );
            });
    
            return redirect()->back()->with('success', '¡El formulario se envió correctamente!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hubo un problema al enviar el correo: ' . $e->getMessage());
        }
    }

    

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