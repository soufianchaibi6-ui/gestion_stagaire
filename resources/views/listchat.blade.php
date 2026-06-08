<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Stagiaires</title>
    <link rel="stylesheet" href="{{ asset('hd/list.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="main-nav">
        <div class="nav-content">
            <a href="{{route('en_home')}}" class="nav-btn">
                <span>Ajouter Stagiaire</span>
            </a>
            <a href="{{route('chat')}}" class="nav-btn secondary">
                <span>Suivre Stagiaire</span>
            </a>
        </div>
    </nav>

    <div class="container">
        <header class="page-header">
            <h2>Demandes de Stage</h2>
            <span class="count-badge">{{ $stagiaires->total() }} Candidats</span>
        </header>

        <div class="table-container">
            <div class="list-header">
                <div>Candidat</div>
                <div>Email</div>
                <div>CIN</div>
                <div>Ville</div>
                <div>Filière</div>
                <div>Niveau</div>
                <div>Type</div>
            </div>

            <div class="requests-list">
                @foreach($stagiaires as $stagiaire)
                <a href="{{ route('chat.show', $stagiaire->id) }}" class="request-row">
                    <div class="user-info">
                        <h3>{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</h3>
                        <span class="status-badge {{ strtolower($stagiaire->status) }}">
                            {{ $stagiaire->status }}
                        </span>
                    </div>

                    <div class="data-cell email">
                        {{ $stagiaire->email }}
                    </div>

                    <div class="data-cell">
                        <span class="cin-tag">{{ $stagiaire->cin }}</span>
                    </div>

                    <div class="data-cell">
                        {{ $stagiaire->ville }}
                    </div>

                    <div class="data-cell weight-medium">
                        {{ $stagiaire->filiere }}
                    </div>

                    <div class="data-cell">
                        <span class="level-tag">{{ $stagiaire->niveau_etude }}</span>
                    </div>

                    <div class="data-cell">
                        {{ $stagiaire->type_stage }}
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <div class="pagination-container">
            {{ $stagiaires->links() }}
        </div>
    </div>
</body>
</html>