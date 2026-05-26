@extends('plantilla')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-purple text-white">
            <h4>✏️ Editar Evento</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.eventos.update', $evento->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nombre *</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $evento->nombre }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Precio *</label>
                        <input type="number" step="0.01" name="precio" class="form-control" value="{{ $evento->precio }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Fecha *</label>
                        <input type="date" name="fecha" class="form-control" value="{{ $evento->fecha }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Hora *</label>
                        <input type="time" name="hora" class="form-control" value="{{ $evento->hora }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Stock total *</label>
                        <input type="number" name="stock_total" class="form-control" value="{{ $evento->stock_total }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Imagen actual</label>
                        @if($evento->imagen)
                            <img src="{{ asset('img/eventos/' . $evento->imagen) }}" width="80" class="d-block mb-2">
                        @endif
                        <input type="file" name="imagen" class="form-control" accept="image/*">
                        <small class="text-muted">Dejar vacío para mantener la imagen actual</small>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="3">{{ $evento->descripcion }}</textarea>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="activo" class="form-check-input" {{ $evento->activo ? 'checked' : '' }}>
                    <label class="form-check-label">Activo (visible en la página)</label>
                </div>

                <button type="submit" class="btn btn-purple">Actualizar evento</button>
                <a href="{{ route('admin.eventos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<style>
    .bg-purple { background-color: purple; }
    .btn-purple { background-color: purple; color: white; }
    .btn-purple:hover { background-color: darkmagenta; }
</style>
@endsection