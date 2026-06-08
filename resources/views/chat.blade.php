<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Encadrant</title>

    <link rel="stylesheet" href="{{ asset('hd/chat.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<div class="container">
    <div class="chat-wrapper">

        <div class="chat-header" style="display:flex;align-items:center;justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:15px;">
                <a href="{{ route('chat') }}" class="back-btn"
                   style="color:#000;font-size:20px;text-decoration:none;">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>

                <div>
                    <h1 style="margin:0">
                        {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                    </h1>
                    <span>Chat encadrant</span>
                </div>
            </div>
        </div>

        <div class="chat-display">

            @forelse($messages as $message)

                <div class="msg {{ $message->sender == 'encadrant' ? 'sent' : 'received' }}">

                    @if(!empty($message->message))
                        <div>
                            {{ $message->message }}
                        </div>
                    @endif

                    @if(!empty($message->file))

                        @php
                            $extension = strtolower(pathinfo($message->file, PATHINFO_EXTENSION));
                        @endphp

                        <div style="margin-top:10px;">

                            @if(in_array($extension, ['jpg','jpeg','png','gif','webp']))

                                <a href="{{ asset('storage/'.$message->file) }}" target="_blank">
                                    <img
                                        src="{{ asset('storage/'.$message->file) }}"
                                        alt="Image"
                                        style="max-width:250px;width:100%;border-radius:10px;cursor:pointer;"
                                    >
                                </a>

                            @else

                                <a href="{{ asset('storage/'.$message->file) }}"
                                   target="_blank">
                                    📎 Télécharger le fichier
                                </a>

                            @endif

                        </div>

                    @endif

                </div>

            @empty

                <div class="msg received">
                    Aucun message pour le moment
                </div>

            @endforelse

        </div>

        <form action="{{ route('chat.send', $stagiaire->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="input-area">

            @csrf

            <input type="text"
                   name="message"
                   placeholder="Écrire un message...">

            <input type="file"
                   name="file"
                   id="file"
                   hidden>

            <label for="file" class="file-btn">
                <i class="fa-solid fa-paperclip"></i>
            </label>

            <button type="submit">
                <i class="fa-solid fa-paper-plane"></i>
            </button>

        </form>

    </div>
</div>

<script>
function scrollToBottom() {
    const chat = document.querySelector('.chat-display');
    if(chat){
        chat.scrollTop = chat.scrollHeight;
    }
}

document.addEventListener('DOMContentLoaded', scrollToBottom);

setInterval(() => {

    const chatDisplay = document.querySelector('.chat-display');

    fetch(window.location.href)
        .then(response => response.text())
        .then(html => {

            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');

            const newChat = doc.querySelector('.chat-display');

            if(newChat){
                chatDisplay.innerHTML = newChat.innerHTML;
                scrollToBottom();
            }

        });

}, 2000);
</script>

</body>
</html>