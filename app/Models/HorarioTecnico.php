<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use HasFactory;


class HorarioTecnico extends Model
{
    protected $table = 'tecnicos'; // Nombre de la tabla
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'fecha',
        'horario',
        
    ];

}
