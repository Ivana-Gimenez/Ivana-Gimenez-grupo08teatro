@extends('plantilla')

@section('content')

<div class="container py-5 contacto-section">

    <!-- TÍTULO -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="titulo-eventos">📞 Contacto</h1>

            <p class="subtitulo-login text-muted fs-5">
                Comunicate con el Teatro de la Ciudad
            </p>
        </div>
    </div>

    <!-- MENSAJE DE ÉXITO -->
    <div class="row justify-content-center mb-3">
        <div class="col-lg-9">

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

        </div>
    </div>

    <!-- INTRO -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-9">
            <div class="card login-card shadow-sm border-0">
                <div class="card-body">
                    <p class="texto-justificado mb-0">
                        Podés enviarnos tu consulta a través del formulario o comunicarte directamente con nosotros.
                        Respondemos en el menor tiempo posible.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENIDO -->
    <div class="row g-4">

        <!-- FORMULARIO -->
        <div class="col-md-7">

            <div class="card login-card shadow-sm border-0">

                <div class="card-body">

                    <h4 class="text-center text-purple fw-bold mb-4">
                        ✉️ Enviar mensaje
                    </h4>

                    <form action="{{ route('contacto.enviar') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold fst-italic">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Tu nombre" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold fst-italic">Apellido:</label>
                            <input type="text" name="apellido" class="form-control" placeholder="Tu apellido">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold fst-italic">Correo electrónico:</label>
                            <input type="email" name="email" class="form-control" placeholder="tu@email.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold fst-italic">Teléfono:</label>
                            <input type="tel" name="telefono" class="form-control" placeholder="Ej: 379 123 4567">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold fst-italic">Mensaje:</label>
                            <textarea name="mensaje" class="form-control" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-login w-100">
                            Enviar mensaje
                        </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- INFO -->
        <div class="col-md-5">

            <div class="card login-card shadow-sm border-0">

                <div class="card-body">

                    <h4 class="text-center text-purple fw-bold mb-4">
                        📍 Información
                    </h4>

                    <p class="texto-justificado mb-2">
                        <strong>Teatro de la Ciudad</strong>
                    </p>

                    <p class="texto-justificado mb-2">
                        📌 Pasaje Villanueva 1470
                    </p>

                    <p class="texto-justificado mb-2">
                        📞 379-4699617
                    </p>

                    <p class="texto-justificado mb-4">
                        ✉️ teatrodelaciudad788@gmail.com
                    </p>

                    <hr>

                    <p class="text-center fw-bold mb-3">
                        Redes sociales
                    </p>

                    <div class="d-flex justify-content-center gap-2 flex-wrap">

                        <a href="https://facebook.com"
                           target="_blank"
                           class="btn btn-outline-primary btn-sm">
                            Facebook
                        </a>

                        <a href="https://www.instagram.com/teatrodelaciudadctes"
                           target="_blank"
                           class="btn btn-outline-danger btn-sm">
                            Instagram
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- UBICACIÓN -->
    <div class="row mt-5">

        <div class="col-12">

            <div class="card login-card shadow-sm border-0">

                <div class="card-body text-center">

                    <h4 class="text-purple fw-bold mb-4">
                        🗺️ Cómo llegar
                    </h4>

                    <p class="texto-justificado mb-3">
                        📍 Pasaje Villanueva 1470, Corrientes Capital
                    </p>

                    <p class="texto-justificado mb-4">
                        Estamos en el centro de la ciudad, entre Catamarca y San Lorenzo.
                    </p>

                    <a href="https://www.google.com/maps/search/?api=1&query=Pasaje+Villanueva+1470+Corrientes"
                       target="_blank"
                       class="btn btn-login">
                        Ver en Google Maps
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection