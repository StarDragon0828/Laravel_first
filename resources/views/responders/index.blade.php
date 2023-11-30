@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @if (session('status'))
        <div id="alert-messenger" class="alert alert-info" style="position: absolute; z-index: 4; right: 0; bottom: 50px;">
            <svg aria-hidden="true" class="svg-icon iconClearSm" style="cursor: pointer; margin-right: 20px; fill: #fff;" width="14" height="14" viewBox="0 0 14 14"><path d="M12 3.41 10.59 2 7 5.59 3.41 2 2 3.41 5.59 7 2 10.59 3.41 12 7 8.41 10.59 12 12 10.59 8.41 7 12 3.41Z"></path></svg>
            {{ session('status') }}
        </div>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Auto Responses</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('responders.create') }}">Add New</a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('responders.table')
            </div>

            <div class="card-footer clearfix">
                <div class="float-right">
                    {{-- Pagination Links --}}
                    {{ $responders->links() }}
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


