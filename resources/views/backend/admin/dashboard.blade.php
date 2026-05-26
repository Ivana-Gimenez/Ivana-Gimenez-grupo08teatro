@extends('plantilla')

@section('content')
<div class="container mt-5">
    <div class="alert alert-success">
        <h3>¡Bienvenido Admin!</h3>
        <p>Este es el panel de administración del Teatro de la Ciudad.</p>
        <hr>
        <div class="d-flex gap-3">
            <a href="/admin/eventos" class="btn btn-primary">🎟️ Gestionar Eventos</a>
            <a href="/admin/consultas" class="btn btn-info">📩 Ver Consultas</a>
        </div>
    </div>
</div>
@endsection