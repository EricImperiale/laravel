<?php
/** @var \App\Models\Propetario $propietario */
/** @var \App\Models\PrefijoTelefonico[]|\Illuminate\Database\Eloquent\Collection $prefijo_telefonicos */

?>
@extends('app')

@section('title', 'Eliminar Propietario :: ' . $propietario->nombreCompleto)

@section('main')
    <section>
        <header>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Propietarios</li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('propietarios.index') }}">Tus Propietarios</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Eliminar Propietario</li>
                </ol>
            </nav>

            <h2>Vas a eliminar a: <b>{{ $propietario->nombreCompleto }}</b> con DNI <b>{{ $propietario->dni }}</b></h2>
        </header>

        <form action="{{ route('propietarios.processDelete', ['id' => $propietario->propietario_id]) }}" method="post" id="propietarios-delete-form">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                @error('nombre')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="nombre" name="nombre" class="form-control" disabled value="{{ old('nombre', $propietario->nombre) }}">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                @error('apellido')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="apellido" name="apellido" class="form-control" disabled  value="{{ old('apellido', $propietario->apellido) }}">
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        @error('dni')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" id="dni" name="dni" class="form-control" disabled value="{{ old('dni', $propietario->dni) }}">
                        <div class="form-text">Sin puntos, comas y guiones.</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="cuit" class="form-label">CUIT/CUIL</label>
                        @error('cuit')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" id="cuit" name="cuit" class="form-control" disabled value="{{ old('cuit', $propietario->cuit) }}">
                        <div class="form-text">Sin puntos, comas y guiones.</div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="email" name="email" class="form-control" disabled value="{{ old('email', $propietario->email) }}">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                @error('direccion')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="direccion" name="direccion" class="form-control" disabled value="{{ old('direccion', $propietario->direccion) }}">
            </div>

            <div class="mb-3">
                <label for="altura" class="form-label">Altura</label>
                @error('altura')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="altura" name="altura" class="form-control" disabled value="{{ old('altura', $propietario->altura) }}">
            </div>

            <div class="mb-3">
                <label for="cuidad" class="form-label">Cuidad</label>
                @error('cuidad')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="cuidad" name="cuidad" class="form-control" disabled value="{{ old('cuidad', $propietario->cuidad) }}">
            </div>

            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                @error('pais')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="pais" name="pais" class="form-control" disabled value="{{ old('pais', $propietario->pais) }}">
            </div>

            <div class="mb-3">
                <label for="provincia" class="form-label">Provincia</label>
                @error('provincia')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="provincia" name="provincia" class="form-control" disabled value="{{ old('provincia', $propietario->provincia) }}">
            </div>

            <div class="mb-3">
                <label for="barrio" class="form-label">Barrio</label>
                @error('barrio')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="barrio" name="barrio" class="form-control" disabled value="{{ old('barrio', $propietario->barrio) }}">
            </div>

            <div class="mb-3">
                <label for="codigo_postal" class="form-label">Código Postal</label>
                @error('codigo_postal')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" disabled value="{{ old('codigo_postal', $propietario->codigo_postal) }}">
                <div class="form-text">Sin puntos, comas y guiones.</div>
            </div>

            <div class="row">
                <div class="col-2">
                    <div class="mb-3">
                        <label for="prefijo_telefonico_fk_id" class="form-label">Prefijo teléfonico</label>
                        <select name="prefijo_telefonico_fk_id" id="prefijo_telefonico_fk_id" class="form-control" disabled>
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
                        @error('codigo_de_area')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" id="codigo_de_area" name="codigo_de_area" class="form-control" disabled value="{{ old('codigo_de_area', $propietario->codigo_de_area) }}">
                    </div>
                </div>
                <div class="col-8">
                    <div class="mb-3">
                        <label for="numero_de_telefono" class="form-label">Número de Teléfono</label>
                        @error('numero_de_telefono')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" id="numero_de_telefono" name="numero_de_telefono" class="form-control" disabled value="{{ old('numero_de_telefono', $propietario->numero_de_telefono) }}">
                        <div class="form-text">Sin puntos, comas y guiones.</div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="fecha_de_nacimiento" class="form-label">Fecha de nacimiento</label>
                @error('fecha_de_nacimiento')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="date" id="fecha_de_nacimiento" name="fecha_de_nacimiento" class="form-control" disabled value="{{ old('fecha_de_nacimiento', $propietario->fecha_de_nacimiento) }}">
            </div>

            <div class="mb-3">
                <button type="submit" id="btn-propietario-eliminar" class="btn btn-outline-danger w-100">Eliminar Propietario</button>
            </div>
        </form>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnPropietarioEliminar = document.querySelector('#btn-propietario-eliminar');
        const deleteForm = document.querySelector('#propietarios-delete-form');

        btnPropietarioEliminar.addEventListener('click', function (event) {
            if (!confirm('¿Estás seguro que querés eliminar a este propietario?')) {
                event.preventDefault();
            }
        });
    });
</script>
