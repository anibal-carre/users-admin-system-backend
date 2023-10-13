<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\EnlaceController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rutas para la gestión de usuarios
Route::resource('usuarios', UsuarioController::class)->except(['create', 'edit']);
Route::post('register', [UsuarioController::class, 'register']); // Ruta para el registro de usuarios
Route::put('/usuarios/idpersona', [UsuarioController::class, 'asignarIdPersona']);


// Rutas para la gestión de roles
Route::resource('roles', RoleController::class)->except(['create', 'edit']);

// Rutas para la gestión de enlaces
Route::resource('enlaces', EnlaceController::class)->except(['create', 'edit']);

// Rutas para la gestión de bitácoras
Route::resource('bitacoras', BitacoraController::class)->except(['create', 'edit']);

// Rutas para la gestión de personas
Route::resource('personas', PersonaController::class)->except(['create', 'edit']);

// Rutas para la gestión de páginas

Route::resource('paginas', PaginaController::class)->except(['create', 'edit']);



Route::post('login', [UsuarioController::class, 'login']);