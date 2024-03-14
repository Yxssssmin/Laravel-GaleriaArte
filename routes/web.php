<?php

use App\Http\Controllers\CuadrosController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\ValoracionController;
use App\Http\Controllers\ValorMonedaController;
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

Route::get("/", [CuadrosController::class, "bienvenida"])->name("arte.bienvenida");

Route::get("/cuadros", [CuadrosController::class, "index"])->name("arte.index");

Route::get('/mostrar-formulario', [CuadrosController::class, 'mostrarFormulario'])->name('arte.mostrarFormulario');

Route::get('/detalles-cuadro/{id}', [CuadrosController::class, 'detallesCuadro'])->name('arte.detallesCuadro');

Route::post('/cuadro/{id}/votar', [ValoracionController::class, 'votar'])->name('cuadro.votar');

Route::get('/cuadro/{id}/obtener-precio-dolar', [ValorMonedaController::class, 'obtenerTipoDeCambio'])->name('cuadro.obtenerTipoDeCambio');

Route::post('/cuadro/import-item/{cuadro_id}', [EtiquetaController::class, 'importAndBindItems'])->name('etiqueta.importAndBindItems');

//  ----------------------- CRUD ------------------------------------
// ruta para añadir un cuadro
Route::post("/cuadros", [CuadrosController::class, "create"])->name("arte.create");

// ruta para modificar un cuadro
Route::post("/modificar-cuadro", [CuadrosController::class, "update"])->name("arte.update");

// ruta para añadir un cuadro
Route::get("/eliminar-cuadro-{id}", [CuadrosController::class, "delete"])->name("arte.delete");


