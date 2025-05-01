<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="d-flex align-items-center justify-content-evenly" style="height: 100vh;">
    <img src="{{ asset('images/art.svg') }}" alt="Arte" style="width: 50%; height: auto;">
    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
        <h1 style="color: #17B8A6;" class="fw-bold">Gestão de Registros</h1>
        <a href="{{ route('login') }}" class="btn w-100" style="background-color: #17B8A6; color:white">Entrar</a>
        <a href="{{ route('register') }}" class="btn btn-light w-100">Registrar</a>
    </div>
</body>

</html>