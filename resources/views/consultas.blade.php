@extends('plantilla')

@section('content')
<div class="container contacto-section mt-5">

    <!-- TÍTULO -->
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h1 class="titulo-eventos">❓ Consultas</h1>
            <p class="contacto-subtitulo">
                Dejanos tu consulta y te responderemos a la brevedad
            </p>
        </div>
    </div>

    <!-- FORMULARIO -->
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow">
                <div class="card-header bg-purple text-white">
                    <h4>📝 Formulario de Consultas</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('consultas.enviar') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nombre *</label>
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo electrónico *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipo de consulta</label>
                            <select name="tipo_consulta" class="form-select @error('tipo_consulta') is-invalid @enderror">
                                <option value="">Seleccioná una opción</option>
                                <option value="Entradas y eventos" {{ old('tipo_consulta') == 'Entradas y eventos' ? 'selected' : '' }}>🎟️ Entradas y eventos</option>
                                <option value="Promociones y descuentos" {{ old('tipo_consulta') == 'Promociones y descuentos' ? 'selected' : '' }}>🏷️ Promociones y descuentos</option>
                                <option value="Problemas con mi compra" {{ old('tipo_consulta') == 'Problemas con mi compra' ? 'selected' : '' }}>❌ Problemas con mi compra</option>
                                <option value="Sugerencias" {{ old('tipo_consulta') == 'Sugerencias' ? 'selected' : '' }}>💡 Sugerencias</option>
                                <option value="Otros" {{ old('tipo_consulta') == 'Otros' ? 'selected' : '' }}>📝 Otros</option>
                            </select>
                            @error('tipo_consulta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mensaje *</label>
                            <textarea name="mensaje" class="form-control @error('mensaje') is-invalid @enderror" rows="5" required>{{ old('mensaje') }}</textarea>
                            @error('mensaje')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-purple w-100">Enviar consulta</button>
                    </form>

                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body text-center">
                    <p class="mb-0">
                        📞 También podés llamarnos al <strong>(011) 1234-5678</strong>
                        de lunes a viernes de 9 a 18 hs.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .bg-purple { background-color: purple; }
    .btn-purple { background-color: purple; color: white; }
    .btn-purple:hover { background-color: darkmagenta; }
</style>
@endsection