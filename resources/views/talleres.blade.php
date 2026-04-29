@extends('plantilla')

@section('content')


<div class="container talleres-section">

    <!-- TÍTULO -->
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="titulo-eventos">🎨 Talleres</h1>
            <p class="talleres-subtitulo">Conocé nuestros talleres artísticos</p>
        </div>
    </div>

    <!-- CONTENEDOR PAGINADO -->
    <div id="talleresContainer" class="row g-4">

        <!-- CARD 1 -->
        <div class="col-md-4 taller-item">
            <div class="card taller-card h-100">
                <img src="/img/talleres/4.jpeg" class="taller-img">
                <div class="card-body d-flex flex-column">
                    <h5>Taller de Títeres</h5>
                    <p class="taller-desc">Construcción y manipulación de títeres.</p>
                    <p class="taller-info"><strong>Inicio: 6 de junio · Lunes 14:30 a 16:30</strong></p>

                    <a href="/en-construccion" class="btn btn-purple w-100 mt-auto">
                        Inscribirse
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="col-md-4 taller-item">
            <div class="card taller-card h-100">
                <img src="/img/talleres/8.jpeg" class="taller-img">
                <div class="card-body d-flex flex-column">
                    <h5>Taller de Ballet</h5>
                    <p class="taller-desc">Nivel intermedio y avanzado.</p>
                    <p class="taller-info"><strong>Martes y jueves · 15 a 17 hs</strong></p>

                    <a href="/en-construccion" class="btn btn-purple w-100 mt-auto">
                        Inscribirse
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="col-md-4 taller-item">
            <div class="card taller-card h-100">
                <img src="/img/talleres/9.jpeg" class="taller-img">
                <div class="card-body d-flex flex-column">
                    <h5>Mini Audiovisuales</h5>
                    <p class="taller-desc">Producción y edición visual.</p>
                    <p class="taller-info"><strong>Lunes · 17 a 18:30 hs</strong></p>

                    <a href="/en-construccion" class="btn btn-purple w-100 mt-auto">
                        Inscribirse
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD 4 -->
        <div class="col-md-4 taller-item">
            <div class="card taller-card h-100">
                <img src="/img/talleres/5.jpeg" class="taller-img">
                <div class="card-body d-flex flex-column">
                    <h5>Danza Contemporánea</h5>
                    <p class="taller-desc">Expresión corporal.</p>
                    <p class="taller-info"><strong>Martes y jueves · 10 a 12 hs</strong></p>

                    <a href="/en-construccion" class="btn btn-purple w-100 mt-auto">
                        Inscribirse
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD 5 -->
        <div class="col-md-4 taller-item">
            <div class="card taller-card h-100">
                <img src="/img/talleres/6.jpeg" class="taller-img">
                <div class="card-body d-flex flex-column">
                    <h5>Danza Clásica</h5>
                    <p class="taller-desc">Técnica y elegancia.</p>
                    <p class="taller-info"><strong>Viernes · 14 a 18 hs</strong></p>

                    <a href="/en-construccion" class="btn btn-purple w-100 mt-auto">
                        Inscribirse
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD 6 -->
        <div class="col-md-4 taller-item">
            <div class="card taller-card h-100">
                <img src="/img/talleres/taller6.jfif" class="taller-img">
                <div class="card-body d-flex flex-column">
                    <h5>Taller de Aromito</h5>
                    <p class="taller-desc">Espacio creativo.</p>
                    <p class="taller-info"><strong>Martes y jueves · 21:30 a 23 hs</strong></p>

                    <a href="/en-construccion" class="btn btn-purple w-100 mt-auto">
                        Inscribirse
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD 7 -->
        <div class="col-md-4 taller-item">
            <div class="card taller-card h-100">
                <img src="/img/talleres/taller7.jfif" class="taller-img">
                <div class="card-body d-flex flex-column">
                    <h5>Actuación Teatral</h5>
                    <p class="taller-desc">Improvisación y personajes.</p>
                    <p class="taller-info"><strong>Lunes · 18 a 20 hs</strong></p>

                    <a href="/en-construccion" class="btn btn-purple w-100 mt-auto">
                        Inscribirse
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD 8 -->
        <div class="col-md-4 taller-item">
            <div class="card taller-card h-100">
                <img src="/img/talleres/taller8.jfif" class="taller-img">
                <div class="card-body d-flex flex-column">
                    <h5>Expresión Corporal</h5>
                    <p class="taller-desc">Movimiento libre y creatividad.</p>
                    <p class="taller-info"><strong>Miércoles · 10 a 12 hs</strong></p>

                    <a href="/en-construccion" class="btn btn-purple w-100 mt-auto">
                        Inscribirse
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD 9 -->
        <div class="col-md-4 taller-item">
            <div class="card taller-card h-100">
                <img src="/img/talleres/taller9.jfif" class="taller-img">
                <div class="card-body d-flex flex-column">
                    <h5>Producción Audiovisual</h5>
                    <p class="taller-desc">Guión, grabación y edición.</p>
                    <p class="taller-info"><strong>Viernes · 18 a 20 hs</strong></p>

                    <a href="/en-construccion" class="btn btn-purple w-100 mt-auto">
                        Inscribirse
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD 10 -->
        <div class="col-md-4 taller-item">
            <div class="card taller-card h-100">
                <img src="/img/talleres/taller10.jpg" class="taller-img">
                <div class="card-body d-flex flex-column">
                    <h5>Teatro Infantil</h5>
                    <p class="taller-desc">Juegos teatrales para niños.</p>
                    <p class="taller-info"><strong>Sábados · 11 a 13 hs</strong></p>

                    <a href="/en-construccion" class="btn btn-purple w-100 mt-auto">
                        Inscribirse
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD 11 -->
        <div class="col-md-4 taller-item">
            <div class="card taller-card h-100">
                <img src="/img/talleres/taller11.jfif" class="taller-img">
                <div class="card-body d-flex flex-column">
                    <h5>Entrenamiento Escénico</h5>
                    <p class="taller-desc">Voz, cuerpo y presencia.</p>
                    <p class="taller-info"><strong>Jueves · 9 a 10 hs</strong></p>

                    <a href="/en-construccion" class="btn btn-purple w-100 mt-auto">
                        Inscribirse
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD 12 -->
        <div class="col-md-4 taller-item">
            <div class="card taller-card h-100">
                <img src="/img/talleres/taller12.jfif" class="taller-img">
                <div class="card-body d-flex flex-column">
                    <h5>Laboratorio Creativo</h5>
                    <p class="taller-desc">Exploración interdisciplinaria.</p>
                    <p class="taller-info"><strong>Domingos · 16 a 18 hs</strong></p>

                    <a href="/en-construccion" class="btn btn-purple w-100 mt-auto">
                        Inscribirse
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- PAGINACIÓN -->
    <nav class="mt-4">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" id="prev">Anterior</a>
            </li>

            <li class="page-item active">
                <span class="page-link" id="pageNumber">1</span>
            </li>

            <li class="page-item">
                <a class="page-link" href="#" id="next">Siguiente</a>
            </li>
        </ul>
    </nav>

</div>
@endsection