@extends('plantilla')

@section('content')

<div class="login-section py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-md-9 col-lg-7">

                {{-- TÍTULO --}}
                <h2 class="text-center mb-2 titulo-eventos">
                    👤 Panel de Cliente
                </h2>

                <p class="text-center subtitulo-login mb-4">
                    Gestioná tu cuenta y consultá tus compras realizadas.
                </p>

                {{-- ✅ MENSAJE DE ÉXITO --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 20px;">
                        <strong>✅ ¡Excelente!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    {{-- 🧾 BOTONES PARA FACTURA --}}
                    <div class="d-flex justify-content-center gap-3 mt-3 flex-wrap">
                        {{-- DESCARGAR PDF --}}
                        <a href="{{ session('ultima_compra') ? route('cliente.compras.pdf', session('ultima_compra')) : '#' }}"
                           class="btn btn-outline-primary"
                           target="_blank">
                            📄 Descargar Factura PDF
                        </a>

                        {{-- REENVIAR POR CORREO --}}
                        <form action="{{ route('cliente.factura.reenviar') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">
                                ✉️ Reenviar Factura por Correo
                            </button>
                        </form>
                    </div>
                @endif

                {{-- ❌ MENSAJE DE ERROR --}}
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom: 20px;">
                        <strong>❌ ¡Error!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- TARJETA PRINCIPAL --}}
                <div class="card login-card shadow-lg border-0">

                    <div class="card-body p-4 p-md-5 text-center">

                        <h4 class="fw-bold mb-3">
                            ¡Bienvenido {{ auth()->user()->name }}!
                        </h4>

                        <p class="text-muted mb-4">
                            Desde aquí podés consultar tu historial de compras y acceder a tus entradas.
                        </p>

                        {{-- BOTONES --}}
                        <div class="d-grid gap-3">

                            <a href="{{ route('cliente.historial') }}"
                               class="btn btn-login">
                                🎟️ Ver mi historial de compras
                            </a>

                            <a href="{{ route('cliente.perfil') }}"
                               class="btn btn-outline-secondary">
                                ✏️ Editar mi perfil
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection