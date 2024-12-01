<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AveriasController extends Controller
{
    /**
     * Procesa el formulario de reporte de avería y envía un correo.
     */
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
            $message->to('yune0809@hotmail.com') // Dirección fija
                    ->subject('Reporte de Avería')
                    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')) // Desde las variables de entorno
                    ->html( // Usa html() en lugar de setBody()
                        "<h1>Reporte de Avería</h1>
                        <p><strong>Nombre:</strong> {$datos['nombre']}</p>
                        <p><strong>Cédula:</strong> {$datos['cedula']}</p>
                        <p><strong>Correo Electrónico:</strong> {$datos['email']}</p>
                        <p><strong>Teléfono:</strong> {$datos['telefono']}</p>
                        <p><strong>Descripción:</strong> {$datos['descripcion']}</p>"
                    );
        });

        return redirect()->back()->with('success', '¡El formulario se envió correctamente!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Hubo un problema al enviar el correo: ' . $e->getMessage());
    }
}
    
}
