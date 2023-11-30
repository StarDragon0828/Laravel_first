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
              <p><a href="/operadores">Home</a> / Chats</p>
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
                  src="https://i.ibb.co/fvwyFZJ/Admin-LTELogo.png" alt=""
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
                    <div class="more">
                        <ul>
                            <li><i class="far fa-comment" style="padding: 0px 5px"></i></li>
                            <li>Mensagents rapidas</li>
                        </ul>
                    </div>
                </div>
                <div class="option-chat">
                    <div class="part">
                        <li data-option="Chats" class="active">Chats (231)</li>
                        <li data-option="Espera">Espera (12)</li>
                    </div>
                    <div class="part">
                        <li data-option="Andemiento">Andemiento (1)</li>
                        <li data-option="Menus">Menus (0)</li>
                    </div>
                </div>
            </div>
            <div class="conversations Chats active">
                <div class="msg online">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png" alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Madison Jones</div>
                        <div class="msg-content">
                            <span class="msg-message">What time was our meet</span>
                            <span class="msg-date">20m</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%2812%29.png" alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Miguel Cohen</div>
                        <div class="msg-content">
                            <span class="msg-message">Adaptogen taiyaki austin jean shorts brunch</span>
                            <span class="msg-date">20m</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <div class="msg-profile group">
                        <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <path d="M12 2l10 6.5v7L12 22 2 15.5v-7L12 2zM12 22v-6.5" />
                            <path d="M22 8.5l-10 7-10-7" />
                            <path d="M2 15.5l10-7 10 7M12 2v6.5" />
                        </svg>
                    </div>
                    <div class="msg-detail">
                        <div class="msg-username">Mathematics Group</div>
                        <div class="msg-content">
                            <span class="msg-message">Aysenur: I love Mathematics</span>
                            <span class="msg-date">28m</span>
                        </div>
                    </div>
                </div>
                <div class="msg online">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%282%29.png" alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Lea Debere</div>
                        <div class="msg-content">
                            <span class="msg-message">Shoreditch iPhone jianbing</span>
                            <span class="msg-date">45m</span>
                        </div>
                    </div>
                </div>
                <div class="msg online">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29+%281%29.png"
                        alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Jordan Smith</div>
                        <div class="msg-content">
                            <span class="msg-message">Snackwave craft beer raclette, beard kombucha </span>
                            <span class="msg-date">2h</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%284%29+%281%29.png"
                        alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Jared Jackson</div>
                        <div class="msg-content">
                            <span class="msg-message">Tattooed brooklyn typewriter gastropub</span>
                            <span class="msg-date">18m</span>
                        </div>
                    </div>
                </div>
                <div class="msg online">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%283%29+%281%29.png" alt="">
                    <div class="msg-detail">
                        <div class="msg-username">Henry Clark</div>
                        <div class="msg-content">
                            <span class="msg-message">Ethical typewriter williamsburg lo-fi street art</span>
                            <span class="msg-date">2h</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/qs6F3dgm.png"
                        alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Jason Mraz</div>
                        <div class="msg-content">
                            <span class="msg-message">I'm lucky I'm in love with my best friend</span>
                            <span class="msg-date">4h</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%288%29.png" alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Chiwa Lauren</div>
                        <div class="msg-content">
                            <span class="msg-message">Pabst af 3 wolf moon</span>
                            <span class="msg-date">28m</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%289%29.png" alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Caroline Orange</div>
                        <div class="msg-content">
                            <span class="msg-message">Bespoke aesthetic lyft woke cornhole</span>
                            <span class="msg-date">35m</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%286%29.png" alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Lina Ashma</div>
                        <div class="msg-content">
                            <span class="msg-message">Migas food truck crucifix vexi</span>
                            <span class="msg-date">42m</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="conversations Espera">
                <div class="msg online">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%282%29.png" alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Lea Debere</div>
                        <div class="msg-content">
                            <span class="msg-message">Shoreditch iPhone jianbing</span>
                            <span class="msg-date">45m</span>
                        </div>
                    </div>
                </div>
                <div class="msg online">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29+%281%29.png"
                        alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Jordan Smith</div>
                        <div class="msg-content">
                            <span class="msg-message">Snackwave craft beer raclette, beard kombucha </span>
                            <span class="msg-date">2h</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%284%29+%281%29.png"
                        alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Jared Jackson</div>
                        <div class="msg-content">
                            <span class="msg-message">Tattooed brooklyn typewriter gastropub</span>
                            <span class="msg-date">18m</span>
                        </div>
                    </div>
                </div>
                <div class="msg online">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%283%29+%281%29.png" alt="">
                    <div class="msg-detail">
                        <div class="msg-username">Henry Clark</div>
                        <div class="msg-content">
                            <span class="msg-message">Ethical typewriter williamsburg lo-fi street art</span>
                            <span class="msg-date">2h</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/qs6F3dgm.png"
                        alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Jason Mraz</div>
                        <div class="msg-content">
                            <span class="msg-message">I'm lucky I'm in love with my best friend</span>
                            <span class="msg-date">4h</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%288%29.png" alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Chiwa Lauren</div>
                        <div class="msg-content">
                            <span class="msg-message">Pabst af 3 wolf moon</span>
                            <span class="msg-date">28m</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%289%29.png" alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Caroline Orange</div>
                        <div class="msg-content">
                            <span class="msg-message">Bespoke aesthetic lyft woke cornhole</span>
                            <span class="msg-date">35m</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%286%29.png" alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Lina Ashma</div>
                        <div class="msg-content">
                            <span class="msg-message">Migas food truck crucifix vexi</span>
                            <span class="msg-date">42m</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="conversations Andemiento">
                <div class="msg online">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%283%29+%281%29.png" alt="">
                    <div class="msg-detail">
                        <div class="msg-username">Henry Clark</div>
                        <div class="msg-content">
                            <span class="msg-message">Ethical typewriter williamsburg lo-fi street art</span>
                            <span class="msg-date">2h</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/qs6F3dgm.png"
                        alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Jason Mraz</div>
                        <div class="msg-content">
                            <span class="msg-message">I'm lucky I'm in love with my best friend</span>
                            <span class="msg-date">4h</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="conversations Menus">
                <div class="msg online">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29+%281%29.png"
                        alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Jordan Smith</div>
                        <div class="msg-content">
                            <span class="msg-message">Snackwave craft beer raclette, beard kombucha </span>
                            <span class="msg-date">2h</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%284%29+%281%29.png"
                        alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Jared Jackson</div>
                        <div class="msg-content">
                            <span class="msg-message">Tattooed brooklyn typewriter gastropub</span>
                            <span class="msg-date">18m</span>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <img class="msg-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%286%29.png" alt="" />
                    <div class="msg-detail">
                        <div class="msg-username">Lina Ashma</div>
                        <div class="msg-content">
                            <span class="msg-message">Migas food truck crucifix vexi</span>
                            <span class="msg-date">42m</span>
                        </div>
                    </div>
                </div>
            </div>
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
                    <p style="margin: 0px">Chat Group</p>
                </div>
                <div class="chat-area-group">
                    <img class="chat-area-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%283%29+%281%29.png"
                        alt="" />
                    <img class="chat-area-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%282%29.png" alt="">
                    <img class="chat-area-profile"
                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%2812%29.png" alt="" />
                    <span>+4</span>
                    <div class="chat-area-more-feature">
                        <svg height="24px" name="icon" role="presentation" viewBox="0 0 36 36" width="24px"><g transform="translate(18,18)scale(1.2)translate(-18,-18)"><path d="M18,10 C16.6195,10 15.5,11.119 15.5,12.5 C15.5,13.881 16.6195,15 18,15 C19.381,15 20.5,13.881 20.5,12.5 C20.5,11.119 19.381,10 18,10 Z M16,25 C16,25.552 16.448,26 17,26 L19,26 C19.552,26 20,25.552 20,25 L20,18 C20,17.448 19.552,17 19,17 L17,17 C16.448,17 16,17.448 16,18 L16,25 Z M18,30 C11.3725,30 6,24.6275 6,18 C6,11.3725 11.3725,6 18,6 C24.6275,6 30,11.3725 30,18 C30,24.6275 24.6275,30 18,30 Z" fill="currentColor" stroke="currentColor"></path></g></svg>
                    </div>
                </div>
              </div>
              <div class="chat-area-main">
                <div class="chat-msg user" data-sender="user">
                    <div class="chat-msg-profile">
                        <img class="chat-msg-img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%283%29+%281%29.png" alt="">
                        <div class="chat-msg-date">Message seen 1.22pm</div>
                    </div>
                    <div class="chat-msg-content">
                        <div class="chat-msg-text">Luctus et ultrices posuere cubilia curae.</div>
                        <div class="chat-msg-text"><img src="https://media0.giphy.com/media/yYSSBtDgbbRzq/giphy.gif?cid=ecf05e47344fb5d835f832a976d1007c241548cc4eea4e7e&rid=giphy.gif"></div>
                        <div class="chat-msg-text">Neque gravida in fermentum et sollicitudin ac orci phasellus egestas. Pretium lectus quam id leo.</div>
                    </div>
                </div>
                <div class="chat-msg owner" data-sender="owner">
                    <div class="chat-msg-profile">
                        <img class="chat-msg-img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png" alt="">
                        <div class="chat-msg-date">Message seen 1.22pm</div>
                    </div>
                    <div class="chat-msg-content">
                        <div class="chat-msg-text">Sit amet risus nullam eget felis eget. Dolor sed viverra ipsum😂😂😂</div>
                        <div class="chat-msg-text">Cras mollis nec arcu malesuada tincidunt.</div>
                        <div class="chat-msg-text">posuere eget augue sodales, aliquet posuere eros.</div>
                        <div class="chat-msg-text">Cras mollis nec arcu malesuada tincidunt.</div>
                    </div>
                </div>
                <div class="chat-msg user" data-sender="user">
                    <div class="chat-msg-profile">
                        <img class="chat-msg-img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%282%29.png" alt="">
                        <div class="chat-msg-date">Message seen 2.45pm</div>
                    </div>
                    <div class="chat-msg-content">
                        <div class="chat-msg-text">Aenean tristique maximus tortor non tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae😊</div>
                        <div class="chat-msg-text">Ut faucibus pulvinar elementum integer enim neque volutpat.</div>
                    </div>
                </div>
                <div class="chat-msg owner" data-sender="owner">
                    <div class="chat-msg-profile">
                        <img class="chat-msg-img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png" alt="">
                        <div class="chat-msg-date">Message seen 2.50pm</div>
                    </div>
                    <div class="chat-msg-content">
                        <div class="chat-msg-text">posuere eget augue sodales, aliquet posuere eros.</div>
                        <div class="chat-msg-text">Cras mollis nec arcu malesuada tincidunt.</div>
                    </div>
                </div>
                <div class="chat-msg user" data-sender="user">
                    <div class="chat-msg-profile">
                        <img class="chat-msg-img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%2812%29.png" alt="">
                        <div class="chat-msg-date">Message seen 3.16pm</div>
                    </div>
                    <div class="chat-msg-content">
                        <div class="chat-msg-text">Egestas tellus rutrum tellus pellentesque</div>
                    </div>
                </div>
                <div class="chat-msg user" data-sender="user">
                    <div class="chat-msg-profile">
                        <img class="chat-msg-img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%283%29+%281%29.png" alt="">
                        <div class="chat-msg-date">Message seen 3.16pm</div>
                    </div>
                    <div class="chat-msg-content">
                        <div class="chat-msg-text">Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et.</div>
                    </div>
                </div>
                <div class="chat-msg owner" data-sender="owner">
                    <div class="chat-msg-profile">
                        <img class="chat-msg-img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png" alt="">
                        <div class="chat-msg-date">Message seen 3.50pm</div>
                    </div>
                    <div class="chat-msg-content">
                        <div class="chat-msg-text">Tincidunt arcu non sodales😂</div>
                    </div>
                </div>
                <div class="chat-msg user" data-sender="user">
                    <div class="chat-msg-profile">
                        <img class="chat-msg-img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%282%29.png" alt="">
                        <div class="chat-msg-date">Message seen 4.45pm</div>
                    </div>
                    <div class="chat-msg-content">
                        <div class="chat-msg-text">Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et🥰</div>
                    </div>
                </div>
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
          <!-- Detail Area -->
          <div class="detail-area">
              <div class="close-area">
                  <svg viewBox="0 0 24 24" height="24" width="24" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24" xml:space="preserve"><path fill="currentColor" d="M12,4l1.4,1.4L7.8,11H20v2H7.8l5.6,5.6L12,20l-8-8L12,4z"></path></svg>
              </div>
              <div class="detail-area-header">
                  <div class="msg-profile group">
                    <img class="user-profile"
                        src="https://i.ibb.co/fvwyFZJ/Admin-LTELogo.png" alt=""
                        class="account-profile" alt="">
                  </div>
                  <div class="detail-title">Mathematics Group</div>
                  <div class="detail-subtitle">+38-21238232</div>
                  <div class="detail-subtitle">Created by Aysenur, 1 May 2020</div>
              </div>
              <div class="detail-changes">
                  <div class="detail-subtitle">Informacoes do contato</div>
                  <input type="text" placeholder="Email">
                  <input type="text" placeholder="City / State">
                  <input type="text" placeholder="Teste">
                  <textarea placeholder="Observation"></textarea>
              </div>
          </div>
      </div>
  </div>
</div>
@include('plugChats.js')