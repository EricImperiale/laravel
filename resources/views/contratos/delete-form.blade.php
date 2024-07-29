<?php
/** @var \App\Models\Propietario[]|\Illuminate\Database\Eloquent\Collection $propietarios */
/** @var \App\Models\TipoDeMoneda[]|\Illuminate\Database\Eloquent\Collection $tipoDeMonedas */
?>
@extends('app')

@section('title', 'Eliminar Contrato')

@section('main')
    <section>
        <header>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('contratos.index') }}">Contratos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Eliminar Contrato</li>
                </ol>
            </nav>

            <h2>Eliminar Contrato</h2>
            <p>
                Vas a eliminar un contrato entre
                <b>{{ $contrato->propietario->nombreCompleto }}</b> y
                <b>{{ $contrato->inquilino->nombreCompleto }}</b> por un/a
                <b>{{ $contrato->propiedad->direccionCompleta }}</b>
            </p>
        </header>

        <form action="{{ route('contratos.processDelete', ['id' => $contrato->contrato_id]) }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="propietario_fk_id" class="form-label">Propietario</label>
                @error('propietario_fk_id')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <input type="text" class="form-control" value="{{ $contrato->propietario->nombreCompleto }}" disabled>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="inquilino_fk_id" class="form-label">Inquilino</label>
                    @error('inquilino_fk_id')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" class="form-control" value="{{ $contrato->inquilino->nombreCompleto }}" disabled>
                </div>

                <div class="col-6">
                    <label for="garante_fk_id" class="form-label">Garante</label>
                    @error('garante_fk_id')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" class="form-control" value="{{ $contrato->garante->nombreCompleto }}" disabled>
                </div>
            </div>


            <div class="mb-3">
                <label for="propiedad_fk_id" class="form-label">Propiedad</label>
                @error('propiedad_fk_id')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <input type="text" class="form-control" value="{{ $contrato->propiedad->direccionCompleta }}" disabled>
            </div>

            <div class="row mb-3">
                <div class="col-4">
                    <label for="fecha_de_comienzo" class="form-label">Fecha de Comienzo</label>
                    @error('fecha_de_comienzo')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="date" name="fecha_de_comienzo" id="fecha_de_comienzo" class="form-control" value="{{ $contrato->fechaComienzoParaInputDate }}" disabled>
                </div>

                <div class="col-4">
                    <label for="fecha_de_final" class="form-label">Fin del contrato</label>
                    @error('fecha_de_final')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="date" name="fecha_de_final" id="fecha_de_final" class="form-control" value="{{ $contrato->fechaFinalParaInputDate }}" disabled>
                </div>

                <div class="col-4">
                    <label for="fecha_de_vencimiento" class="form-label">Día de vencimiento</label>
                    @error('fecha_de_vencimiento')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="fecha_de_vencimiento" id="fecha_de_vencimiento" class="form-control" value="{{ $contrato->fecha_de_vencimiento }}" disabled>
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
                    <input type="text" name="precio_del_alquiler" id="precio_del_alquiler" class="form-control" value="{{ $contrato->precio_del_alquiler }}" <input type="text" class="form-control" value="{{ $contrato->propiedad->direccionCompleta }}" disabled>
                </div>

                <div class="col-6">
                    <label for="tipo_de_moneda_id" class="form-label">Tipo de Moneda</label>
                    @error('tipo_de_moneda_id')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" class="form-control" value="" disabled>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" id="btn-propietario-eliminar" class="btn btn-outline-danger w-100">Eliminar
                    Contrato
                </button>
            </div>
        </form>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnPropietarioEliminar = document.querySelector('#btn-propietario-eliminar');
        const deleteForm = document.querySelector('#propietarios-delete-form');

        btnPropietarioEliminar.addEventListener('click', function (event) {
            if (!confirm('¿Estás seguro que querés eliminar este contrario? Está accion NO tiene retorno.')) {
                event.preventDefault();
            }
        });
    });
</script>
