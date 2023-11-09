<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HistorialController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('equipos', EquipoController::class);
Route::resource('edithe', HistorialController::class);

Route::get('/detalles/{equipo}', [EquipoController::class, 'verDetalles']);

Route::get('/historial/{equipo}', [HistorialController::class, 'index'])->name('historial.index');
Route::post('/historial/{equipo}/store', [HistorialController::class, 'store'])->name('historial.store');
Route::get('/historial/{equipo}/edit/{historial}', [HistorialController::class, 'edit'])->name('historial.edit');
Route::get('/historial/{equipo}/update/{historial}', [HistorialController::class, 'update'])->name('historial.update');
Route::delete('/historial/{equipo}/{historial}', [HistorialController::class, 'destroy'])->name('historial.destroy');



// Otras rutas...




// ...
