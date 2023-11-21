<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HistorialEquipoController;
use App\Http\Controllers\ImpresoraController;
use App\Http\Controllers\HistorialImpresoraController;
use App\Http\Controllers\CelularController;
use App\Http\Controllers\HistorialCelularController;
use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\HistorialTelefonoController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\SearchController;

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

//Route::get('/', [EquipoController::class, 'index']);

Route::get('/', function () {
    return view('inicio');
})->name('bienvenida');


Route::resource('equipos', EquipoController::class);

Route::resource('equipos.historial', HistorialEquipoController::class)->except(['create', 'show']);
Route::get('/equipos/detalles/{equipo}', [EquipoController::class, 'verDetalles']);

// Si aún necesitas rutas específicas para HistorialEquipoController, puedes agregarlas aquí
Route::get('/equipos/historial/{equipo}', [HistorialEquipoController::class, 'index'])->name('historial.index');
Route::post('/equipos/historial/{equipo}/store', [HistorialEquipoController::class, 'store'])->name('historial.store');
Route::get('/equipos/historial/{equipo}/edit/{historial}', [HistorialEquipoController::class, 'edit'])->name('historial.edit');
Route::get('/equipos/historial/{equipo}/update/{historial}', [HistorialEquipoController::class, 'update'])->name('historial.update');
Route::delete('/equipos/historial/{equipo}/{historial}', [HistorialEquipoController::class, 'destroy'])->name('historial.destroy');

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

Route::get('/telefonos/{telefono}/historial', [HistorialTelefonoController::class, 'index'])->name('telefonos.historial.index');
Route::post('/telefonos/{telefono}/historial', [HistorialTelefonoController::class, 'store'])->name('telefonos.historial.store');
Route::get('/telefonos/{telefono}/historial/{historialTelefono}/edit', [HistorialTelefonoController::class, 'edit'])->name('telefonos.historial.edit');
Route::get('/telefonos/{telefono}/historial/{historialTelefono}', [HistorialTelefonoController::class, 'update'])->name('telefonos.historial.update');
Route::delete('/telefonos/{telefono}/historial/{historialTelefono}', [HistorialTelefonoController::class, 'destroy'])->name('telefonos.historial.destroy');

// routes/web.php
Route::resource('mantenimientos', MantenimientoController::class);
Route::get('mantenimientos/{tipo}/{id}', [MantenimientoController::class, 'index'])->name('mantenimientos.index');
Route::post('mantenimientos/{tipo}/{id}', [MantenimientoController::class, 'store'])->name('mantenimientos.store');
Route::get('mantenimientos/{tipo}/{id}/edit/{mantenimientoId}', [MantenimientoController::class, 'edit'])->name('mantenimientos.edit');
Route::put('mantenimientos/{tipo}/{id}/{mantenimientoId}', [MantenimientoController::class, 'update'])->name('mantenimientos.update');
Route::delete('/mantenimientos/{tipo}/{id}/{mantenimientoId}', [MantenimientoController::class, 'destroy'])->name('mantenimientos.destroy');


Route::resource('search',SearchController::class);
Route::get('/search', [SearchController::class, 'index'])->name('search.index');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
