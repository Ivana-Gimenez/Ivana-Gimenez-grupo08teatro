<nav class="navbar navbar-expand-lg navbar-purple shadow-sm fixed-top">

    <div class="container-fluid px-4">

        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center" href="/">

            <img src="{{ asset('img/logo1.png') }}"
                alt="Logo Teatro"
                class="logo-navbar me-2">

            <span class="text-white fw-semibold">
                Teatro de la Ciudad
            </span>

        </a>

        <!-- MENÚ MÓVIL -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- CONTENIDO DEL NAVBAR -->
        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- MENÚ PRINCIPAL -->
            <ul class="navbar-nav ms-4">

                <li class="nav-item">
                    <a class="nav-link text-white" href="/talleres">
                        Talleres
                    </a>
                </li>

                <!-- INFORMACIÓN DEL SITIO -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle text-white"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown">

                        Más Info

                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item" href="/contacto">
                                📞 Contacto
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/quienes-somos">
                                👥 Quiénes Somos
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/terminos">
                                📜 Términos y Usos
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/boleteria">
                                🎟️ Boletería
                            </a>
                        </li>

                    </ul>

                </li>

            </ul>

            <!-- BUSCADOR -->
            <form class="d-none d-lg-flex mx-auto"
                action="{{ route('eventos.buscar') }}"
                method="GET">

                <div class="input-group">

                    <input type="search"
                        name="q"
                        class="form-control border-0"
                        placeholder="Buscar evento..."
                        value="{{ request('q') }}">

                    <button class="btn btn-light border-0 px-3"
                            type="submit">
                        🔍
                    </button>

                </div>

            </form>

            <!-- MENÚ USUARIO -->
            <ul class="navbar-nav ms-auto align-items-center">

                @auth

                    <!-- OPCIONES PARA USUARIOS AUTENTICADOS -->

                    <!-- CARRITO SOLO PARA CLIENTES -->
                    @if(auth()->user()->rol_id != 1)

                        <li class="nav-item me-2">

                            <a class="nav-link text-white"
                            href="/carrito">

                                🛒

                            </a>

                        </li>

                    @endif

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-white"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown">

                            👤 {{ auth()->user()->name }}

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <!-- OPCIONES ADMINISTRADOR -->
                            @if(auth()->user()->rol_id == 1)

                                <li>
                                    <a class="dropdown-item" href="/admin">
                                        🏠 Dashboard
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/admin/eventos">
                                        🎟️ Eventos
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/admin/consultas">
                                        📩 Consultas
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('admin.compras.index') }}">
                                        📋 Gestión de Compras
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('admin.usuarios.index') }}">
                                        👥 Usuarios
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('admin.reportes.ventas') }}">
                                        📊 Ventas
                                    </a>
                                </li>

                            @else

                                <!-- OPCIONES CLIENTE -->

                                <li>
                                    <a class="dropdown-item" href="/cliente">
                                        🏠 Mi Cuenta
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/cliente/historial">
                                        📜 Historial
                                    </a>
                                </li>

                            @endif

                            <!-- CERRAR SESIÓN -->
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form method="POST" action="/logout">
                                    @csrf

                                    <button type="submit"
                                            class="dropdown-item">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </li>

                @else

                    <!-- OPCIONES PARA VISITANTES -->

                    <li class="nav-item">

                        <a class="nav-link text-white"
                        href="/login">

                            Iniciar Sesión

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link text-white"
                        href="/registro">

                            Registrarse

                        </a>

                    </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>
