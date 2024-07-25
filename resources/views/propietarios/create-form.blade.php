<?php
/** @var \App\Models\PrefijoTelefonico[]|\Illuminate\Database\Eloquent\Collection $prefijosTelefonicos */
?>
@extends('app')

@section('title', 'Crear Propietario')

@section('main')
    <section>
        <header>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('propietarios.index') }}">Propietarios</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Crear Propietario</li>
                    </ol>
                </ol>
            </nav>

            <h2>Crear Propietario</h2>
        </header>

        <form action="{{ route('propietarios.processCreate') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                @error('nombre')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                @error('apellido')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="apellido" name="apellido" class="form-control"  value="{{ old('apellido') }}">
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
                        <input type="text" id="dni" name="dni" class="form-control" value="{{ old('dni') }}">
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
                        <input type="text" id="cuit" name="cuit" class="form-control" value="{{ old('cuit') }}">
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
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                @error('direccion')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion') }}">
            </div>

            <div class="mb-3">
                <label for="altura" class="form-label">Altura</label>
                @error('altura')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="altura" name="altura" class="form-control" value="{{ old('altura') }}">
            </div>

            <div class="mb-3">
                <label for="cuidad" class="form-label">Cuidad</label>
                @error('cuidad')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="cuidad" name="cuidad" class="form-control" value="{{ old('cuidad') }}">
            </div>

            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                @error('pais')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="pais" name="pais" class="form-control" value="{{ old('pais') }}">
            </div>

            <div class="mb-3">
                <label for="provincia" class="form-label">Provincia</label>
                @error('provincia')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="provincia" name="provincia" class="form-control" value="{{ old('provincia') }}">
            </div>

            <div class="mb-3">
                <label for="barrio" class="form-label">Barrio</label>
                @error('barrio')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="barrio" name="barrio" class="form-control" value="{{ old('barrio') }}">
            </div>

            <div class="mb-3">
                <label for="codigo_postal" class="form-label">Código Postal</label>
                @error('codigo_postal')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" value="{{ old('codigo_postal') }}">
                <div class="form-text">Sin puntos, comas y guiones.</div>
            </div>

            <div class="row">
                <div class="col-2">
                    <div class="mb-3">
                        <label for="prefijo_telefonico_fk_id" class="form-label">Prefijo teléfonico</label>
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
                        <label for="codigo_de_area" class="form-label">Código de área</label>
                        @error('codigo_de_area')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" id="codigo_de_area" name="codigo_de_area" class="form-control"  value="{{ old('codigo_de_area') }}">
                    </div>
                </div>
                <div class="col-7">
                    <div class="mb-3">
                        <label for="numero_de_telefono" class="form-label">Número de Teléfono</label>
                        @error('numero_de_telefono')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" id="numero_de_telefono" name="numero_de_telefono" class="form-control" value="{{ old('numero_de_telefono') }}">
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
                <input type="date" id="fecha_de_nacimiento" name="fecha_de_nacimiento" class="form-control" value="{{ old('fecha_de_nacimiento') }}">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Editar Propietario</button>
            </div>
        </form>
    </section>
@endsection
