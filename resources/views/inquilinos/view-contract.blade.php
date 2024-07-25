<?php
/** @var \App\Models\Inquilino[]|\Illuminate\Database\Eloquent\Collection $inquilino */
/** @var \App\Searches\ActoresSearchParams $filtrosPropietario */
?>
@extends('app')

@section('title', 'Contratos - ' . $inquilino->nombreCompleto)

@section('main')
    <section>
        <header>
            <h2>Estás viendo los contratos de {{ $inquilino->nombreCompleto }}</h2>
        </header>
    </section>
@endsection
