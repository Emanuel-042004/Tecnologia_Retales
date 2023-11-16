<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ImpresoraController;
use App\Http\Controllers\HistorialImpresoraController;
use App\Http\Controllers\CelularController;
use App\Http\Controllers\HistorialCelularController;
use App\Http\Controllers\TelefonoController;

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

Route::resource('impresoras', ImpresoraController::class, ['parameters' => [
    'impresoras' => 'impresora'
]]);

Route::get('/{impresora}/historial', [HistorialImpresoraController::class, 'index'])->name('impresoras.historial.index');
Route::post('/{impresora}/historial', [HistorialImpresoraController::class, 'store'])->name('impresoras.historial.store');
Route::get('/{impresora}/historial/{historialImpresora}/edit', [HistorialImpresoraController::class, 'edit'])->name('impresoras.historial.edit');
Route::get('/{impresora}/historial/{historialImpresora}', [HistorialImpresoraController::class, 'update'])->name('impresoras.historial.update');
Route::delete('/{impresora}/historial/{historialImpresora}', [HistorialImpresoraController::class, 'destroy'])->name('impresoras.historial.destroy');



Route::resource('celulares', CelularController::class, ['parameters' => [
    'celulares' => 'celular'
]]);
 

Route::get('/celulares/{celular}/historial', [HistorialCelularController::class, 'index'])->name('celulares.historial.index');

Route::post('/celulares/{celular}/historial', [HistorialCelularController::class, 'store'])->name('celulares.historial.store');
Route::get('/celulares/{celular}/historial/{historialCelular}/edit', [HistorialCelularController::class, 'edit'])->name('celulares.historial.edit');
Route::get('/celulares/{celular}/historial/{historialCelular}', [HistorialCelularController::class, 'update'])->name('celulares.historial.update');
Route::delete('/celulares/{celular}/historial/{historialCelular}', [HistorialCelularController::class, 'destroy'])->name('celulares.historial.destroy');

Route::resource('telefonos', TelefonoController::class, ['parameters' => [
    'telefonos' => 'telefono'
]]);

/*Route::get('/telefonos/{telefono}/historial', [HistorialTelefonoController::class, 'index'])->name('telefonos.historial.index');
Route::post('/telefonos/{telefono}/historial', [HistorialTelefonoController::class, 'store'])->name('telefonos.historial.store');
Route::get('/telefonos/{telefono}/historial/{historialTelefono}/edit', [HistorialTelefonoController::class, 'edit'])->name('telefonos.historial.edit');
Route::get('/telefonos/{telefono}/historial/{historialTelefono}', [HistorialTelefonoController::class, 'update'])->name('telefonos.historial.update');
Route::delete('/telefonos/{telefono}/historial/{historialTelefono}', [HistorialTelefonoController::class, 'destroy'])->name('telefonos.historial.destroy');*/