<!-- session Field -->
<div class="form-group w-100">
    <label>Session</label>
    <p>{!! $responder->session !!}</p>
</div>

<!-- keyword Field -->
<div class="form-group w-100">
    <label>Keyword</label>
    <p>{!! $responder->keyword !!}</p>
</div>

<!-- response Field -->
<div class="form-group w-100">
    <label>Response</label>
    <p>{!! $responder->response !!}</p>
</div>

<!-- response_file Field -->
<div class="form-group w-100">
    <label>Uploaded File</label>
    @if($responder->response_file)
        @php
            $fileUrl = $responder->response_file;
            $fileInfo = pathinfo($fileUrl);
            $extension = strtolower($fileInfo['extension']);
        @endphp

        @if(in_array($extension, ['jpg', 'jpeg', 'png']))
            <img src="{{ $fileUrl }}" alt="Uploaded Image" class="img-responsive">
        @elseif(in_array($extension, ['pdf', 'docx', 'pptx', 'xlsx', 'csv']))
            <a href="{{ $fileUrl }}" target="_blank">View Document</a>
        @elseif($extension === 'mp3')
            <audio controls>
                <source src="{{ $fileUrl }}" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        @else
            <a href="{{ $fileUrl }}" target="_blank">Download</a>
        @endif
    @else
        No file uploaded.
    @endif
</div>

