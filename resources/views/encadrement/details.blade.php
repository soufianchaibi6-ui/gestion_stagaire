<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Détails Stagiaire</title>
    <link rel="stylesheet" href="{{ asset('hd/details.css') }}">
</head>

<body>

<div class="detail-container">
    
    <div class="profile-card">
        <div class="profile-header">
            <h2>{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</h2>
            <p style="opacity: 0.9; margin-top: 10px;">Dossier Candidat</p>
        </div>

        <div class="profile-body">
            <div class="info-group">
                <span class="info-label">Numéro CIN</span>
                <span class="info-value">{{ $stagiaire->cin }}</span>
            </div>

            <div class="info-group">
                <span class="info-label">Adresse Email</span>
                <span class="info-value">{{ $stagiaire->email }}</span>
            </div>
            <div class="info-group">
                <span class="info-label">type de Stage</span>
                <span class="info-value">{{ $stagiaire->type_stage }}</span>
            </div>

            <div class="info-group">
                <span class="info-label">Ville de résidence</span>
                <span class="info-value">{{ $stagiaire->ville }}</span>
            </div>

            <div class="info-group">
                <span class="info-label">Filière d'étude</span>
                <span class="info-value">{{ $stagiaire->filiere }}</span>
            </div>

            <div class="info-group">
                <span class="info-label">Niveau d'études</span>
                <span class="info-value">{{ $stagiaire->niveau_etude }}</span>
            </div>

            <div class="info-group">
                <span class="info-label">sexe</span>
                <span class="info-value">{{ $stagiaire->sexe }}</span>
            </div>

            <div class="info-group">
                <span class="info-label">etablissement</span>
                <span class="info-value">{{ $stagiaire->etablissement }}</span>
            </div>
             <div class="info-group">
                <span class="info-label">date_debut</span>
                <span class="info-value">{{ $stagiaire->date_debut }}</span>
            </div>
             <div class="info-group">
                <span class="info-label">date_fin</span>
                <span class="info-value">{{ $stagiaire->date_fin }}</span>
            </div>
            
            <div class="status-badge">
                <span class="status-label">Statut : {{ $stagiaire->status }}</span>
                <a href="{{ route('cv.show', $stagiaire->id) }}" target="_blank">Voir CV</a>
            </div>
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
   
            </div>
    </div>

    <a href="{{ url()->previous() }}" class="btn-back">
        <span style="margin-right: 8px;">←</span> Retour à la liste
    </a>

</div>

</body>
</html>