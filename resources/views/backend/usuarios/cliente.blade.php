@extends('plantilla')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-purple text-white">
                    <h3>¡Bienvenido {{ auth()->user()->name }}!</h3>
                </div>
                <div class="card-body">
                    <p>Este es el panel de clientes del Teatro de la Ciudad.</p>
                    <hr>
                    <a href="{{ route('cliente.historial') }}" class="btn btn-primary">Ver mi historial de compras</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection