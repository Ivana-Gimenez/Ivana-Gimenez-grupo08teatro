@extends('plantilla')

@section('content')

<div class="container contacto-section mt-4">

    <!-- TÍTULO -->
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h1 class="titulo-eventos">📝 Registro de Usuario</h1>
            <p class="contacto-subtitulo">
                Creá tu cuenta para acceder a eventos y beneficios del Teatro de la Ciudad de Corrientes
            </p>
        </div>
    </div>

    <!-- FORMULARIO -->
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="card contacto-card">

                <div class="card-header bg-purple text-white text-center">
                    <h4>Datos de registro</h4>
                </div>

                <div class="card-body px-4 py-4">

                    <form action="/en-construccion" method="GET" class="w-100">

                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Nombre</label>
                            <input type="text" class="form-control contacto-input" placeholder="Tu nombre">
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Apellido</label>
                            <input type="text" class="form-control contacto-input" placeholder="Tu apellido">
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Correo electrónico</label>
                            <input type="email" class="form-control contacto-input" placeholder="tu@email.com">
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Teléfono</label>
                            <input type="tel" class="form-control contacto-input" placeholder="(011) 1234-5678">
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Contraseña</label>
                            <input type="password" class="form-control contacto-input" placeholder="******">
                        </div>

                        <div class="mb-4 text-start">
                            <label class="form-label fw-bold">Confirmar contraseña</label>
                            <input type="password" class="form-control contacto-input" placeholder="******">
                        </div>

                        <!-- BOTÓN -->
                        <button type="submit" class="btn btn-purple w-100">
                            Registrarse
                        </button>

                    </form>

                </div>

                <div class="card-body pt-0 text-center">
                    <small>
                        ¿Ya tenés una cuenta?
                        <a href="/login">Iniciar sesión</a>
                    </small>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection