@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/messenger/template.css') }}"/>

<div class="content-wrapper">
    @if (session('status'))
        <div id="alert-messenger" class="alert alert-info" style="position: absolute; z-index: 4; right: 0; bottom: 50px;">
            <svg aria-hidden="true" class="svg-icon iconClearSm" style="cursor: pointer; margin-right: 20px; fill: #fff;" width="14" height="14" viewBox="0 0 14 14"><path d="M12 3.41 10.59 2 7 5.59 3.41 2 2 3.41 5.59 7 2 10.59 3.41 12 7 8.41 10.59 12 12 10.59 8.41 7 12 3.41Z"></path></svg>
            {{ session('status') }}
        </div>
    @endif
  <div class="app template">
      <!-- Chat Header -->
      <div class="header">
        <ul>
            <li>billing.email</li>
            <li>billing.phone</li>
            <li>billing.cpf</li>
            <li>billing.first_name</li>
            <li>billing.last_name</li>
            <li>billing.neighborhood</li>
            <li>payment_method_title</li>
            <li>id</li>
            <li>total</li>
            <li>discount_total</li>
            <li>correios_tracking_code</li>
        </ul>
      </div>
      <!-- Chat Body -->
      <div class="wrapper">
          <!-- Chat Area -->
          <div class="chat-area">
              <div class="chat-area-main">
              </div>
              <div class="chat-area-footer">
                  <form id="messageForm" action="#" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="files">
                        <div id="preview-container" style="display: none;">
                            <div class="discard">
                                <span id="discard-button">Discard</a>
                            </div>
                            <div id="image-preview"></div>
                            <div id="document-preview">
                                <img width="24px" height="24px" src="{{asset('img/icons/files.svg')}}" alt="Files">
                                <span></span>
                            </div>
                        </div>
                        <label class="photos" for="message-img">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                <circle cx="8.5" cy="8.5" r="1.5" />
                                <path d="M21 15l-5-5L5 21" />
                            </svg>
                        </label>
                        <input type="file" name="photos" id="message-img" accept=".jpg, .jpeg, .png, .gif, .mp3, .wav, .mp4, .avi, .mov, .wmv, .webm, .ogg">
                        <label class="documents" for="message-doc">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-paperclip">
                            <path
                                d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                            </svg>
                        </label>
                        <input type="file" name="docs" id="message-doc" accept=".pdf, .doc, .docx, .txt">
                    </div>
                    <input type="text" id="message-input" name="message" placeholder="Type something here..." />
                    <svg id="emoji-button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01" />
                    </svg>
                    <div class="audio">
                        <span id="deleteButton" style="display: none">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </span>
                        <audio id="audioPlayer" style="display: none" controls></audio>
                        <div id="recordingPlayer" style="display: none;">
                            <div id="recordingAnimation"></div>
                            <span id="recordingTime">00:00</span>
                        </div>
                        <span id="pauseButton" style="display: none">
                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M6 4h4v16H6zm8 0h4v16h-4z"/>
                            </svg>
                        </span>
                    </div>
                    <svg id="audio-button" viewBox="0 0 24 24" height="24" width="24" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24" xml:space="preserve"><path fill="currentColor" d="M11.999,14.942c2.001,0,3.531-1.53,3.531-3.531V4.35c0-2.001-1.53-3.531-3.531-3.531 S8.469,2.35,8.469,4.35v7.061C8.469,13.412,9.999,14.942,11.999,14.942z M18.237,11.412c0,3.531-2.942,6.002-6.237,6.002 s-6.237-2.471-6.237-6.002H3.761c0,4.001,3.178,7.297,7.061,7.885v3.884h2.354v-3.884c3.884-0.588,7.061-3.884,7.061-7.885 L18.237,11.412z"></path></svg>
                    <button type="button" id="send-button">
                        <svg style="margin-left: 0px" viewBox="0 0 24 24" height="24" width="24" preserveAspectRatio="xMidYMid meet" class=""
                            version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24" xml:space="preserve">
                            <path fill="currentColor"
                                d="M1.101,21.757L23.8,12.028L1.101,2.3l0.011,7.912l13.623,1.816L1.112,13.845 L1.101,21.757z">
                            </path>
                        </svg>
                    </button>
                    <div class="emoji-mart">
                        <div class="emoji-mart-picker"></div>
                    </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
    <div class="d-flex justify-content-end pt-4 pr-4">
      <button class="btn btn-success">Procimio Passo</button>
    </div>
</div>
@include('template.js')
@endsection