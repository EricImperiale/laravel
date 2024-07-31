@extends('home')

@section('title', 'Ingresar')

@section('main')

    <section>
        <div id="login-form">
            <header class="mb-3">
                <h2 class="fw-bold">Iniciar Sesión</h2>
                <p class="text-muted">Ingresá con tus credenciales.</p>
            </header>

            <form action="{{ route('auth.processLogin') }}" method="post">
                @csrf

                <div class="mb-2">
                    <label for="email" class="form-label text-muted small">Email</label>

                    @error('email')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror

                    <input type="text"
                           id="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') ?? null }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-muted small">Contraseña</label>

                    @error('password')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror

                    <input type="password"
                           id="password"
                           name="password"
                           class="form-control">
                </div>

                <div class="mb-5 form-check">
                    <input type="checkbox" class="form-check-input" id="showPassword">
                    <label class="form-check-label" for="showPassword">Mostrar contraseña</label>
                </div>

                <div class="mb-2">
                    <button type="submit"
                            class="btn btn-primary w-100">Iniciar Sesión</button>
                </div>
            </form>

            <div class="my-3">
                <p>¿No tenés una cuenta?. <a href="">Creá una</a></p>
            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let showPasswordCheckbox = document.getElementById('showPassword');

        showPasswordCheckbox.addEventListener('change', function () {
            let inputPassword = document.getElementById('password');
            
            if (inputPassword.type === 'text') {
                inputPassword.type = 'password';
            } else {
                inputPassword.type = 'text';
            }
        });
    });
</script>
