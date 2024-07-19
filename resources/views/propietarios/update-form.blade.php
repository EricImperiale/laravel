<?php
/** @var int $propietario_id */
/** @var \App\Models\Propetario $propietario */
/** @var \App\Models\PrefijoTelefonico[]|\Illuminate\Database\Eloquent\Collection $prefijo_telefonicos */

?>
@extends('app')

@section('title', 'Editar Propietario :: ' . $propietario->nombreCompleto)

@section('main')
    <section>
        <header>
            <h2>Estás editando a: <b>{{ $propietario->nombreCompleto }}</b> con DNI <b>{{ $propietario->dni }}</b></h2>
        </header>

        <form action="">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control"  value="">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control"  value="">
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" id="dni" name="dni" class="form-control"  value="">
                        <div class="form-text">Sin puntos, comas y guiones.</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="cuit" class="form-label">CUIT/CUIL</label>
                        <input type="text" id="cuit" name="cuit" class="form-control"  value="">
                        <div class="form-text">Sin puntos, comas y guiones.</div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control"  value="">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" id="direccion" name="direccion" class="form-control"  value="">
            </div>

            <div class="mb-3">
                <label for="altura" class="form-label">Altura</label>
                <input type="text" id="altura" name="altura" class="form-control"  value="">
            </div>

            <div class="mb-3">
                <label for="cuidad" class="form-label">Cuidad</label>
                <input type="text" id="cuidad" name="cuidad" class="form-control"  value="">
            </div>

            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <input type="text" id="pais" name="pais" class="form-control"  value="">
            </div>

            <div class="mb-3">
                <label for="provincia" class="form-label">Provincia</label>
                <input type="text" id="provincia" name="provincia" class="form-control"  value="">
            </div>

            <div class="mb-3">
                <label for="barrio" class="form-label">Barrio</label>
                <input type="text" id="barrio" name="barrio" class="form-control"  value="">
            </div>

            <div class="mb-3">
                <label for="codigo_postal" class="form-label">Código Postal</label>
                <input type="text" id="codigo_postal" name="codigo_postal" class="form-control"  value="">
                <div class="form-text">Sin puntos, comas y guiones.</div>
            </div>

            <div class="row">
                <div class="col-3">
                    <div class="mb-3">
                        <label for="prefijo_telefonico_fk_id" class="form-label">Prefijo teléfonico</label>
                        <select name="prefijo_telefonico_fk_id" id="prefijo_telefonico_fk_id" class="form-control">
                            @foreach($prefijo_telefonicos as $pt)
                                <option value="{{ $pt->prefijo_telefonico_id }}">
                                    {{ $pt->prefijosTelefonicos }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="codigo_de_area" class="form-label">Código de área</label>
                        <input type="text" id="codigo_de_area" name="codigo_de_area" class="form-control"  value="">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="numero_de_telefono" class="form-label">Número de Teléfono</label>
                        <input type="text" id="numero_de_telefono" name="numero_de_telefono" class="form-control"  value="">
                        <div class="form-text">Sin puntos, comas y guiones.</div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
