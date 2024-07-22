<?php
/** @var \App\Models\Propiedad[]|\Illuminate\Database\Eloquent\Collection $propiedades */
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
                    <th scope="col">Estado</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Caracteristicas</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($propiedades as $propiedad)
                    <tr>
                        <td>{{ $propiedad->direccionCompleta }}</td>
                        <td>
                            <span class="badge text-bg-{{ $propiedad->estado->estado_id == 1 ? 'success' : 'warning' }}">
                                {{ $propiedad->estado->estado }}
                            </span>
                        </td>
                        <td>{{ $propiedad->alquiler }}</td>
                        <td>{{ $propiedad->superfice }} con {{ $propiedad->ambientes }} ambientes</td>
                        <td>{{ $propiedad->propietario->nombreCompleto }}</td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm">Editar</a>
                            <a href="" class="btn btn-outline-danger btn-sm">Eliminar</a>
                        </td>
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
