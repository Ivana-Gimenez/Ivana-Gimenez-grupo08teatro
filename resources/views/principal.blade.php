@extends('plantilla')

@section('content')

<!-- MAIN -->
<div class="main-content">

    <!-- CARRUSEL PRINCIPAL -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
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

        <div class="container mt-4">
            <div class="row">
                @foreach($eventos as $evento)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <img src="{{ asset('img/proxEventos/' . $evento->imagen) }}" class="card-img-top" alt="{{ $evento->nombre }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $evento->nombre }}</h5>
                            <p class="card-text">{{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($evento->hora)->format('H:i') }}</p>
                            <p class="fw-bold text-purple">${{ number_format($evento->precio, 0, ',', '.') }}</p>
                            <p class="text-muted small">🎟️ Quedan {{ $evento->stock_disponible }} entradas</p>
                            <form action="{{ route('carrito.agregar', $evento->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-purple w-100">Comprar entrada</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection