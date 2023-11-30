@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div id="alert-messenger" class="alert alert-info" style="position: absolute; z-index: 4; right: 0; bottom: 50px;">
            <svg aria-hidden="true" class="svg-icon iconClearSm" style="cursor: pointer; margin-right: 20px; fill: #fff;" width="14" height="14" viewBox="0 0 14 14"><path d="M12 3.41 10.59 2 7 5.59 3.41 2 2 3.41 5.59 7 2 10.59 3.41 12 7 8.41 10.59 12 12 10.59 8.41 7 12 3.41Z"></path></svg>
            {{ session('status') }}
        </div>
    @endif
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Novo Operador</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Novo Operador</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="/operadores">
              @csrf
              <div class="card-body">
                  <div style="display: flex; justify-content: space-between;">
                      <div class="form-group" style="width: 100%; padding-right: 20px;">
                          <label for="nameOp">Nome do operador</label>
                          <input type="text" name="name" class="form-control" id="nameOp" placeholder="Enter nome" required>
                      </div>
                      <div class="form-group" style="width: 100%; padding-right: 20px;">
                          <label for="loginOP">Login</label>
                          <input type="text" name="login" class="form-control" id="loginOP" placeholder="Login nome" required>
                      </div>
                      <div class="form-group" style="width: 100%;">
                          <label for="passwordOp">Senha</label>
                          <input type="password" name="password" class="form-control" id="passwordOp" placeholder="Password" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="deptOp">Departamentos</label>
                      <select name="department" class="form-control select2 select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                          <option disabled selected>Selecione os departamentos</option>
                          <option>América Móvil</option>
                          <option>Delaware</option>
                          <option>Telecom Italia</option>
                          <option>Algar</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input type="hidden" name="is_admin" value="0"> <!-- Hidden input for false value -->
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="is_admin" value="1">
                        <label class="custom-control-label" for="customSwitch1">Administrador</label>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input type="hidden" name="is_active" value="0">
                          <input type="checkbox" class="custom-control-input" id="customSwitch3" name="is_active" value="1" checked>
                          <label class="custom-control-label" for="customSwitch3">Status Active</label>
                      </div>
                  </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Salvar dados</button>
                  <a href="/operadores"><button type="button" class="btn btn-primary" style="margin-left: 10px;">Voltar</button></a>
              </div>
          </form>

        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- alert -->
    <script>
      const closeAlert = document.querySelector('#alert-messenger svg');
      const alertContent = document.querySelector('#alert-messenger');
      closeAlert?.addEventListener('click', () => {
          alertContent.style.display = "none";
      });
</script>
@endsection