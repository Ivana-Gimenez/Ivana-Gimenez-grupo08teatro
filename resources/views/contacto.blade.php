@extends('plantilla')

@section('content')

<div class="container contacto-section">

    <!-- TÍTULO -->
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="titulo-eventos">📞 Contacto</h1>
            <p class="contacto-subtitulo">Comunicate con nosotros</p>
        </div>
    </div>

    <div class="row g-4">

        <!-- FORMULARIO -->
        <div class="col-md-7">
            <div class="card contacto-card">

                <div class="card-header bg-purple text-white text-center">
                    <h4 class="mb-0">✉️ Enviar mensaje</h4>
                </div>

                <div class="card-body p-4">
                    <form action="/en-construccion" method="GET" class="w-100">

                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Nombre</label>
                            <input type="text" class="form-control" placeholder="Tu nombre">
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Apellido</label>
                            <input type="text" class="form-control" placeholder="Tu apellido">
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Correo electrónico</label>
                            <input type="email" class="form-control" placeholder="tu@email.com">
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Teléfono</label>
                            <input type="tel" class="form-control" placeholder="Ej: 379 123 4567">
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Mensaje</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-purple w-100">
                            Enviar mensaje
                        </button>

                    </form>
                </div>
            </div>
        </div>

        <!-- INFORMACIÓN -->
        <div class="col-md-5">
            <div class="card contacto-card">

                <div class="card-header bg-purple text-white text-center">
                    <h4 class="mb-0">📍 Información</h4>
                </div>

                <div class="card-body">
                    <p class="fw-bold">Teatro de la Ciudad</p>

                    <p><strong>📌 Dirección:</strong> Pasaje Villanueva 1470</p>
                    <p><strong>📞 Teléfono:</strong> 379-4699617</p>
                    <p><strong>✉️ Email:</strong> ctesteatrodelaciudad@gmail.com</p>

                    <hr>

                    <p class="fw-bold">Redes sociales</p>

                    <div class="d-flex gap-2 justify-content-center flex-wrap">
                        <a href="https://facebook.com" target="_blank" class="btn btn-outline-primary btn-sm">
                            Facebook
                        </a>

                        <a href="https://www.instagram.com/teatrodelaciudadctes" target="_blank" class="btn btn-outline-danger btn-sm">
                            Instagram
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>

<div class="container contacto-section">

    <!-- UBICACIÓN -->
    <div class="row mt-4">
        <div class="col-12">

            <div class="card shadow boleteria-card">

                <div class="card-header bg-purple text-white text-center">
                    <h5 class="mb-0">🗺️ Cómo llegar</h5>
                </div>

                <div class="card-body text-center">

                    <p class="mb-3">
                        📍 <strong>Pasaje Villanueva 1470, Corrientes Capital</strong>
                    </p>

                    <p class="mb-4">
                        Estamos en el centro de la ciudad, entre Catamarca y San Lorenzo
                    </p>

                    <a 
                        href="https://www.google.com/maps/search/?api=1&query=Pasaje+Villanueva+1470+Corrientes"
                        target="_blank"
                        class="btn btn-purple"
                    >
                        Ver en Google Maps
                    </a>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection