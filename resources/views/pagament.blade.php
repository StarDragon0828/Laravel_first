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
        <h1>Pagamento</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div style="padding-left: 20px">
                    <div class="form-group">
                        <label for="name">Nome do Cliente:</label>
                        <p>{{ $payment->user->name }}</p>
                    </div>

                    <div class="form-group">
                        <label for="amount">Valor:</label>
                        <p>{{ $payment->amount }}</p>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <p>
                            @if($payment->status === 0)
                                Pendente
                            @else
                                Pago
                            @endif
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="description">Descrição:</label>
                        <p>{{ $payment->description }}</p>
                    </div>

                    <a href="{{ route('pagamento') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
