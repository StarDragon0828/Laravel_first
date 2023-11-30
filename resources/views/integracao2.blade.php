@extends('layouts.app')

@section('content')
<style>
    .button-contianer {
      display: flex;
      flex-direction: row;
      min-width: 370px;
    }

    .button-contianer button:first-child {
      margin-right: 10px;
      max-width: 170px;
    }

    .button-contianer button:last-child {
      max-width: 190px;
      margin-top: 0;
    }

    .left-row {
      flex: 0 0 30%;
    }

    .rigt-row {
      flex: 0 0 70%;
      max-width: none;
    }

    .option-left-row {
      display: flex;
      align-items: center;
      justify-content: left;
      padding: 10px 0;
    }

    .option-left-row i {
      background-color: #9c9c9c54;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 100%;
    }

    .option-left-row p {
      margin-bottom: 0px;
      font-weight: 600;
      transform: translateY(5px);
    }

    .clearfix {
      padding-top: 12px;
    }

    .configuracion-option-request {
      display: flex;
      padding: 10px 0;
      align-items: center;
    }

    .configuracion-option-request i:nth-child(1),
    .configuracion-option-request i:last-child {
      color: #B9202F;
      background-color: #B9202F54;
    }

    .configuracion-option-request i {
      color: #218838;
      background-color: #21883854;
      display: flex;
      align-items: center;
      justify-content: center;
      min-width: 30px;
      height: 30px;
      border-radius: .25rem;
      margin-right: 10px;
    }

    .option-left-row span {
      color: #9c9c9c;
      line-height: 20px;
      transform: translateY(-8px);
    }

    .option-left-row .option {
      margin-left: 10px;
    }

    .subtitle {
      font-size: 14px;
      color: #9c9c9c;
    }

    .flex-fill .container {
      background-color: white !important;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      padding: 20px;
      height: 120px;
    }

    .flex-fill h3 {
      font-size: 16px;
      font-weight: 600;
    }

    .fa-exclamation-triangle {
      min-width: 30px;
      height: 30px;
      background-color: #ffc1062d;
      color: #FFC106;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: .25rem;
    }
    .plus-icon{
      display: flex;
      align-items: center;
      justify-content: center;
      width: 20px;
      height: 20px;
      background-color: #d9d9d942;
      color: #6d6d6d;
      border-radius: .25re;
      margin-left: 20px;
      margin-bottom: 20px;
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

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Advanced Form</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right button-contianer">
            <a style="display: inline-block; margin-right: 5px" href="{{route('Integracao.edit', $integration->id)}}"><button type="button" class="btn btn-block btn-primary"><i class="fas fa-pen"
                style="margin-right: 5px;"></i>Editar integração</button></a>
            <a href="{{route('instances')}}"><button type="button" class="btn btn-block btn-success"><i class="fas fa-bell"
                style="margin-right: 5px;"></i>Gerenciar integração</button></a>
            </ol>
        </div>
        </div>
    </div>
    </section>

    <div class="row" style="padding: 20px; padding-left: 15px;">
    <div class="col-md-6 left-row">
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">
            Instâncias Vinculadas
            </h3>
        </div>

        <div class="card-body">
            @forEach ($instances as $instance)
            <div class="option-left-row">
            <i class="fas fa-laptop-code"></i>
            <div class="option">
                <p>{{$instance->session_name}}</p>
                <span>Conectado</span>
            </div>
            </div>
            @endforeach
        </div>

        <div class="card-footer" style="text-align: center;">
        <a href="{{route('Integracao.edit', $integration->id)}}"><button type="button" class="btn btn-block btn-primary"><i class="fas fa-pen"
                style="margin-right: 10px;"></i>Editar integração</button></a>
        </div>
        </div>

    </div>

    <div class="col-md-6 rigt-row">
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">
            Sua integração está pronta para enviar mensagem
            </h3>
        </div>
        <div class="card-body clearfix">
            <p class="subtitle">Verifique se sua integração atende a esses requisitos</p>
            <div class="configuracion-option-request">
            <i class="fas fa-times"></i><span>Você não configura o modelo de mensagem de um evento, a configuração é
                necessária para que a integração funcione</span>
            </div>
            <div class="configuracion-option-request">
            <i class="fas fa-check"
                style=" color: #218838 !important;background-color: #21883854 !important;"></i><span>Você já vinculou
                pelo menos uma instância a uma integração</span>
            </div>
            <div class="configuracion-option-request">
            <i class="fas fa-check"
                style=" color: #218838 !important;background-color: #21883854 !important;"></i><span>Todas as
                instâncias vinculadas estão conectadas ao seu dispositivo</span>
            </div>
            <div class="configuracion-option-request">
            <i class="fas fa-times"></i><span>Área não reconhecemos nenhum evento. Você já tem o webhook configurado
                em sua plataforma?</span>
            </div>
        </div>

        </div>
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">
            Endereço Webhook
            </h3>
        </div>

        <div class="card-body clearfix">
            <span class="subtitle">Configuração do endereço da plataforma para receber notificações
            </span>
            <div class="input-group mb-3" style="margin-top: 20px;">
            <input type="text" class="form-control" value="http://www.ejemploquenoredirige.com">
            <div class="input-group-append">
                <span class="input-group-text"><i class="far fa-copy"></i></span>
            </div>
            </div>
        </div>

        </div>
        <div>
        <div class="card-body pb-0" style="padding: 0;">
            <div class="row">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column" >
                <div class="card bg-light d-flex flex-fill"  style="background-color: white !important;">
                <div class="container">
                    <div>
                    <h3>[PIX] Aguardando Pagamento</h3>
                    <span>Evengo atribuído quando há um pagamento pendente
                    </div>
                    </span>
                    <i class="fas fa-exclamation-triangle " ></i>
                </div>
                <i class="fas fa-plus plus-icon"></i>
                <div class="card-footer">
                    <a href="/templates/1"><button type="button" class="btn btn-block btn-success"><i class="fas fa-pen" style="margin-right: 10px;"></i>Configurar Template</button></a>
                </div>
                </div>

            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column" >
                <div class="card bg-light d-flex flex-fill"  style="background-color: white !important;">
                <div class="container">
                    <div>
                    <h3>[Outros] Aguardando pagamento</h3>
                    <span>Evengo atribuído quando há um pagamento pendente
                    </div>
                    </span>
                    <i class="fas fa-exclamation-triangle " ></i>
                </div>
                <i class="fas fa-plus plus-icon"></i>
                <div class="card-footer">
                    <a href="/templates/2"><button type="button" class="btn btn-block btn-success"><i class="fas fa-pen" style="margin-right: 10px;"></i>Configurar Template</button></a>
                </div>
                </div>

            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column" >
                <div class="card bg-light d-flex flex-fill"  style="background-color: white !important;">
                <div class="container">
                    <div>
                    <h3>Pagamento Falhou</h3>
                    <span>Evengo atribuído quando há um pagamento falhou
                    </div>
                    </span>
                    <i class="fas fa-exclamation-triangle " ></i>
                </div>
                <i class="fas fa-plus plus-icon"></i>
                <div class="card-footer">
                    <a href="/templates/3"><button type="button" class="btn btn-block btn-success"><i class="fas fa-pen" style="margin-right: 10px;"></i>Configurar Template</button></a>
                </div>
                </div>

            </div>
            </div>
        </div>
        </div>

    </div>
    </div>

</div>
<!-- /.content-wrapper -->

@endsection