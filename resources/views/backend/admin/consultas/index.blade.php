@extends('plantilla')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📩 Consultas de Usuarios</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->id }}</td>
                    <td>{{ $consulta->nombre }}</td>
                    <td>{{ $consulta->email }}</td>
                    <td>{{ $consulta->tipo_consulta ?? '-' }}</td>
                    <td>{{ Str::limit($consulta->mensaje, 50) }}</td>
                    <td>{{ \Carbon\Carbon::parse($consulta->created_at)->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($consulta->leido)
                            <span class="badge bg-success">Leído</span>
                        @else
                            <span class="badge bg-warning">No leído</span>
                        @endif
                    </td>
                    <td>
                        @if(!$consulta->leido)
                            <form action="{{ route('admin.consultas.leida', $consulta->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-info">Marcar leída</button>
                            </form>
                        @endif
                        <form action="{{ route('admin.consultas.destroy', $consulta->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta consulta?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection