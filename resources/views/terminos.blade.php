@extends('plantilla')

@section('content')

<div class="container py-5 contacto-section">

    <!-- TÍTULO -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="titulo-eventos">📜 Términos y Usos</h1>

            <p class="subtitulo-login text-muted fs-5">
                Condiciones generales del Teatro de la Ciudad de Corrientes
            </p>
        </div>
    </div>

    <!-- INTRO -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-9">
            <div class="card login-card shadow-sm border-0">
                <div class="card-body">
                    <p class="texto-justificado mb-0">
                        Estas condiciones regulan el uso del sitio web y los servicios del Teatro de la Ciudad.
                        Al acceder, el usuario acepta los términos aquí descriptos.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENIDO -->
    <div class="row g-4">

        @php
        $terminos = [
            [
                "titulo" => "📌 Aceptación de los términos",
                "textos" => [
                    "Al acceder al sitio, el usuario acepta los presentes términos y condiciones.",
                    "El uso continuo implica la aceptación de futuras modificaciones."
                ]
            ],
            [
                "titulo" => "🔐 Privacidad",
                "textos" => [
                    "La información personal será tratada de forma confidencial.",
                    "No se comparte con terceros salvo obligación legal."
                ]
            ],
            [
                "titulo" => "🎟️ Compra de entradas",
                "textos" => [
                    "Las entradas son personales e intransferibles.",
                    "Es responsabilidad del usuario verificar los datos antes de confirmar la compra."
                ]
            ],
            [
                "titulo" => "🔄 Devoluciones y cambios",
                "textos" => [
                    "No se realizan devoluciones salvo cancelación del evento.",
                    "Los cambios están sujetos a disponibilidad y deben solicitarse con 48 hs de anticipación."
                ],
                "alerta" => "⚠ Sujeto a disponibilidad del evento."
            ],
            [
                "titulo" => "⚙️ Modificaciones",
                "textos" => [
                    "El Teatro puede modificar estos términos en cualquier momento.",
                    "Las actualizaciones entran en vigencia desde su publicación."
                ]
            ],
        ];
        @endphp

        @foreach($terminos as $item)

        <div class="col-12">

            <div class="card login-card shadow-sm border-0">

                <div class="card-body">

                    <h4 class="text-center text-purple fw-bold mb-4">
                        {{ $item['titulo'] }}
                    </h4>

                    @foreach($item['textos'] as $texto)
                        <p class="texto-justificado mb-3">
                            {{ $texto }}
                        </p>
                    @endforeach

                    @if(isset($item['alerta']))
                        <div class="text-center text-muted mt-3">
                            <strong>{{ $item['alerta'] }}</strong>
                        </div>
                    @endif

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection