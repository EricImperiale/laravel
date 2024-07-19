<?php
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

        <form action="{{ route('propietarios.processUpdate', ['pi' => $propietario->propietario_id]) }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="form-control"
                    value="{{ old('nombre', $propietario->nombre) }}">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control"  value="{{ old('nombre', $propietario->apellido) }}">
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" id="dni" name="dni" class="form-control" value="{{ old('dni', $propietario->dni) }}">
                        <div class="form-text">Sin puntos, comas y guiones.</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="cuit" class="form-label">CUIT/CUIL</label>
                        <input type="text" id="cuit" name="cuit" class="form-control" value="{{ old('cuit', $propietario->cuit) }}">
                        <div class="form-text">Sin puntos, comas y guiones.</div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $propietario->email) }}">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion', $propietario->direccion) }}">
            </div>

            <div class="mb-3">
                <label for="altura" class="form-label">Altura</label>
                <input type="text" id="altura" name="altura" class="form-control" value="{{ old('altura', $propietario->altura) }}">
            </div>

            <div class="mb-3">
                <label for="cuidad" class="form-label">Cuidad</label>
                <input type="text" id="cuidad" name="cuidad" class="form-control" value="{{ old('cuidad', $propietario->cuidad) }}">
            </div>

            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <input type="text" id="pais" name="pais" class="form-control" value="{{ old('pais', $propietario->pais) }}">
            </div>

            <div class="mb-3">
                <label for="provincia" class="form-label">Provincia</label>
                <input type="text" id="provincia" name="provincia" class="form-control" value="{{ old('provincia', $propietario->provincia) }}">
            </div>

            <div class="mb-3">
                <label for="barrio" class="form-label">Barrio</label>
                <input type="text" id="barrio" name="barrio" class="form-control" value="{{ old('barrio', $propietario->barrio) }}">
            </div>

            <div class="mb-3">
                <label for="codigo_postal" class="form-label">Código Postal</label>
                <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" value="{{ old('codigo_postal', $propietario->codigo_postal) }}">
                <div class="form-text">Sin puntos, comas y guiones.</div>
            </div>

            <div class="row">
                <div class="col-2">
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
                <div class="col-2">
                    <div class="mb-3">
                        <label for="codigo_de_area" class="form-label">Código de área</label>
                        <input type="text" id="codigo_de_area" name="codigo_de_area" class="form-control"  value="{{ old('codigo_de_area', $propietario->codigo_de_area) }}">
                    </div>
                </div>
                <div class="col-8">
                    <div class="mb-3">
                        <label for="numero_de_telefono" class="form-label">Número de Teléfono</label>
                        <input type="text" id="numero_de_telefono" name="numero_de_telefono" class="form-control" value="{{ old('numero_de_telefono', $propietario->numero_de_telefono) }}">
                        <div class="form-text">Sin puntos, comas y guiones.</div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="fecha_de_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" id="fecha_de_nacimiento" name="fecha_de_nacimiento" class="form-control" value="{{ old('fecha_de_nacimiento', $propietario->fecha_de_nacimiento) }}">
            </div>

            <div class="mb-3">
               <button type="submit" class="btn btn-primary w-100">Editar Propietario</button>
            </div>
        </form>
    </section>
@endsection
