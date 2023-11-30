@extends('layouts.app')

@section('content')
<style>
.content-wrapper {
  margin: 20px;
}

.content-header h1 {
  margin-bottom: 20px;
}

.box-body {
  padding: 20px;
}

.form-group {
  margin-bottom: 15px;
  display: block;
}

.btn-default {
  margin-top: 15px;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Usuario</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div style="padding-left: 20px">
                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <p>{{ $user->name }}</p>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <p>{{ $user->email }}</p>
                    </div>

                    <a href="{{ route('listaDeUsuarios') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
