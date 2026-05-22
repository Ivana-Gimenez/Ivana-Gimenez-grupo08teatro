@extends('plantilla')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-purple text-white">
                    <h4>Iniciar Sesión</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                           {{ $errors->first() }}
                        </div>
                          @endif
                          
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-purple w-100">Iniciar Sesión</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="/registro">¿No tenés cuenta? Registrate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-purple { background-color: purple; }
    .btn-purple { background-color: purple; color: white; }
    .btn-purple:hover { background-color: darkmagenta; }
</style>
@endsection