<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block" style="display: flex !important; align-items: center;">
        <b href="index3.html" class="nav-link" style="padding-right: 3px;">Status:</b>
        <b style="color: #27A745; margin-right: 15px;">Conected</b>
        <button type="button" class="btn btn-block btn-outline-danger"
        style="height: 15px; padding: 0 10px; display: flex; align-items: center; height: 27px;">Desconectar</button>
    </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" style="display: flex; align-items: center;">
    <!-- Navbar Search -->
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-eye"
            style="margin-right: 5px;"></i>Operadores online (7)</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-language"
            style="margin-right: 5px; transform: translateY(3px);"></i>en-us</a>
    </li>
    <li class="nav-item">
        <button type="button" class="btn btn-block btn-default"
        style="height: 30px; padding: 0 10px; border-radius: 10px;">Tema<i class="fas fa-chevron-down"
            style="margin-left: 5px; color: rgba(0,0,0,.5);"></i></button>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" role="button"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"
            style="margin-right: 5px;"></i>Salir</a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>



    </ul>
</nav>
<!-- /.navbar -->