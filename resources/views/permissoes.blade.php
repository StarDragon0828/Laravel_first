@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Lista de Permissões</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Permissões</li>
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
                <h3 class="card-title">Permissões</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th>Permissão</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>criar_usuario</td>
                    <td>Permite criar usuários no sistema</td>
                    <td>
                        <span title="Editar" class="badge bg-primary">Editar <i class="fas fa-pen"></i></span>
                        <span title="Excluir" class="badge bg-danger">Excluir <i class="fas fa-trash"></i></span>
                    </td>
                    </tr>
                    <tr>
                    <td>editar_usuario</td>
                    <td>Permite editar informações de um usuário</td>
                    <td>
                        <span title="Editar" class="badge bg-primary">Editar <i class="fas fa-pen"></i></span>
                        <span title="Excluir" class="badge bg-danger">Excluir <i class="fas fa-trash"></i></span>
                    </td>
                    </tr>
                    <tr>
                    <td>excluir_usuario</td>
                    <td>Permite excluir usuários do sistema</td>
                    <td>
                        <span title="Editar" class="badge bg-primary">Editar <i class="fas fa-pen"></i></span>
                        <span title="Excluir" class="badge bg-danger">Excluir <i class="fas fa-trash"></i></span>
                    </td>
                    </tr>
                    <tr>
                    <td>visualizar_relatorios</td>
                    <td>Permite visualizar relatórios do sistema</td>
                    <td>
                        <span title="Editar" class="badge bg-primary">Editar <i class="fas fa-pen"></i></span>
                        <span title="Excluir" class="badge bg-danger">Excluir <i class="fas fa-trash"></i></span>
                    </td>
                    </tr>
                    <tr>
                    <td>gerenciar_configuracoes</td>
                    <td>Permite gerenciar as configurações do sistema</td>
                    <td>
                        <span title="Editar" class="badge bg-primary">Editar <i class="fas fa-pen"></i></span>
                        <span title="Excluir" class="badge bg-danger">Excluir <i class="fas fa-trash"></i></span>
                    </td>
                    </tr>
                    <!-- Adicione mais linhas para outras permissões -->
                </tbody>
                </table>
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
@endsection