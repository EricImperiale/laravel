<?php
/** @var \App\Models\Propetario[]|\Illuminate\Database\Eloquent\Collection $propietarios */
?>
@extends('app')

@section('title', 'Tus Propietarios')

@section('main')
    <section>
        <header class="mb-3">
            <h2>Propietarios</h2>

            <a href="{{ route('propietarios.formCreate') }}">Crear Propietario</a>
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
                @forelse($propietarios as $propietario)
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
                @empty
                    <p class="text-muted">Aún no hay propietarios cargados en el sistema.</p>
                @endforelse
                </tbody>
            </table>

            <div id="paginador">
                {{ $propietarios->links() }}
            </div>
        </div>
    </section>
@endsection
