<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }}</title>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<link rel="stylesheet" href="{{ asset('css/messenger/style.css') }}"/>
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
<!-- sweetalert2 -->
<link rel="stylesheet" href="/plugins/sweetalert2/sweetalert2.min.css">
<div class="content-wrapper">
    @if (session('status'))
        <div id="alert-messenger" class="alert alert-info" style="position: absolute; z-index: 4; right: 0; bottom: 50px;">
            <svg aria-hidden="true" class="svg-icon iconClearSm" style="cursor: pointer; margin-right: 20px; fill: #fff;" width="14" height="14" viewBox="0 0 14 14"><path d="M12 3.41 10.59 2 7 5.59 3.41 2 2 3.41 5.59 7 2 10.59 3.41 12 7 8.41 10.59 12 12 10.59 8.41 7 12 3.41Z"></path></svg>
            {{ session('status') }}
        </div>
    @endif
  <div class="app">
      <!-- Chat Header -->
      <div class="header">
          <div class="logo">
              <svg viewBox="0 0 513 513" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path
                      d="M256.025.05C117.67-2.678 3.184 107.038.025 245.383a240.703 240.703 0 0085.333 182.613v73.387c0 5.891 4.776 10.667 10.667 10.667a10.67 10.67 0 005.653-1.621l59.456-37.141a264.142 264.142 0 0094.891 17.429c138.355 2.728 252.841-106.988 256-245.333C508.866 107.038 394.38-2.678 256.025.05z" />
                  <path
                      d="M330.518 131.099l-213.825 130.08c-7.387 4.494-5.74 15.711 2.656 17.97l72.009 19.374a9.88 9.88 0 007.703-1.094l32.882-20.003-10.113 37.136a9.88 9.88 0 001.083 7.704l38.561 63.826c4.488 7.427 15.726 5.936 18.003-2.425l65.764-241.49c2.337-8.582-7.092-15.72-14.723-11.078zM266.44 356.177l-24.415-40.411 15.544-57.074c2.336-8.581-7.093-15.719-14.723-11.078l-50.536 30.744-45.592-12.266L319.616 160.91 266.44 356.177z"
                      fill="#fff" />
              </svg>

          </div>
          <div class="search-bar">
              <input type="text" id="searchInput" placeholder="Search..." />
          </div>
          <div class="user-settings">
              <div class="dark-light">
                  <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
                      stroke-linejoin="round">
                      <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                  </svg>
              </div>
              <div class="settings">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="3" />
                      <path
                          d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" />
                  </svg>
              </div>
              <img class="user-profile"
                  src="{{ $profile }}" alt=""
                  class="account-profile" alt="">
          </div>
      </div>
      <!-- Chat Body -->
      <div class="wrapper">
          <!-- Conversations -->
            <div class="conversation-area openIn780">
                <div class="tools-chat">
                    <div class="tools">
                        <i class="far fa-comment-dots" style="padding: 0px 5px"></i>
                        <i class="fas fa-users" style="padding: 0px 5px"></i>
                        <svg width="20" height="40" xmlns="http://www.w3.org/2000/svg" style="margin: 0 5px;">
                            <circle cx="10" cy="14" r="1.8" fill="#444"></circle>
                            <circle cx="10" cy="20" r="1.8" fill="#444"></circle>
                            <circle cx="10" cy="26" r="1.8" fill="#444"></circle>
                        </svg>
                    </div>
                    <div class="option-chat">
                        <div class="part">
                            <li class="active">Chats (231)</li>
                            <li>Espera (12)</li>
                        </div>
                        <div class="part">
                            <li>Andemiento (1)</li>
                            <li>Menus (0)</li>
                        </div>
                    </div>
                </div>
                <div class="conversations">
                    <div class="loading-conversation" style="display: none;">Loading...</div>
                    <p class="conversation-not-found" style="display: none;">No matching contacts found.</p>
                    @if(count($contacts) == 0)
                    <div class="empty-conversation" style="height: 50%; width: 100%; display: flex; justify-content: center; align-items: flex-end;">
                        <p>Adicione contato para começar a enviar mensagens</p>
                    </div>
                    @endif
                </div>
                <div class="user-add-contact" id="i18-contact">
                <form id="i18-form" action="{{ route('add-recipient', [$instance_id]) }}" method="POST">
                    @csrf
                    <p>Add Recipient Phone Number:</p>
                    <input id="i18l-phone" type="tel" name="phone" />
                    <button type="button" class="btn" onclick="process(event)">Add Contact</button>    
                </form>
                </div>
                <button class="add" id="i18open"></button>
            </div>
          <!-- Chat Default -->
          <div class="chat-default-area open">
              <p>Selecione bate-papo para começar a enviar mensagens</p>
          </div>
          <!-- Chat Area -->
          <div class="chat-area">
              <div class="chat-area-header">
                  <div class="chat-area-title" style="display: flex; align-item: center;">
                      <svg viewBox="0 0 24 24" height="24" width="24" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24" xml:space="preserve"><path fill="currentColor" d="M12,4l1.4,1.4L7.8,11H20v2H7.8l5.6,5.6L12,20l-8-8L12,4z"></path></svg>
                      <p style="margin: 0px">Contact Name</p>
                      <p id="message-state" style="margin: 0px; margin-top: 5px; margin-left: 5px; font-size: 12px;"></p>
                  </div>
                  <div class="chat-area-group">
                      <img class="chat-area-profile"
                          src="https://i.ibb.co/6WgZryJ/default.png"
                          alt="profile" />
                      <div class="chat-area-more-feature">
                          <svg height="24px" name="icon" role="presentation" viewBox="0 0 36 36" width="24px"><g transform="translate(18,18)scale(1.2)translate(-18,-18)"><path d="M18,10 C16.6195,10 15.5,11.119 15.5,12.5 C15.5,13.881 16.6195,15 18,15 C19.381,15 20.5,13.881 20.5,12.5 C20.5,11.119 19.381,10 18,10 Z M16,25 C16,25.552 16.448,26 17,26 L19,26 C19.552,26 20,25.552 20,25 L20,18 C20,17.448 19.552,17 19,17 L17,17 C16.448,17 16,17.448 16,18 L16,25 Z M18,30 C11.3725,30 6,24.6275 6,18 C6,11.3725 11.3725,6 18,6 C24.6275,6 30,11.3725 30,18 C30,24.6275 24.6275,30 18,30 Z" fill="currentColor" stroke="currentColor"></path></g></svg>
                      </div>
                  </div>
              </div>
              <div class="chat-area-main">
                <div id="loading-indicator" style="display: none; position: absolute; width: 100%; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 4; text-align: center;">
                    <div id="loading-dots" style="text-align: center">Loading</div>
                </div>
              </div>
              <div class="chat-area-footer">
                  <form id="messageForm" action="{{ route('send-message') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <!-- <svg id="video-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video">
                        <path d="M23 7l-7 5 7 5V7z" />
                        <rect x="1" y="5" width="15" height="14" rx="2" ry="2" />
                    </svg> -->
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-plus-circle">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 8v8M8 12h8" />
                    </svg> -->
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
                    <input type="hidden" id="recipient-phone" name="phone">
                    <input type="hidden" name="instance_id" value="{{$instance_id}}">
                    <input type="hidden" id="recipient-id" name="whatsapp_user_id">
                    <svg id="emoji-button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01" />
                    </svg>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-thumbs-up">
                        <path
                            d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3zM7 22H4a2 2 0 01-2-2v-7a2 2 0 012-2h3" />
                    </svg> -->
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
          <!-- Detail Area -->
          <div class="detail-area">
              <div class="close-area">
                  <svg viewBox="0 0 24 24" height="24" width="24" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24" xml:space="preserve"><path fill="currentColor" d="M12,4l1.4,1.4L7.8,11H20v2H7.8l5.6,5.6L12,20l-8-8L12,4z"></path></svg>
              </div>
              <div class="detail-area-header">
                  <div class="msg-profile group">
                      <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                          stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                          <path d="M12 2l10 6.5v7L12 22 2 15.5v-7L12 2zM12 22v-6.5" />
                          <path d="M22 8.5l-10 7-10-7" />
                          <path d="M2 15.5l10-7 10 7M12 2v6.5" />
                      </svg>
                  </div>
                  <div class="detail-title">CodePen Group</div>
                  <div class="detail-subtitle">Created by Aysenur, 1 May 2020</div>
                  <div class="detail-buttons">
                      <button class="detail-button">
                          <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                              stroke="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-phone">
                              <path
                                  d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" />
                          </svg>
                          Call Group
                      </button>
                      <button class="detail-button">
                          <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                              stroke="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-video">
                              <path d="M23 7l-7 5 7 5V7z" />
                              <rect x="1" y="5" width="15" height="14" rx="2" ry="2" />
                          </svg>
                          Video Chat
                      </button>
                  </div>
              </div>
              <div class="detail-changes">
                  <input type="text" placeholder="Search in Conversation">
                  <div class="detail-change">
                      Change Color
                      <div class="colors">
                          <div class="color blue selected" data-color="blue"></div>
                          <div class="color purple" data-color="purple"></div>
                          <div class="color green" data-color="green"></div>
                          <div class="color orange" data-color="orange"></div>
                      </div>
                  </div>
                  <div class="detail-change">
                      Change Emoji
                      <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-thumbs-up">
                          <path
                              d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3zM7 22H4a2 2 0 01-2-2v-7a2 2 0 012-2h3" />
                      </svg>
                  </div>
              </div>
              <div class="detail-photos">
                  <div class="detail-photo-title">
                      <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-image">
                          <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                          <circle cx="8.5" cy="8.5" r="1.5" />
                          <path d="M21 15l-5-5L5 21" />
                      </svg>
                      Shared photos
                  </div>
                  <div class="detail-photo-grid">
                      <img
                          src="https://images.unsplash.com/photo-1523049673857-eb18f1d7b578?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2168&q=80" />
                      <img
                          src="https://images.unsplash.com/photo-1516085216930-c93a002a8b01?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2250&q=80" />
                      <img
                          src="https://images.unsplash.com/photo-1458819714733-e5ab3d536722?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=933&q=80" />
                      <img
                          src="https://images.unsplash.com/photo-1520013817300-1f4c1cb245ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2287&q=80" />
                      <img
                          src="https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2247&q=80" />
                      <img
                          src="https://images.unsplash.com/photo-1559181567-c3190ca9959b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1300&q=80" />
                      <img
                          src="https://images.unsplash.com/photo-1560393464-5c69a73c5770?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1301&q=80" />
                      <img
                          src="https://images.unsplash.com/photo-1506619216599-9d16d0903dfd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2249&q=80" />
                      <img
                          src="https://images.unsplash.com/photo-1481349518771-20055b2a7b24?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2309&q=80" />
  
                      <img
                          src="https://images.unsplash.com/photo-1473170611423-22489201d919?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2251&q=80" />
                      <img
                          src="https://images.unsplash.com/photo-1579613832111-ac7dfcc7723f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2250&q=80" />
                      <img
                          src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2189&q=80" />
                  </div>
                  <div class="view-more">View More</div>
              </div>
          </div>
      </div>
  </div>
</div>
<script src="{{ asset('plugins/emoji/mart.js') }}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.js"></script> -->
<!-- Contact Handling -->
<script>
    const phoneInputField = document.querySelector("#i18l-phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
    function process(event) {
        event.preventDefault();

        const phoneNumber = phoneInput.getNumber();
        const stringValue = phoneNumber.toString();
        const withoutPlus = stringValue.slice(1);
        phoneInputField.value = withoutPlus;
        // Get the form associated with the button
        const form = document.getElementById('i18-form');
        // Submit the form
        form.submit();
    }
    const openButton = document.querySelector('#i18open');
    const contactContent = document.querySelector('#i18-contact');
    openButton.addEventListener('click', () => {
        openButton.classList.toggle('active');
        contactContent.classList.toggle('active');
    })
    const closeAlert = document.querySelector('#alert-messenger svg');
    const alertContent = document.querySelector('#alert-messenger');
    closeAlert?.addEventListener('click', () => {
        alertContent.style.display = "none";
    });
</script>
<!-- Dark Theme Handling -->
<script>
    const toggleButton = document.querySelector('.dark-light');
    const colors = document.querySelectorAll('.color');

    colors.forEach(color => {
        color.addEventListener('click', (e) => {
            colors.forEach(c => c.classList.remove('selected'));
            const theme = color.getAttribute('data-color');
            document.body.setAttribute('data-theme', theme);
            color.classList.add('selected');
        });
    });

    toggleButton.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });
</script>
<!-- Display Contacts -->
<script>
    // Define a function to generate contact HTML
    function generateContact(contact) {
        const notificationBadge = contact.notification > 0 ? `<div class="msg-notification"><span>${contact.notification}</span></div>` : '';
        const truncatedMessage = contact.last_message_value ? (contact.last_message_value.length > 10 ? contact.last_message_value.slice(0, 10) + '...' : contact.last_message_value) : 'No Message Yet';
        // Convert the input string to a Date object
        const inputDate = new Date(contact.last_message?.created_at);
        // Format the date in the desired format (hh:mm a)
        const options = { hour: '2-digit', minute: '2-digit' };
        const lastMessageLocalTime = inputDate.toLocaleString('en-US', options);
        const lastMessageTime = lastMessageLocalTime === "Invalid Date" ? '' : lastMessageLocalTime; 
        const openChat = document.querySelector(`.chat-area.open.openIn780.message-${contact.id}`);
        const activeChat = openChat ? 'active' : '';
        return `
            <div class="msg ${activeChat}" data-recipient="${contact.id}">
                <div>
                    <img class="msg-profile" src="${contact.profile}" alt="profile" />
                    <div class="msg-detail">
                        <div class="msg-username">${contact.username}</div>
                        <div class="msg-content">
                            <span class="msg-message">${truncatedMessage}</span>
                            <span class="msg-date">${lastMessageTime}</span>
                        </div>
                    </div>
                    ${notificationBadge}
                </div>
            </div>
        `;
    }

    // Define the contacts data as an array (you can pass it from your Laravel backend)
    const contacts = {!! json_encode($contacts) !!};
    const instance_id = "{{ $instance_id }}";
    // Get the container element
    const contactsContainer = document.querySelector('.conversation-area .conversations');
    contacts.forEach((contact) => {
        const contactHtml = generateContact(contact);
        contactsContainer.insertAdjacentHTML('beforeend', contactHtml);
    });

    // Your existing code for generating contacts
    const searchInput = document.getElementById('searchInput');

    // Function to update contact display using AJAX
    function updateContactDisplay() {
        const searchTerm = searchInput.value.trim().toLowerCase();

        if (searchTerm === 0) {
            // If the search term is empty, show all contacts
            contactsContainer.innerHTML = '';
            contacts.forEach((contact) => {
                const contactHtml = generateContact(contact);
                contactsContainer.insertAdjacentHTML('beforeend', contactHtml);
            });
        } else {
            // Show loading indicator
            // contactsContainer.innerHTML = '<div class="loading-conversation">Loading...</div>';

            // Send an AJAX request to searchContacts route
            fetch(`/search-contacts/${instance_id}?searchTerm=${searchTerm}`)
                .then((response) => response.json())
                .then((data) => {
                    const filteredContacts = data.contacts;

                    // Clear the loading indicator
                    contactsContainer.innerHTML = '';

                    if (filteredContacts.length === 0) {
                        // Display a message if no matching contacts found
                        contactsContainer.innerHTML = '<p>No matching contacts found.</p>';
                    } else {
                        // Display the filtered contacts
                        filteredContacts.forEach((contact) => {
                            const contactHtml = generateContact(contact);
                            contactsContainer.insertAdjacentHTML('beforeend', contactHtml);
                        });
                    }
                })
                .catch((error) => {
                    console.error('Error fetching contacts:', error);
                });
        }
    }

    // Define a debounce function
    function debounce(func, delay) {
        let timeoutId;
        return function () {
            const context = this;
            const args = arguments;
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                func.apply(context, args);
            }, delay);
        };
    }

    // Debounce the updateContactDisplay function with a 300ms delay
    const debouncedUpdateContactDisplay = debounce(updateContactDisplay, 300);

    // Add an event listener to the input field for search
    searchInput.addEventListener('input', debouncedUpdateContactDisplay);
</script>
<!-- Multiple Conversations Handling -->
<script>
    function loadingDots() {
        // Select the loading dots element
        const loadingDots = document.getElementById('loading-dots');

        // Set initial values
        let dotsCount = 3; // Starting number of dots
        let increasing = true; // Flag to indicate whether the dots are increasing or decreasing

        // Function to update the loading dots animation
        function updateLoadingDots() {
            // Create a string with the current number of dots
            const dotsString = '.'.repeat(dotsCount);
            // Update the loading dots text
            if(loadingDots) {
                loadingDots.textContent = `Loading${dotsString}`;
            }

            // Increase or decrease the number of dots
            if (increasing) {
                dotsCount++;
                if (dotsCount > 3) {
                    // Start decreasing when reaching 4 dots
                    increasing = false;
                }
            } else {
                dotsCount--;
                if (dotsCount === 0) {
                    // Start increasing when reaching 0 dots
                    increasing = true;
                }
            }
        }

        // Call the updateLoadingDots function periodically (e.g., every 500 milliseconds)
        setInterval(updateLoadingDots, 500);
    }
    // Get the chat-default-area and chat-area elements
    const chatDefaultArea = document.querySelector('.chat-default-area');
    const chatArea = document.querySelector('.chat-area');
    const detailArea = document.querySelector('.detail-area');

    // Get all message elements in conversation-area
    // const messageElements = document.querySelectorAll('.conversation-area .conversations .msg');

    // Initialize a variable to keep track of the currently active message
    let currentActiveMessage = null;

    // Add click event listeners to message elements
    contactsContainer.addEventListener('click', (event) => {
        const messageElement = event.target.closest('.msg');
        const deleteBin = event.target.classList.contains('deleteItem') || event.target.parentNode.classList.contains('deleteItem');
        if (messageElement && !deleteBin) {
            // Remove the "active" class from the previously active message (if any)
            if (currentActiveMessage) {
                currentActiveMessage.classList.remove('active');
            }

            // Add the "active" class to the clicked message element
            messageElement.classList.add('active');

            // Update the current active message reference
            currentActiveMessage = messageElement;

            // Remove the "open" class from chat-default-area
            chatDefaultArea.classList.remove('open');
            // Add the "open" class to chat-area
            chatArea.classList.add('open');
            // Remove the "open" class to detail-area
            detailArea.classList.remove('open');
            // Remove the "openIn780" class to conversation-area
            conversationArea.classList.remove('openIn780');
            // Add the "openIn780" class to chat-area
            chatArea.classList.add('openIn780');

            // Get the values of data-recipient attributes
            const recipientId = messageElement.getAttribute('data-recipient');
            // Select the loading indicator element
            const loadingIndicator = document.getElementById('loading-indicator');

            // Show the loading indicator
            if(loadingIndicator) {
                loadingIndicator.style.display = 'block';
            }

            loadingDots();

            // Make a POST request to "get-session-messages" with recipientId as data
            fetch("{{ route('get-session-messages') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    // Add any other headers you need
                },
                body: JSON.stringify({
                    instanceId: instance_id,
                    whatsapp_user_id: recipientId,
                }),
            })
            .then((response) => {
                if(loadingIndicator) {
                    loadingIndicator.style.display = 'none';
                }
                // Handle the response data as needed
                if (response.ok) {
                    return response.json();
                } else {
                    console.log(response);
                }
            })
            .then((data) => {
                // Handle the response data as needed
                console.log(data);
                // Display messages from the database
                displayMessages(data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        };
    });

    const tools = document.querySelectorAll('.app .conversation-area .tools-chat .option-chat .part li');

    tools.forEach((tool) => {
        tool.addEventListener('click', () => {
            tools.forEach((tool) => {
                tool.classList.remove('active');
            })
            tool.classList.add('active');
        })
    })

    const closeArea = document.querySelector('.chat-area .chat-area-title svg');
    const conversationArea = document.querySelector('.conversation-area');
    closeArea.addEventListener('click', () => {
        // Remove the "open" class from chat-default-area
        chatDefaultArea.classList.add('open');
        // Add the "open" class to chat-area
        chatArea.classList.remove('open');
        // Remove the "active" class from chat-msg.active
        currentActiveMessage.classList.remove('active');
        // Update the current active message reference to null as active has removed
        currentActiveMessage = null;
        // Add the "openIn780" class to conversation-area
        conversationArea.classList.add('openIn780');
        // Remove the "openIn780" class to chat-area
        chatArea.classList.remove('openIn780');
        updateContactDisplay();
    })

    const chatMoreFeature = document.querySelector('.chat-area-more-feature svg');
    const closeMoreFeature = document.querySelector('.detail-area .close-area svg');

    chatMoreFeature.addEventListener('click', () => {
        detailArea.classList.add('open');
    });
    closeMoreFeature.addEventListener('click', () => {
        detailArea.classList.remove('open');
    })
</script>
<script>
    contactsContainer.addEventListener('click', async function (event) {
        const target = event.target;

        // Check if the clicked element has the class "deleteItem"
        if (target.classList.contains('deleteItem') || target.parentNode.classList.contains('deleteItem')) {
            event.stopPropagation();
            event.preventDefault();
            
            var form = target.closest("form");
            var name = target.getAttribute("data-name");

            Swal.fire({
                title: "Estas seguro de eliminar este documento?",
                text: "Si lo elimina, será permanente.",
                icon: "warning",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, acepto!',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    });
</script>
<!-- Display And Send Messages -->
<script>
    // Function to scroll the chat area to the bottom
    function scrollToBottom() {
        const chatArea = document.querySelector(".chat-area");
        chatArea.scrollTo({
            top: chatArea.scrollHeight,
            behavior: 'smooth'
        });
    }

    // Function to display messages fetched from the database
    // function displayMessages(messages) {
    //     const chatAreaMain = document.querySelector('.chat-area-main');
    //     let currentSender = null;
    //     let currentMessageContainer = null;

    //     messages.forEach((message) => {
    //         const { sender, sender_id, messageText, messageImage, profileImg, messageDate } = message;

    //         if (currentSender !== sender_id) {
    //             // Create a new message container for a different sender
    //             currentSender = sender_id;
    //             currentMessageContainer = document.createElement('div');
    //             currentMessageContainer.className = 'chat-msg ' + sender;
                
    //             // Create a profile info container
    //             const profileInfo = document.createElement('div');
    //             profileInfo.className = 'chat-msg-profile';

    //             // Create an image element for the profile picture
    //             const profileImgElement = document.createElement('img');
    //             profileImgElement.className = 'chat-msg-img';
    //             profileImgElement.src = profileImg;
    //             profileImgElement.alt = '';

    //             // Create a message date element
    //             const messageDateElement = document.createElement('div');
    //             messageDateElement.className = 'chat-msg-date';
    //             messageDateElement.textContent = `Message seen ${messageDate}`;

    //             // Append profile image and message date to profile info container
    //             profileInfo.appendChild(profileImgElement);
    //             profileInfo.appendChild(messageDateElement);

    //             // Append the profile info container to the current message container
    //             currentMessageContainer.appendChild(profileInfo);

    //             // Create a new message content container
    //             const chatMsgContent = document.createElement('div');
    //             chatMsgContent.className = 'chat-msg-content';

    //             // Append the new message content container to the current message container
    //             currentMessageContainer.appendChild(chatMsgContent);
                
    //             // Append the new message container to the chat area
    //             chatAreaMain.appendChild(currentMessageContainer);
    //         }

    //         // Create a new message text element for the user's message
    //         const chatMsgText = document.createElement('div');
    //         chatMsgText.className = 'chat-msg-text';
    //         if(messageText) {
    //             chatMsgText.textContent = messageText;
    //         } else {
    //             chatMsgText.innerHTML = `<img src="${messageImage}">`;
    //         }
    //         // Append the message text to the current message content container
    //         currentMessageContainer.querySelector('.chat-msg-content').appendChild(chatMsgText);
    //     });

    //     // Scroll to the bottom after displaying all messages
    //     scrollToBottom();
    // }

    // Simulate messages fetched from the database
    // const messagesFromDatabase = [
    //     {
    //         id: 1,
    //         sender: 'user',
    //         sender_id: 1,
    //         messageText: 'Luctus et ultrices posuere cubilia curae.',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%283%29+%281%29.png',
    //         messageDate: '1.22pm',
    //     },
    //     {
    //         id: 2,
    //         sender: 'user',
    //         sender_id: 1,
    //         messageImage: 'https://media0.giphy.com/media/yYSSBtDgbbRzq/giphy.gif?cid=ecf05e47344fb5d835f832a976d1007c241548cc4eea4e7e&rid=giphy.gif',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%283%29+%281%29.png',
    //         messageDate: '1.22pm',
    //     },
    //     {
    //         id: 3,
    //         sender: 'user',
    //         sender_id: 1,
    //         messageText: 'Neque gravida in fermentum et sollicitudin ac orci phasellus egestas. Pretium lectus quam id leo.',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%283%29+%281%29.png',
    //         messageDate: '1.22pm',
    //     },
    //     {
    //         id: 4,
    //         sender: 'owner',
    //         sender_id: 2,
    //         messageText: 'Sit amet risus nullam eget felis eget. Dolor sed viverra ipsum😂😂😂',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png',
    //         messageDate: '1.22pm',
    //     },
    //     {
    //         id: 5,
    //         sender: 'owner',
    //         sender_id: 2,
    //         messageText: 'Cras mollis nec arcu malesuada tincidunt.',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png',
    //         messageDate: '1.22pm',
    //     },
    //     {
    //         id: 6,
    //         sender: 'user',
    //         sender_id: 3,
    //         messageText: 'Aenean tristique maximus tortor non tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae😊',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%282%29.png',
    //         messageDate: '2.45pm',
    //     },
    //     {
    //         id: 7,
    //         sender: 'user',
    //         sender_id: 3,
    //         messageText: 'Ut faucibus pulvinar elementum integer enim neque volutpat.',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%282%29.png',
    //         messageDate: '2.45pm',
    //     },
    //     {
    //         id: 8,
    //         sender: 'owner',
    //         sender_id: 2,
    //         messageText: 'posuere eget augue sodales, aliquet posuere eros.',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png',
    //         messageDate: '2.50pm',
    //     },
    //     {
    //         id: 9,
    //         sender: 'owner',
    //         sender_id: 2,
    //         messageText: 'Cras mollis nec arcu malesuada tincidunt.',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png',
    //         messageDate: '2.50pm',
    //     },
    //     {
    //         id: 10,
    //         sender: 'user',
    //         sender_id: 4,
    //         messageText: 'Egestas tellus rutrum tellus pellentesque',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%2812%29.png',
    //         messageDate: '3.16pm',
    //     },
    //     {
    //         id: 11,
    //         sender: 'user',
    //         sender_id: 1,
    //         messageText: 'Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et.',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%283%29+%281%29.png',
    //         messageDate: '3.16pm',
    //     },
    //     {
    //         id: 12,
    //         sender: 'owner',
    //         sender_id: 2,
    //         messageText: 'Tincidunt arcu non sodales😂',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png',
    //         messageDate: '3.50pm',
    //     },
    //     {
    //         id: 13,
    //         sender: 'user',
    //         sender_id: 3,
    //         messageText: 'Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et🥰',
    //         profileImg: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%282%29.png',
    //         messageDate: '4.45pm',
    //     },
    //     // Add more messages here...
    // ];
    
    // Display messages from the database
    // displayMessages(messagesFromDatabase);

    // Function to display messages fetched from the database
    function displayMessages(data) {
        const chatArea = document.querySelector('.chat-area');
        const chatAreaMain = document.querySelector('.chat-area-main');
        const chatAreaTitle = document.querySelector('.chat-area-title p');
        const chatAreaProfileImg = document.querySelector('.chat-area-profile');
        const chatAreaFooterPhone = document.querySelector('.chat-area-footer #recipient-phone');
        const chatAreaRecipient = document.querySelector('.chat-area-footer #recipient-id');        

              
        // Clear the chat area main by setting its innerHTML to an empty string
        chatAreaMain.innerHTML = '';

        let currentSender = null;
        let currentMessageContainer = null;

        
        const {username, id, phone, profile } = data.recipient;
        // Get all existing classes of the chatArea element
        const existingClasses = Array.from(chatArea.classList);

        // Iterate through the existing classes and remove those that start with "message-"
        existingClasses.forEach(className => {
            if (className.startsWith('message-')) {
                chatArea.classList.remove(className);
            }
        });

        // Add the new class 'message-${id}' to the chatArea element
        chatArea.classList.add(`message-${id}`);
        // Update the chat-area-title text with the recipient_name
        chatAreaTitle.innerHTML = username;
        // Update the chat-area-profile image source with the recipient_profile
        chatAreaProfileImg.src = profile;
        // Update the chat-area-footer phone input with the recipient_phone
        chatAreaFooterPhone.value = phone;
        // Update the chat-area-footer whatsapp-user-id input with the current_whatsapp_user_id
        chatAreaRecipient.value = id;
        
        data.messages.forEach((message) => {
            const { whatsapp_user_id, sender_id, messageText, messageMedia, messageDocument, messageRecording, created_at } = message;
            
            const inputDate = new Date(created_at);

            // Get the timezone offset in minutes and convert it to milliseconds
            const timezoneOffsetMs = new Date().getTimezoneOffset() * 60000;

            // Adjust the date by subtracting the timezone offset
            inputDate.setTime(inputDate.getTime() - timezoneOffsetMs);
            // Format the date in the desired format (hh:mm a)
            const options = { hour: '2-digit', minute: '2-digit', hour12: true, month: 'short', day: '2-digit' };
            const lastMessageTime = inputDate.toLocaleString('en-US', options);


            const selfProfile = "{!! $profile !!}";
            if (currentSender !== sender_id) {
                // Create a new message container for a different sender
                currentSender = sender_id;
                currentMessageContainer = document.createElement('div');
                currentMessageContainer.className = 'chat-msg ' + (sender_id == {{ auth()->user()->id }} ? 'owner' : 'user');

                // Create a profile info container
                const profileInfo = document.createElement('div');
                profileInfo.className = 'chat-msg-profile';

                // Create an image element for the profile picture
                const profileImgElement = document.createElement('img');
                profileImgElement.className = 'chat-msg-img';
                profileImgElement.src = (sender_id == {{ auth()->user()->id }} ? selfProfile : profile);
                profileImgElement.alt = 'profile';

                // Create a message date element
                const messageDateElement = document.createElement('div');
                messageDateElement.className = 'chat-msg-date';
                if(messageDateElement) {
                    messageDateElement.innerHTML = `Message sent at ${lastMessageTime}`;
                }

                // Append profile image and message date to profile info container
                profileInfo.appendChild(profileImgElement);
                profileInfo.appendChild(messageDateElement);

                // Append the profile info container to the current message container
                currentMessageContainer.appendChild(profileInfo);

                // Create a new message content container
                const chatMsgContent = document.createElement('div');
                chatMsgContent.className = 'chat-msg-content';

                // Append the new message content container to the current message container
                currentMessageContainer.appendChild(chatMsgContent);
                
                // Append the new message container to the chat area
                chatAreaMain.appendChild(currentMessageContainer);

            }
            // Create a new message text element for the user's message
            const chatMsgText = document.createElement('div');
            chatMsgText.className = 'chat-msg-text';
            handleMessageDisplay(chatMsgText, messageText, messageMedia, messageDocument, messageRecording);
            // Append the message text to the current message content container
            currentMessageContainer.querySelector('.chat-msg-content').appendChild(chatMsgText);
            
        });

        // Scroll to the bottom after displaying all messages
        scrollToBottom();
        updateContactDisplay();
    }

    function handleMessageDisplay(chatMsgText, messageText, imgFile, docFile, audioBlob) {
        if(messageText && messageText !== '') {
            chatMsgText.innerHTML = `<p style="margin: 0;">${messageText}</p>`;
        }
        if (imgFile) {
            const fileExtension = imgFile.split('.').pop().toLowerCase();
            if (fileExtension.match(/(jpg|jpeg|png|gif)$/)) {
                // Handle image files (jpg, jpeg, png, gif)
                const imgElement = document.createElement('img');
                imgElement.src = imgFile;
                imgElement.alt = 'Image';
                chatMsgText.appendChild(imgElement);
            } else if (fileExtension.match(/(mp3|wav|ogg|oga)$/)) {
                // Handle audio files (mp3)
                const audioElement = document.createElement('audio');
                audioElement.src = imgFile;
                audioElement.controls = true; // Add audio controls (play, pause, volume)
                chatMsgText.appendChild(audioElement);
                resetAudioFeature();
            } else if (fileExtension.match(/(mp4|webm|avi|mov|wmv)$/)) {
                // Handle video files (mp4, webm, ogg)
                const videoElement = document.createElement('video');
                videoElement.style.width = "300px";
                videoElement.style.height = "auto";
                videoElement.src = imgFile;
                videoElement.controls = true; // Add video controls (play, pause, volume)
                chatMsgText.appendChild(videoElement);
            } else {
                // For unsupported file types, you can display a generic message or icon
                const fileTypeIcon = document.createElement('span');
                fileTypeIcon.textContent = 'Unsupported File Type';
                chatMsgText.appendChild(fileTypeIcon);
            }
        }
        if(docFile){
            const fileExtension = docFile.split('.').pop().toLowerCase(); // Get the file extension
            const fileName = docFile.split('/').pop();
            if (fileExtension === 'txt' || fileExtension === 'pdf' || fileExtension === 'doc' || fileExtension === 'docx') {
                // Create an <a> element to provide a download link for the text or PDF file
                const downloadLink = document.createElement('a');
                downloadLink.href = docFile;
                
                // Get the file name without extension (first 3 characters)
                const fileNameWithoutExtension = fileName.replace(/\.[^/.]+$/, "").slice(0, 30);
                
                // Get the file size in bytes and convert it to kilobytes (KB)
                // const fileSizeKB = (file.size / 1024).toFixed(2);
                
                // Set the download link text as "ABC.pdf (Size KB)"
                // downloadLink.textContent = `${fileNameWithoutExtension}.${fileExtension} (${fileSizeKB} KB)`;
                downloadLink.textContent = `${fileNameWithoutExtension}.${fileExtension}`;
                downloadLink.download = fileName; // Set the download attribute to preserve the file name
                
                // Append the download link to the message content container
                chatMsgText.appendChild(downloadLink);
            } else {
                // For other file types, you can display an icon or a generic message
                const fileTypeIcon = document.createElement('span');
                
                // Get the file name without extension (first 3 characters)
                const fileNameWithoutExtension = fileName.replace(/\.[^/.]+$/, "").slice(0, 3);
                
                // Get the extension
                const fileExtension = fileName.split('.').pop().toLowerCase();
                
                // Display the file name (first 3 characters), extension, and size
                fileTypeIcon.textContent = `${fileNameWithoutExtension}.${fileExtension}`;
                
                chatMsgText.appendChild(fileTypeIcon);
            }
        }
        if (audioBlob) {
            // Create an audio element for the audio message
            const audioElement = document.createElement('audio');
            audioElement.src = audioBlob;
            audioElement.controls = true; // Add audio controls (play, pause, volume)
            chatMsgText.appendChild(audioElement);
        }
    };
    function handleMessageSent(chatMsgText, messageText, imgFile, docFile, audioBlob) {
        if(messageText && messageText !== '') {
            chatMsgText.innerHTML = `<p style="margin: 0;">${messageText}</p>`;
        }
        if (imgFile && imgFile.files.length > 0) {
            const file = imgFile.files[0];
            const fileExtension = file.name.split('.').pop().toLowerCase();

            if (fileExtension.match(/(jpg|jpeg|png|gif)$/)) {
                // Handle image files (jpg, jpeg, png, gif)
                const imgElement = document.createElement('img');
                imgElement.src = URL.createObjectURL(file);
                imgElement.alt = 'Image';
                chatMsgText.appendChild(imgElement);
            } else if (fileExtension.match(/(mp3|wav|ogg|oga)$/)) {
                // Handle audio files (mp3)
                const audioElement = document.createElement('audio');
                audioElement.src = URL.createObjectURL(file);
                audioElement.controls = true; // Add audio controls (play, pause, volume)
                chatMsgText.appendChild(audioElement);
                resetAudioFeature();
            } else if (fileExtension.match(/(mp4|webm|avi|mov|wmv)$/)) {
                // Handle video files (mp4, webm, ogg)
                const videoElement = document.createElement('video');
                videoElement.style.width = "300px";
                videoElement.style.height = "auto";
                videoElement.src = URL.createObjectURL(file);
                videoElement.controls = true; // Add video controls (play, pause, volume)
                chatMsgText.appendChild(videoElement);
            } else {
                // For unsupported file types, you can display a generic message or icon
                const fileTypeIcon = document.createElement('span');
                fileTypeIcon.textContent = 'Unsupported File Type';
                chatMsgText.appendChild(fileTypeIcon);
            }
        }
        if(docFile && docFile.files.length > 0){
            const file = docFile.files[0];
            const fileExtension = file.name.split('.').pop().toLowerCase(); // Get the file extension

            if (fileExtension === 'txt' || fileExtension === 'pdf') {
                // Create an <a> element to provide a download link for the text or PDF file
                const downloadLink = document.createElement('a');
                downloadLink.href = URL.createObjectURL(file);
                
                // Get the file name without extension (first 3 characters)
                const fileNameWithoutExtension = file.name.replace(/\.[^/.]+$/, "").slice(0, 3);
                
                // Get the extension
                const fileExtension = file.name.split('.').pop().toLowerCase();
                
                // Get the file size in bytes and convert it to kilobytes (KB)
                const fileSizeKB = (file.size / 1024).toFixed(2);
                
                // Set the download link text as "ABC.pdf (Size KB)"
                downloadLink.textContent = `${fileNameWithoutExtension}.${fileExtension} (${fileSizeKB} KB)`;
                downloadLink.download = file.name; // Set the download attribute to preserve the file name
                
                // Append the download link to the message content container
                chatMsgText.appendChild(downloadLink);
            } else {
                // For other file types, you can display an icon or a generic message
                const fileTypeIcon = document.createElement('span');
                
                // Get the file name without extension (first 3 characters)
                const fileNameWithoutExtension = file.name.replace(/\.[^/.]+$/, "").slice(0, 3);
                
                // Get the extension
                const fileExtension = file.name.split('.').pop().toLowerCase();
                
                // Get the file size in bytes and convert it to kilobytes (KB)
                const fileSizeKB = (file.size / 1024).toFixed(2);
                
                // Display the file name (first 3 characters), extension, and size
                fileTypeIcon.textContent = `${fileNameWithoutExtension}.${fileExtension} (${fileSizeKB} KB)`;
                
                chatMsgText.appendChild(fileTypeIcon);
            }
        }
        if (audioBlob) {
            // Create an audio element for the audio message
            const audioElement = document.createElement('audio');
            audioElement.src = URL.createObjectURL(audioBlob);
            audioElement.controls = true; // Add audio controls (play, pause, volume)
            chatMsgText.appendChild(audioElement);
        }
    };
    function handleMessageReceiveSent(chatMsgText, messageText, imgFile, docFile, audioBlob, info) {
        if (info?.caption){
            messageText = info.caption;
        }
        if(messageText && messageText !== '') {
            chatMsgText.innerHTML = `<p style="margin: 0;">${messageText}</p>`;
        }
        if (imgFile) {
            const fileExtension = info.mime.split('/').pop().toLowerCase();

            if (fileExtension.match(/(jpg|jpeg|png|gif)$/)) {
                // Handle image files (jpg, jpeg, png, gif)
                const imgElement = document.createElement('img');
                imgElement.src = imgFile;
                imgElement.alt = 'Image';
                chatMsgText.appendChild(imgElement);
            } else if (fileExtension.match(/(mp3|wav|ogg|oga)$/)) {
                // Handle audio files (mp3)
                const audioElement = document.createElement('audio');
                audioElement.src = imgFile;
                audioElement.controls = true; // Add audio controls (play, pause, volume)
                chatMsgText.appendChild(audioElement);
                resetAudioFeature();
            } else if (fileExtension.match(/(mp4|webm|avi|mov|wmv)$/)) {
                // Handle video files (mp4, webm, ogg)
                const videoElement = document.createElement('video');
                videoElement.style.width = "300px";
                videoElement.style.height = "auto";
                videoElement.src = imgFile;
                videoElement.controls = true; // Add video controls (play, pause, volume)
                chatMsgText.appendChild(videoElement);
            } else {
                // For unsupported file types, you can display a generic message or icon
                const fileTypeIcon = document.createElement('span');
                fileTypeIcon.textContent = 'Unsupported File Type';
                chatMsgText.appendChild(fileTypeIcon);
            }
        }
        if(docFile){
            const fileExtension = info.filename.split('.').pop().toLowerCase(); // Get the file extension

            if (fileExtension.match(/(txt|pdf|doc|docx)$/)) {
                // Create an <a> element to provide a download link for the text or PDF file
                const downloadLink = document.createElement('a');
                downloadLink.href = docFile;
                
                // Get the file name without extension (first 3 characters)
                const fileNameWithoutExtension = info.filename.replace(/\.[^/.]+$/, "").slice(0, 6);
                
                // Get the file size in bytes and convert it to kilobytes (KB)
                const fileSizeKB = info.size ? `${(info.size / 1024).toFixed(2)} KB` : '';
                
                // Set the download link text as "ABC.pdf (Size KB)"
                downloadLink.textContent = `${fileNameWithoutExtension}.${fileExtension} ${fileSizeKB}`;
                downloadLink.download = info.filename; // Set the download attribute to preserve the file name
                
                // Append the download link to the message content container
                chatMsgText.appendChild(downloadLink);
            } else {
                // For other file types, you can display an icon or a generic message
                const fileTypeIcon = document.createElement('span');
                
                // Display the file name (first 3 characters), extension, and size
                fileTypeIcon.textContent = info.filename;
                
                chatMsgText.appendChild(fileTypeIcon);
            }
        }
        if (audioBlob) {
            // Create an audio element for the audio message
            const audioElement = document.createElement('audio');
            audioElement.src = audioBlob;
            audioElement.controls = true; // Add audio controls (play, pause, volume)
            chatMsgText.appendChild(audioElement);
        }
    };

    // Function to send a message (you can keep this for sending new messages)
    function sendMessage(sender_id, profile, _message = '', imgFile = null, docFile=null, audioBlob=null) {
        const messageInput = document.getElementById('message-input');
        let messageImg = document.getElementById('message-img');
        let messageDoc = document.getElementById('message-doc');
        const messageText = _message;
        if (messageText !== '' || imgFile.files.length > 0 || docFile.files.length > 0 || audioBlob) {
            const chatAreaMain = document.querySelector('.chat-area-main');
            const lastMessageContainer = chatAreaMain.lastChild;

            // Determine the sender type
            const senderType = sender_id === {{auth()->user()->id}} ? 'owner' : 'user';
            
            // Check if there is a previous message container and it has the same sender
            if (lastMessageContainer && lastMessageContainer.getAttribute('data-sender') === senderType) {
                // Append the new message text to the existing message container
                const chatMsgText = document.createElement('div');
                chatMsgText.className = 'chat-msg-text';
                const chatMsgDateElements = document.querySelectorAll('.chat-msg-date');
                const lastChatMsgDate = chatMsgDateElements[chatMsgDateElements.length - 1];
                lastChatMsgDate.textContent = `Message sending ...`;
                handleMessageSent(chatMsgText, messageText, imgFile, docFile, audioBlob);

                lastMessageContainer.querySelector('.chat-msg-content').appendChild(chatMsgText);
            } else {
                // Create a new message container for the user's message
                const newMessageContainer = document.createElement('div');
                newMessageContainer.className = `chat-msg ${senderType}`;
                newMessageContainer.setAttribute('data-sender', senderType);

                // Create a profile info container
                const profileInfo = document.createElement('div');
                profileInfo.className = 'chat-msg-profile';

                // Create an image element for the profile picture
                const profileImgElement = document.createElement('img');
                profileImgElement.className = 'chat-msg-img';
                profileImgElement.src = profile; // Set the profile image URL dynamically
                profileImgElement.alt = 'profile';

                // Create a message date element
                const messageDateElement = document.createElement('div');
                messageDateElement.className = 'chat-msg-date';
                messageDateElement.textContent = `Message sending ...`;

                // Append profile image and message date to profile info container
                profileInfo.appendChild(profileImgElement);
                profileInfo.appendChild(messageDateElement);

                // Append the profile info container to the current message container
                newMessageContainer.appendChild(profileInfo);

                // Create a new message content container
                const chatMsgContent = document.createElement('div');
                chatMsgContent.className = 'chat-msg-content';

                // Create a new message text element for the user's message
                const chatMsgText = document.createElement('div');
                chatMsgText.className = 'chat-msg-text';
                handleMessageSent(chatMsgText, messageText, imgFile, docFile, audioBlob);

                // Append the message text to the message content container
                chatMsgContent.appendChild(chatMsgText);

                // Append the message content container to the new message container
                newMessageContainer.appendChild(chatMsgContent);

                
                // Append the new message container to the chat area
                chatAreaMain.appendChild(newMessageContainer);

            }
            // Send the message via AJAX
            // document.getElementById('messageForm').submit();
           
            // Clear the message input field
            messageInput.value = '';
            // save and sent message
            saveMessage(sender_id, profile, _message, imgFile, docFile, audioBlob);
            if(imgFile?.files.length > 0 || docFile?.files.length > 0 ) {
                handleDefaultChatView();
            }
            if(audioBlob){
                resetAudioFeature();
            }
            // Scroll to the bottom after sending the message
            scrollToBottom();
            updateContactDisplay();
        }

    }
    function saveMessage(sender_id, profile, _message = '', imgFile = null, docFile=null, audioBlob=null) {
        // Prepare the form data
        const formData = new FormData(document.getElementById('messageForm'));
        // Append the sender_id to the form data
        formData.append('sender_id', sender_id);

        // Generate the message date (you can use a date library for this)
        const currentDate = new Date();
        const currentHours = currentDate.getHours();
        const ampm = currentHours >= 12 ? 'PM' : 'AM';
        const hours12 = currentHours % 12 || 12; // Convert to 12-hour format

        const currentMinutes = currentDate.getMinutes();
        const messageTime = `${hours12}:${currentMinutes}${ampm}`;
        
        // Append the profile to the form data
        formData.append('profile', profile);

        // Append the messageTime to the form data
        formData.append('messageTime', messageTime);

        // Append the message to the form data
        if(_message !== '') {
            formData.append('message', _message);
            formData.append('messageType', 'text');
            sendFormData(formData, messageTime);
        }

        // Function to convert a file to base64
        function fileToBase64(file, callback) {
            const reader = new FileReader();
            reader.onload = function () {
                const base64Data = reader.result.split(',')[1]; // Get base64 data
                callback(base64Data);
            };
            reader.readAsDataURL(file);
        }
        // Append the media file to the form data if it exists
        if (imgFile && imgFile.files.length > 0) {
            const file = imgFile.files[0];
            const fileExtension = file.name.split('.').pop().toLowerCase();
            if (fileExtension.match(/(jpg|jpeg|png|gif)$/)) {
                fileToBase64(file, (base64Data) => {
                    formData.append('messageImg', base64Data);
                    formData.append('fileType', 'image');
                    formData.append('fileName', file.name);
                    formData.append('extension', fileExtension);
                    sendFormData(formData, messageTime);
                });
            } else if (fileExtension.match(/(mp3|wav|ogg|oga)$/)) {
                fileToBase64(file, (base64Data) => {
                    formData.append('messageAudio', base64Data);
                    formData.append('fileType', 'audio');
                    formData.append('fileName', file.name);
                    formData.append('extension', fileExtension);
                    sendFormData(formData, messageTime);
                });
            } else if (fileExtension.match(/(mp4|webm|avi|mov|wmv)$/)) {
                fileToBase64(file, (base64Data) => {
                    formData.append('messageVideo', base64Data);
                    formData.append('fileType', 'video');
                    formData.append('fileName', file.name);
                    formData.append('extension', fileExtension);
                    sendFormData(formData, messageTime);
                });
            }
        } else if (docFile && docFile.files.length > 0) {
            const file = docFile.files[0];
            const fileExtension = file.name.split('.').pop().toLowerCase();
            fileToBase64(file, (base64Data) => {
                formData.append('messageDocument', base64Data);
                formData.append('fileType', 'document');
                formData.append('fileName', file.name);
                formData.append('extension', fileExtension);
                sendFormData(formData, messageTime);
            });
        } else if (audioBlob) {
            fileToBase64(audioBlob, (base64Data) => {
                formData.append('messageRecording', base64Data);
                formData.append('fileType', 'recording');
                const currentTimeStamp = Date.now(); // Get the current timestamp in milliseconds
                const uniqueFileName = `recording_${currentTimeStamp}.mp3`;
                // Now, you can append uniqueFileName to your FormData
                formData.append('fileName', uniqueFileName);
                formData.append('extension', 'mp3');
                sendFormData(formData, messageTime);
            });
        }
    }
    function sendFormData(formData, messageTime) {
        const chatMsgDateElements = document.querySelectorAll('.chat-msg-date');
        const lastChatMsgDate = chatMsgDateElements[chatMsgDateElements.length - 1];

        // Make the AJAX request
        fetch("{{ route('send-message') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#messageForm input[name="_token"]').value,
            }
        })
        .then((response) => response.json())
        .then((data) => {
            // Check the status in the response data and update the text-content accordingly
            console.log(data);
            if (data.success) {
                if(lastChatMsgDate) {
                    lastChatMsgDate.textContent = `Message sent at ${messageTime}`;
                }
            } else {
                if(lastChatMsgDate) {
                    lastChatMsgDate.textContent = `Message sending failed...`;
                }
            }
        })
        .catch((error) => {
            console.log('Error:', error);
            lastChatMsgDate.textContent = `Message sending failed...`;
        });
    }

    // Function to send a message (you can keep this for sending new messages)
    function sendReceiveMessage(sender_id, profile, _message = '', imgFile = null, docFile=null, audioBlob=null, info=null) {
        const messageInput = document.getElementById('message-input');
        let messageImg = document.getElementById('message-img');
        let messageDoc = document.getElementById('message-doc');
        const messageText = _message;
        if (messageText !== '' || imgFile || docFile || audioBlob) {
            const chatAreaMain = document.querySelector('.chat-area-main');
            const lastMessageContainer = chatAreaMain.lastChild;

            // Determine the sender type
            const senderType = sender_id === {{auth()->user()->id}} ? 'owner' : 'user';
            
            // Check if there is a previous message container and it has the same sender
            if (lastMessageContainer && lastMessageContainer.getAttribute('data-sender') === senderType) {
                // Append the new message text to the existing message container
                const chatMsgText = document.createElement('div');
                chatMsgText.className = 'chat-msg-text';
                const chatMsgDateElements = document.querySelectorAll('.chat-msg-date');
                const lastChatMsgDate = chatMsgDateElements[chatMsgDateElements.length - 1];// Generate the message date (you can use a date library for this)
                const currentDate = new Date();
                const currentHours = currentDate.getHours();
                const ampm = currentHours >= 12 ? 'PM' : 'AM';
                const hours12 = currentHours % 12 || 12; // Convert to 12-hour format

                const currentMinutes = currentDate.getMinutes();
                const messageTime = `${hours12}:${currentMinutes}${ampm}`;
                lastChatMsgDate.textContent = `Message sent at ${messageTime}`;
                handleMessageReceiveSent(chatMsgText, messageText, imgFile, docFile, audioBlob, info);

                lastMessageContainer.querySelector('.chat-msg-content').appendChild(chatMsgText);
            } else {
                // Create a new message container for the user's message
                const newMessageContainer = document.createElement('div');
                newMessageContainer.className = `chat-msg ${senderType}`;
                newMessageContainer.setAttribute('data-sender', senderType);

                // Create a profile info container
                const profileInfo = document.createElement('div');
                profileInfo.className = 'chat-msg-profile';

                // Create an image element for the profile picture
                const profileImgElement = document.createElement('img');
                profileImgElement.className = 'chat-msg-img';
                profileImgElement.src = profile; // Set the profile image URL dynamically
                profileImgElement.alt = 'profile';

                // Create a message date element
                const messageDateElement = document.createElement('div');
                messageDateElement.className = 'chat-msg-date';
                const currentDate = new Date();
                const currentHours = currentDate.getHours();
                const ampm = currentHours >= 12 ? 'PM' : 'AM';
                const hours12 = currentHours % 12 || 12; // Convert to 12-hour format

                const currentMinutes = currentDate.getMinutes();
                const messageTime = `${hours12}:${currentMinutes}${ampm}`;
                messageDateElement.textContent = `Message sent at ${messageTime}`;

                // Append profile image and message date to profile info container
                profileInfo.appendChild(profileImgElement);
                profileInfo.appendChild(messageDateElement);

                // Append the profile info container to the current message container
                newMessageContainer.appendChild(profileInfo);

                // Create a new message content container
                const chatMsgContent = document.createElement('div');
                chatMsgContent.className = 'chat-msg-content';

                // Create a new message text element for the user's message
                const chatMsgText = document.createElement('div');
                chatMsgText.className = 'chat-msg-text';
                handleMessageReceiveSent(chatMsgText, messageText, imgFile, docFile, audioBlob, info);

                // Append the message text to the message content container
                chatMsgContent.appendChild(chatMsgText);

                // Append the message content container to the new message container
                newMessageContainer.appendChild(chatMsgContent);

                
                // Append the new message container to the chat area
                chatAreaMain.appendChild(newMessageContainer);

            }          
            // Scroll to the bottom after sending the message
            scrollToBottom();
            updateContactDisplay();
        }

    }

    const audio = document.querySelector('.chat-area-footer .audio');
    const audioButton = document.getElementById('audio-button');
    const svgButtons = document.querySelectorAll('.chat-area-footer form > svg');
    const fileButtons = document.querySelectorAll('.chat-area-footer form label svg');
    const audioPlayer = document.getElementById('audioPlayer');
    const recordingPlayer = document.getElementById('recordingPlayer');
    const recordingAnimation = document.getElementById('recordingAnimation');
    const recordingTimeElement = document.getElementById('recordingTime');
    const pauseButton = document.getElementById('pauseButton');
    const deleteButton = document.getElementById('deleteButton');
    const sendButton = document.getElementById('send-button');
    const messageInput = document.getElementById('message-input');
    const messageForm = document.getElementById('messageForm');
    const emojiMartPicker = document.querySelector('#messageForm .emoji-mart-picker');
    
    // Emoji
    const emojiButton = document.getElementById('emoji-button');
    
    // Create picker options
    const pickerOptions = {
        // Customize your options here
        onEmojiSelect: (emoji) => {
            // Insert the selected emoji into the message input
            messageInput.value += emoji.native;
            if (messageInput.value.trim() !== '') {
                sendButton.style.display = 'block';
                audioButton.style.display = 'none';
            } else {
                sendButton.style.display = 'none';
                audioButton.style.display = 'block';
            }
        },
        onClickOutside: (event) => {
            if( event.target !== emojiButton && emojiMartPicker.classList.contains('show')) {
                emojiMartPicker.classList.remove('show');
            }
        },
        noCountryFlags: true,
        emojiSize: 20,
        set: 'facebook',
        exceptEmojis: ['rainbow-flag']
    };

    // Initialize the emoji picker
    const emojiPicker = new EmojiMart.Picker(pickerOptions);

    // Attach click event to the emoji button to open the emoji picker
    emojiButton.addEventListener('click', () => {
        // Show the emoji picker
        emojiMartPicker.classList.toggle('show');
    });

    emojiMartPicker.appendChild(emojiPicker);
    // Emoji
    // Audio
    let mediaRecorder, audioBlob;
    let audioChunks = [];
    let isRecording = false;
    let startTime = 0;

    function updateRecordingTime() {
        const currentTime = new Date().getTime();
        const elapsedTime = currentTime - startTime;
        const seconds = Math.floor(elapsedTime / 1000);
        const minutes = Math.floor(seconds / 60);
        const formattedTime = `${minutes.toString().padStart(2, '0')}:${(seconds % 60).toString().padStart(2, '0')}`;
        recordingTimeElement.textContent = formattedTime;
    }
    audioButton.addEventListener('click', () => {
        let recordingTimeout;
        if (!isRecording) {
            // Start recording
            navigator.mediaDevices.getUserMedia({ audio: true })
                .then((stream) => {
                    mediaRecorder = new MediaRecorder(stream);
                    mediaRecorder.ondataavailable = (event) => {
                        if (event.data.size > 0) {
                            audioChunks.push(event.data);
                        }
                    };
                    mediaRecorder.onstart = () => {
                        isRecording = true;
                        startTime = new Date().getTime();
                        audio.style.display = 'flex';
                        recordingPlayer.style.display = 'flex';
                        recordingAnimation.style.display = 'block';
                        audioButton.style.display = 'none';
                        deleteButton.style.display = 'block';
                        pauseButton.style.display = 'block';
                        messageInput.style.display = 'none';
                        svgButtons.forEach((svg)=>{
                            svg.style.display = "none";
                        })
                        fileButtons.forEach((svg)=>{
                            svg.style.display = "none";
                        })
                        updateRecordingTime();
                        const timerInterval = setInterval(() => {
                            if (isRecording) {
                                updateRecordingTime();
                            } else {
                                clearInterval(timerInterval);
                            }
                        }, 1000);
                        recordingTimeout = setTimeout(() => {
                            mediaRecorder.stop();
                        }, 60000);
                    };
                    mediaRecorder.onstop = () => {
                        isRecording = false;
                        recordingPlayer.style.display = 'none';
                        recordingAnimation.style.display = 'none';
                        pauseButton.style.display = 'none';
                        audioPlayer.style.display = 'block';
                        messageInput.style.display = 'none';
                        svgButtons.forEach((svg)=>{
                            svg.style.display = "none";
                        })
                        fileButtons.forEach((svg)=>{
                            svg.style.display = "none";
                        })
                        audioBlob = new Blob(audioChunks, { type: 'audio/wav' });
                        audioPlayer.src = URL.createObjectURL(audioBlob);
                        sendButton.style.display = 'block';
                        clearTimeout(recordingTimeout);
                    };
                    mediaRecorder.start(); // Stop recording after 1 minute (60,000 milliseconds)
                })
                .catch((error) => {
                    console.error('Error accessing microphone:', error);
                });
        }
    });
    pauseButton.addEventListener('click', () => {
        if (isRecording) {
            mediaRecorder.stop(); // stop recording
        }
    });
    deleteButton.addEventListener('click', () => {
        // Reset the audio feature
        resetAudioFeature();
    });
    function resetAudioFeature() {
        // Stop the mediaRecorder if it's currently recording
        if (isRecording) {
            mediaRecorder.stop();
        }

        // Release the media stream and set mediaRecorder to null
        if (mediaRecorder && mediaRecorder.stream) {
            mediaRecorder.stream.getTracks().forEach(track => {
                track.stop();
            });
            mediaRecorder = null;
        }
        audioPlayer.removeAttribute('src');
        audioChunks = [];
        audioBlob = null;
        isRecording = false;
        audio.style.display = 'none';
        recordingAnimation.style.display = 'none';
        recordingPlayer.style.display = 'none';
        audioPlayer.style.display = 'none';
        pauseButton.style.display = 'none';
        deleteButton.style.display = 'none';
        sendButton.style.display = 'none';
        audioButton.style.display = 'block';
        messageInput.style.display = 'block';
        svgButtons.forEach((svg)=>{
            svg.style.display = "block";
        })
        fileButtons.forEach((svg)=>{
            svg.style.display = "block";
        })
    }
    // Audio
    messageInput.addEventListener('input', function () {
        if (messageInput.value.trim() == '') {
            sendButton.style.display = 'none';
            audioButton.style.display = 'block';
        } else {
            sendButton.style.display = 'block';
            audioButton.style.display = 'none';
        }
    });
    messageInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            sendOwnerMessage(e);
            sendButton.style.display = 'none';
            audioButton.style.display = 'block';
        }
    });
    sendButton.addEventListener('click', function (e) {
        sendOwnerMessage(e);
        sendButton.style.display = 'none';
        audioButton.style.display = 'block';
    });
    
    function sendOwnerMessage(event) {
        event.preventDefault();
        const chatAreaMessage = document.querySelector('#message-input').value;
        const imgFile = document.getElementById('message-img');
        const docFile = document.getElementById('message-doc');
        const selfProfile = "{!! $profile !!}";
        if (chatAreaMessage || imgFile.files.length > 0 || docFile.files.length > 0 || audioBlob) {
            sendMessage({{ auth()->user()->id }}, selfProfile, chatAreaMessage, imgFile, docFile, audioBlob);
        }
    }
</script>
<!-- Preview Files -->
<script>
  const photosInput = document.getElementById("message-img");
  const documentsInput = document.getElementById("message-doc");
  const previewContainer = document.getElementById("preview-container");
  const imagePreview = document.getElementById("image-preview");
  const documentPreview = document.getElementById("document-preview");
  const documentPreviewP = document.querySelector("#document-preview span");
  const discardButton = document.querySelector(".discard");

  // Add event listener to the Photos input
  photosInput.addEventListener("change", function () {
    documentsInput.value = "";
    const file = this.files[0];
    if (file) {
      const fileExtension = file.name.split('.').pop().toLowerCase();
      // Display the image preview
      if (fileExtension.match(/(jpg|jpeg|png|gif)$/)) {
        previewContainer.style.display = "block";
        documentPreview.style.display = "none";
        imagePreview.removeAttribute("style");
        imagePreview.style.background = `url(${URL.createObjectURL(file)}) no-repeat center center`;
        imagePreview.style.backgroundSize = `contain`;
        imagePreview.innerHTML = "";
        imagePreview.style.display = "block";
        documentPreview.style.display = "none"; // Hide document preview
      }else if (fileExtension.match(/(mp4|avi|mov|wmv|webm)$/)) {
        // Display the video preview
        previewContainer.style.display = "block";
        const videoElement = document.createElement("video");
        videoElement.src = URL.createObjectURL(file);
        videoElement.controls = true; // Add video controls (play, pause, volume)
        videoElement.style.display = "block";
        videoElement.style.width = "300px";
        videoElement.style.height = "200px";
        imagePreview.removeAttribute("style");
        documentPreview.style.display = "none";
        imagePreview.style.display = "block";
        imagePreview.innerHTML = "";
        imagePreview.appendChild(videoElement);
      } else if (fileExtension.match(/(mp3|wav|ogg|oga)$/)) {
        // Display the audio preview 
        previewContainer.style.display = "block";
        const audioElement = document.createElement("audio");
        audioElement.src = URL.createObjectURL(file);
        audioElement.controls = true; // Add audio controls (play, pause, volume)
        audioElement.style.display = "block";
        imagePreview.removeAttribute("style");
        documentPreview.style.display = "none";
        imagePreview.innerHTML = "";
        imagePreview.style.display = "block";
        imagePreview.style.height = "80px";
        imagePreview.appendChild(audioElement);
      }
      sendButton.style.display = 'block';
      audioButton.style.display = 'none';
    } else {
      // Hide both previews if no valid file is selected
      previewContainer.style.display = "none";
      imagePreview.style.display = "none";
      documentPreview.style.display = "none";

      sendButton.style.display = 'none';
      audioButton.style.display = 'block';
    }
  });

  // Add event listener to the Documents input
  documentsInput.addEventListener("change", function () {
    photosInput.value = "";
    const file = this.files[0];
    if (file) { 
      // Display the document preview (you can customize this for other document types)
      previewContainer.style.display = "block";// Set text content as an example
       // Display the document preview with the first 10 characters, extension, and size
      const fileName = file.name;
      const extension = fileName.split('.').pop(); // Get the file extension
      const fileNameWithoutExtension = fileName.substring(0, fileName.lastIndexOf('.'));
      const truncatedFileName = fileNameWithoutExtension.length > 10 ? fileNameWithoutExtension.substring(0, 10) + '...' : fileNameWithoutExtension;
      const fileSize = (file.size / 1024).toFixed(2) + ' KB'; // Convert file size to KB with 2 decimal places
      documentPreviewP.textContent = `${truncatedFileName}.${extension} (${fileSize})`;
      // Set text content as an example
      documentPreview.style.display = "flex";
      imagePreview.style.display = "none"; // Hide image preview
      
      sendButton.style.display = 'block';
      audioButton.style.display = 'none';
    } else {
      // Hide both previews if no valid file is selected
      previewContainer.style.display = "none";
      documentPreview.style.display = "none";
      imagePreview.style.display = "none";
      
      sendButton.style.display = 'none';
      audioButton.style.display = 'block';
    }
  });

  // Add event listener to the Discard button
  discardButton.addEventListener("click", function (e) {
    e.preventDefault();
    handleDefaultChatView();
  });

  function handleDefaultChatView() {
      // Reset the input values to clear the selected files
      photosInput.value = "";
      documentsInput.value = "";
      // Hide both previews
      previewContainer.style.display = "none";
      imagePreview.style.display = "none";
      imagePreview.innerHTML = "";
      documentPreview.style.display = "none";
      documentPreviewP.innerHTML = "";
      // Clear background image
      imagePreview.removeAttribute("style");
      
      sendButton.style.display = 'none';
      audioButton.style.display = 'block';
  }
</script>
<!-- WebSocket -->
<!-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
        cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
    });

    var channel = pusher.subscribe('receive-channel');
    channel.bind('receive', function(data) {
        const message = data.message;
        // Extract 'from' and convert it to an integer
        const userId = message.userId;

        // Extract 'imgFull' and 'content'
        const imgFull = message.sender?.profilePicThumbObj?.imgFull ?? message.defaultImg;
        const content = message.content;
        const type = message.type;
        
        const chatAreaState = document.querySelector('#message-state');
        
        const info = {
            mime: message.mimetype
        };
        if(type === 'document') {
            info.filename = message.filename;
            info.size = message.size;
            info.caption = message.caption ?? '';
        }
        if(type === 'image') {
            info.caption = message.caption ?? '';
        }
        if(type === 'video') {
            info.caption = message.caption ?? '';
        }
        const chatAreaTitle = document.querySelector('.chat-area-title p');
        const chatAreaProfileImg = document.querySelector('.chat-area-profile');
        
        const chatAreaOpen = document.querySelector(`.chat-area.open.message-${userId}`);
        // Call your sendMessage function with the extracted data
        if (chatAreaOpen) {
            if(type === 'chat') {
                chatAreaState.textContent="Typing...";
            }
            if(type === 'document') {
                chatAreaState.textContent="File Sending...";
            }
            if(type === 'image') {
                chatAreaState.textContent="Image Sending...";
            }
            if(type === 'video') {
                chatAreaState.textContent="Video Sending...";
            }
            if(type === 'audio' || type === 'ptt') {
                chatAreaState.textContent="Recording...";
            }
            // Update the chat-area-title text with the notifyName
            chatAreaTitle.innerHTML = message.notifyName;
            // Update the chat-area-profile image source with the imgFull
            chatAreaProfileImg.src = imgFull;
            if(message.success) {
                setTimeout(() => {
                    if(type === 'chat') {
                        sendReceiveMessage(userId, imgFull, content);
                    } else if(type === 'image') {
                        sendReceiveMessage(userId, imgFull, '', content, null, null, info);
                    } 
                    else if(type === 'document') {
                        sendReceiveMessage(userId, imgFull, '', null, content, null, info);
                    } 
                    else if(type === 'ptt') {
                        sendReceiveMessage(userId, imgFull, '', null, null, content, info);
                    } 
                    else if(type === 'audio') {
                        sendReceiveMessage(userId, imgFull, '', content, null, null, info);
                    } 
                    else if(type === 'video') {
                        sendReceiveMessage(userId, imgFull, '', content, null, null, info);
                    }
                    chatAreaState.textContent="";
                }, 2000);
            }
        }
    });

    var autoReplyChannel = pusher.subscribe('reply-channel');
    autoReplyChannel.bind('reply', function(data) {
        const message = data.message;
        // Extract 'from' and convert it to an integer
        const userId = message.userId;

        // Extract 'imgFull' and 'content'
        const imgFull = message.profile;
        const content = message.content;
        const type = message.type;
        const info = {
            type: message.type
        };
        if(type === 'document') {
            const fileOriginalName = message.fileName;
            const extension = fileOriginalName.split('.').pop();
            info.mime = `doc/${extension}`;
            info.filename = message.fileName;
            info.size = null;
            info.caption = message.caption ?? '';
        }
        if(type === 'image') {
            const fileOriginalName = message.fileName;
            const extension = fileOriginalName.split('.').pop();
            info.mime = `image/${extension}`;
            info.caption = message.caption ?? '';
        }
        if(type === 'ptt') {
            const fileOriginalName = message.fileName;
            const extension = fileOriginalName.split('.').pop();
            info.mime = `audio/${extension}`;
            info.caption = message.caption ?? '';
        }
        const chatAreaTitle = document.querySelector('.chat-area-title p');
        const chatAreaProfileImg = document.querySelector('.chat-area-profile');
        
        const chatAreaOpen = document.querySelector(`.chat-area.open.message-${userId}`);
        // Call your sendMessage function with the extracted data
        if (chatAreaOpen) {
            if(message.success) {
                if(type === 'chat') {
                    sendReceiveMessage({{auth()->user()->id}}, imgFull, content);
                } else if(type === 'image') {
                    sendReceiveMessage({{auth()->user()->id}}, imgFull, '', content, null, null, info);
                } 
                else if(type === 'document') {
                    sendReceiveMessage({{auth()->user()->id}}, imgFull, '', null, content, null, info);
                } 
                else if(type === 'ptt') {
                    sendReceiveMessage({{auth()->user()->id}}, imgFull, '', null, null, content, info);
                } 
                else if(type === 'audio') {
                    sendReceiveMessage({{auth()->user()->id}}, imgFull, '', content, null, null, info);
                } 
                else if(type === 'video') {
                    sendReceiveMessage({{auth()->user()->id}}, imgFull, '', content, null, null, info);
                }
            }
        }
    });
</script> -->