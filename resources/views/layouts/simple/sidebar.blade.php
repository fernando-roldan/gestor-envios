<nav class="navbar navbar-vertical navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item">
                    <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" href="#nv-home" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-home">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"><span class="fas fa-caret-right dropdown-indicator-icon"></span></div><span class="nav-link-icon"><span data-feather="pie-chart"></span></span><span class="nav-link-text">Home</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent {{ request()->routeIs('dashboard_default') ? 'show' : '' }}" data-bs-parent="#navbarVerticalCollapse" id="nv-home">
                                <li class="collapse-nav-item-title d-none">Home</li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('dashboard_default') ? 'active' : '' }}" href="/">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Dashboard</span>
                                        </div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <p class="navbar-vertical-label">Modulos</p>
                    <hr class="navbar-vertical-line" />
                    {{-- Parent pages --}}
                    <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" href="#nv-e-commerce" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-e-commerce">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper">
                                    <span class="fas fa-caret-right dropdown-indicator-icon"></span>
                                </div>
                                <span class="nav-link-icon">
                                    <span data-feather="users"></span>
                                </span>
                                <span class="nav-link-text">Usuarios</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent {{ request()->routeIs('admin.users.*') ? 'show' : '' }}" data-bs-parent="#navbarVerticalCollapse" id="nv-e-commerce">
                                <li class="collapse-nav-item-title d-none">
                                    Usuarios
                                </li>
                                @can('read')
                                    <li class="nav-item">
                                        <a href="#nv-admin" class="nav-link dropdown-indicator" data-bs-toggle="collapse" aria-expanded="true" aria-controls="#nv-admin">
                                            <div class="d-flex align-items-center">
                                                <div class="dropdown-indicator-icon-wrapper">
                                                    <span class="fas fa-caret-right dropdown-indicator-icon"></span>
                                                </div>
                                                <span class="nav-link-text">Administradores</span>
                                            </div>
                                        </a>
                                        {{-- Add the others pages --}}
                                        <div class="parent-wrapper">
                                            <ul class="nav collapse parent show" data-bs-parent="#e-commerce" id="nv-admin">
                                                <li class="nav-item">
                                                    <a class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                                                        <div class="d-flex align-items-center">
                                                            <span class="nav-link-text">Listado usuarios</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endcan
                                <li class="nav-item">
                                    <a href="#nv-admin" class="nav-link dropdown-indicator" data-bs-toggle="collapse" aria-expanded="true" aria-controls="#nv-admin">
                                        <div class="d-flex align-items-center">
                                            <div class="dropdown-indicator-icon-wrapper">
                                                <span class="fas fa-caret-right dropdown-indicator-icon"></span>
                                            </div>
                                            <span class="nav-link-text">Proveedores</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#nv-admin" class="nav-link dropdown-indicator" data-bs-toggle="collapse" aria-expanded="true" aria-controls="#nv-admin">
                                        <div class="d-flex align-items-center">
                                            <div class="dropdown-indicator-icon-wrapper">
                                                <span class="fas fa-caret-right dropdown-indicator-icon"></span>
                                            </div>
                                            <span class="nav-link-text">Clientes</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1" href="#nv-shippings" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-shippings">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper">
                                    <span class="fas fa-caret-right dropdown-indicator-icon"></span>
                                </div>
                                <span class="nav-link-icon">
                                    <span class="fas fa-shipping-fast"></span>
                                </span>
                                <span class="nav-link-text">Envíos</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent  {{ request()->routeIs('admin.shipping.*') ? 'show' : '' }}" data-bs-parent="#navbarVerticalCollapse" id="nv-shippings">
                                <li class="collapsed-nav-item-title d-none">Envíos
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('admin.shipping.index') ? 'active' : '' }}" href="{{ route($route . 'shipping.index') }}"> <!-- aqui lleva la clase active --> 
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Listado Envíos</span>
                                        </div>
                                    </a>
                                <!-- more inner pages-->
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="pages/pricing/pricing-grid.html">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Pricing grid</span>
                                        </div>
                                    </a>
                                <!-- more inner pages-->
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>