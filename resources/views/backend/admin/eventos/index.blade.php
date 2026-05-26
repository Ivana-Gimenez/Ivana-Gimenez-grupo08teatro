@extends('plantilla')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📋 Gestión de Eventos</h2>
        <a href="/admin/eventos/create" class="btn btn-success">+ Nuevo Evento</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>
                        @if($evento->imagen)
                            <img src="{{ asset('img/proxEventos/' . $evento->imagen) }}" width="50" style="object-fit: cover;">
                        @else
                            <span class="text-muted">Sin imagen</span>
                        @endif
                    </td>
                    <td>{{ $evento->nombre }}</td>
                    <td>{{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}</td>
                    <td>${{ number_format($evento->precio, 0, ',', '.') }}</td>
                    <td>{{ $evento->stock_disponible }} / {{ $evento->stock_total }}</td>
                    <td>
                        @if($evento->activo)
                            <span class="badge bg-success">Activo</span>
                        @else
                            <span class="badge bg-danger">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        <a href="/admin/eventos/{{ $evento->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                        <form action="/admin/eventos/{{ $evento->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection