<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('hd/home.css') }}">
</head>
<body>
    <div class="container">
    <h2>Inscription Stagiaire</h2>

    <form action="{{route('home.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label>CIN</label>
            <input type="text" placeholder="Ex: AB12345" name="cin" value="{{old('cin')}}">
            @error('cin') <span class="error-msg">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label>Nom</label>
            <input type="text" placeholder="Votre nom" name="nom" value="{{old('nom')}}">
            @error('nom') <span class="error-msg">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label>Prénom</label>
            <input type="text" placeholder="Votre prénom" name="prenom" value="{{old('prenom')}}">
            @error('prenom') <span class="error-msg">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label>Sexe</label>
            <select name="sexe">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
            @error('sexe') <span class="error-msg">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label>Téléphone</label>
            <input type="tel" placeholder="0600000000" name="telephone" value="{{old('telephone')}}">
            @error('telephone') <span class="error-msg">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" placeholder="exemple@mail.com" name="email" value="{{old('email')}}">
            @error('email') <span class="error-msg">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label>Filière</label>
            <select name="filiere">
                <option>Développement Digital</option>
                <option>Cyber Sécurité</option>
            </select>
            @error('filiere') <span class="error-msg">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label>Établissement</label>
            <input type="text" placeholder="Ex: OFPPT" name="etablissement" value="{{old('etablissement')}}">
            @error('etablissement') <span class="error-msg">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label>Niveau d'étude</label>
            <input type="text"  name="niveau_etude" value="{{old('niveau_etude')}}">
            @error('niveau_etude') <span class="error-msg">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label>Type de Stage</label>
            <select name="type_stage">
                <option>PFE</option>
                <option>Stage initiation</option>
            </select>
            @error('type_stage') <span class="error-msg">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label>Ville</label>
            <input type="text" placeholder="Ex: Oujda" name="ville" value="{{old('ville')}}">
            @error('ville') <span class="error-msg">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label>Votre CV (PDF)</label>
            <input type="file" name="cv">
            @error('cv') <span class="error-msg">{{$message}}</span> @enderror
        </div>

        <button type="submit">S'inscrire</button>
    </form>
</div>
</body>
</html>