@extends('plantilla')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-purple text-white">
            <h3>📜 Mi Historial de Compras</h3>
        </div>
        <div class="card-body">

            @if($compras->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Compra</th>
                                <th>Fecha</th>
                                <th>Eventos</th>
                                <th>Total</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($compras as $compra)
                            <tr>
                                <td>#{{ $compra->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($compra->created_at)->format('d/m/Y H:i') }}</td>
                                <td>
                                    @foreach($compra->entradas as $entrada)
                                        <strong>{{ $entrada->evento->nombre }}</strong> ({{ $entrada->cantidad }} x ${{ number_format($entrada->precio_unitario, 0, ',', '.') }})<br>
                                    @endforeach
                                </td>
                                <td>${{ number_format($compra->total, 0, ',', '.') }}</td>
                                <td>
                                    @if($compra->estado == 'pagado')
                                        <span class="badge bg-success">Pagado</span>
                                    @elseif($compra->estado == 'pendiente')
                                        <span class="badge bg-warning">Pendiente</span>
                                    @else
                                        <span class="badge bg-danger">Cancelado</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <h4>No realizaste ninguna compra aún</h4>
                    <p>¡Explorá nuestros <a href="/">eventos</a> y comprá tu entrada!</p>
                </div>
            @endif

        </div>
    </div>
</div>

<style>
    .bg-purple { background-color: purple; }
</style>
@endsection