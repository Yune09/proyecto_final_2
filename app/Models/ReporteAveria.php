<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use HasFactory;

class ReporteAveria extends Model
{

    protected $table = 'reporte_averia'; // Nombre de la tabla
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Cedula',
        'Correo',
        'Telefono',
        'Descripcion',
        'Ubicacion',
    ];
}
