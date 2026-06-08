<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset("hd/style.css") }}">
    <title>Encadrement - Inscription</title>
</head>

<body>
    <div class="container" id="container">

        <div class="form-container sign-in">
            <form method="POST" action="{{ route('encadrement_en') }}">
                @csrf
                
                <h1>Inscription Encadrement</h1>

                @if(session('ereur'))
                    <div class="alert alert-success" style="color: rgb(231, 34, 16); padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                        {{ session('ereur') }}
                    </div>
                @endif

                <input type="email" placeholder="Email" name="email_en" value="{{ old('email_en') }}">
                <input type="password" placeholder="Mot de passe" name="password_en">

                <button type="submit">S'inscrire</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">

                <div class="toggle-panel toggle-left">
                    <h1>Bienvenue Encadrement</h1>
                    <p>Créez votre compte pour accéder à votre espace d’encadrement et gérer les stagiaires.</p>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Encadrement Stagiaire</h1>
                    <p>Inscrivez-vous pour bénéficier des fonctionnalités de gestion et de suivi des stages.</p>
                </div>

            </div>
        </div>

    </div>
</body>
</html>