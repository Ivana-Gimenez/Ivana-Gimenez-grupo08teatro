@extends('plantilla')

@section('content')

<section class="eventos-section py-5">

    <div class="container">

        <h2 class="text-center titulo-eventos mb-5">
            🎨 Talleres Artísticos
        </h2>

        @if($talleres->count() > 0)

            <div class="row g-4">

                @foreach($talleres as $taller)

                    <div class="col-md-4">

                        <div class="card evento-card h-100 shadow-sm border-0">

                            <img src="{{ asset('img/talleres/' . $taller->imagen) }}"
                                 class="evento-img"
                                 alt="{{ $taller->nombre }}">

                            <div class="card-body text-center d-flex flex-column">

                                <h5 class="fw-bold">{{ $taller->nombre }}</h5>

                                <p class="text-muted mb-1">
                                    {{ $taller->descripcion }}
                                </p>

                                <p class="text-muted small mb-2">
                                    📅 {{ $taller->dias_horarios }}
                                </p>

                                <p class="text-success fw-semibold mb-2">
                                    💰 ${{ number_format($taller->precio, 0, ',', '.') }}
                                </p>

                                <p class="text-muted small mb-3">
                                    🎟️ Cupos: {{ $taller->cupos_disponibles }}
                                </p>

                                {{-- =========================
                                    BOTÓN SEGÚN ROL
                                ========================== --}}
                                @auth

                                    {{-- CLIENTE --}}
                                    @if(Auth::user()->rol_id == 2)

                                        <form action="{{ route('carrito.agregar', $taller->id) }}"
                                              method="POST"
                                              class="mt-auto">

                                            @csrf

                                            <button class="btn btn-purple w-100">
                                                Inscribirme
                                            </button>

                                        </form>

                                    @endif

                                @else

                                    {{-- INVITADO --}}
                                    <a href="{{ route('login') }}"
                                       class="btn btn-purple w-100 mt-auto">
                                        Iniciar sesión
                                    </a>

                                @endauth

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center text-muted py-5">
                <h4>🔍 No hay talleres disponibles</h4>
            </div>

        @endif

        {{-- =========================
            BOTÓN VER MÁS SEGÚN ROL
        ========================== --}}
        <div class="text-center mt-5">

            @auth

                {{-- ADMIN --}}
                @if(Auth::user()->rol_id == 1)

                    <a href="{{ route('admin.talleres.index') }}"
                       class="btn btn-primary px-4">
                        Ver gestión de talleres
                    </a>

                {{-- CLIENTE --}}
                @elseif(Auth::user()->rol_id == 2)

                    <a href="{{ route('talleres.index') }}"
                       class="btn btn-primary px-4">
                        Ver más talleres
                    </a>

                @endif

            @else

                {{-- INVITADO --}}
                <a href="{{ route('login') }}"
                   class="btn btn-primary px-4">
                    Ver más talleres
                </a>

            @endauth

        </div>

    </div>

</section>

@endsection