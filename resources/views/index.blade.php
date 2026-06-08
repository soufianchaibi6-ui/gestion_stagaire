<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('hd/style.css') }}">
    <title>Connexion</title>
</head>

<body>
    
    <div class="container {{ $errors->hasBag('register') && $errors->getBag('register')->any() ? 'active' : '' }}" id="container">

        <!-- Inscription -->
        <div class="form-container sign-up">
            <form method="POST" action="{{ route('stagair.store') }}">

                @if ($errors->hasBag('register') && $errors->getBag('register')->any())
                    <script>
                        document.getElementById("container").classList.add("active");
                    </script>
                @endif

                @if ($errors->hasBag('login') && $errors->getBag('login')->any())
                    <script>
                        document.getElementById("container").classList.remove("active");
                    </script>
                @endif

                @csrf

                <h1>Créer un compte</h1>

                <div class="social-icons">
                    <a href="/auth/google" class="icon">
                        <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                </div>

                <span>ou utilisez votre adresse e-mail pour vous inscrire</span>

                <input type="text" placeholder="Nom" name="name" value="{{ old('name') }}">
                @error('name', 'register')
                    <div class="text-danger" style="font-size:14px">{{ $message }}</div>
                @enderror

                <input type="text" placeholder="Prénom" name="prenom" value="{{ old('prenom') }}">
                @error('prenom', 'register')
                    <div class="text-danger" style="font-size:14px">{{ $message }}</div>
                @enderror

                <input type="email" placeholder="Adresse e-mail" name="email" value="{{ old('email') }}">
                @error('email', 'register')
                    <div class="text-danger" style="font-size:14px">{{ $message }}</div>
                @enderror

                <input type="tel" placeholder="Téléphone" name="telephone" value="{{ old('telephone') }}">
                @error('telephone', 'register')
                    <div class="text-danger" style="font-size:14px">{{ $message }}</div>
                @enderror

                <input type="password" placeholder="Mot de passe" name="password">

                <input type="password" placeholder="Confirmer le mot de passe" name="password_confirmation">

                @error('password', 'register')
                    <div class="text-danger" style="font-size:14px">{{ $message }}</div>
                @enderror

                <button type="submit">S'inscrire</button>
            </form>
        </div>

        <!-- Connexion -->
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('stagair.singup') }}">

                @csrf

                @if(session('success'))
                    <div class="alert alert-success" style="color: green; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('ereur'))
                    <div class="alert alert-danger" style="color: red; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                        {{ session('ereur') }}
                    </div>
                @endif

                <h1>Connexion</h1>

                <div class="social-icons">
                    <a href="/auth/google" class="icon">
                        <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                </div>

                <span>ou utilisez votre adresse e-mail et votre mot de passe</span>

                <input type="email" placeholder="Adresse e-mail" name="email" value="{{ old('email') }}">
                @error('email', 'login')
                    <div class="text-danger" style="font-size:14px">{{ $message }}</div>
                @enderror

                <input type="password" placeholder="Mot de passe" name="password">

                <button type="submit">Se connecter</button>
            </form>
        </div>

        <!-- Panneau de bascule -->
        <div class="toggle-container">
            <div class="toggle">

                <div class="toggle-panel toggle-left">
                    <h1>Bon retour parmi nous !</h1>
                    <p>
                        Saisissez vos informations personnelles pour accéder à toutes les fonctionnalités du site.
                    </p>
                    <button class="hidden" id="login">
                        Se connecter
                    </button>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Bonjour !</h1>
                    <p>
                        Inscrivez-vous avec vos informations personnelles pour profiter de toutes les fonctionnalités du site.
                    </p>
                    <button class="hidden" id="register">
                        S'inscrire
                    </button>
                </div>

            </div>
        </div>

    </div>

    <script src="{{ asset('hd/script.js') }}"></script>
    @if(session('scroll') == 'register')
    <script>
        window.location.hash = '#register';
    </script>
@endif

    
</body>

</body>
</body>
</html>