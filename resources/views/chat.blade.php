<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <link rel="stylesheet" href="{{asset('hd/chat.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <div class="container">
        <div class="chat-wrapper">
            <div class="chat-header">
                <h1>Discussion</h1>
                <span>Utilisateur en ligne</span>
            </div>

            <div class="chat-display">
                <div class="msg received">
                    <span>Salut ! Voici le code sans JavaScript.</span>
                </div>
                <div class="msg sent">
                    <span>Super, le design est resté le même !</span>
                </div>
                <div class="msg received">
                    <span>Exact, tout est géré via le CSS maintenant.</span>
                </div>
            </div>

            <form class="input-area">
                <input type="text" placeholder="Écrivez votre message..." name="message">
                <button type="button"><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </div>
    </div>

</body>
</html>