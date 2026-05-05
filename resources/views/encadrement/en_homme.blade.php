<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stagiaires</title>
    <link rel="stylesheet" href="{{ asset('hd/en_style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
     <nav class="main-nav">
        <div class="nav-content">
            <button class="nav-btn">
                <a href="{{route('en_home')}}">Ajouter Stagiaire</a>
            </button>
            <button class="nav-btn">
                <a href="{{route('chat')}}">Suivre Stagiaire</a>
            </button>
        </div>
    </nav>
   <div class="container">
    <h2 style="margin-bottom: 30px; color: var(--text-dark);">Demandes de Stage</h2>

    <div class="list-header">
    <div>Candidat</div>
    <div>Email</div>
    <div>CIN</div>
    <div>Ville</div>
    <div>Filière</div>
    <div>Niveau</div>
    <div>Type</div>
    <div>Début</div>
    <div>Fin</div>   
    <div style="text-align: right;">Actions</div>
</div>

    <div class="requests-list">
        @foreach($stagiaires as $stagiaire)
        <div class="request-row">
            
            <div class="user-info">
                <h3>{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</h3>
                <span class="status-text">{{ $stagiaire->status }}</span>
            </div>

            <div class="data-cell">
                {{ $stagiaire->email }}
            </div>

            <div class="data-cell">
                <strong>{{ $stagiaire->cin }}</strong>
            </div>

            <div class="data-cell">
                {{ $stagiaire->ville }}
            </div>
            <div class="data-cell">
                {{ $stagiaire->filiere }}
            </div>
            <div class="data-cell">
                {{ $stagiaire->niveau_etude }}
            </div>

            <div class="data-cell">
                {{ $stagiaire->type_stage }}
            </div>
            <div class="data-cell">
                {{ $stagiaire->date_debut }}
            </div>
            <div class="data-cell">
                {{ $stagiaire->date_fin }}
            </div>

            <div class="actions-cell">
               <form action="{{ route('stagiaire.accepter', $stagiaire->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn-small btn-accept">Accepter</button>
</form>

<form action="{{ route('stagiaire.refuser', $stagiaire->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn-small btn-refuse">Refuser</button>
</form>
                <a href="{{ route('stagiaire.details', $stagiaire->id) }}" class="btn-small btn-details">
    Détails
</a>
            </div>

        </div>
        @endforeach
    </div>
    <div class="pagination-container">
        {{ $stagiaires->links() }}
    </div>
</div>



</body>
</html>