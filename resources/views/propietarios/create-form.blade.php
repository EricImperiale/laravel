<?php
/** @var \App\Models\PrefijoTelefonico[]|\Illuminate\Database\Eloquent\Collection $prefijosTelefonicos */
?>
@extends('app')

@section('title', 'Crear Propietario')

@section('main')
    <section>
        <header>
            <nav aria-label="breadcrumb" class="small">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('propietarios.index') }}">Propietarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear Propietario</li>
                </ol>
            </nav>

            <h2 class="fs-1 fw-bold mb-4">Crear Propietario</h2>
        </header>

        <form action="{{ route('propietarios.processCreate') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label text-muted small">Nombre</label>

                @error('fecha_de_nacimiento')
                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                @enderror

                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label text-muted small">Apellido</label>

                @error('apellido')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror

                <input type="text"
                       id="apellido"
                       name="apellido"
                       class="form-control"
                       value="{{ old('apellido') }}">
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="dni" class="form-label text-muted small">DNI</label>

                        @error('fecha_de_nacimiento')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror

                        <input type="text"
                               id="dni"
                               name="dni"
                               class="form-control"
                               value="{{ old('dni') }}">

                        <div class="form-text">Sin puntos, comas y guiones.</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="cuit" class="form-label text-muted small">CUIT/CUIL</label>

                        @error('fecha_de_nacimiento')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror

                        <input type="text"
                               id="cuit"
                               name="cuit"
                               class="form-control"
                               value="{{ old('cuit') }}">

                        <div class="form-text">Sin puntos, comas y guiones.</div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-muted small">Email</label>

                @error('fecha_de_nacimiento')
                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                @enderror

                <input type="text"
                       id="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label text-muted small">Dirección</label>

                @error('fecha_de_nacimiento')
                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                @enderror

                <input type="text"
                       id="direccion"
                       name="direccion"
                       class="form-control"
                       value="{{ old('direccion') }}">
            </div>

            <div class="mb-3">
                <label for="altura" class="form-label text-muted small">Altura</label>

                @error('fecha_de_nacimiento')
                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                @enderror

                <input type="text"
                       id="altura"
                       name="altura"
                       class="form-control"
                       value="{{ old('altura') }}">
            </div>

            <div class="mb-3">
                <label for="cuidad" class="form-label text-muted small">Cuidad</label>

                @error('fecha_de_nacimiento')
                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                @enderror

                <input type="text"
                       id="cuidad"
                       name="cuidad"
                       class="form-control"
                       value="{{ old('cuidad') }}">
            </div>

            <div class="mb-3">
                <label for="pais" class="form-label text-muted small">País</label>

                @error('fecha_de_nacimiento')
                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                @enderror

                <input type="text"
                       id="pais"
                       name="pais"
                       class="form-control"
                       value="{{ old('pais') }}">
            </div>

            <div class="mb-3">
                <label for="provincia" class="form-label text-muted small">Provincia</label>

                @error('fecha_de_nacimiento')
                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                @enderror

                <input type="text"
                       id="provincia"
                       name="provincia"
                       class="form-control"
                       value="{{ old('provincia') }}">
            </div>

            <div class="mb-3">
                <label for="barrio" class="form-label text-muted small">Barrio</label>

                @error('fecha_de_nacimiento')
                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                @enderror

                <input type="text"
                       id="barrio"
                       name="barrio"
                       class="form-control"
                       value="{{ old('barrio') }}">
            </div>

            <div class="mb-3">
                <label for="codigo_postal" class="form-label text-muted small">Código Postal</label>

                @error('fecha_de_nacimiento')
                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                @enderror

                <input type="text"
                       id="codigo_postal"
                       name="codigo_postal"
                       class="form-control"
                       value="{{ old('codigo_postal') }}">

                <div class="form-text">Sin puntos, comas y guiones.</div>
            </div>

            <div class="row">
                <div class="col-2">
                    <div class="mb-3">
                        <label for="prefijo_telefonico_fk_id" class="form-label text-muted small">Prefijo teléfonico</label>

                        <select name="prefijo_telefonico_fk_id" id="prefijo_telefonico_fk_id" class="form-control">
                            @foreach($prefijosTelefonicos as $prefijo)
                                <option
                                    value="{{ $prefijo->prefijo_telefonico_id }}">
                                    {{ $prefijo->prefijosTelefonicos }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label for="codigo_de_area" class="form-label text-muted small">Código de área</label>

                        @error('fecha_de_nacimiento')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror

                        <input type="text"
                               id="codigo_de_area"
                               name="codigo_de_area"
                               class="form-control"
                               value="{{ old('codigo_de_area') }}">
                    </div>
                </div>
                <div class="col-7">
                    <div class="mb-3">
                        <label for="numero_de_telefono" class="form-label text-muted small">Número de Teléfono</label>

                        @error('fecha_de_nacimiento')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror

                        <input type="text"
                               id="numero_de_telefono"
                               name="numero_de_telefono"
                               class="form-control"
                               value="{{ old('numero_de_telefono') }}">

                        <div class="form-text">Sin puntos, comas y guiones.</div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="fecha_de_nacimiento" class="form-label text-muted small">Fecha de nacimiento</label>

                @error('fecha_de_nacimiento')
                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                @enderror

                <input type="date"
                       id="fecha_de_nacimiento"
                       name="fecha_de_nacimiento"
                       class="form-control"
                       value="{{ old('fecha_de_nacimiento') }}">
            </div>

            <div class="mb-3">
                <button type="submit"
                        class="btn btn-primary w-100">Crear Propietario</button>
            </div>
        </form>
    </section>
@endsection
