@extends('layouts.app')

@section('content')
    <style>
        .left-header-integration {
        width: 20%;
        }
    </style>
    <style>
        .icon-chatbot {
        position: fixed;
        right: 30px;
        bottom: 10px;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        }

        .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 100000000000000000000;
        }

        .popup-content {
        background-color: white;
        max-width: 500px;
        margin: 100px auto;
        border: 1px solid #ccc;
        border-radius: 5px;
        position: relative;
        }

        .opoup-container {
        padding: 10px;
        margin-bottom: 50px;
        }

        .opoup-container p {
        text-align: center;
        }

        .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
        }

        /* Estilos para el fondo oscuro semi-transparente del popup personalizado */
        .custom-popup-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Puedes ajustar la opacidad cambiando el valor de '0.5' */
        z-index: 9999;
        /* Asegura que esté por encima de otros elementos */
        }

        /* Estilos para el contenido del popup personalizado */
        .custom-popup-content {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 300px;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        z-index: 10000;
        width: 400px;
        }
        .custom-popup-content .card-footer{
        justify-content: right;
        display: flex;
        }
        .custom-popup-content .card-footer button:first-child{
        margin-right: 20px;
        }
        .padding-container{
        padding: 20px;
        }

        /* Estilos para el botón de cerrar el popup personalizado */
        .custom-close-button {
        display: block;
        margin-bottom: 20px;
        cursor: pointer;
        }

        /* Opcional: Si deseas que el cursor cambie al pasar sobre el botón de cerrar */

        /* Estilos adicionales para el botón personalizado */
        .custom-close-button {
        display: flex;
        justify-content: space-between;
        text-decoration: none;
        align-items: center;
        }

        .custom-close-button label {
        font-size: 16px;
        font-size: 25px;
        line-height: 20px;
        margin-bottom: 0;
        }
        .table-responsive a{
        text-decoration: none;
        color: black;
        }
     .status-circle{
        display: none;
        }
        .options-disp-responsive{
        display: none !important;
        }
        @media (max-width: 750px) {
        .options-disp-responsive{
        display: block !important;
        }
        .status-text{
            display: none;
        }
        .status-circle{
            display: inline;
            margin-right: 15px;
        }
        .ml-auto{
            display: none !important;
        }
        }
        .responsive-list{
        display: none;
        }
        @media (max-width: 900px) {
        .row-container-respo{
            flex-direction: column !important;
        }
        .left-header-integration{
            min-width: 100%;
        }
        .col-12{
            min-width: 100%;
        }
        #openCustomPopupButton{
            margin-top: 10px;
        }
        .no-responsive-list{
            display: none !important;
        }
        .responsive-list{
        display: block;
        }
        }

    </style>
    <style>
        .table-pagination {
        margin: 40px 0px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        }
        .table-pagination .pagination-number {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        }
        .table-pagination .pagination-number nav{
        width: 100%;
        }
        .table-pagination .pagination-number nav > div{
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding: 0px 20px;
        }
        @media screen and (max-width: 480px) {
        .table-pagination .pagination-number nav > div{
            flex-direction: column;
        }
        }
        .table-pagination .pagination-number nav > div:first-child{
        display: none;
        }
        .table-pagination .pagination-number svg{
        width: 24px;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if (session('status'))
            <div id="alert-messenger" class="alert alert-info" style="position: absolute; z-index: 4; right: 0; bottom: 50px;">
                <svg aria-hidden="true" class="svg-icon iconClearSm" style="cursor: pointer; margin-right: 20px; fill: #fff;" width="14" height="14" viewBox="0 0 14 14"><path d="M12 3.41 10.59 2 7 5.59 3.41 2 2 3.41 5.59 7 2 10.59 3.41 12 7 8.41 10.59 12 12 10.59 8.41 7 12 3.41Z"></path></svg>
                {{ session('status') }}
            </div>
        @endif
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Integração</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    <button id="openCustomPopupButton" class="custom-button form-control float-right bg-primary">
                        <i class="fas fa-plus" style="margin-right: 10px;"></i> AddIntegração
                    </button>
                    </div>
                </div>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <!-- Caixas pequenas (Estatísticas) -->
            <div class="row row-container-respo" style="display: flex; flex-direction: row;">
            <div class="left-header-integration" style="display: flex;">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->

                <!-- SidebarSearch Form -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search fa-fw"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Search">
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Todos
                        </p>
                        </a>

                    </li>
                    </ul>
                </nav>
                <!-- Sidebar Menu -->
                Plataformas
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item responsive-list">
                        <a href="./operadores.html" class="nav-link">
                            <i class="nav-icon fas fa-ellipsis-h"></i>
                            <p>
                            <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                Abmex
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                ActiveCampaign
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                BaseCamp
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                Braip
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                ClickUp
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                Contact From 7
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                Digital Manager Guru
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                E-goi
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                Eduzz
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                Elementor
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                Fluent Forms
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                Greenn
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                Google Tag Manager (GTM)
                                </p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-indent"></i>
                                <p>
                                WooCommerce
                                </p>
                            </a>
                            </li>
                        </ul>
                        </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            Abmex
                        </p>
                        </a>
                    </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            ActiveCampaign
                        </p>
                        </a>
                    </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            BaseCamp
                        </p>
                        </a>
                    </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            Braip
                        </p>
                        </a>
                    </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            ClickUp
                        </p>
                        </a>
                    </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            Contact From 7
                        </p>
                        </a>
                    </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            Digital Manager Guru
                        </p>
                        </a>
                    </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            E-goi
                        </p>
                        </a>
                    </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            Eduzz
                        </p>
                        </a>
                    </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            Elementor
                        </p>
                        </a>
                    </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            Fluent Forms
                        </p>
                        </a>
                    </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            Greenn
                        </p>
                        </a>
                    </li>
                    <li class="nav-item no-responsive-list">
                        <a href="#" class="nav-link">
                        <i class="fas fa-indent"></i>
                        <p>
                            Google Tag Manager (GTM)
                        </p>
                        </a>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
                </div>
            </div>
            <div class="col-12" style="max-width:80%;">
                <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                        <th>Nome</th>
                        <th>Plataforma</th>
                        <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($integrations as $integration)
                        <tr>
                            <td><a href="{{route('Integracao2', $integration->id)}}">{{$integration->name}}</a></td>
                            <td><img src="{{ asset('dist/img/' . $integration->platform . '.png') }}" style="height: 20px;" /></td>
                            <td>
                            <a style="display: inline-block" href="{{route('Integracao2', $integration->id)}}"><span title="Detalhes" class="badge bg-primary">Detalhes <i class="fas fa-info"></i></span></a>
                            <a style="display: inline-block" href="{{ route('Integracao.edit', $integration->id) }}" title="Editar" class="badge bg-primary">Editar <i class="fas fa-pen"></i></a>
                            <form style="display: inline-block" method="POST" action="{{ route('Integracao.delete', $integration->id) }}" id="deleteForm{{$integration->id}}">
                                @csrf
                                @method('DELETE')
                                <span data-id="{{$integration->id}}" title="Excluir" class="badge bg-danger delete-btn" style="cursor: pointer">Excluir <i class="fas fa-trash"></i></span>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div class="table-pagination full-width">
                        <div class="pagination-number">
                            {{ $integrations->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>


        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
  <!-- ./wrapper -->
  <div id="customPopupContainer" class="custom-popup-container">
    <div id="customPopup" class=" custom-popup-content">
    <form method="POST" action="{{route('Integracao.store')}}">
        @csrf
        <div class="padding-container">
            <div class="crustom-modal-popup">
              <div id="closeCustomPopupButton" class="custom-close-button">
                <label for="exampleInputEmail1">Adicionar integração</label>
                <i class="fas fa-times"></i>
              </div>
              <div class="form-group">
                <label for="nombreIntegracao">Nome</label>
                <input type="text" name="name" class="form-control" id="nombreIntegracao" placeholder="Enter nome">
              </div>
              <div class="form-group">
                <label>Plataformas</label>
                <select name="platform" class="form-control select2 select2-hidden-accessible" style="width: 100%;">
                  <option value="Abmex" selected>Abmex</option>
                  <option value="ActiveCampaign">ActiveCampaign</option>
                  <option value="BaseCamp">BaseCamp</option>
                  <option value="Braip">Braip</option>
                  <option value="ClickUp">ClickUp</option>
                  <option value="ContactFrom7">Contact From 7</option>
                  <option value="DigitalManagerGuru">Digital Manager Guru</option>
                  <option value="E-goi">E-goi</option>
                  <option value="Eduzz">Eduzz</option>
                  <option value="FluentForms">Fluent Forms</option>
                  <option value="Greenn">Greenn</option>
                  <option value="GTM">Google Tag Manager (GTM)</option>
                  <option value="WooCommerce">WooCommerce</option>
                </select>
              </div>
              <div style="margin-top: 20px;">
                <span>Instâncias vinculadas</span>
                @foreach ($instances as $instance)
                <div class="custom-control custom-checkbox">
                  <input name="instances[]" id="customCheckbox{{$instance->id}}" class="custom-control-input" type="checkbox" value="{{$instance->id}}">
                  <label for="customCheckbox{{$instance->id}}" class="custom-control-label">{{$instance->session_name}}</label>
                </div>
                @endforeach
                <div style="margin-top: 20px;">
                  <span>Opções avançadas</span>
                  <div class="custom-control custom-checkbox">
                    <input id="customCheckboxDuplicate" name="ignore_duplicates" class="custom-control-input" type="checkbox" value="1">
                    <label for="customCheckboxDuplicate" class="custom-control-label">Ignorar Eventos Duplicados</label>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" id="cancelButton" class="btn btn-default float-right">Cancel</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
    </div>
    
  </div>
 
<!-- alert -->
<script>
  const closeAlert = document.querySelector('#alert-messenger svg');
  const alertContent = document.querySelector('#alert-messenger');
  closeAlert?.addEventListener('click', () => {
      alertContent.style.display = "none";
  });
</script>
<script>
const openCustomButton = document.getElementById("openCustomPopupButton");
const customPopupContainer = document.getElementById("customPopupContainer");
const closeCustomButton = document.getElementById("closeCustomPopupButton");
const closeButton = document.getElementById("cancelButton");

openCustomButton.addEventListener("click", function () {
    customPopupContainer.style.display = "block";
});

closeCustomButton.addEventListener("click", function () {
    customPopupContainer.style.display = "none";
});

closeButton.addEventListener("click", function () {
    customPopupContainer.style.display = "none";
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const integrationId = this.getAttribute('data-id');

            Swal.fire({
                title: "Estás seguro de eliminar este documento?",
                text: "Si lo eliminas, será permanente.",
                icon: "warning",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, acepto!',
                showCancelButton: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    const form = document.getElementById('deleteForm' + integrationId);
                    form.submit();
                }
            });
        });
    });
});
</script>
@endsection