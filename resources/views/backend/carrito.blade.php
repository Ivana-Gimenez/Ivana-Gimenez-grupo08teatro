@extends('plantilla')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">🛒 Mi Carrito</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($carrito->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Evento</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carrito as $item)
                    <tr>
                        <td>{{ $item->evento->nombre }}</td>
                        <td>${{ number_format($item->evento->precio, 0, ',', '.') }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>${{ number_format($item->cantidad * $item->evento->precio, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('carrito.eliminar', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Subtotal:</th>
                        <th>${{ number_format($subtotal, 0, ',', '.') }}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-end">Comisión:</th>
                        <th>${{ number_format($comision, 0, ',', '.') }}</th>
                        <th></th>
                    </tr>

                    <tr class="table-active">
                        <th colspan="3" class="text-end">Total:</th>
                        <th class="text-danger fs-5">${{ number_format($total, 0, ',', '.') }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="d-flex justify-content-between">
            <form action="{{ route('carrito.vaciar') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Vaciar carrito</button>
            </form>
            <form action="{{ route('carrito.finalizar') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Finalizar compra</button>
            </form>
        </div>
    @else
        <div class="alert alert-info text-center">
            Tu carrito está vacío. <a href="/">Seguir comprando</a>
        </div>
    @endif
</div>
@endsection