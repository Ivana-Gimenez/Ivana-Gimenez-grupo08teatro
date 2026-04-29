<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teatro de la Ciudad</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body>

    @include('partes.navbar')

    <!-- CONTENIDO DE LAS VISTAS -->
    <main class="main-content">
        @yield('content')
    </main>

    @include('partes.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/talleres.js') }}"></script>
</body>
</html>