<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;


// Ruta para la página de inicio
// Route::get('/', [MascotaController::class, 'index'])->name('home');
Route::get('/', [IndexController::class, 'index']);
Route::get('/nosotros', [NosotrosController::class, 'index']);
// Rutas de recursos para 'mascotas' (CRUD)
Route::resource('mascotas', MascotaController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('citas', CitaController::class);
Route::resource('productos', ProductoController::class);
Route::resource('ventas', VentaController::class);
