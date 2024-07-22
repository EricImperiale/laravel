<!doctype html>
<html lang="{{ env('APP_LOCALE') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <title>@yield('title') :: Propi360</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('propietarios*') ? 'active' : '' }}" href="{{ route('propietarios.index') }}">Propietarios</a>
                        </li>
                    </ul>
                    @auth
                        <ul class="navbar-nav">
                            <form action="{{ route('auth.processLogout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-link">Cerrar Sesión ({{ auth()->user()->email }})</button>
                            </form>
                        </ul>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <div class="container my-3">
        @if(Session::has('status.message'))
            <div class="alert alert-{{ Session::get('status.type') === 'error' ? 'danger' : 'success' }}">{!! Session::get('status.message') !!}</div>
        @endif
    </div>

    <main class="container my-3">
        @yield('main')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
