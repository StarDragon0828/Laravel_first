@extends('layouts.app')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('css/campanha/style.css')}}">
<div class="content-wrapper">
    @if (session('status'))
        <div id="alert-messenger" class="alert alert-info" style="position: absolute; z-index: 4; right: 0; bottom: 50px;">
            <svg aria-hidden="true" class="svg-icon iconClearSm" style="cursor: pointer; margin-right: 20px; fill: #fff;" width="14" height="14" viewBox="0 0 14 14"><path d="M12 3.41 10.59 2 7 5.59 3.41 2 2 3.41 5.59 7 2 10.59 3.41 12 7 8.41 10.59 12 12 10.59 8.41 7 12 3.41Z"></path></svg>
            {{ session('status') }}
        </div>
    @endif
    
    <div class="fullPop popup1">
        <div class="fixedPop fixedPopup1">
            <div class="popUpTop">
                <h3>Criar Nova Acao/Mensagem</h3>
                <span><i class="fa-solid fa-xmark times1"></i></span>
            </div>
            <div class="popUpMiddle">
                <div class="selectMiddle">
                    <li>
                        <h4>Tipo</h4>
                        <select name="tipo" id="tipo">
                            <option value="Selecione" selected>Selecione</option>
                            <option value="Mensagem de Texto">Mensagem de Texto</option>
                            <option value="Imagem">Imagem</option>
                            <option value="Fechar Chat">Fechar Chat</option>
                            <option value="Abrir Chat">Abrir Chat</option>
                            <option value="Trocar Titulo dos Groups">Trocar Titulo dos Groups</option>
                            <option value="Trocar Foto dos Groups">Trocar Foto dos Groups</option>
                            <option value="Mensagem Temporarias">Mensagem Temporarias</option>
                            <option value="Trocar Descricao dos Groups">Trocar Descricao dos Groups</option>
                            <option value="Video">Video</option>
                            <option value="Mensagem de Voz">Mensagem de Voz</option>
                            <option value="Audio">Audio</option>
                            <option value="Documento">Documento</option>
                            <option value="Contato">Contato</option>
                            <option value="Enquete (BETA)">Enquete (BETA)</option>
                        </select>
                    </li>
                </div>
                <div class="main-area">
                    <li>
                        <h4>Nome do Contato</h4>
                        <input type="text" name="contact_name">
                    </li>
                    <li>
                        <h4>Numero do Contato</h4>
                        <input type="text" name="contact_number">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </li>
                    <li>
                        <h4>Texto (opcional)</h4>
                        <textarea name="text-content"></textarea>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur libero deleniti delectus magnam porro laborum!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, nisi?</p>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur deserunt earum sed?</p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel commodi facere illo veritatis sequi.</p>
                    </li>
                    <li>
                        <h4>Mencionar todos as participantes do grupo?</h4>
                        <select name="mention">
                            <option value="0" selected>Nao mencionar participantes</option>
                            <option value="1">Mencionar participantes</option>
                        </select>
                    </li>
                </div>
            </div>
            <div class="popUpBottom">
                <button class="closeButton closeButton1">Fechar</button>
                <button>Salvar</button>
            </div>
        </div>
    </div>
    <div class="fullPop edit-popup1">
        <div class="fixedPop edit-fixedPopup1">
            <div class="popUpTop">
                <h3>Criar Nova Acao/Mensagem</h3>
                <span><i class="fa-solid fa-xmark edit-times1"></i></span>
            </div>
            <div class="popUpMiddle">
                <div class="selectMiddle">
                    <li>
                        <h4>Tipo</h4>
                        <select name="tipo" id="tipo">
                            <option value="Selecione" selected>Selecione</option>
                            <option value="Mensagem de Texto">Mensagem de Texto</option>
                            <option value="Imagem">Imagem</option>
                            <option value="Fechar Chat">Fechar Chat</option>
                            <option value="Abrir Chat">Abrir Chat</option>
                            <option value="Trocar Titulo dos Groups">Trocar Titulo dos Groups</option>
                            <option value="Trocar Foto dos Groups">Trocar Foto dos Groups</option>
                            <option value="Mensagem Temporarias">Mensagem Temporarias</option>
                            <option value="Trocar Descricao dos Groups">Trocar Descricao dos Groups</option>
                            <option value="Video">Video</option>
                            <option value="Mensagem de Voz">Mensagem de Voz</option>
                            <option value="Audio">Audio</option>
                            <option value="Documento">Documento</option>
                            <option value="Contato">Contato</option>
                            <option value="Enquete (BETA)">Enquete (BETA)</option>
                        </select>
                    </li>
                </div>
                <div class="main-area">
                    <li>
                        <h4>Nome do Contato</h4>
                        <input type="text" name="contact_name">
                    </li>
                    <li>
                        <h4>Numero do Contato</h4>
                        <input type="text" name="contact_number">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </li>
                    <li>
                        <h4>Texto (opcional)</h4>
                        <textarea name="text-content"></textarea>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur libero deleniti delectus magnam porro laborum!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, nisi?</p>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur deserunt earum sed?</p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel commodi facere illo veritatis sequi.</p>
                    </li>
                    <li>
                        <h4>Mencionar todos as participantes do grupo?</h4>
                        <select name="mention">
                            <option value="0" selected>Nao mencionar participantes</option>
                            <option value="1">Mencionar participantes</option>
                        </select>
                    </li>
                </div>
            </div>
            <div class="popUpBottom">
                <button class="closeButton edit-closeButton1">Fechar</button>
                <button>Salvar</button>
            </div>
        </div>
    </div>
    <div class="fullPop popup2">
        <div style="width: 30%;" class="fixedPop fixedPopup2">
            <div class="popUpTop">
                <h3>Editar Datas das Mensagens em Massa</h3>
                <span><i class="fa-solid fa-xmark times2"></i></span>
            </div>
            <div class="popUpMiddle">
                <div class="content">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius ea amet autem placeat voluptatem commodi obcaecati delectus minima totam ratione.</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis, dolorum?</p>
                    <li style="margin-top: 10px">
                        <h4>Dias</h4>
                        <input style="width: 100%;" type="text" name="dias">
                    </li>
                </div>
            </div>
            <div class="popUpBottom">
                <button class="closeButton closeButton2">Fechar</button>
                <button>Salvar</button>
            </div>
        </div>
    </div>
    <div class="fullPop popup3">
        <div style="width: 30%;" class="fixedPop fixedPopup3">
            <div class="popUpTop">
                <h3>Copiar mensagens de outra Campanha</h3>
                <span><i class="fa-solid fa-xmark times3"></i></span>
            </div>
            <div class="popUpMiddle">
                <div class="content">
                    <p>Selecione de qual campanha voce gostaria de copiar as mensagens e clique no botao Selecionar Mensagens para escholer  quals mensagens da outra campanha copiar</p>
                    <li>
                        <select style="width: 100%; margin-top: 10px;" name="campanha">
                            <option value="1" selected>COMVITE VIP</option>
                            <option value="2">70</option>
                            <option value="3">71</option>
                            <option value="4">72</option>
                            <option value="5">73</option>
                            <option value="6">74</option>
                            <option value="7">75</option>
                        </select>
                    </li>
                </div>
            </div>
            <div class="popUpBottom">
                <button class="closeButton closeButton3">Fechar</button>
                <button>Salvar</button>
            </div>
        </div>
    </div>
    <div class="fullBody">
        <div class="innerBody">
            <div class="pageTop">
                <div class="topLeft">
                    <h3>Ações mensagens programadas</h3>
                    <h4>Campanhas [WhatsApp]</h4>
                    <p class="p"> <span><i class="fa-solid fa-chevron-right"></i></span>Ações mensagens programadas de Redirecionamentos novos ORGANIZAR SEGUNDA</p>
                    <p>Visualize aqui a timeline das suas ações e mensagens programadas, status de entrega e muito mais.</p>
                    <strong>Hora ne servior: 07-29-28</strong>
                </div>
                <div class="topRight">
                    <button>
                        <h4><i class="fa-solid fa-grip-lines-vertical"></i> Parar Envios</h4>
                        <p>Imediatamente</p>
                    </button>
                    <button class="dropBtn">
                        <h4>+ Nova</h4>
                        <p>Ações/Mensagens</p>
                    </button>
                    <div class="mensagens">
                        <ul>
                            <li class="nova1">Nova Acao/Mensagem</li>
                            <li class="nova2">Editar Mensagem de Boas-vindas</li>
                            <li class="nova3">Copier mensagens de Campanha</li>
                            <li class="nova4">Alterar Datas em Massa</li>
                            <li class="nova5">Remover Mensagens em Massa</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="BtnInsideSlider">
                <h4>Horarios mais concorridas<i class="fa-solid fa-circle-exclamation"></i></h4>
                <div class="btns">
                    <button>00.00</button>
                    <button>00.15</button>
                    <button>00.30</button>
                    <button>00.45</button>
                    <button>01.00</button>
                    <button>01.15</button>
                    <button>01.30</button>
                    <button>01.45</button>
                    <button>02.00</button>
                    <button>02.15</button>
                    <button>02.30</button>
                    <button>02.45</button>
                    <button>03.00</button>
                    <button>03.15</button>
                    <button>03.30</button>
                    <button>03.45</button>
                    <button>04.00</button>
                    <button>04.15</button>
                    <button>04.30</button>
                    <button>04.45</button>
                    <button>05.00</button>
                    <button>05.15</button>
                    <button>05.30</button>
                    <button>05.45</button>
                    <button>06.00</button>
                    <button>06.15</button>
                    <button>06.30</button>
                    <button>06.45</button>
                    <button>07.00</button>
                    <button>07.15</button>
                    <button>07.30</button>
                    <button>07.45</button>
                    <button>08.00</button>
                    <button>08.15</button>
                    <button>08.30</button>
                    <button>08.45</button>
                    <button>09.00</button>
                    <button>09.15</button>
                    <button>09.30</button>
                    <button>09.45</button>
                    <button>10.00</button>
                    <button>10.15</button>
                    <button>10.30</button>
                    <button>10.45</button>
                    <button>11.00</button>
                    <button>11.15</button>
                    <button>11.30</button>
                    <button>11.45</button>
                    <button>12.00</button>
                    <button>12.15</button>
                    <button>12.30</button>
                    <button>12.45</button>
                    <button>13.00</button>
                    <button>13.15</button>
                    <button>13.30</button>
                    <button>13.45</button>
                    <button>14.00</button>
                    <button>14.15</button>
                    <button>14.30</button>
                    <button>14.45</button>
                    <button>15.00</button>
                    <button>15.15</button>
                    <button>15.30</button>
                    <button>15.45</button>
                    <button>16.00</button>
                    <button>16.15</button>
                    <button>16.30</button>
                    <button>16.45</button>
                    <button>17.00</button>
                    <button>17.15</button>
                    <button>17.30</button>
                    <button>17.45</button>
                    <button>18.00</button>
                    <button>18.15</button>
                    <button>18.30</button>
                    <button>18.45</button>
                    <button>19.00</button>
                    <button>19.15</button>
                    <button>19.30</button>
                    <button>19.45</button>
                    <button>20.00</button>
                    <button>20.15</button>
                    <button>20.30</button>
                    <button>20.45</button>
                    <button>21.00</button>
                    <button>21.15</button>
                    <button>21.30</button>
                    <button>21.45</button>
                    <button>22.00</button>
                    <button>22.15</button>
                    <button>22.30</button>
                    <button>22.45</button>
                    <button>23.00</button>
                    <button>23.15</button>
                    <button>23.30</button>
                    <button>23.45</button>
                </div>
                <div class="btnBottom">
                    <h5>Menca Cerconido (recomandade)</h5>
                    <div class="colors">
                        <span> <!-- green --> </span>
                        <span> <!-- pinkish --> </span>
                        <span> <!-- soil --> </span>
                        <span> <!--  pink --> </span>
                        <span> <!-- orange --> </span>
                    </div>
                    <h5>Extremanta Concanido (rao recomandade)</h5>
                </div>
                <h5></h5>
            </div>
            <div class="allCards">
                <div class="card">
                    <div class="cardTop">
                        <h4>Programada para: <span>17/07/2023-20:30</span></h4>
                        <h3><i class="more-option-button fa-solid fa-ellipsis"></i></h3>
                        <ul class="more-option">
                            <li class="edit-mensagens">Edit</li>
                            <li class="delete-mensagens">Delete</li>
                        </ul>
                    </div>
                    <div class="cardBody">
                        <h2>Foto</h2>
                        <img src="/img/pexels-mohsan-ali-mirza-2377893.jpg" alt="product">
                        <h3>"0.15 CENTAVOS</h3>
                        <P>0.15 centavos podem se transformer el 30,000,00 mil reals!!</P>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, fuga. Exercitationem esse necessitatibus accusamus cupiditate reiciendis itaque nisi animi, sed provident sint laudantium deserunt et atque, modi eos veritatis molestias.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="cardTop">
                        <h4>Programada para: <span>17/07/2023-20:30</span></h4>
                        <h3><i class="fa-solid fa-ellipsis"></i></h3>
                    </div>
                    <div class="cardBody">
                        <h2>Foto</h2>
                        <img src="/img/pexels-mohsan-ali-mirza-2377893.jpg" alt="product">
                        <h3>"0.15 CENTAVOS"</h3>
                        <P>0.15 centavos podem se transformer el 30,000,00 mil reals!!</P>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, fuga. Exercitationem esse necessitatibus accusamus cupiditate reiciendis itaque nisi animi, sed provident sint laudantium deserunt et atque, modi eos veritatis molestias.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="cardTop">
                        <h4>Programada para: <span>17/07/2023-20:30</span></h4>
                        <h3><i class="fa-solid fa-ellipsis"></i></h3>
                    </div>
                    <div class="cardBody">
                        <h2>Foto</h2>
                        <img src="/img/pexels-mohsan-ali-mirza-2377893.jpg" alt="product">
                        <h3>"0.15 CENTAVOS"</h3>
                        <P>0.15 centavos podem se transformer el 30,000,00 mil reals!!</P>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, fuga. Exercitationem esse necessitatibus accusamus cupiditate reiciendis itaque nisi animi, sed provident sint laudantium deserunt et atque, modi eos veritatis molestias.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="cardTop">
                        <h4>Programada para: <span>17/07/2023-20:30</span></h4>
                        <h3><i class="fa-solid fa-ellipsis"></i></h3>
                    </div>
                    <div class="cardBody">
                        <h2>Foto</h2>
                        <img src="/img/pexels-mohsan-ali-mirza-2377893.jpg" alt="product">
                        <h3>"0.15 CENTAVOS"</h3>
                        <P>0.15 centavos podem se transformer el 30,000,00 mil reals!!</P>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, fuga. Exercitationem esse necessitatibus accusamus cupiditate reiciendis itaque nisi animi, sed provident sint laudantium deserunt et atque, modi eos veritatis molestias.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function setupDropdownToggle(buttonClass, dropdownClass) {
        const button = document.querySelector(buttonClass);
        const dropdown = document.querySelector(dropdownClass);

        button.addEventListener('click', (event) => {
            event.stopPropagation();
            dropdown.classList.toggle('active');
        });

        document.addEventListener('click', (event) => {
            const target = event.target;
            const isButtonClick = target.classList.contains(buttonClass.replace('.', ''));
            const isDropdown = target.closest(dropdownClass);

            if (!isButtonClick && !isDropdown) {
                const dropdownElement = document.querySelector(dropdownClass);
                const isActive = dropdownElement.classList.contains('active');

                if (isActive) {
                    dropdownElement.classList.remove('active');
                }
            }
        });
    }
    setupDropdownToggle('.dropBtn', '.mensagens');
    setupDropdownToggle('.more-option-button', '.more-option');
    function setupPopupToggle(buttonClass, popupClass, innerPopupClass, closeElementClass = null, closeButtonClass = null) {
        const buttons = document.querySelectorAll(buttonClass);
        const popup = document.querySelector(popupClass);
        const closeElement = closeElementClass ? document.querySelector(closeElementClass) : null;
        const closeButton = closeButtonClass ? document.querySelector(closeButtonClass) : null;

        buttons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.stopPropagation();
                popup.classList.toggle('active');
            });
        })
        document.addEventListener('click', (event) => {
            const target = event.target;
            const isButtonClick = target.classList.contains(buttonClass.replace('.', ''));
            const isPopup = target.closest(popupClass);
            const isCloseElement = closeElement && target.classList.contains(closeElementClass.replace('.', ''));
            const isCloseButton = closeButton && target.classList.contains(closeButtonClass.replace('.', ''));

            if (!isButtonClick && (!isPopup || (isPopup && !target.closest(innerPopupClass)))) {
                popup.classList.remove('active');
            }

            if (isCloseElement) {
                popup.classList.remove('active');
            }
            if (isCloseButton) {
                popup.classList.remove('active');
            }
        });
    }
    setupPopupToggle('.mensagens .nova1', '.popup1', '.fixedPopup1', '.times1', '.closeButton1');
    setupPopupToggle('.edit-mensagens', '.edit-popup1', '.edit-fixedPopup1', '.edit-times1', '.edit-closeButton1');
    setupPopupToggle('.mensagens .nova2', '.popup2', '.fixedPopup2', '.times2', '.closeButton2');
    setupPopupToggle('.mensagens .nova3', '.popup3', '.fixedPopup3', '.times3', '.closeButton3');
</script>
<script>
    const closeAlert = document.querySelector('#alert-messenger svg');
    const alertContent = document.querySelector('#alert-messenger');
    closeAlert?.addEventListener('click', () => {
        alertContent.style.display = "none";
    });
</script>
@endsection