@extends('plantilla')

@section('content')

<div class="container py-5 contacto-section">

    <!-- TÍTULO -->
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="titulo-eventos">🎭 Quiénes Somos</h1>
            <p class="contacto-subtitulo">Conocé la historia del Teatro de la Ciudad</p>
        </div>
    </div>

    <!-- HISTORIA / MISIÓN / VISIÓN -->
    <div class="row g-4">

        <div class="col-md-6">
            <div class="card contacto-card h-100">

                <div class="card-header">
                    <h4>📖 Nuestra Historia</h4>
                </div>

                <div class="card-body">
                    <p>
                        El Teatro de la Ciudad abrió sus puertas en 1995 con la misión de acercar la cultura y las artes escénicas a toda la comunidad.
                    </p>
                    <p>
                        Con más de 25 años de trayectoria, nos consolidamos como uno de los teatros más importantes de la región, recibiendo a artistas nacionales e internacionales.
                    </p>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card contacto-card h-100">

                <div class="card-header">
                    <h4>🎯 Misión y Visión</h4>
                </div>

                <div class="card-body">

                    <p class="fw-bold mb-1">Misión</p>
                    <p>
                        Promover la cultura y las artes escénicas, ofreciendo una programación diversa y de calidad, accesible para todos los públicos.
                    </p>

                    <p class="fw-bold mt-4 mb-1">Visión</p>
                    <p>
                        Ser reconocidos como el teatro referente de la ciudad, impulsando nuevas expresiones artísticas y formando nuevas audiencias.
                    </p>

                </div>

            </div>
        </div>

    </div>

    <!-- EQUIPO -->
    <div class="row mt-5">

        <div class="col-12 text-center mb-4">
            <h3 class="titulo-eventos">🌟 Nuestro Equipo</h3>
        </div>

        <!-- MIEMBRO 1 -->
        <div class="col-md-4 mb-3">
            <div class="card contacto-card text-center h-100">

                <div class="card-body">

                    <img src="img/equipo/equipo1.jfif" 
                         alt="María González"
                         class="equipo-img mb-3">

                    <h5 class="fw-bold">María González</h5>
                    <p class="text-muted mb-0">Directora Artística</p>

                </div>

            </div>
        </div>

        <!-- MIEMBRO 2 -->
        <div class="col-md-4 mb-3">
            <div class="card contacto-card text-center h-100">

                <div class="card-body">

                    <img src="img/equipo/equipo3.jfif" 
                         alt="Carlos Rodríguez"
                         class="equipo-img mb-3">

                    <h5 class="fw-bold">Carlos Rodríguez</h5>
                    <p class="text-muted mb-0">Gerente General</p>

                </div>

            </div>
        </div>

        <!-- MIEMBRO 3 -->
        <div class="col-md-4 mb-3">
            <div class="card contacto-card team-card text-center h-100">

                <div class="card-body">

                    <img src="img/equipo/equipo2.jfif" 
                         alt="Laura Fernández"
                         class="equipo-img mb-3">

                    <h5 class="fw-bold">Laura Fernández</h5>
                    <p class="text-muted mb-0">Coordinadora de Eventos</p>

                </div>

            </div>
        </div>

    </div>

          <!-- Punto 4: Valores / Principios -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-4">💜 Nuestros Valores</h3>
            <div class="row text-center">
                <div class="col-md-3 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5>🎭 Independencia</h5>
                            <p class="small">Cultural y artística</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5>📚 Formación</h5>
                            <p class="small">Capacitación constante</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5>🤝 Inclusión</h5>
                            <p class="small">Acceso a la cultura</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5>🌐 Redes</h5>
                            <p class="small">Trabajo con otros espacios</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Punto 5: Logros destacados (más detalle) -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-4">🏆 Logros Destacados 2024</h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <ul>
                                <li>✅ Más de <strong>100 funciones</strong> durante el año</li>
                                <li>✅ <strong>59 obras de teatro</strong> para distintos públicos</li>
                                <li>✅ <strong>30 espectáculos de danza</strong></li>
                                <li>✅ <strong>15 shows de música</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <ul>
                                <li>✅ <strong>13° Festival "Mandarinas al Sol"</strong></li>
                                <li>✅ <strong>38° Fiesta Provincial del Teatro</strong></li>
                                <li>✅ Más de <strong>500 alumnos</strong> en talleres</li>
                                <li>✅ Biblioteca Teatral "Dante Cena"</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Punto 6: Más información del equipo -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-4">👥 Más sobre nuestro equipo</h3>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h5>20</h5>
                            <p>Docentes profesionales</p>
                        </div>
                        <div class="col-md-4">
                            <h5>236</h5>
                            <p>Talleristas 2025</p>
                        </div>
                        <div class="col-md-4">
                            <h5>15</h5>
                            <p>Personas en equipo operativo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Punto 7: Contacto extendido -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h3>📞 Contacto</h3>
            <p><strong>📱 Instagram / Facebook:</strong> @teatrodelaciudadctes</p>
            <p><strong>📍 Dirección:</strong> Pasaje Villanueva 1470, Corrientes</p>
            <p><strong>📞 Teléfono:</strong> 3794 75-4083</p>
            <p><strong>✉️ Correo:</strong> teatrodelaciudadctes@gmail.com (no está en el PDF pero podés agregarlo)</p>
        </div>
    </div>
</div>
</div>


@endsection
