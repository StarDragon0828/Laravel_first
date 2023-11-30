
<script src="{{ asset('plugins/emoji/mart.js') }}"></script>
<!-- Contact Handling -->
<script>
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
<!-- Multiple Conversations Handling -->
<script>
    // Function to scroll the chat area to the bottom
    function scrollToBottom() {
        const chatArea = document.querySelector(".chat-area");
        chatArea.scrollTo({
            top: chatArea.scrollHeight,
            behavior: 'smooth'
        });
    }
    // Get the container element
    const contactsContainers = document.querySelectorAll('.conversation-area .conversations');
    // Get the chat-default-area and chat-area elements
    const chatDefaultArea = document.querySelector('.chat-default-area');
    const chatArea = document.querySelector('.chat-area');
    const detailArea = document.querySelector('.detail-area');

    let currentActiveMessage = null;
    // Add click event listeners to message elements
    contactsContainers.forEach(contactsContainer => {
        contactsContainer.addEventListener('click', (event) => {
            const messageElement = event.target.closest('.msg');
            if (messageElement) {
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
            };
            scrollToBottom();
        })
    });

    const tools = document.querySelectorAll('.app .conversation-area .tools-chat .option-chat .part li');

    tools.forEach((tool) => {
        tool.addEventListener('click', () => {
            tools.forEach((tool) => {
                tool.classList.remove('active');
            })
            tool.classList.add('active');
            // Get the data-option value
            const dataOption = tool.getAttribute('data-option');

            // Remove 'active' class from all chat area main elements
            document.querySelectorAll('.conversations').forEach(chatArea => {
                chatArea.classList.remove('active');
            });

            // Add 'active' class to the corresponding chat area main element
            document.querySelector(`.conversations.${dataOption}`).classList.add('active');

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
<!-- Display Messages -->
<script>
    // // Function to display messages fetched from the database
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

    // // Simulate messages fetched from the database
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
    
    // // Display messages from the database
    // displayMessages(messagesFromDatabase);
</script>
<!-- Send Messages -->
<script>
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
            } else if (fileExtension.match(/(mp3|wav|ogg)$/)) {
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

    // Function to send a message (you can keep this for sending new messages)
    function sendMessage(sender_id, profile, _message = '', imgFile = null, docFile=null, audioBlob=null) {
        const messageInput = document.getElementById('message-input');
        let messageImg = document.getElementById('message-img');
        let messageDoc = document.getElementById('message-doc');
        const messageText = _message;
        if (messageText !== '' || imgFile.files.length > 0 || docFile.files.length > 0 || audioBlob) {
            const chatAreaMain = document.querySelector('.chat-area-main');
            const lastMessageContainer = chatAreaMain.querySelector('.chat-msg:last-child');
            // Determine the sender type
            const senderType = sender_id === {{auth()->user()->id}} ? 'owner' : 'user';
            // Generate the message date (you can use a date library for this)
            const currentDate = new Date();
            const currentHours = currentDate.getHours();
            const ampm = currentHours >= 12 ? 'PM' : 'AM';
            const hours12 = currentHours % 12 || 12; // Convert to 12-hour format

            const currentMinutes = currentDate.getMinutes();
            const messageTime = `${hours12}:${currentMinutes}${ampm}`;
            // Check if there is a previous message container and it has the same sender
            if (lastMessageContainer && lastMessageContainer.getAttribute('data-sender') === senderType) {
                // Append the new message text to the existing message container
                const chatMsgText = document.createElement('div');
                chatMsgText.className = 'chat-msg-text';
                const chatMsgDateElements = document.querySelectorAll('.chat-msg-date');
                const lastChatMsgDate = chatMsgDateElements[chatMsgDateElements.length - 1];
                lastChatMsgDate.textContent = `Message sent at ${messageTime}`;
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
            if(imgFile?.files.length > 0 || docFile?.files.length > 0 ) {
                handleDefaultChatView();
            }
            if(audioBlob){
                resetAudioFeature();
            }
            // Scroll to the bottom after sending the message
            scrollToBottom();
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
        if (messageInput.value.trim() !== '') {
            sendButton.style.display = 'block';
            audioButton.style.display = 'none';
        } else {
            sendButton.style.display = 'none';
            audioButton.style.display = 'block';
        }
    });
    messageInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            sendOwnerMessage(e);
        }
    });
    sendButton.addEventListener('click', sendOwnerMessage);
    
    function sendOwnerMessage(event) {
        event.preventDefault();
        const chatAreaMessage = document.querySelector('#message-input').value;
        const imgFile = document.getElementById('message-img');
        const docFile = document.getElementById('message-doc');
        if (chatAreaMessage || imgFile.files.length > 0 || docFile.files.length > 0 || audioBlob) {
            sendMessage({{ auth()->user()->id }}, '{{ auth()->user()->profile }}', chatAreaMessage, imgFile, docFile, audioBlob);
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
      } else if (fileExtension.match(/(mp3|wav|ogg)$/)) {
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