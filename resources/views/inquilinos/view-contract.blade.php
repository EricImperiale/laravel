<?php
/** @var \App\Models\Inquilino[]|\Illuminate\Database\Eloquent\Collection $inquilino */
/** @var \App\Models\Contrato[]|\Illuminate\Database\Eloquent\Collection $contratos */
?>
@extends('app')

@section('title', 'Contratos - ' . $inquilino->nombreCompleto)

@section('main')
    <section>
        <header>
            <h2 class="mb-3">Estás viendo los contratos de {{ $inquilino->nombreCompleto }}</h2>
        </header>

        @if($contratos->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">Propiedad</th>
                        <th scope="col">Propietario</th>
                        <th scope="col">Inquilino</th>
                        <th scope="col">Creación</th>
                        <th scope="col">Fin</th>
                        <th scope="col">Alquiler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contratos as $contrato)
                        <tr>
                            <td>{{ $contrato->propiedad->direccionCompleta }}</td>
                            <td>{{ $contrato->propietario->nombreCompleto }}</td>
                            <td>{{ $contrato->inquilino->nombreCompleto }}</td>
                            <td>{{ $contrato->traducirFecha }}</td>
                            <td>{{ $contrato->calcularDistancia }}</td>
                            <td>{{ $contrato->alquiler }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>{{ $inquilino->nombreCompleto }} no tiene contratos para mostrar.</p>
        @endif
    </section>
@endsection
