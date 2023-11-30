@extends('layouts.app')

@section('content')
<style>
    .emoji-cont{
      max-height: 200px;
      overflow:scroll;
      font-size: 24px;
      display: block;
      width: 100%;
      padding: .375rem .75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      box-shadow: inset 0 0 0 transparent;
      transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    @media (max-width: 750px) {

      .container-fluid .row {
        flex-direction: column;
        align-items: center;
      }
    }

    @media (max-width: 450px) {
      .container-fluid .row .card-primary {
        min-width: 100% !important;
        max-width: 100%;
      }
      .pop-form-cont{
        flex-direction: column;
      }
      .pop-form-cont .form-content{
        width: 100%;
      }
      .clm-btn {
        flex-direction: column;
        align-items: center;
      }

      .clm-btn a {
        min-width: 100%;
        margin-bottom: 10px;
      }

      .clm-btn button {
        min-width: 100% !important;
      }

      .content-header ol {
        flex-direction: column !important;
        min-width: 0 !important;
      }

      .content-header button {
        margin-bottom: 10px !important;
      }
    }
</style>
<div class="content-wrapper p-3">
    @if (session('status'))
        <div id="alert-messenger" class="alert alert-info" style="position: absolute; z-index: 4; right: 0; bottom: 50px;">
            <svg aria-hidden="true" class="svg-icon iconClearSm" style="cursor: pointer; margin-right: 20px; fill: #fff;" width="14" height="14" viewBox="0 0 14 14"><path d="M12 3.41 10.59 2 7 5.59 3.41 2 2 3.41 5.59 7 2 10.59 3.41 12 7 8.41 10.59 12 12 10.59 8.41 7 12 3.41Z"></path></svg>
            {{ session('status') }}
        </div>
    @endif
    <div class="overlay" id="popupOverlay-2">
    <!-- Contenido del popup -->
    <div class="popup-content-2">
        <div class="content-header" style="padding: 0;">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Instâncias</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right" style="display: flex; flex-direction: row; min-width: 420px;">

                <!-- Overlay del popup -->
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <form action="{{ route('responders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('responders.field')
            <div class="card-footer" style="display: flex; justify-content: right;">
                <a href="{{ route('responders.index') }}">
                    <button type="button" class="btn btn-block btn-default" style="margin-right: 20px; max-width: 100px;" id="closePopupBtncan">Cancelar</button>
                </a>    
                <button type="submit" class="btn btn-primary" id="closePopupBtn2">Salvar</button>
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
