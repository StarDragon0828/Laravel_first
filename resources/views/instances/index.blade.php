@extends('layouts.app')

@section('content')
<style>
    .grid-wrapper {
        display: grid !important;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        grid-gap: 20px;
    }
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

    .loader-container {
      position: relative;
      width: 80px;
      height: 80px;
    }

    .container-loader-master {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .loader {
      position: absolute;
      width: 100%;
      height: 100%;
      border: 4px solid #ccc;
      border-top: 4px solid #3498db;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
    .emoji-cont{
      max-height: 200px;
      overflow:scroll;
      font-size: 24px;
      display: block;
      width: 100%;
      padding: .375rem .75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      box-shadow: inset 0 0 0 transparent;
      transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    .popup, #popup2 {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 100000000000000000000;
      align-items: center;
      justify-content: center;
    }

    .popup-content , .popup-content-2{
      background-color: white;
      width: 400px;
      margin: 100px auto;
      border: 1px solid #ccc;
      border-radius: 5px;
      position: relative;
    }

    .popup-content .title {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .opoup-container {
      padding: 10px;
      margin-bottom: 20px;
    }

    .opoup-container p {
      text-align: center;
    }

    .status-circle {
      display: none;
    }

    .options-disp-responsive {
      display: none !important;
    }

    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      z-index: 1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000;
    }

    #popupOverlay-2 {
      justify-content: center;
      align-items: center;
      display: none;
      
    }

    /* Estilos para el contenido del popup */
    .popup-content , .popup-content-2{
      position: absolute;
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    .popup-content-2{
      width: 90%;
      max-height: 100%;
      overflow: auto;
    }
    .pop-form-cont{
      display: flex;
      flex-direction: row;
      justify-content: space-between;
    }
    .pop-form-cont .form-content{
      width: 48%;
    }
    @media (max-width: 750px) {
      .options-disp-responsive {
        display: block !important;
      }

      .status-text {
        display: none;
      }

      .status-circle {
        display: inline;
        margin-right: 15px;
      }

      .ml-auto {
        display: none !important;
      }
    }

    .options-disp-responsive {
      display: none !important;
    }

    @media (max-width: 750px) {
      .options-disp-responsive {
        display: block !important;
      }

      .breadcrumb  {
        flex-direction: column !important;
      }

      .container-fluid .row {
        flex-direction: column;
        align-items: center;
      }
    }

    @media (max-width: 450px) {
      .container-fluid .row .card-primary {
        min-width: 100% !important;
        max-width: 100%;
      }
      .pop-form-cont{
        flex-direction: column;
      }
      .pop-form-cont .form-content{
        width: 100%;
      }
      .clm-btn {
        flex-direction: column;
        align-items: center;
      }

      .clm-btn a {
        min-width: 100%;
        margin-bottom: 10px;
      }

      .clm-btn button {
        min-width: 100% !important;
      }
      .clm-btn form {
        min-width: 100% !important;
        margin-bottom: 10px;
      }

      .content-header ol {
        flex-direction: column !important;
        min-width: 0 !important;
      }

      .content-header button {
        margin-bottom: 10px !important;
      }
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
          <div class="col-sm-3">
            <h1 class="m-0">Instâncias</h1>
          </div><!-- /.col -->
          <div class="col-md-9 col-sm-12">
            <ol class="breadcrumb float-sm-right" style="display: flex; flex-direction: row; min-width: 420px; width: 100%; justify-content: flex-end;">
              <button type="button" class="btn btn-block btn-success"
              style=" max-height: 38px; margin-top: 0; max-width: 180px; min-width: 120px; margin-right: 10px;"
              id="addInstance"><i class="fas fa-plus" style="margin-right: 5px;"></i> Adicionar Instância</button>
              <button type="button" class="btn btn-block btn-primary"
              style="max-height: 38px; margin-top: 0; max-width: 230px; min-width: 120px; margin-right: 10px;" id="openPopupBtn3"><i
              class="fas fa-plus" style="margin-right: 5px;"></i> Nova resposta automâtica</button>

              <!-- Overlay del popup -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid px-3 py-3">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div id="no-instance" class="d-flex justify-content-center align-items-center"></div>
        <div id="instances-container" class="grid-wrapper"></div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
<!-- ./wrapper -->
<div id="popup" class="popup">
  <div class="popup-content">
    <div class="opoup-container">
      <form action="{{route('add-instance')}}" method="POST">
        @csrf
        <div class="title">
          <h2 style="text-align: left;">Adicionar instância</h2>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nome</label>
          <input type="text" name="session" class="form-control" id="exampleInputEmail1" placeholder="Nome">
        </div>
        <div class="form-group" data-select2-id="29">
          <label>Velocidade de envio de mensagem</label>
          <select name="speed" class="form-control select2 select2-hidden-accessible" style="width: 100%; z-index: 1000000000000000000000000000000000000000000000000;" data-select2-id="1"
            tabindex="-1" aria-hidden="true">
            <option value="0">Lento</option>
            <option value="1">Medio</option>
            <option value="2">Rápido</option>
          </select>
        </div>
        <div class="card-footer" style="display: flex; justify-content: right;">
          <button type="button" class="btn btn-block btn-default" style="margin-right: 20px; max-width: 100px;"
          id="cancelInstance">Cancelar</button>
          <button type="submit" class="btn btn-primary" id="salvInstance">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="popup2" class="popup2">
  <div class="popup-content">
    <div class="opoup-container">
      <h2 style="text-align: center;">Generando QRCode</h2>
      <p>Aguarde, esta operação pode demorar alguns minutos.</p>
    </div>
    <div class="QRContainer">
      <div class="container-loader-master" style="display: none">
        <div class="loader-container">
          <div class="loader"></div>
        </div>
      </div>
      <div class="qr-status" style="text-align-center"></div>
      <div class="qr-image"></div>
    </div>
  </div>
</div>
<div class="overlay" id="popupOverlay-2">
  <!-- Contenido del popup -->
  <div class="popup-content-2">
    <div class="content-header" style="padding: 0;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Instâncias</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right" style="display: flex; flex-direction: row; min-width: 420px;">

              <!-- Overlay del popup -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <form action="{{ route('responders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('responders.field')
        <div class="card-footer" style="display: flex; justify-content: right;">
            <button type="button" class="btn btn-block btn-default" style="margin-right: 20px; max-width: 100px;" id="closePopupBtncan">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="closePopupBtn2">Salvar</button>
        </div>
    </form>
  </div>
</div>
@include('instances.instanceJs')
@endsection