@extends('plantilla')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">📊 Reporte de Ventas</h2>

    <!-- Tarjetas de resumen -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Entradas Vendidas</h5>
                    <h2>{{ $totalEntradas }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Recaudado</h5>
                    <h2>${{ number_format($totalRecaudado, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Total Comisiones</h5>
                    <h2>${{ number_format($totalComisiones, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Ganancia Neta</h5>
                    <h2>${{ number_format($gananciaNeta, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla detalle por evento -->
    <div class="card">
        <div class="card-header bg-purple text-white">
            <h4>📋 Detalle por Evento</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Evento</th>
                            <th>Entradas Vendidas</th>
                            <th>Total Recaudado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resumenEventos as $item)
                        <tr>
                            <td>{{ $item->evento->nombre }}</td>
                            <td>{{ $item->total_entradas }}</td>
                            <td>${{ number_format($item->total_recaudado, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total Compras realizadas:</th>
                            <th colspan="2">{{ $totalCompras }} compras</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-purple { background-color: purple; }
</style>
@endsection