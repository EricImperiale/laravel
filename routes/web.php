<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PropietariosController;
use App\Http\Middleware\VerificarAutenticacion;
use App\Http\Controllers\InquilinoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\GaranteController;

Route::get('/', [AuthController::class, 'formLogin'])
    ->name('auth.formLogin');
Route::get('/iniciar-sesion', [AuthController::class, 'formLogin'])
    ->name('auth.formLogin');

Route::get('iniciar-sesion', [AuthController::class, 'formLogin'])
    ->name('auth.formLogin');
Route::post('iniciar-sesion', [AuthController::class, 'processLogin'])
    ->name('auth.processLogin');
Route::post('cerrar-sesion', [AuthController::class, 'processLogout'])
    ->name('auth.processLogout')
    ->middleware(VerificarAutenticacion::class);

Route::get('propietarios', [PropietariosController::class, 'index'])
    ->name('propietarios.index')
    ->middleware(VerificarAutenticacion::class);
Route::get('propietarios/crear', [PropietariosController::class, 'formCreate'])
    ->name('propietarios.formCreate')
    ->middleware(VerificarAutenticacion::class);
Route::post('propietarios/crear', [PropietariosController::class, 'processCreate'])
    ->name('propietarios.processCreate')
    ->middleware(VerificarAutenticacion::class);
Route::get('propietarios/{id}/editar', [PropietariosController::class, 'formUpdate'])
    ->name('propietarios.formUpdate')
    ->middleware(VerificarAutenticacion::class);
Route::post('propietarios/{id}/editar', [PropietariosController::class, 'processUpdate'])
    ->name('propietarios.processUpdate')
    ->middleware(VerificarAutenticacion::class);
Route::get('propietarios/{id}/eliminar', [PropietariosController::class, 'formDelete'])
    ->name('propietarios.formDelete')
    ->middleware(VerificarAutenticacion::class);
Route::post('propietarios/{id}/eliminar', [PropietariosController::class, 'processDelete'])
    ->name('propietarios.processDelete')
    ->middleware(VerificarAutenticacion::class);

Route::get('inquilinos', [InquilinoController::class, 'index'])
    ->name('inquilinos.index')
    ->middleware(VerificarAutenticacion::class);
Route::get('inquilinos/crear', [InquilinoController::class, 'formCreate'])
    ->name('inquilinos.formCreate')
    ->middleware(VerificarAutenticacion::class);
Route::post('inquilinos/crear', [InquilinoController::class, 'processCreate'])
    ->name('inquilinos.processCreate')
    ->middleware(VerificarAutenticacion::class);
Route::get('inquilinos/{id}/editar', [InquilinoController::class, 'formUpdate'])
    ->name('inquilinos.formUpdate')
    ->middleware(VerificarAutenticacion::class);
Route::post('inquilinos/{id}/editar', [InquilinoController::class, 'processUpdate'])
    ->name('inquilinos.processUpdate')
    ->middleware(VerificarAutenticacion::class);
Route::get('inquilinos/{id}/eliminar', [InquilinoController::class, 'formDelete'])
    ->name('inquilinos.formDelete')
    ->middleware(VerificarAutenticacion::class);
Route::post('inquilinos/{id}/eliminar', [InquilinoController::class, 'processDelete'])
    ->name('inquilinos.processDelete')
    ->middleware(VerificarAutenticacion::class);
Route::get('inquilinos/{id}/contratos', [InquilinoController::class, 'viewContract'])
    ->name('inquilinos.viewContract')
    ->middleware(VerificarAutenticacion::class);

Route::get('garantes', [GaranteController::class, 'index'])
    ->name('garantes.index')
    ->middleware(VerificarAutenticacion::class);
Route::get('garantes/crear', [GaranteController::class, 'formCreate'])
    ->name('garantes.formCreate')
    ->middleware(VerificarAutenticacion::class);
Route::post('garantes/crear', [GaranteController::class, 'processCreate'])
    ->name('garantes.processCreate')
    ->middleware(VerificarAutenticacion::class);
Route::get('garantes/{id}/editar', [GaranteController::class, 'formUpdate'])
    ->name('garantes.formUpdate')
    ->middleware(VerificarAutenticacion::class);
Route::post('garantes/{id}/editar', [GaranteController::class, 'processUpdate'])
    ->name('garantes.processUpdate')
    ->middleware(VerificarAutenticacion::class);
Route::get('garantes/{id}/eliminar', [GaranteController::class, 'formDelete'])
    ->name('garantes.formDelete')
    ->middleware(VerificarAutenticacion::class);
Route::post('garantes/{id}/eliminar', [GaranteController::class, 'processDelete'])
    ->name('garantes.processDelete')
    ->middleware(VerificarAutenticacion::class);

Route::get('contratos', [ContratoController::class, 'index'])
    ->name('contratos.index')
    ->middleware(VerificarAutenticacion::class);
Route::get('contratos/crear', [ContratoController::class, 'formCreate'])
    ->name('contratos.formCreate')
    ->middleware(VerificarAutenticacion::class);
Route::post('contratos/crear', [ContratoController::class, 'processCreate'])
    ->name('contratos.processCreate')
    ->middleware(VerificarAutenticacion::class);
Route::get('contratos/{id}/editar', [ContratoController::class, 'formUpdate'])
    ->name('contratos.formUpdate')
    ->middleware(VerificarAutenticacion::class);
Route::post('contratos/{id}/editar', [ContratoController::class, 'processUpdate'])
    ->name('contratos.processUpdate')
    ->middleware(VerificarAutenticacion::class);
Route::get('contratos/{id}/eliminar', [ContratoController::class, 'formDelete'])
    ->name('contratos.formDelete')
    ->middleware(VerificarAutenticacion::class);
Route::post('contratos/{id}/eliminar', [ContratoController::class, 'processDelete'])
    ->name('contratos.processDelete')
    ->middleware(VerificarAutenticacion::class);
