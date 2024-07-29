<?php
/** @var \App\Models\Propietario[]|\Illuminate\Database\Eloquent\Collection $propietarios */
/** @var \App\Models\Propiedad[]|\Illuminate\Database\Eloquent\Collection $propiedades */
/** @var \App\Models\Inquilino[]|\Illuminate\Database\Eloquent\Collection $inquilinos */
/** @var \App\Models\Contrato[]|\Illuminate\Database\Eloquent\Collection $contrato */
/** @var \App\Models\TipoDeMoneda[]|\Illuminate\Database\Eloquent\Collection $tipoDeMonedas */
?>
@extends('app')

@section('title', 'Editar Contrato')

@section('main')
    <section>
        <header>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('contratos.index') }}">Contratos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Contrato</li>
                </ol>
            </nav>

            <h2>Editar Contrato</h2>
            <p>
                Estás editando el contrato entre
                <b>{{ $contrato->propietario->nombreCompleto }}</b> y
                <b>{{ $contrato->inquilino->nombreCompleto }}</b> por un/a
                <b>{{ $contrato->propiedad->direccionCompleta }}</b>
            </p>
        </header>

        <form action="{{ route('contratos.processUpdate', ['id' => $contrato->contrato_id]) }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="propietario_fk_id" class="form-label">Propietario</label>
                @error('propietario_fk_id')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <select name="propietario_fk_id" id="propietario_fk_id" class="form-control">
                    <option value="">Selecciona un Propietario</option>

                    @foreach($propietarios as $propietario)
                        <option
                            value="{{ $propietario->propietario_id }}"
                            @selected(old('propietario_fk_id', $contrato->propietario->propietario_id) == $propietario->propietario_id)
                        >
                            {{ $propietario->nombreCompleto }} - DNI: {{ $propietario->dni }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="inquilino_fk_id" class="form-label">Inquilino</label>
                    @error('inquilino_fk_id')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <select name="inquilino_fk_id" id="inquilino_fk_id" class="form-control">
                        <option value="">Selecciona un Inquilino</option>

                        @foreach($inquilinos as $inquilino)
                            <option
                                value="{{ $inquilino->inquilino_id }}"
                                @selected(old('inquilino_fk_id', $contrato->inquilino->inquilino_id) == $inquilino->inquilino_id)
                            >
                                {{ $inquilino->nombreCompleto }} - DNI: {{ $inquilino->dni }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6">
                    <label for="garante_fk_id" class="form-label">Garante</label>
                    @error('garante_fk_id')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <select name="garante_fk_id" id="garante_fk_id" class="form-control">
                        <option value="">Selecciona un Garante</option>

                        @foreach($garantes as $garante)
                            <option
                                value="{{ $garante->garante_id }}"
                                @selected(old('garante_fk_id', $contrato->garante->garante_id) == $garante->garante_id)
                            >
                                {{ $garante->nombreCompleto }} - DNI: {{ $garante->dni }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="mb-3">
                <label for="propiedad_fk_id" class="form-label">Propiedad</label>
                @error('propiedad_fk_id')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <select name="propiedad_fk_id" id="propiedad_fk_id" class="form-control">
                    <option value="">Selecciona la Propiedad</option>

                    @foreach($propiedades as $propiedad)
                        <option
                            value="{{ $propiedad->propiedad_id }}"
                            @selected(old('propiedad_fk_id', $contrato->propiedad->propiedad_id) == $propiedad->propiedad_id)
                        >
                            {{ $propiedad->direccionCompleta }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-4">
                    <label for="fecha_de_comienzo" class="form-label">Fecha de Comienzo</label>
                    @error('fecha_de_comienzo')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="date" name="fecha_de_comienzo" id="fecha_de_comienzo" class="form-control" value="{{ old('fecha_de_comienzo') ?? $contrato->fechaComienzoParaInputDate }}">
                </div>

                <div class="col-4">
                    <label for="fecha_de_final" class="form-label">Fin del contrato</label>
                    @error('fecha_de_final')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="date" name="fecha_de_final" id="fecha_de_final" class="form-control" value="{{ old('fecha_de_final') ?? $contrato->fechaFinalParaInputDate }}">
                </div>

                <div class="col-4">
                    <label for="fecha_de_vencimiento" class="form-label">Día de vencimiento</label>
                    @error('fecha_de_vencimiento')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="fecha_de_vencimiento" id="fecha_de_vencimiento" class="form-control" value="{{ old('fecha_de_vencimiento') ?? $contrato->fecha_de_vencimiento }}">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-6">
                    <label for="precio_del_alquiler" class="form-label">Precio del alquiler</label>
                    @error('precio_del_alquiler')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="precio_del_alquiler" id="precio_del_alquiler" class="form-control" value="{{ old('precio_del_alquiler') ?? $contrato->precio_del_alquiler }}">}
                </div>

                <div class="col-6">
                    <label for="tipo_de_moneda_id" class="form-label">Tipo de Moneda</label>
                    @error('tipo_de_moneda_id')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <select name="tipo_de_moneda_fk_id" id="tipo_de_moneda_fk_id" class="form-control">
                        <option value="">Selecciona el Tipo de Moneda</option>

                        @foreach($tipoDeMonedas as $moneda)
                            <option
                                value="{{ $moneda->tipo_de_moneda_id }}"
                                @selected(old('tipo_de_moneda_fk_id', $contrato->tipo_de_moneda_fk_id) == $moneda->tipo_de_moneda_id)>
                                {{ $moneda->moneda }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button class="btn btn-primary w-100">Editar Contrato</button>
        </form>
    </section>
@endsection
