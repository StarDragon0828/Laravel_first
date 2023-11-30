<div class="form-group" style="width: 100%;">
    <label for="exampleInputEmail1">Remetente de reposta automatica</label>
    <select class="form-control" id="sessionSelect">
    <option value="">Select Instance</option>
    @foreach ($instances as $instance)
        <option value="{{ $instance->session_name }}">{{ $instance->session_name }}</option>
    @endforeach
    </select>
    <input type="hidden" name="session" id="selectedSession" value="">
</div>
<div class="pop-form-cont mb-3">
    <div class="form-content">
    <div class="form-group" style="width: 100%;">
        <label for="exampleInputEmail1">Palavara chave da Reposta Automatica.<span style="color:#007bff;">(Helio, olá, Halio)</span></label>
        <input type="text" name="keyword" class="form-control" id="exampleInputEmail1" placeholder="Palavara">
    </div>
    <div class="form-group">
        <label>Reposta automatica <span style="color:#007bff;">[name] ra exibir o nome do usuário</span></label>
        <textarea class="form-control" id="responseTextArea" name="response" rows="3" placeholder="Enter ..."></textarea>
    </div>
    
    <div class="row">
        <div class="col-md-12">
        <div class=" card-default">
            <label>Arquivo de mídia de resposta automática** <span style="color:#007bff;">(opcional) JPEG/PNG/PDF/DOCX/PPX/XLSX/CSV/MP3</span>
            </label>
            <div class="">
            <div id="actions" class="row">
                <div class="col-lg-6">
                    <div class="btn-group w-100">
                        <label for="response_file" class="w-100">
                            <span class="btn btn-success col fileinput-button">
                                <i class="fas fa-plus"></i>
                                <span>Add files</span>
                            </span>
                        </label>
                        <input type="file" id="response_file" name="upload_file" style="display: none;" accept="jpg, jpeg, png, pdf, docx, ppx, xlsx, csv, mp3">
                    </div>
                </div>
                <div class="col-lg-6">
                    <style>
                        .responders.preview-container {
                            position: relative;
                            background-color: #f7f7f7; /* Background color */
                        }
                        .responders.preview-container .content{
                            width: 300px; /* Set your desired width */
                            min-height: 38px; /* Set your desired height */
                            max-height: 200px; /* Set your desired height */
                            overflow: auto;
                            padding: 10px; /* Optional padding for content spacing */
                        }
                        .responders.preview-container .cross {
                            position: absolute;
                            background: #ffffff52;
                            width: 100%;
                            padding: 10px 16px 3px 0px;
                            z-index: 2;
                        }
                    </style>
                    <div class="responders preview-container">
                        <div id="cross" class="cross justify-content-end" style="display: none">
                            <i class="fa fa-times" id="clearInput" style="cursor: pointer"></i>
                        </div>
                        <div class="content w-100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    
        </div>
        <!-- /.card -->
        </div>
    </div>
    </div>
    <div class="form-content">
        <div class="form-group" style="width: 100%;">
          <label for="matchingPercentage">Porcentagem de correspondecia de reposta automática**</label>
          <input type="number" name="percentage" class="form-control" id="matchingPercentage" placeholder="Palavara" pattern="[0-9]+" oninput="validateInput(this)">
        </div>
        <label for="exampleInputEmail1">Emoji (Copie e cole)</label>
        <div class="emoji-cont">
            <div id="emoji-list"></div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
            const emojiListContainer = document.getElementById("emoji-list")
            const responseTextArea = document.getElementById("responseTextArea");
        
            // Get emojis from Unicode
            const emojis = ["😀", "😁", "😂", "🤣", "😃", "😄", "😅", "😆", "😉", "😊",
                "😋", "😎", "😍", "😘", "🥰", "😗", "😙", "😚", "☺", "🙂",
                "🤗", "🤩", "🤔", "🤨", "😐", "😑", "😶", "🙄", "😏", "😣",
                "😥", "😮", "🤐", "😯", "😪", "😫", "😴", "😌", "😛", "😜",
                "😝", "🤤", "😒", "😓", "😔", "😕", "🙃", "🤑", "😲", "☹",
                "🙁", "😖", "😞", "😟", "😤", "😢", "😭", "😦", "😧", "😨",
                "😩", "🤯", "😬", "😰", "😱", "🥵", "🥶", "😳", "🤪", "😵",
                "😡", "😠", "🤬", "😷", "🤒", "🤕", "🤢", "🤮", "🤧", "😇",
                "🥳", "🥴", "🥺", "🤠", "🤡", "🤥", "🤫", "🤭", "🧐", "🤓",
                "😈", "👿", "👹", "👺", "💀", "👻", "👽", "🤖", "💩", "😺",
                "😸", "😹", "😻", "😼", "😽", "🙀", "😿", "😾", "👍", "👎", "👌", "✌", "🤞", "🤟", "🤘", "👏", "🙌", "👐",
                    "🤲", "🤝", "🙏", "✍", "💅", "🤳", "💪", "🦾", "🦵", "🦿",
                    "🦶", "👣", "👂", "🦻", "👃", "🧠", "🫀", "🫁", "🦷", "🦴",
                    "👀", "👁", "👅", "👄", "💋", "🩸", "👶", "👧", "🧒", "👦",
                    "👩", "🧑", "👨", "👩‍🦱", "🧑‍🦱", "👨‍🦱", "👩‍🦰", "🧑‍🦰", "👨‍🦰",
                    "👱‍♀", "👱‍♂", "👩‍🦳", "🧑‍🦳", "👨‍🦳", "👩‍🦲", "🧑‍🦲", "👨‍🦲",
                    "🧔", "👵", "🧓", "👴", "👲", "👳‍♀", "👳‍♂", "🧕", "🧔‍♀",
                    "🧔‍♂", "👱‍♀", "👱‍♂", "👮‍♀", "👮‍♂", "👷‍♀", "👷‍♂", "💂‍♀",
                    "💂‍♂", "🕵‍♀", "🕵‍♂", "👩‍⚕", "👨‍⚕", "👩‍🌾", "👨‍🌾", "👩‍🍳",
                    "👨‍🍳", "👩‍🎓", "👨‍🎓", "👩‍🎤", "👨‍🎤", "👩‍🏫", "👨‍🏫", "👩‍🏭",
                    "👨‍🏭", "👩‍💻", "👨‍💻", "👩‍💼", "👨‍💼", "👩‍🔧", "👨‍🔧", "👩‍🔬",
                    "👨‍🔬", "👩‍🎨", "👨‍🎨", "👩‍🚒", "👨‍🚒", "👩‍✈", "👨‍✈", "👩‍🚀",
                    "👨‍🚀", "👩‍⚖", "👨‍⚖", "👰", "🤵", "👸", "🤴", "🦸‍♀",
                    "🦸‍♂", "🦹‍♀", "🦹‍♂", "🤶", "🎅", "🧙‍♀", "🧙‍♂", "🧝‍♀",
                    "🧝‍♂", "🧛‍♀", "🧛‍♂", "🧟‍♀", "🧟‍♂", "🧞‍♀", "🧞‍♂", "🧜‍♀",
                    "🧜‍♂", "🧚‍♀", "🧚‍♂", "👼", "🤰", "🤱", "👩‍🍼", "👨‍🍼",
                    "🙇‍♀", "🙇‍♂", "💁‍♀", "💁‍♂", "🙅‍♀", "🙅‍♂", "🙆‍♀", "🙆‍♂",
                    "🙋‍♀", "🙋‍♂", "🤦‍♀", "🤦‍♂", "🤷‍♀", "🤷‍♂", "🙎‍♀", "🙎‍♂",
                    "🙍‍♀", "🙍‍♂", "💇‍♀", "💇‍♂", "💆‍♀", "💆‍♂", "🧖‍♀", "🧖‍♂",
                    "💅", "🤳", "💃", "🕺", "👯‍♀", "👯‍♂", "🕴", "🚶‍♀", "🚶‍♂",
                    "🏃‍♀", "🏃‍♂", "🧍‍♀", "🧍‍♂", "🧎‍♀", "🧎‍♂", "🧑‍🦯", "👩‍🦯",
                    "👨‍🦯", "🧑‍🦼", "👩‍🦼", "👨‍🦼", "🧑‍🦽", "👩‍🦽"]
        
        
            emojis.forEach(emoji => {
                const emojiSpan = document.createElement("span");
                emojiSpan.className = "emoji";
                emojiSpan.style.cursor = "pointer";
                emojiSpan.innerHTML = emoji;
                emojiSpan.addEventListener("click", function() {
                responseTextArea.value += emoji;  
                });
                emojiListContainer.appendChild(emojiSpan);
            });
            });
        </script>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Add a change event listener to the session select element
        const sessionSelect = document.getElementById("sessionSelect");
        const selectedSessionInput = document.getElementById("selectedSession");

        sessionSelect.addEventListener("change", function () {
            // Update the hidden input field with the selected session value
            selectedSessionInput.value = sessionSelect.value;
        });
    });
    function validateInput(input) {
        // Remove non-digit characters, but only if the input is not a valid number
        if (!/^\d+$/.test(input.value)) {
            input.value = input.value.replace(/\D/g, '');
        }

        // Parse the value to an integer
        const value = parseInt(input.value, 10);

        // Ensure the value is within the desired range
        if (isNaN(value) || value < 1) {
            input.value = '';
        } else if (value > 100) {
            input.value = '100';
        }
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const responseFileInput = document.getElementById("response_file");
        const previewContainer = document.querySelector(".preview-container .content");
        const clearInput = document.getElementById("clearInput");
        const discardContent = document.getElementById("cross");

        responseFileInput.addEventListener("change", function () {
            // Clear the previous preview
            previewContainer.innerHTML = '';

            const file = this.files[0];
            if (file) {
                discardContent.style.display = "flex";
                const extension = file.name.split('.').pop().toLowerCase();
                const validImageExtensions = ['jpg', 'jpeg', 'png'];
                const validDocumentExtensions = ['pdf', 'docx', 'pptx', 'xlsx', 'csv'];
                const validAudioExtensions = ['mp3'];

                if (validImageExtensions.includes(extension)) {
                    // Display image
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.classList.add('img-preview');
                    img.style.width = '100%';
                    previewContainer.appendChild(img);
                } else if (validDocumentExtensions.includes(extension)) {
                    // Display document with icon
                    const docIcon = document.createElement('i');
                    docIcon.className = 'far fa-file-alt mr-2';
                    const docName = document.createTextNode(file.name);
                    const docContainer = document.createElement('div');
                    docContainer.appendChild(docIcon);
                    docContainer.appendChild(docName);
                    previewContainer.appendChild(docContainer);
                } else if (validAudioExtensions.includes(extension)) {
                    // Display audio player
                    const audio = document.createElement('audio');
                    audio.controls = true;
                    const source = document.createElement('source');
                    source.src = URL.createObjectURL(file);
                    audio.appendChild(source);
                    previewContainer.appendChild(audio);
                } else {
                    // Unsupported file type
                    const unsupportedMsg = document.createTextNode('Unsupported file type');
                    previewContainer.appendChild(unsupportedMsg);
                }
            }
        });

        clearInput.addEventListener("click", function () {
            responseFileInput.value = ""; // Clear the input
            previewContainer.innerHTML = ""; // Hide the preview container
            discardContent.style.display = "none";
        });
    });
</script>