<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Session</th>
                <th>Keyword</th>
                <th>Percentage</th>
                <th>Response</th>
                <th>Response File</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($responders as $responder)
                <tr>
                    <td>{!! $responder->session !!}</td>
                    <td>{!! $responder->keyword !!}</td>
                    <td>{!! $responder->percentage !!} %</td>
                    <td>{!! $responder->response !!}</td>
                    <td>
                        @php
                            $extension = pathinfo($responder->response_file, PATHINFO_EXTENSION);
                        @endphp

                        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']))
                            <img src="{{ $responder->response_file }}" alt="Image" width="50">
                        @elseif (in_array($extension, ['mp3']))
                            <audio controls>
                                <source src="{{ $responder->response_file }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        @elseif (in_array($extension, ['pdf', 'docx', 'ppx', 'xlsx', 'csv']))
                            <a href="{{ $responder->response_file }}" target="_blank">Download File</a>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('responders.destroy', [$responder->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class='btn-group'>
                                <a href="{!! route('responders.show', [$responder->id]) !!}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{!! route('responders.edit', [$responder->id]) !!}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                <button type="button" class="deleteItem btn btn-default btn-xs"><i class="far fa-trash-alt"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    document?.addEventListener('DOMContentLoaded', function() {
        $('.deleteItem').click(function(event){
            event.stopPropagation();
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: "Estas seguro de eliminar este documento?",
                text: "Isi lo elimina sera por siempre.",
                icon: "warning",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si acepto!',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        })
    })
</script>

