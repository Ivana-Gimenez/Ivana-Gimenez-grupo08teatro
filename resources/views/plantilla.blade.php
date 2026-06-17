<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Teatro de la Ciudad</title>

        {{-- VITE --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- CSS PROPIO (DESPUÉS de Bootstrap) --}}
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

        {{-- Bootstrap Icons --}}
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    </head>

    <body class="d-flex flex-column min-vh-100">

        @include('partes.navbar')

        <main class="flex-grow-1">
            @yield('content')
        </main>

        @include('partes.footer')

        {{-- JS EXTRA --}}
        <script src="{{ asset('js/talleres.js') }}"></script>

    </body>

</html>