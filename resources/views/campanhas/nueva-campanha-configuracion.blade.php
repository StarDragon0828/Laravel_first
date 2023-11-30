@extends('layouts.app')

@section('content')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header" style="width: 80%; margin: auto;">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6" style="padding-top: 50px;">
              <h1 class="m-0">Editar CONVITE VIP</h1>
                <h2 style="font-size: 16px; font-weight: 500;">Campanhas (Whatsapp) <span style="color: #6d6d6d;">> Editar CONVITE VIP</span></h2>
                <h3 style="font-size: 14px;">Precisa de ajuda criar ou editar sua campanha? <span style="color: #017BFF;">Clique aqui!</span></h3>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content" style="width: 80%; margin: auto;">

        <div class="card">
          <div class="card-header d-flex p-0">
            <ul class="nav nav-pills ml-auto p-2"
              style="display: flex; align-items: center; justify-content: space-around; width: 100%;">
              <li class="nav-item" style="width: 25%; text-align: center;"><a class="nav-link active" href="#tab_1"
                  data-toggle="tab">Informação básica</a></li>
              <li class="nav-item" style="width: 25%; text-align: center;"><a class="nav-link" href="#tab_2"
                  data-toggle="tab">Grupos</a></li>
              <li class="nav-item" style="width: 25%; text-align: center;"><a class="nav-link" href="#tab_3"
                  data-toggle="tab">Configurações</a></li>
              <li class="nav-item" style="width: 25%; text-align: center;"><a class="nav-link" href="#tab_4"
                  data-toggle="tab">Personalização</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="form-group">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Qual celular deseja usar? <span
                        style="color: #dc3545;">*</span></label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 40%;"
                      data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option>Telefônica</option>
                      <option>América Móvil</option>
                      <option>Delaware</option>
                      <option>Telecom Italia</option>
                      <option>Algar</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Quals celulares auxiliares deseja usar?</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Todos">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de Campanha <span style="color: #dc3545;">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Descrição</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cliente</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="exemplo.com">
                  </div>
                  <label>Data de término <span style="color: #dc3545;">*</span></label>
                  <div class="input-group">
                    <input type="text" class="form-control float-right" id="reservation" style="max-width: 40%;">
                    <div class="input-group-prepend" style="border-radius: 0.25rem !important;">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    
                  </div>
                  <span style="font-size: 12px; display: block; transform: translateY(-1px);">Será considerado o horário padrao GMT-3 (América/São Paulo)</span>
                  <div class="form-group" style="margin-top: 15px;">
                    <label for="exampleInputEmail1">URL de encerramento</label>
                    <div class="row" style="flex-wrap: nowrap;"><input type="text" class="form-control"
                        id="exampleInputEmail1" placeholder="www.exemplo.com"><button type="button"
                        class="btn btn-block btn-default" style=" width: 215px;min-width: 215px; margin-left: 10px;"><i
                          class="icon fas fa-info" style="margin-right: 10px;"></i>Entenda como Funciona</button></div>
                  </div>
                  <div class="form-group" style="margin-top: 15px;">
                    <label for="exampleInputEmail1">URL Personalizada</label>
                    <div class="row" style="flex-wrap: nowrap;">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">https://redirectmails.com/wpp/</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username">
                      </div>
                      <button type="button" class="btn btn-block btn-default"
                        style=" width: 215px;min-width: 215px; margin-left: 10px; height: 38px;"><i
                          class="icon fas fa-info" style="margin-right: 10px;"></i>Entenda como Funciona</button>

                    </div>
                    <div style="display: flex;
                      align-items: center;
                      justify-content: right;">
                      <button type="submit" class="btn btn-primary"
                        style="width: 80px;margin-right: 10px;">Votar</button>
                      <button type="submit" class="btn btn-primary">Próximo</button>
                    </div>
                  </div>

                  <!-- /.input group -->
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2" style="padding: 10px;">

                <div class="top-container"
                  style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 15px;">
                  <div style="display: flex; align-items: center; justify-content: space-between;">
                    <button type="button" class="btn btn-block btn-primary"
                      style="height: 38px; margin-right: 10px; min-width: 220px;">Criar grupos com a Redirect+</button>
                    <button type="button" class="btn btn-block btn-success"
                      style="margin: 0;margin-right: 10px; height: 38px; min-width: 180px;">Importar / Exportar
                      Grupos</button>
                    <button type="button" class="btn btn-block btn-default" style="margin: 0; height: 38px;">Mais
                      ações</button>
                  </div>
                  <div style="display: flex; flex-direction: column;">
                    <div>
                      <div class="progress" style="border-radius: 6px;">
                        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40"
                          aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                          <span class="sr-only">40% Complete (success)</span>
                        </div>
                      </div>
                    </div>
                    <div>Carregando informações do grupo 0 / 4</div>
                  </div>
                </div>
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nome do Grupo</th>
                        <th>Leads</th>
                        <th>Data de Criação</th>
                        <th>Link do grupo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Grupo 1</td>
                        <td>✔️ Organizando Metas 🏆 #70</td>
                        <td>
                          Carregando
                        </td>
                        <td>09/10/22 - 15:25</td>
                        <td>https://chat.whatsapp.com/liwnb</td>
                      </tr>
                      <tr>
                        <td>Grupo 2 <span class="badge badge-success" style="margin-left: 5px;">Grupo Activo</span></td>
                        <td>✔️ Organizando Metas 🏆 #71</td>
                        <td>
                          Carregando
                        </td>
                        <td>09/10/22 - 15:25</td>
                        <td>https://chat.whatsapp.com/liwnb</td>
                      </tr>
                      <tr>
                        <td>Grupo 3</td>
                        <td>✔️ Organizando Metas 🏆 #72</td>
                        <td>
                          Carregando
                        </td>
                        <td>09/10/22 - 15:25</td>
                        <td>https://chat.whatsapp.com/liwnb</td>
                      </tr>
                      <tr>
                        <td>Grupo 4</td>
                        <td>✔️ Organizando Metas 🏆 #73</td>
                        <td>
                          Carregando
                        </td>
                        <td>09/10/22 - 15:25</td>
                        <td>https://chat.whatsapp.com/liwnb</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="form-group" style="margin-top: 15px;">
                  <label for="exampleInputEmail1">Quantidade de persoas por grupo <span
                      style="color: #dc3545;">*</span></label>
                  <div class="row" style="flex-wrap: nowrap;"><input type="text" class="form-control"
                      id="exampleInputEmail1" placeholder="Enter number"><button type="button"
                      class="btn btn-block btn-default"
                      style=" width: 50px;min-width: 50px; margin-left: 10px; display: flex; justify-content: center; align-items: center;"><i
                        class="icon fas fa-info"></i></button></div>
                </div>
                <div class="form-group" style="margin-top: 15px;">
                  <label for="exampleInputEmail1">Cliques de Fallback <span style="color: #dc3545;">*</span></label>
                  <div class="row" style="flex-wrap: nowrap;"><input type="text" class="form-control"
                      id="exampleInputEmail1" placeholder="..."><button type="button" class="btn btn-block btn-default"
                      style=" width: 50px;min-width: 50px; margin-left: 10px; display: flex; justify-content: center; align-items: center;"><i
                        class="icon fas fa-info"></i></button></div>
                </div>
                <div class="form-group" style="margin-top: 15px;">
                  <label for="exampleInputEmail1">Entrada do lead</label>
                  <div class="row" style="flex-wrap: nowrap;"><input type="text" class="form-control"
                      id="exampleInputEmail1"><button type="button" class="btn btn-block btn-default"
                      style=" width: 215px;min-width: 215px; margin-left: 10px;"><i class="icon fas fa-info"
                        style="margin-right: 10px;"></i>Entenda como Funciona</button></div>
                </div>
                <h4 style="font-size: 14px;">Mensagem de Boas-vindas</h4>
                <p style="font-size: 12px;">Agora vocé pode incluir mensagens de boas -vidas com videos, imagens e muito
                  mais. <span style="color: #007bff;">Clique AQUI PARA CONFIGURA-LAS</span></p>
                <button type="submit" class="btn btn-primary" style="max-width: 300px;">Ver configurações
                  Avançadas</button>
                <div style="display: flex;
                      align-items: center;
                      justify-content: right;">
                  <button type="submit" class="btn btn-primary" style="width: 80px;margin-right: 10px;">Votar</button>
                  <button type="submit" class="btn btn-primary">Próximo</button>
                </div>
              </div>
              <div class="tab-pane" id="tab_4">
               <div style="min-height: 300px; display: flex;">
                <div style="height: 100%; padding-right: 10px;">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mostrar Página de Redirecionamiento</label>
                    <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option>Mostrar Página de Redirecionamiento</option>
                      <option>América Móvil</option>
                      <option>Delaware</option>
                      <option>Telecom Italia</option>
                      <option>Algar</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mostrar Botão</label>
                    <select class="form-control select2 select2-hidden-accessible"  data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option>Mostrar Botão "Entrar no Grupo"</option>
                      <option>América Móvil</option>
                      <option>Delaware</option>
                      <option>Telecom Italia</option>
                      <option>Algar</option>
                    </select>
                  </div>
                  <div class="form-group" style="margin-top: 15px;">
                    <label for="exampleInputEmail1">Texto do Botão Entrar no Grupo</label>
                    <div class="row" style="flex-wrap: nowrap;"><input type="text" class="form-control" id="exampleInputEmail1" placeholder="Clique aqui para Entrar"><button type="button" class="btn btn-block btn-default" style=" width: 50px;min-width: 50px; margin-left: 10px; display: flex; justify-content: center; align-items: center;"><i class="icon fas fa-info"></i></button></div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Titulo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Redirecionando...">
                  </div>
                  <div class="form-group">
                    <label>Sub-título</label>
                    <textarea class="form-control" rows="3" placeholder="Você será redirecionado para o grupo"></textarea>
                  </div>
                  <div style="margin: 40px 0;">
                    <button type="submit" class="btn btn-primary col start" style="margin-bottom: 10px;">
                      <i class="fas fa-upload"></i>
                      <span>Upload de Logo</span>
                    </button>
                    <span style="height: 10px; display: block; font-size: 12px; transform: translateY(-12px); margin-bottom: 10px;">Upload máximo de 1 MB - Imagem formato JPG.PNG.</span>
                    <button type="submit" class="btn btn-primary col start">
                      <i class="fas fa-upload"></i>
                      <span>Upload de Background</span>
                    </button>
                    <span style="height: 10px; display: block; font-size: 12px; ">Upload máximo de 1 MB - Imagem formato JPG.PNG.</span>
                  </div>
                  <div class="form-group">
                    <label>Cordo background</label>
                    <input type="text" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="">
                  </div>
                </div>
                <div style="background-color: #F2F2F2; height: 100%; width: 60%; padding: 10px; border-radius: 4px;">
                  <span style="color: #a3a3a3; font-weight: 500; margin-bottom: 10px;">Preview</span>
                  <div style="background-color: #fff; display: flex; align-items: center; justify-content: center; border-radius: 3px; flex-direction: column; height: 660px;">
                    <div>
                    <h4 style="color: #a3a3a3; font-weight: 500; text-align: center;">Redirecionando ...</h4>
                    <span style="color: #a3a3a3; font-weight: 500; text-align: center;">usado será redirecionado para a grupo</span>
                    <button type="button" class="btn btn-block btn-success btn-lg" style="margin-top: 20px;">Clique aqui para Entrar</button>
                  </div>
                  </div>
                </div>
               </div>
              </div>
            </div>
            <!-- /.tab-pane -->
          </div>

          <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
@endsection