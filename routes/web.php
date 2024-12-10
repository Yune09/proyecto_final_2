<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\AgendaAveriasController;
use App\Http\Controllers\CancelarController;
use App\Http\Controllers\AgendaInstalacionesController;
use App\Http\Controllers\ReportarController;
use App\Http\Controllers\AveriaConfirmacionController;
use App\Http\Controllers\MapaAveriasController;
use App\Http\Controllers\AveriaConfirmadaController;
use App\Http\Controllers\AveriaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\HorarioTecnicoController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/check-mail-env', function () {
    return [
        'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
        'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),
    ];
});
//Route::post('/enviar-averia', [AveriasController::class, 'enviarFormularioAveria'])->name('enviar.averia');
Route::post('/guardar-averia', [AveriaController::class, 'guardarAveria'])->name('guardar.averia');
Route::get('/mapa_con_averias', [AveriaController::class, 'mostrarAverias'])->name('mapa_con_averias');
Route::post('/guardar-horario', [HorarioController::class, 'guardarHorario'])->name('guardar.horario');
//Route::get('/agenda_averias', [HorarioController::class, 'mostrarHorario'])->name('agenda_averias');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function() {
    Route::post('/logout', 'LogoutController@perform')->name('logout.perform');
});

require __DIR__.'/auth.php';

Route::get('/login', function () {
    return view('login');
})->name('login'); 



Route::get('/averia_confirmada', function () {
    return view('averia_confirmada');
});

Route::get('/averias_confirmacion', function () {
    return view('averias_confirmacion');
});

Route::get('/instalacion_confirmacion', function () {
    return view('instalacion_confirmacion');
});
Route::get('/instalaciones_confirmada', function () {
    return view('instalaciones_confirmada');
});





Route::get('/agenda_averias', [AgendaAveriasController::class, 'index'])->name('agenda_averias');
Route::post('/agenda_averias/consultar', [AgendaAveriasController::class, 'consultarTecnicos'])->name('agenda_averias.consultar');

Route::post('/agenda_instalaciones/consultar', [AgendaInstalacionesController::class, 'consultarTecnicos'])->name('agenda_instalaciones.consultar');

Route::get('/plan_detalles', [PlanController::class, 'show'])->name('plan_detalles');

Route::get('/agenda_instalaciones', [AgendaInstalacionesController::class, 'index'])->name('agenda_instalaciones');
Route::get('/reportar_averia', [ReportarController::class, 'index'])->name('reportar_averia');
Route::get('/cancelar_cita', [CancelarController::class, 'index'])->name('cancelar_cita');
Route::get('/averias_confirmacion', [AveriaConfirmacionController::class, 'index'])->name('averias_confirmacion');
Route::get('/averia_confirmada', [AveriaConfirmadaController::class, 'index'])->name('averia_confirmada');
Route::get('/horario_tecnicos', [HorarioTecnicoController::class, 'index'])->name('horario_tecnicos');
Route::get('/formulario_reportes', [ReporteController::class, 'index'])->name('formulario_reportes');

//Route::get('/mapa_con_averias', [MapaAveriasController::class, 'index'])->name('mapa_con_averias');