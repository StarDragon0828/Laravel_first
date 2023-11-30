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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
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
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabela de Pagamentos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nome do Cliente</th>
                    <th>Valor</th>
                    <th>Status</th>
                    <th>Descrição</th>
                    <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($payments as $payment)
                  <tr>
                      <td>{{ $payment->id }}</td>
                      <td>{{ $payment->user->name }}</td>
                      <td>R$ {{ $payment->amount }}</td>
                      <td>
                          @if ($payment->status == 0)
                              <span class="badge bg-warning w-75">Pendente</span>
                          @elseif ($payment->status == 1)
                              <span class="badge bg-success w-75">Pago</span>
                          @endif
                      </td>
                      <td>{{ $payment->description }}</td>
                      <td>
                          <a href="{{ route('payment', $payment->id) }}">
                              <span title="Detalhes" class="badge bg-primary">Detalhes <i class="fas fa-info"></i></span>
                          </a>
                          <form style="display: inline-block" action="{{ route('pagamento.destroy', $payment->id) }}" method="POST" class="delete-form">
                              @csrf
                              @method('DELETE')
                              <button type="submit" title="Excluir" class="badge bg-danger delete-btn" style="cursor: pointer; border: none;">Excluir <i class="fas fa-trash"></i></button>
                          </form>
                      </td>
                  </tr>
              @endforeach
                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="table-pagination full-width">
                <div class="pagination-number">
                  {{ $payments->links() }}
                </div>
            </div>
            </div>
            <!-- /.card -->
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
  const closeAlert = document.querySelector('#alert-messenger svg');
  const alertContent = document.querySelector('#alert-messenger');
  closeAlert?.addEventListener('click', () => {
      alertContent.style.display = "none";
  });
</script>
<script>
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Você não poderá recuperar este Pagamento!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, exclua-o!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = button.closest('.delete-form');
                    form.submit();
                }
            });
        });
    });
</script>
@endsection