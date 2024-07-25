<?php
/** @var \App\Models\Inquilino[]|\Illuminate\Database\Eloquent\Collection $inquilinos */
/** @var \App\Searches\ActoresSearchParams $filtrosPropietario */
?>
@extends('app')

@section('title', 'Tus Inquilinos')

@section('main')
    <section>
        <header class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Inquilinos</li>
                </ol>
            </nav>

            <h2>Inquilinos</h2>
            <a href="{{ route('inquilinos.formCreate') }}">Crear Inquilino</a>

            <form action="{{ route('inquilinos.index') }}" method="get" class="my-3">
                <label for="nombre_completo" class="form-label">Nombre y/o apellido</label>
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

        @if($inquilinos->isNotEmpty())
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
                    @foreach($inquilinos as $inquilino)
                        <tr>
                            <td>{{ $inquilino->nombreCompleto }}</td>
                            <td>{{ $inquilino->dni }}</td>
                            <td>{{ $inquilino->telefonoCompleto }}</td>
                            <td>{{ $inquilino->email }}</td>
                            <td>{{ $inquilino->direccionCompleta }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('inquilinos.formUpdate', ['id' => $inquilino->inquilino_id]) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route('inquilinos.formDelete', ['id' => $inquilino->inquilino_id]) }}" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div id="paginador">
                    {{ $inquilinos->links() }}
                </div>
            </div>
        @else
            <p>No hay inquilinos para mostrar.</p>
        @endif
    </section>
@endsection
