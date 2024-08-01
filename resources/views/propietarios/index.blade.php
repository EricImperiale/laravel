<?php
/** @var \App\Models\Propietario[]|\Illuminate\Database\Eloquent\Collection $propietarios */
/** @var \App\Searches\ActoresSearchParams $filtrosPropietario */
?>
@extends('app')

@section('title', 'Tus Propietarios')

@section('main')
    <section>
        <header class="mb-3">
            <nav aria-label="breadcrumb" class="small">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Propietarios</li>
                </ol>
            </nav>

            <h2 class="fs-1 mb-2 fw-bold">Propietarios</h2>
            <a href="{{ route('propietarios.formCreate') }}">Crear Propietario</a>

            <form action="{{ route('propietarios.index') }}" method="get" class="my-3">
                <label for="nombre_completo" class="form-label text-muted small">Nombre y/o apellido</label>
                <div class="input-group">
                    <input type="text" id="nombre_completo" name="nc" class="form-control"
                           value="{{ $filtrosPropietario->getNombreCompleto() ?? null }}"
                           placeholder="Ej: Eric Imperiale">
                    <button class="btn btn-primary">Filtrar</button>
                </div>
            </form>

            @if($filtrosPropietario->getNombreCompleto())
                <p class="mb-3">Se muestran los resultados para la búsqueda del nombre
                    <b>{{ $filtrosPropietario->getNombreCompleto() }}</b>.</p>
            @endif
        </header>

        @if($propietarios->isNotEmpty())
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
                    @foreach($propietarios as $propietario)
                        <tr>
                            <td>{{ $propietario->nombreCompleto }}</td>
                            <td>{{ $propietario->dni }}</td>
                            <td>{{ $propietario->telefonoCompleto }}</td>
                            <td>{{ $propietario->email }}</td>
                            <td>{{ $propietario->direccionCompleta }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('propietarios.formUpdate', ['id' => $propietario->propietario_id]) }}" class="btn btn-warning btn-sm rounded-circle"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('propietarios.formDelete', ['id' => $propietario->propietario_id]) }}" class="btn btn-outline-danger btn-sm rounded-circle"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div id="paginador">
                    {{ $propietarios->links() }}
                </div>
            </div>
        @else
            <p>No hay propietarios para mostrar.</p>
        @endif
    </section>
@endsection
