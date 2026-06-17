<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                @if(auth()->user()->rol_id == 1)
                    <li><a class="dropdown-item" href="/admin">Panel Admin</a></li>
                    <li><a class="dropdown-item" href="/admin/eventos">🎟️ Gestionar Eventos</a></li>
                    <li><a class="dropdown-item" href="/admin/consultas">📩 Ver Consultas</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.usuarios.index') }}">👥 Ver Usuarios</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.reportes.ventas') }}">📊 Ver Ventas</a></li>
                @else
                    <li><a class="dropdown-item" href="/cliente">Mi Cuenta</a></li>
                    <li><a class="dropdown-item" href="/cliente/historial">📜 Historial de compras</a></li>
                @endif
                <li><a class="dropdown-item" href="/carrito">🛒 Mi Carrito</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link text-white" href="/login">Iniciar Sesión</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/registro">Registrarse</a>
        </li>
    @endauth
</ul>

<!-- BUSCADOR -->
<form class="d-flex" role="search" action="/buscar" method="GET">
    <input class="form-control me-2" type="search" name="q" placeholder="Buscar eventos" aria-label="Buscar">
    <button class="btn btn-outline-light" type="submit">Buscar</button>
</form>