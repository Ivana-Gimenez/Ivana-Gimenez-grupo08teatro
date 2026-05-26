@extends('plantilla')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-purple text-white">
            <h4>➕ Crear Nuevo Evento</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.eventos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nombre *</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Precio *</label>
                        <input type="number" step="0.01" name="precio" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Fecha *</label>
                        <input type="date" name="fecha" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Hora *</label>
                        <input type="time" name="hora" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Stock total *</label>
                        <input type="number" name="stock_total" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Imagen</label>
                        <input type="file" name="imagen" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="activo" class="form-check-input" checked>
                    <label class="form-check-label">Activo (visible en la página)</label>
                </div>

                <button type="submit" class="btn btn-purple">Guardar evento</button>
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