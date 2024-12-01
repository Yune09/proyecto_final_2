<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function show($plan = null) 
    {
        // Datos de los planes
        $planes = [
            'internet_100' => ['name' => 'Internet 100 Mbps', 'description' => 'Descripción del plan de Internet 100 Mbps'],
            'paquete_tv_internet' => ['name' => 'Paquete TV + Internet', 'description' => 'Descripción del paquete TV + Internet'],
            'movil_10gb' => ['name' => 'Móvil 10GB', 'description' => 'Descripción del plan móvil de 10GB'],
            'movil_prepago_5gb' => ['name' => 'Móvil Prepago 5GB', 'description' => 'Descripción del plan móvil prepago de 5GB'],
            'internet_150' => ['name' => 'Internet 150 Mbps', 'description' => 'Descripción del plan de Internet 150 Mbps'],
            'paquete_completo' => ['name' => 'Paquete TV + Internet + Móvil', 'description' => 'Descripción del paquete completo TV + Internet + Móvil'],
        ];

        if ($plan !== null) {
            // Verificar si el plan solicitado existe
            if (!array_key_exists($plan, $planes)) {
                abort(404); // Si no existe, mostrar un error 404
            }

            // Retornar la vista con los detalles del plan encontrado
            return view('plan_detalles', ['plan' => $planes[$plan]]);
        } else {
            // Mostrar la vista de plan detalles
            return view('plan_detalles'); 
        }
    }
}
