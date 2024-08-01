<?php
/** @var \App\Models\Propietario[]|\Illuminate\Database\Eloquent\Collection $propietarios */
/** @var \App\Models\TipoDePropiedad[]|\Illuminate\Database\Eloquent\Collection $tiposDePropiedades */
/** @var \App\Models\EstadoDePropiedad[]|\Illuminate\Database\Eloquent\Collection $estadosDePropiedades */
?>

@extends('app')

@section('title', 'Crear Propiedad')

@section('main')
    <section>
        <header>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('propiedades.index') }}">Propiedades</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear Propiedad</li>
                </ol>
            </nav>

            <h2>Crear Propiedad</h2>
        </header>

        <form action="{{ route('propiedades.formCreate') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="tdp_fk_id" class="form-label">Tipo de Propiedad</label>
                <select name="tdp_fk_id" id="tdp_fk_id" class="form-control">
                    <option value="">Tipo de Propiedad</option>
                    @foreach($tiposDePropiedades as $tipo)
                        <option value="{{ $tipo->tdp_id }}"@selected(old('tdp_fk_id') == $tipo->tdp_id)>{{ $tipo->tipo_de_propiedad }}</option>
                    @endforeach
                </select>
                @error('tdp_fk_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" maxlength="125" value="{{ old('direccion') }}">
                @error('direccion')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="altura" class="form-label">Altura</label>
                <input type="text" class="form-control" id="altura" name="altura" value="{{ old('altura') }}">
                @error('altura')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" maxlength="150" value="{{ old('ciudad') }}">
                @error('ciudad')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="provincia" class="form-label">Provincia</label>
                <input type="text" class="form-control" id="provincia" name="provincia" maxlength="150" value="{{ old('provincia') }}">
                @error('provincia')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="barrio" class="form-label">Barrio</label>
                <input type="text" class="form-control" id="barrio" name="barrio" maxlength="150" value="{{ old('barrio') }}">
                @error('barrio')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="codigo_postal" class="form-label">Código Postal</label>
                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="{{ old('codigo_postal') }}">
                @error('codigo_postal')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="area_total" class="form-label">Área Total (m²)</label>
                <input type="text" class="form-control" id="area_total" name="area_total" value="{{ old('area_total') }}">
                @error('area_total')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="area_cubierta" class="form-label">Área Cubierta (m²)</label>
                <input type="text" class="form-control" id="area_cubierta" name="area_cubierta" value="{{ old('area_cubierta') }}">
                @error('area_cubierta')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="La propiedad no tiene ninguna descripción.">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="precio_del_alquiler" class="form-label">Precio del Alquiler</label>
                <input type="text" class="form-control" id="precio_del_alquiler" name="precio_del_alquiler" value="{{ old('precio_del_alquiler') }}">
                @error('precio_del_alquiler')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="expensas" class="form-label">Expensas</label>
                <input type="text" class="form-control" id="expensas" name="expensas" value="{{ old('expensas') }}">
                @error('expensas')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="piso" class="form-label">Piso</label>
                <input type="text" class="form-control" id="piso" name="piso" value="{{ old('piso') }}">
                @error('piso')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="numero_de_departamento" class="form-label">Número de Departamento</label>
                <input type="text" class="form-control" id="numero_de_departamento" name="numero_de_departamento" value="{{ old('numero_de_departamento') }}">
                @error('numero_de_departamento')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="es_uso_profesional" name="es_uso_profesional">
                <label class="form-check-label" for="es_uso_profesional">Uso Profesional</label>
                @error('es_uso_profesional')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ambientes" class="form-label">Ambientes</label>
                <input type="text" class="form-control" id="ambientes" name="ambientes" value="{{ old('ambientes') }}">
                @error('ambientes')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cuartos" class="form-label">Cuartos</label>
                <input type="text" class="form-control" id="cuartos" name="cuartos" value="{{ old('cuartos') }}">
                @error('cuartos')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="banios" class="form-label">Baños</label>
                <input type="text" class="form-control" id="banios" name="banios" value="{{ old('banios') }}">
                @error('banios')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="propietario_fk_id" class="form-label">Selecciona un Propietario</label>
                <select name="propietario_fk_id" id="propietario_fk_id" class="form-control">
                    <option value="">Propietarios</option>
                    @foreach($propietarios as $propietario)
                        <option value="{{ $propietario->propietario_id }}" @selected(old('propietario_fk_id') == $propietario->propietario_id)> {{ $propietario->nombreCompleto }} - DNI: {{ $propietario->dni }}</option>
                    @endforeach
                </select>
                @error('propietario_fk_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="estado_fk_id" class="form-label">Selecciona un estado de Propiedad</label>
                <select name="estado_fk_id" id="estado_fk_id" class="form-control">
                    <option value="">Propietarios</option>
                    @foreach($estadosDePropiedades as $estado)
                        <option value="{{ $estado->estado_id }}" @selected(old('estado_fk_id') == $estado->estado_id)> {{ $estado->estado }}</option>
                    @endforeach
                </select>
                @error('estado_fk_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Crear Propiedad</button>
        </form>
    </section>
@endsection
