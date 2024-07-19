<?php
/** @var \App\Models\Propetario[]|\Illuminate\Database\Eloquent\Collection $propietarios */
?>
@extends('app')

@section('title', 'Tus Propietarios')

@section('main')
    <section>
        <header class="mb-3">
            <h2>Propietarios</h2>
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
                        <td>{{ $propietario->numero_de_telefono }}</td>
                        <td>{{ $propietario->email }}</td>
                        <td>{{ $propietario->direccionCompleta }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('propietarios.formUpdate', ['propietario_id' => $propietario->propietario_id]) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="" method="post">
                                @csrf

                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-trash2-fill"></i>
                                </button>
                            </form>
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
