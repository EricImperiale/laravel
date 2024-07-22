<?php
/** @var \App\Models\Propiedad[]|\Illuminate\Database\Eloquent\Collection $propiedades */
/** @var \App\Models\TipoDePropiedad[]|\Illuminate\Database\Eloquent\Collection $tipoDePropiedades */
?>
@extends('app')

@section('title', 'Tus Propiedades')

@section('main')
    <section>
        <header class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Propiedades</li>
                    <li class="breadcrumb-item active" aria-current="page">Tus Propiedades</li>
                </ol>
            </nav>

            <h2>Propiedades</h2>
            <a href="">Crear Propiedad</a>
        </header>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Dirección</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Tipo</th>
                </tr>
                </thead>
                <tbody>
                @forelse($propiedades as $propiedad)
                    <tr>
                        <td>{{ $propiedad->direccionCompleta }}</td>
                        <td>{{ $propiedad->tipoDePropiedad->tipo_de_propiedad }}</td>
                    </tr>
                @empty
                    <p class="text-muted">Aún no hay propiedades cargadas en el sistema.</p>
                @endforelse
                </tbody>
            </table>

            <div id="paginador">
                {{ $propiedades->links() }}
            </div>
        </div>
    </section>
@endsection
