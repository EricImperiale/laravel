<?php
/** @var \App\Models\Propietario[]|\Illuminate\Database\Eloquent\Collection $propietarios */
/** @var \App\Searches\FiltrosPropietario $filtrosPropietario */
?>
@extends('app')

@section('title', 'Tus Propietarios')

@section('main')
    <section>
        <header class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Propietarios</li>
                    <li class="breadcrumb-item active" aria-current="page">Tus Propietarios</li>
                </ol>
            </nav>

            <h2>Propietarios</h2>
            <a href="{{ route('propietarios.formCreate') }}">Crear Propietario</a>

            <form action="{{ route('propietarios.index') }}" method="get" class="my-3">
                <label for="nombre_completo" class="form-label">Nombre</label>
                <div class="input-group">
                    <input type="text" id="nombre_completo" name="nc" class="form-control" placeholder="Ej: Eric Imperiale">
                    <button class="btn btn-primary">Filtrar</button>
                </div>
            </form>

            @if($filtrosPropietario->getNombreCompleto())
                <p class="mb-3">Se muestran los resultados para la búsqueda del título <b>{{ $filtrosPropietario->getNombreCompleto() }}</b>.</p>
            @endif
        </header>

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
                                <a href="{{ route('propietarios.formUpdate', ['id' => $propietario->propietario_id]) }}" class="btn btn-warning btn-sm">Editar</a>
                                <a href="{{ route('propietarios.formDelete', ['id' => $propietario->propietario_id]) }}" class="btn btn-outline-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div id="paginador">
                {{ $propietarios->links() }}
            </div>
        </div>
    </section>
@endsection
