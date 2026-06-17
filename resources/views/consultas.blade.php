@extends('plantilla')

@section('content')

<div class="container mt-5">

    <h2 class="text-center mb-4">✏️ Editar Perfil</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('cliente.perfil.update') }}">
                        @csrf

                        {{-- NOMBRE --}}
                        <div class="mb-3">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ $usuario->name }}" required>
                        </div>

                        {{-- APELLIDO --}}
                        <div class="mb-3">
                            <label>Apellido</label>
                            <input type="text" name="apellido" class="form-control"
                                   value="{{ $usuario->apellido }}" required>
                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ $usuario->email }}" required>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="mb-3">
                            <label>Nueva contraseña (opcional)</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Guardar cambios
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection