<?php
/** @var \App\Models\Garante[]|\Illuminate\Database\Eloquent\Collection $garantes */
/** @var \App\Searches\ActoresSearchParams $filtros */
?>
@extends('app')

@section('title', 'Tus Garantes')

@section('main')
    <section>
        <header class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Garantes</li>
                </ol>
            </nav>

            <h2>Garantes</h2>
            <a href="{{ route('garantes.formCreate') }}">Crear Garante</a>

            <form action="{{ route('inquilinos.index') }}" method="get" class="my-3">
                <label for="nombre_completo" class="form-label">Nombre y/o apellido</label>
                <div class="input-group">
                    <input type="text" id="nombre_completo" name="nc" class="form-control"
                           value="{{ $filtros->getNombreCompleto() ?? null }}"
                           placeholder="Ej: Eric Imperiale">
                    <button class="btn btn-primary">Filtrar</button>
                </div>
            </form>

            @if($filtros->getNombreCompleto())
                <p class="mb-3">Se muestran los resultados para la búsqueda del nombre
                    <b>{{ $filtros->getNombreCompleto() }}</b>.</p>
            @endif
        </header>

        @if($garantes->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">DNI</th>
                        <th scope="col">N. de Teléfono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($garantes as $garante)
                        <tr>
                            <td>{{ $garante->nombreCompleto }}</td>
                            <td>{{ $garante->dni }}</td>
                            <td>{{ $garante->telefonoCompleto }}</td>
                            <td>{{ $garante->email }}</td>
                            <td>{{ $garante->direccionCompleta }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('garantes.formUpdate', ['id' => $garante->garante_id]) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('garantes.formDelete', ['id' => $garante->garante_id]) }}" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div id="paginador">
                    {{ $garantes->links() }}
                </div>
            </div>
        @else
            <p>No hay garantes para mostrar.</p>
        @endif
    </section>
@endsection
