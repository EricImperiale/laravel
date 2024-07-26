<?php
/** @var \App\Models\Contrato[]|\Illuminate\Database\Eloquent\Collection $contratos */
?>
@extends('app')

@section('title', 'Tus Contratos')

@section('main')
    <section>
        <header class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Contratos</li>
                </ol>
            </nav>

            <h2 class="mb-2">Contratos</h2>
            <a href="{{ route('contratos.formCreate') }}">Crear Contrato</a>
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
                        <th scope="col">Final del contrato</th>
                        <th scope="col">Alquiler</th>
                        <th scope="col">Acciones</th>
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
                            <td class="d-flex gap-2">
                                <a href="{{ route('contratos.formUpdate', ['id' => $contrato->contrato_id]) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('contratos.formUpdate', ['id' => $contrato->contrato_id]) }}" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div id="paginador">
                    {{ $contratos->links() }}
                </div>
            </div>
        @else
            <p>No hay contratos para mostrar.</p>
        @endif
    </section>
@endsection
