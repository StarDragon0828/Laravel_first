@extends('layouts.app')

@section('content')
<style>
.content-wrapper {
  margin: 20px;
}

.content-header h1 {
  margin-bottom: 20px;
}

.card-body {
  padding: 20px;
}

ul {
  margin-bottom: 10px;
}

ul > li {
  margin-bottom: 10px;
  list-style-type: none;
}

label {
    font-weight: 600;
}
input {
    display: inline-block;
    width: 300px;
    height: 38px;
}

.btn-default {
  margin-top: 15px;
}

</style>
@if (session('status'))
      <div id="alert-messenger" class="alert alert-info" style="position: absolute; z-index: 4; right: 0; bottom: 50px;">
          <svg aria-hidden="true" class="svg-icon iconClearSm" style="cursor: pointer; margin-right: 20px; fill: #fff;" width="14" height="14" viewBox="0 0 14 14"><path d="M12 3.41 10.59 2 7 5.59 3.41 2 2 3.41 5.59 7 2 10.59 3.41 12 7 8.41 10.59 12 12 10.59 8.41 7 12 3.41Z"></path></svg>
          {{ session('status') }}
      </div>
@endif
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Atualizar Usuários</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div>
                        <!-- Name Field -->
                        <ul>
                            <li>Nome</li>
                            <li><input type="text" name="name" value="{{ $user->name }}"></li>
                        </ul>

                        <ul>
                            <li>Email</li>
                            <li>
                                <span class="email d-flex flex-column">
                                    <input type="email" name="email" value="{{ $user->email }}" />
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <a href="{{ route('listaDeUsuarios') }}" class="btn btn-default mt-0">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
  const closeAlert = document.querySelector('#alert-messenger svg');
  const alertContent = document.querySelector('#alert-messenger');
  closeAlert?.addEventListener('click', () => {
      alertContent.style.display = "none";
  });
</script>
@endsection
