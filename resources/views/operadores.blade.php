@extends('layouts.app')

@section('content')
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
  @if (session('status'))
        <div id="alert-messenger" class="alert alert-info" style="position: absolute; z-index: 4; right: 0; bottom: 50px;">
            <svg aria-hidden="true" class="svg-icon iconClearSm" style="cursor: pointer; margin-right: 20px; fill: #fff;" width="14" height="14" viewBox="0 0 14 14"><path d="M12 3.41 10.59 2 7 5.59 3.41 2 2 3.41 5.59 7 2 10.59 3.41 12 7 8.41 10.59 12 12 10.59 8.41 7 12 3.41Z"></path></svg>
            {{ session('status') }}
        </div>
  @endif
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Operadores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Operadores</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <!-- /.card-header -->
        <div style="display: flex; align-items: center; justify-content: right; padding: 20px 20px;">
          <button type="button" class="btn btn-block btn-default" style="margin: 0; margin-right: 10px; max-width: 170px;">Pesquisar operador</button>
          <a href="/nuevoOperador" class="btn btn-block btn-primary d-flex align-items-center justify-content-center" style="margin: 0; height: 38px; display: inline-block; max-width: 100px; padding-top: 0px"><button type="button" class="btn btn-primary" style="margin: 0; max-width: 100px; padding-bottom: 0px">+ Novo</button></a>
        </div>
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Departamentos</th>
                  <th>Login</th>
                  <th>Status</th>
                  <th style="width: 40px">Opções</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($operators as $operator)
                      <tr>
                          <td><a href="chats/{{$operator->id}}" style="color: inherit; cursor: pointer;">{{ $operator->name }}</a></td>
                          <td>{{ $operator->department }}</td>
                          <td>{{ $operator->login }}</td>
                          <td>
                              @if ($operator->is_active)
                                  <span class="badge bg-success">Ativo</span>
                              @else
                                  <span class="badge bg-danger">Inativo</span>
                              @endif
                          </td>
                          <td>
                              <a href="chats/{{$operator->id}}"><i class="fas fa-edit"></i></a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card-body -->
        <div class="table-pagination full-width">
            <div class="pagination-number">
                {{ $operators->links() }}
            </div>
        </div> 
      </div>
      <!-- /.card -->
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