@extends('app')

@section('title', 'Iniciar Sesion')

@section('main')
<section>
    <header>
        <h2>Iniciar Sesión</h2>
    </header>

    <form action="{{ route('auth.processLogin') }}" method="post">
        @csrf

        <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <input type="text" id="email" name="email" class="form-control" value="{{ old('email') ?? null }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <input type="password" id="password" name="password" class="form-control"  value="">
        </div>

        <div class="mb-2">
            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
        </div>
    </form>
</section>
@endsection
