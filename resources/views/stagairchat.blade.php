<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Stagiaire</title>

    <link rel="stylesheet" href="{{ asset('hd/chat.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<div class="container">
    <div class="chat-wrapper">

        <!-- HEADER -->
        <div class="chat-header" style="display:flex;align-items:center;justify-content:space-between;">
            
            <div style="display:flex;align-items:center;gap:15px;">
                
                <a href="{{ route('stagair.login') }}" class="back-btn">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>

                <div>
                    <h1 style="margin:0;font-size:1.25rem;">
                        Encadrant
                    </h1>
                    <span style="font-size:0.85rem;opacity:0.8;">
                        Chat stagiaire
                    </span>
                </div>

            </div>

        </div>

        <!-- MESSAGES -->
        <div class="chat-display">

            @forelse($messages as $message)

                <div class="msg {{ $message->sender == 'stagiaire' ? 'sent' : 'received' }}">

                    {{-- TEXT --}}
                    @if(!empty($message->message))
                        <span>{{ $message->message }}</span>
                    @endif

                    {{-- FILE --}}
                    @if(!empty($message->file))

                        @php
                            $file = $message->file;
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            $url = asset('storage/'.$file);
                        @endphp

                        <div style="margin-top:10px;">

                            @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))

                                <a href="{{ $url }}" target="_blank">
                                    <img src="{{ $url }}"
                                         width="180"
                                         style="border-radius:8px;cursor:pointer;">
                                </a>

                            @else

                                <a href="{{ $url }}" target="_blank">
                                    📎 Télécharger fichier
                                </a>

                            @endif

                        </div>

                    @endif

                </div>

            @empty

                <div class="msg received">
                    <span>
                        Félicitations {{ $stagiaire->nom }} {{ $stagiaire->prenom }},
                        vous êtes accepté(e) pour votre stage. Bienvenue !
                    </span>
                </div>

            @endforelse

        </div>

        <!-- INPUT -->
        <form action="{{ route('stagaire.chat.send') }}"
              method="POST"
              enctype="multipart/form-data"
              class="input-area">

            @csrf

            <input type="text" name="message" placeholder="Écrire un message...">

            <input type="file" name="file" id="file" hidden>

            <label for="file" class="file-btn">
                <i class="fa-solid fa-paperclip"></i>
            </label>

            <button type="submit">
                <i class="fa-solid fa-paper-plane"></i>
            </button>

        </form>

    </div>
</div>

<!-- SCRIPT AUTO SCROLL + REFRESH -->
<script>
function scrollToBottom() {
    const chat = document.querySelector('.chat-display');
    if (chat) {
        chat.scrollTop = chat.scrollHeight;
    }
}

document.addEventListener('DOMContentLoaded', scrollToBottom);

setInterval(() => {

    const chatDisplay = document.querySelector('.chat-display');
    if (!chatDisplay) return;

    const isAtBottom =
        (chatDisplay.scrollHeight - chatDisplay.scrollTop - chatDisplay.clientHeight) < 50;

    fetch(window.location.href)
        .then(res => res.text())
        .then(html => {

            const doc = new DOMParser().parseFromString(html, 'text/html');
            const newChat = doc.querySelector('.chat-display');

            if (newChat) {
                chatDisplay.innerHTML = newChat.innerHTML;

                if (isAtBottom) {
                    scrollToBottom();
                }
            }

        })
        .catch(err => console.log(err));

}, 2000);
</script>

</body>
</html>