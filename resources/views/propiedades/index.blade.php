<?php
/** @var \App\Models\Propiedad[]|\Illuminate\Database\Eloquent\Collection $propiedades */
?>
@extends('app')

@section('title', 'Tus Inquilinos')

@section('main')
    <section>
        <header class="mb-3">
            <h2>Propiedades</h2>
            <a href="{{ route('propiedades.formCreate') }}">Crear Propiedad</a>
        </header>

        @if($propiedades->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">Propiedad</th>
                        <th scope="col">Propietario</th>
                        <th scope="col">Alquiler</th>
                        <th scope="col">Caracteristicas</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($propiedades as $propiedad)
                            <tr>
                                <td>{{ $propiedad->direccionCompleta }}</td>
                                <td>{{ $propiedad->propietario->nombreCompleto }}</td>
                                <td>{{ $propiedad->alquiler }}</td>
                                <td>{{ $propiedad->ambientes }} ambientes | {{ $propiedad->es_uso_profesional ? 'Uso Profesional' : 'Sin Uso Profesional'}}</td>
                                <td>{{ $propiedad->estadoDePropiedad->estado }}</td>
                                <td class="d-flex gap-2">
                                    <a href="" class="btn btn-warning btn-sm rounded-circle"><i class="bi bi-pencil-square"></i></a>
                                    <a href="" class="btn btn-outline-danger btn-sm rounded-circle"><i class="bi bi-trash3-fill"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div id="paginador">
                    {{ $propiedades->links() }}
                </div>
            </div>
        @else
            <p>No hay propiedades para mostrar. <a href="">creá una.</a></p>
        @endif
    </section>
@endsection
