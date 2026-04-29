<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagiaires</title>
    <link rel="stylesheet" href="{{ asset('hd/en_style.css') }}">
</head>

<body>
    <nav class="main-nav">
        <div class="nav-content">
            <button class="nav-btn">
                <a href="#">Ajouter Stagiaire</a>
            </button>
            <button class="nav-btn">
                <a href="#">Suivre Stagiaire</a>
            </button>
        </div>
    </nav>

<div class="container">

    <h2 style="text-align:center; margin:20px 0;">Liste des Stagiaires</h2>

    <div class="cards-container">

        @foreach($stagiaires as $stagiaire)
        <div class="card">

            <h3>{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</h3>

            <p><strong>CIN:</strong> {{ $stagiaire->cin }}</p>
            <p><strong>Email:</strong> {{ $stagiaire->email }}</p>
            <p><strong>Ville:</strong> {{ $stagiaire->ville }}</p>

            <span class="status {{ $stagiaire->status }}">
                {{ $stagiaire->status }}
            </span>
            <button>accepter</button>
             <button>refuser</button>
              <button>vior plus information</button>
            

        </div>
        @endforeach

    </div>

</div>

</body>
</html>