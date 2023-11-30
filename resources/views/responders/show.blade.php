@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    @if (session('status'))
        <div id="alert-messenger" class="alert alert-info" style="position: absolute; z-index: 4; right: 0; bottom: 50px;">
            <svg aria-hidden="true" class="svg-icon iconClearSm" style="cursor: pointer; margin-right: 20px; fill: #fff;" width="14" height="14" viewBox="0 0 14 14"><path d="M12 3.41 10.59 2 7 5.59 3.41 2 2 3.41 5.59 7 2 10.59 3.41 12 7 8.41 10.59 12 12 10.59 8.41 7 12 3.41Z"></path></svg>
            {{ session('status') }}
        </div>
    @endif
    <section class="content-header">
        <h1>
            Response
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('responders.show_fields')
                    <a href="{!! route('responders.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
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
