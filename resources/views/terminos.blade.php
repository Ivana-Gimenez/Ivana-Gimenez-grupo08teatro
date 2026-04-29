@extends('plantilla')

@section('content')
<div class="container contacto-section">

    <!-- TÍTULO -->
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="titulo-eventos">📜 Términos y Usos</h1>
            <p class="contacto-subtitulo">
                Condiciones generales del Teatro de la Ciudad de Corrientes
            </p>
        </div>
    </div>

    <div class="row g-4">

        <!-- 1 -->
        <div class="col-12">
            <div class="card contacto-card">
                <div class="card-header">
                    <h4>1. Aceptación de los términos</h4>
                </div>
                <div class="card-body contacto-texto">
                    <p>
                        Al acceder y utilizar el sitio del Teatro de la Ciudad de Corrientes, el usuario acepta los presentes términos y condiciones, que regulan el uso de la plataforma.
                    </p>
                    <p>
                        En caso de no estar de acuerdo, se recomienda no utilizar el sitio. El uso continuo implica la aceptación de posibles modificaciones.
                    </p>
                </div>
            </div>
        </div>

        <!-- 2 -->
        <div class="col-12">
            <div class="card contacto-card">
                <div class="card-header">
                    <h4>2. Privacidad</h4>
                </div>
                <div class="card-body contacto-texto">
                    <p>
                        La información personal de los usuarios será tratada con confidencialidad y conforme a la normativa vigente.
                    </p>
                    <p>
                        No se compartirá con terceros sin consentimiento, salvo en casos donde exista una obligación legal.
                    </p>
                </div>
            </div>
        </div>

        <!-- 3 -->
        <div class="col-12">
            <div class="card contacto-card">
                <div class="card-header">
                    <h4>3. Compra de entradas</h4>
                </div>
                <div class="card-body contacto-texto">
                    <p>
                        Las entradas adquiridas son personales e intransferibles. Es responsabilidad del usuario verificar correctamente los datos antes de confirmar la compra.
                    </p>
                    <p>
                        Una vez finalizada la operación, no se garantizan cambios ni correcciones.
                    </p>
                </div>
            </div>
        </div>

        <!-- 4 -->
        <div class="col-12">
            <div class="card contacto-card">
                <div class="card-header">
                    <h4>4. Devoluciones y cambios</h4>
                </div>
                <div class="card-body contacto-texto">
                    <p>
                        No se realizan devoluciones de dinero una vez confirmada la compra, excepto en caso de cancelación del evento.
                    </p>
                    <p>
                        Los cambios de fecha podrán solicitarse con al menos 48 horas de anticipación y estarán sujetos a disponibilidad.
                    </p>

                    <div class="contacto-alerta">
                        ⚠ Las solicitudes pueden ser rechazadas según disponibilidad del evento.
                    </div>
                </div>
            </div>
        </div>

        <!-- 5 -->
        <div class="col-12">
            <div class="card contacto-card">
                <div class="card-header">
                    <h4>5. Modificaciones</h4>
                </div>
                <div class="card-body contacto-texto">
                    <p>
                        El Teatro de la Ciudad de Corrientes se reserva el derecho de modificar estos términos en cualquier momento.
                    </p>
                    <p>
                        Las actualizaciones entrarán en vigencia desde su publicación, por lo que se recomienda revisar periódicamente esta sección.
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection