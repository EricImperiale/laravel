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
Route::get('propietarios/{pi}/editar', [PropietariosController::class, 'formUpdate'])
    ->name('propietarios.formUpdate');
Route::post('propietarios/{pi}/editar', [PropietariosController::class, 'processUpdate'])
    ->name('propietarios.processUpdate');
