
@extends('plantilla')

@section('content')


<div class="container contacto-section mt-4">

    <!-- TÍTULO -->
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h1 class="titulo-eventos">🔐 Iniciar Sesión</h1>
            <p class="contacto-subtitulo">
                Accedé a tu cuenta para gestionar tus eventos y talleres
            </p>
        </div>
    </div>

    <!-- FORMULARIO -->
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-6">

            <div class="card contacto-card">

                <div class="card-header bg-purple text-white text-center">
                    <h4>Ingreso de usuario</h4>
                </div>

                <div class="card-body px-5 py-4">

                    <form action="/en-construccion" method="GET">

                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold">Correo electrónico</label>
                            <input type="email" class="form-control contacto-input" placeholder="tu@email.com">
                        </div>

                        <div class="mb-4 text-start">
                            <label class="form-label fw-bold">Contraseña</label>
                            <input type="password" class="form-control contacto-input" placeholder="******">
                        </div>

                        <!-- BOTÓN -->
                        <button type="submit" class="btn btn-purple btn-lg w-100">
                            Iniciar Sesión
                        </button>

                    </form>

                </div>

                <div class="card-body pt-0 text-start">
                    <small>
                        ¿No tenés cuenta?
                        <a href="/registro">Registrate</a>
                    </small>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection