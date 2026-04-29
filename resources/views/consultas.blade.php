@extends('plantilla')

@section('content')
<div class="container contacto-section">

    <!-- TÍTULO -->
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="titulo-eventos">❓ Consultas</h1>
            <p class="contacto-subtitulo">
                Dejanos tu consulta y te responderemos a la brevedad
            </p>
        </div>
    </div>

    <!-- FORMULARIO -->
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card contacto-card">

                <div class="card-header">
                    <h4>📝 Formulario de Consultas</h4>
                </div>

                <div class="card-body">

                    <form>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control contacto-input" placeholder="Tu nombre">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Apellido</label>
                                <input type="text" class="form-control contacto-input" placeholder="Tu apellido">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control contacto-input" placeholder="tu@email.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" class="form-control contacto-input" placeholder="(011) 1234-5678">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipo de consulta</label>
                            <select class="form-select contacto-input">
                                <option selected>Seleccioná una opción</option>
                                <option>Entradas y eventos</option>
                                <option>Promociones y descuentos</option>
                                <option>Problemas con mi compra</option>
                                <option>Sugerencias</option>
                                <option>Otros</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mensaje</label>
                            <textarea class="form-control contacto-input" rows="5"
                                placeholder="Escribí tu consulta aquí..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-contacto w-100">
                            Enviar consulta
                        </button>

                    </form>

                </div>
            </div>

            <!-- CONTACTO INFO -->
            <div class="card contacto-card mt-4">
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

@endsection