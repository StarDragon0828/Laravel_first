<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Company Name</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link {{ Request::is('campanhas*') ? 'active' : '' }}  {{ Request::is('nueva-campanha-configuracion*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>
                Campanhas
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ route('campanhas') }}" class="nav-link {{ Request::is('campanhas*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Suas campanhas</p>
                </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('nueva-campanha-configuracion') }}" class="nav-link {{ Request::is('nueva-campanha-configuracion*') ? 'active' : '' }}">                <i class="far fa-circle nav-icon"></i>
                <p>Nueva campanha </p>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link {{ Request::is('operadores*') ? 'active' : '' }} {{ Request::is('nuevoOperador*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-ellipsis-h"></i>
            <p>
                Operadores
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ route('operadores') }}" class="nav-link {{ Request::is('operadores*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Operadores</p>
                </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('nuevoOperador') }}" class="nav-link {{ Request::is('nuevoOperador*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Nuevo Operador</p>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('instances') }}" class="nav-link {{ Request::is('instances*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-file"></i>
            <p>
                Instâncias
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('responders.index') }}" class="nav-link {{ Request::is('responders*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-comment"></i>
            <p>
                ChatBot
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('listaDeUsuarios') }}" class="nav-link {{ Request::is('listaDeUsuarios*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Lista de usuários
            </p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="{{ route('permissoes') }}" class="nav-link {{ Request::is('permissoes*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-lock"></i>
            <p>
                Lista de permissões
            </p>
            </a>
        </li> -->
        <li class="nav-item">
            <a href="{{ route('pagamento') }}" class="nav-link {{ Request::is('pagamento*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-credit-card"></i>
            <p>
                Lista de pagamento
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('Integracao') }}" class="nav-link {{ Request::is('Integração*') ? 'active' : '' }} {{ Request::is('templates*') ? 'active' : '' }}">
            <i class="fas fa-folder-plus" style="margin: 0 7px;"></i>
            <p>
                Integração
            </p>
            </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>