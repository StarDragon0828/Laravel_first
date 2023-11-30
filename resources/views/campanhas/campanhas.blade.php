@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Campanhas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Campanhas</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <div class="top-btn-cont"
        style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; padding: 0 14px;">
        <div>
          <p>Seus Campanhas de Whatsapp …</p>
        </div>
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
          <button type="button" class="btn btn-block btn-default" style="margin-right: 10px; max-width: 250px; min-width: 244px;"><i
              class="fas fa-download" style="margin-right: 5px;"></i>Ver Campanhas Encerradas</button>
          <a href="/nueva-campanha-configuracion" class="btn btn-block btn-primary" style="height: 38px; padding: 0px;margin-top: 0;"><button type="button" class="btn btn-primary" style="margin-top: 0;"> <i
              class="fas fa-plus" style="margin-right: 5px;"></i> Criar nova Campanha</button></a>
        </div>
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="container-fluid" style="width: 24.7%;">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div style="height: 0; display: flex; align-items: center; justify-content: right; transform: translateY(5px);">
                  <svg width="20" height="40" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="2.5" fill="#444" />
                    <circle cx="10" cy="20" r="2.5" fill="#444" />
                    <circle cx="10" cy="30" r="2.5" fill="#444" />
                  </svg>
                </div>
                <div style="height: 0; display: flex; align-items: center; justify-content: right; transform: translateY(5px);">
                  <svg width="20" height="40" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="2.5" fill="#444" />
                    <circle cx="10" cy="20" r="2.5" fill="#444" />
                    <circle cx="10" cy="30" r="2.5" fill="#444" />
                  </svg>
                </div>
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{ asset('dist/img/user4-128x128.jpg') }}"
                    alt="User profile picture" style="margin-bottom: 20px;">
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <a style="font-weight: 600;">99</a><br>
                    <b style="font-weight: 600;">Cliente não Informado</b> <br><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br><br>
                    <span style="font-weight: 400; padding-top: 20px;">Redirectmais.com/wpp/8481</span>
                  </li>
                </ul>
                <div class="progress" style="border-radius: 6px;">
                  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
                <p style="width: 100%; text-align: center;">1 de 2 grupos utilizados (50%)</p>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-users"
                    style="margin-right: 5px;"></i>Seus</button>
                    <a href="{{route('editar-campanha-configuracion', 1)}}" class="btn btn-block btn-default"><i class="fas fa-cog"
                    style="margin-right: 5px;"></i>Editar Campanha</a>
                <button type="button" class="btn btn-block btn-default"><i class="ion ion-stats-bars"
                    style="margin-right: 5px;"></i>Estatísticas da Campanha</button>
                <a href="{{route('campanha', 1)}}" class="btn btn-primary btn-block"><i class="far fa-envelope"
                    style="color: #ffffff; margin-right: 5px;"></i><b>Mensagens Programadas</b></a>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="container-fluid" style="width: 24.7%;">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div style="height: 0; display: flex; align-items: center; justify-content: right; transform: translateY(5px);">
                  <svg width="20" height="40" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="2.5" fill="#444" />
                    <circle cx="10" cy="20" r="2.5" fill="#444" />
                    <circle cx="10" cy="30" r="2.5" fill="#444" />
                  </svg>
                </div>
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}"
                    alt="User profile picture" style="margin-bottom: 20px;">
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <a style="font-weight: 600;">98</a><br>
                    <b style="font-weight: 600;">Cliente não Informado</b> <br><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br><br>
                    <span style="font-weight: 400; padding-top: 20px;">Redirectmais.com/wpp/8481</span>
                  </li>
                </ul>
                <div class="progress" style="border-radius: 6px;">
                  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
                <p style="width: 100%; text-align: center;">1 de 2 grupos utilizados (50%)</p>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-users"
                    style="margin-right: 5px;"></i>Seus</button>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-cog"
                    style="margin-right: 5px;"></i>Editar Campanha</button>
                <button type="button" class="btn btn-block btn-default"><i class="ion ion-stats-bars"
                    style="margin-right: 5px;"></i>Estatísticas da Campanha</button>
                <a href="#" class="btn btn-primary btn-block"><i class="far fa-envelope"
                    style="color: #ffffff; margin-right: 5px;"></i><b>Mensagens Programadas</b></a>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="container-fluid" style="width: 24.7%;">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div style="height: 0; display: flex; align-items: center; justify-content: right; transform: translateY(5px);">
                  <svg width="20" height="40" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="2.5" fill="#444" />
                    <circle cx="10" cy="20" r="2.5" fill="#444" />
                    <circle cx="10" cy="30" r="2.5" fill="#444" />
                  </svg>
                </div>
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}"
                    alt="User profile picture" style="margin-bottom: 20px;">
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <a style="font-weight: 600;">97</a><br>
                    <b style="font-weight: 600;">Cliente não Informado</b> <br><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br><br>
                    <span style="font-weight: 400; padding-top: 20px;">Redirectmais.com/wpp/8481</span>
                  </li>
                </ul>
                <div class="progress" style="border-radius: 6px;">
                  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
                <p style="width: 100%; text-align: center;">1 de 2 grupos utilizados (50%)</p>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-users"
                    style="margin-right: 5px;"></i>Seus</button>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-cog"
                    style="margin-right: 5px;"></i>Editar Campanha</button>
                <button type="button" class="btn btn-block btn-default"><i class="ion ion-stats-bars"
                    style="margin-right: 5px;"></i>Estatísticas da Campanha</button>
                <a href="#" class="btn btn-primary btn-block"><i class="far fa-envelope"
                    style="color: #ffffff; margin-right: 5px;"></i><b>Mensagens Programadas</b></a>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="container-fluid" style="width: 24.7%;">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div style="height: 0; display: flex; align-items: center; justify-content: right; transform: translateY(5px);">
                  <svg width="20" height="40" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="2.5" fill="#444" />
                    <circle cx="10" cy="20" r="2.5" fill="#444" />
                    <circle cx="10" cy="30" r="2.5" fill="#444" />
                  </svg>
                </div>
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}"
                    alt="User profile picture" style="margin-bottom: 20px;">
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <a style="font-weight: 600;">96</a><br>
                    <b style="font-weight: 600;">Cliente não Informado</b> <br><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br><br>
                    <span style="font-weight: 400; padding-top: 20px;">Redirectmais.com/wpp/8481</span>
                  </li>
                </ul>
                <div class="progress" style="border-radius: 6px;">
                  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
                <p style="width: 100%; text-align: center;">1 de 2 grupos utilizados (50%)</p>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-users"
                    style="margin-right: 5px;"></i>Seus</button>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-cog"
                    style="margin-right: 5px;"></i>Editar Campanha</button>
                <button type="button" class="btn btn-block btn-default"><i class="ion ion-stats-bars"
                    style="margin-right: 5px;"></i>Estatísticas da Campanha</button>
                <a href="#" class="btn btn-primary btn-block"><i class="far fa-envelope"
                    style="color: #ffffff; margin-right: 5px;"></i><b>Mensagens Programadas</b></a>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="container-fluid" style="width: 24.7%;">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div style="height: 0; display: flex; align-items: center; justify-content: right; transform: translateY(5px);">
                  <svg width="20" height="40" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="2.5" fill="#444" />
                    <circle cx="10" cy="20" r="2.5" fill="#444" />
                    <circle cx="10" cy="30" r="2.5" fill="#444" />
                  </svg>
                </div>
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}"
                    alt="User profile picture" style="margin-bottom: 20px;">
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <a style="font-weight: 600;">95</a><br>
                    <b style="font-weight: 600;">Cliente não Informado</b> <br><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br><br>
                    <span style="font-weight: 400; padding-top: 20px;">Redirectmais.com/wpp/8481</span>
                  </li>
                </ul>
                <div class="progress" style="border-radius: 6px;">
                  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
                <p style="width: 100%; text-align: center;">1 de 2 grupos utilizados (50%)</p>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-users"
                    style="margin-right: 5px;"></i>Seus</button>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-cog"
                    style="margin-right: 5px;"></i>Editar Campanha</button>
                <button type="button" class="btn btn-block btn-default"><i class="ion ion-stats-bars"
                    style="margin-right: 5px;"></i>Estatísticas da Campanha</button>
                <a href="#" class="btn btn-primary btn-block"><i class="far fa-envelope"
                    style="color: #ffffff; margin-right: 5px;"></i><b>Mensagens Programadas</b></a>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="container-fluid" style="width: 24.7%;">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div style="height: 0; display: flex; align-items: center; justify-content: right; transform: translateY(5px);">
                  <svg width="20" height="40" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="2.5" fill="#444" />
                    <circle cx="10" cy="20" r="2.5" fill="#444" />
                    <circle cx="10" cy="30" r="2.5" fill="#444" />
                  </svg>
                </div>
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}"
                    alt="User profile picture" style="margin-bottom: 20px;">
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <a style="font-weight: 600;">94</a><br>
                    <b style="font-weight: 600;">Cliente não Informado</b> <br><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br><br>
                    <span style="font-weight: 400; padding-top: 20px;">Redirectmais.com/wpp/8481</span>
                  </li>
                </ul>
                <div class="progress" style="border-radius: 6px;">
                  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
                <p style="width: 100%; text-align: center;">1 de 2 grupos utilizados (50%)</p>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-users"
                    style="margin-right: 5px;"></i>Seus</button>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-cog"
                    style="margin-right: 5px;"></i>Editar Campanha</button>
                <button type="button" class="btn btn-block btn-default"><i class="ion ion-stats-bars"
                    style="margin-right: 5px;"></i>Estatísticas da Campanha</button>
                <a href="#" class="btn btn-primary btn-block"><i class="far fa-envelope"
                    style="color: #ffffff; margin-right: 5px;"></i><b>Mensagens Programadas</b></a>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="container-fluid" style="width: 24.7%;">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div style="height: 0; display: flex; align-items: center; justify-content: right; transform: translateY(5px);">
                  <svg width="20" height="40" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="2.5" fill="#444" />
                    <circle cx="10" cy="20" r="2.5" fill="#444" />
                    <circle cx="10" cy="30" r="2.5" fill="#444" />
                  </svg>
                </div>
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}"
                    alt="User profile picture" style="margin-bottom: 20px;">
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <a style="font-weight: 600;">93</a><br>
                    <b style="font-weight: 600;">Cliente não Informado</b> <br><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br><br>
                    <span style="font-weight: 400; padding-top: 20px;">Redirectmais.com/wpp/8481</span>
                  </li>
                </ul>
                <div class="progress" style="border-radius: 6px;">
                  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
                <p style="width: 100%; text-align: center;">1 de 2 grupos utilizados (50%)</p>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-users"
                    style="margin-right: 5px;"></i>Seus</button>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-cog"
                    style="margin-right: 5px;"></i>Editar Campanha</button>
                <button type="button" class="btn btn-block btn-default"><i class="ion ion-stats-bars"
                    style="margin-right: 5px;"></i>Estatísticas da Campanha</button>
                <a href="#" class="btn btn-primary btn-block"><i class="far fa-envelope"
                    style="color: #ffffff; margin-right: 5px;"></i><b>Mensagens Programadas</b></a>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="container-fluid" style="width: 24.7%;">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div style="height: 0; display: flex; align-items: center; justify-content: right; transform: translateY(5px);">
                  <svg width="20" height="40" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="10" cy="10" r="2.5" fill="#444" />
                    <circle cx="10" cy="20" r="2.5" fill="#444" />
                    <circle cx="10" cy="30" r="2.5" fill="#444" />
                  </svg>
                </div>
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}"
                    alt="User profile picture" style="margin-bottom: 20px;">
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <a style="font-weight: 600;">92</a><br>
                    <b style="font-weight: 600;">Cliente não Informado</b> <br><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br>
                    <span style="font-weight: 400; padding-top: 20px;">De 03/23 até 03/08/23</span><br><br>
                    <span style="font-weight: 400; padding-top: 20px;">Redirectmais.com/wpp/8481</span>
                  </li>
                </ul>
                <div class="progress" style="border-radius: 6px;">
                  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="50"
                    aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
                <p style="width: 100%; text-align: center;">1 de 2 grupos utilizados (50%)</p>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-users"
                    style="margin-right: 5px;"></i>Seus</button>
                <button type="button" class="btn btn-block btn-default"><i class="fas fa-cog"
                    style="margin-right: 5px;"></i>Editar Campanha</button>
                <button type="button" class="btn btn-block btn-default"><i class="ion ion-stats-bars"
                    style="margin-right: 5px;"></i>Estatísticas da Campanha</button>
                <a href="#" class="btn btn-primary btn-block"><i class="far fa-envelope"
                    style="color: #ffffff; margin-right: 5px;"></i><b>Mensagens Programadas</b></a>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection