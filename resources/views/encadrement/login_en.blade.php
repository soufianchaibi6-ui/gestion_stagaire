<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset("hd/style.css") }}">
    <title>Encadrement - Connexion</title>
</head>

<body>
    <div class="container" id="container">

        <div class="form-container sign-in">
            <form method="POST" action="{{ route('encadrement_en') }}">
                @csrf
                
                <h1>Connexion Stagiaire</h1>
                @if(session('ereur'))
                    <div class="alert alert-success" style="color: rgb(231, 34, 16); padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                        {{ session('ereur') }}
                    </div>
                @endif
                

                <input type="email" placeholder="Email" name="email_en" value="{{ old('email_en') }}">
            

                <input type="password" placeholder="Mot de passe" name="password_en">

                <button type="submit">Se connecter</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">

                <div class="toggle-panel toggle-left">
                    <h1>Bienvenue</h1>
                    <p>Accédez à votre espace d’encadrement en utilisant vos informations personnelles.</p>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Encadrement Stagiaire</h1>
                    <p>Connectez-vous pour accéder aux fonctionnalités de gestion et de suivi du stage.</p>
                </div>

            </div>
        </div>

    </div>
</body>
</html>