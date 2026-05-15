@extends('plantilla')

@section('content')

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-purple fixed-top">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo.png') }}" class="logo-navbar" alt="Logo">
            Mi sitio
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Galería</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
            </ul>
        </div>

    </div>
</nav>

<!-- MAIN -->
<div class="main-content">

    <!-- CARRUSEL PRINCIPAL -->
    <div id="carouselExampleCaptions"
         class="carousel slide"
         data-bs-ride="carousel"
         data-bs-interval="3000">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="{{ asset('img/carrusel/carrusel1.jpg') }}" class="d-block w-100 carousel-img" alt="">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/carrusel/carrusel2.jpg') }}" class="d-block w-100 carousel-img" alt="">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/carrusel/carrusel3.jpg') }}" class="d-block w-100 carousel-img" alt="">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('img/carrusel/carrusel4.jpg') }}" class="d-block w-100 carousel-img" alt="">
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>

    <!-- ===================== -->
    <!-- EVENTOS -->
    <!-- ===================== -->
    <div class="eventos-section mt-5">

        <h2 class="text-center titulo-eventos">🎭 Próximos Eventos</h2>

        <div id="eventosCarousel" class="carousel slide" data-bs-ride="false">

            <div class="carousel-inner">

                <!-- SLIDE 1 -->
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row g-4">

                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="card evento-card h-100">
                                    <img src="{{ asset('img/proxEventos/proxEvento1.jpg') }}" class="evento-img" alt="">
                                    <div class="card-body text-center d-flex flex-column">
                                        <h5>La Traviata</h5>
                                        <p class="text-muted">07 Junio</p>
                                        <button class="btn btn-purple mt-auto" onclick="alert('✅ Gracias por tu interés. Pronto nos comunicaremos contigo.')">Comprar entrada</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="card evento-card h-100">
                                    <img src="{{ asset('img/proxEventos/proxEvento5.jfif') }}" class="evento-img" alt="">
                                    <div class="card-body text-center d-flex flex-column">
                                        <h5>Concierto Sinfónico</h5>
                                        <p class="text-muted">14 Junio</p>
                                        <p class="evento-precio">$28.000</p>
                                        <button class="btn btn-purple mt-auto" onclick="alert('✅ Gracias por tu interés. Pronto nos comunicaremos contigo.');">Comprar entrada</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="card evento-card h-100">
                                    <img src="{{ asset('img/proxEventos/proxEven.jpg') }}" class="evento-img" alt="">
                                    <div class="card-body text-center d-flex flex-column">
                                        <h5>Romeo y Julieta</h5>
                                        <p class="text-muted">30 Mayo</p>
                                        <p class="evento-precio">$28.000</p>
                                        <button class="btn btn-purple mt-auto" onclick="alert('✅ Gracias por tu interés. Pronto nos comunicaremos contigo.');">Comprar entrada</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="carousel-item">
                    <div class="container">
                        <div class="row g-4">

                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="card evento-card h-100">
                                    <img src="{{ asset('img/proxEventos/proxEvento5.jpg') }}" class="evento-img" alt="">
                                    <div class="card-body text-center d-flex flex-column">
                                        <h5>Hamlet</h5>
                                        <p class="text-muted">07 Junio</p>
                                        <p class="evento-precio">$32.000</p>
                                        <button class="btn btn-purple mt-auto" onclick="alert('✅ Gracias por tu interés. Pronto nos comunicaremos contigo.');">Comprar entrada</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="card evento-card h-100">
                                    <img src="{{ asset('img/proxEventos/proxEvento6.jfif') }}" class="evento-img" alt="">
                                    <div class="card-body text-center d-flex flex-column">
                                        <h5>Bernarda Alba</h5>
                                        <p class="text-muted">14 Junio</p>
                                        <p class="evento-precio">$28.000</p>
                                        <button class="btn btn-purple mt-auto" onclick="alert('✅ Gracias por tu interés. Pronto nos comunicaremos contigo.');">Comprar entrada</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="card evento-card h-100">
                                    <img src="{{ asset('img/proxEventos/proxEvento4.jpg') }}" class="evento-img" alt="">
                                    <div class="card-body text-center d-flex flex-column">
                                        <h5>Lago de los Cisnes</h5>
                                        <p class="text-muted">30 Mayo</p>
                                        <p class="evento-precio">$28.000</p>
                                        <button class="btn btn-purple mt-auto" onclick="alert('✅ Gracias por tu interés. Pronto nos comunicaremos contigo.');">Comprar entrada</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- CONTROLES -->
            <button class="carousel-control-prev" type="button" data-bs-target="#eventosCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#eventosCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

    </div>

</div>

@endsection

