<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PropietariosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('iniciar-sesion', [AuthController::class, 'formLogin'])
    ->name('auth.formLogin');
Route::post('iniciar-sesion', [AuthController::class, 'processLogin'])
    ->name('auth.processLogin');
Route::post('cerrar-sesion', [AuthController::class, 'processLogout'])
    ->name('auth.processLogout');

Route::get('propietarios', [PropietariosController::class, 'index'])
    ->name('propietarios.index');
Route::get('propietarios/crear', [PropietariosController::class, 'formCreate'])
    ->name('propietarios.formCreate');
Route::post('propietarios/crear', [PropietariosController::class, 'processCreate'])
    ->name('propietarios.processCreate');
Route::get('propietarios/{id}/editar', [PropietariosController::class, 'formUpdate'])
    ->name('propietarios.formUpdate');
Route::post('propietarios/{id}/editar', [PropietariosController::class, 'processUpdate'])
    ->name('propietarios.processUpdate');
Route::get('propietarios/{id}/eliminar', [PropietariosController::class, 'formDelete'])
    ->name('propietarios.formDelete');
Route::post('propietarios/{id}/eliminar', [PropietariosController::class, 'processDelete'])
    ->name('propietarios.processDelete');

