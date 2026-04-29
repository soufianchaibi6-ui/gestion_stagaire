<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription Stagiaire</title>
    <link rel="stylesheet" href={{asset("hd/home.css")}}>
</head>
<body>

<div class="container">
    <h2>Inscription Stagiaire</h2>


    <form action="{{route('home.store')}}" method="POST">
        @csrf
        CIN:<input type="text" placeholder="CIN"  name="cin" value="{{old('cin')}}">
        @error('cin')
        <span style="color: brown">{{$message}}</span>
        @enderror
    
        Nom:<input type="text" placeholder="Nom" name="nom" value="{{old('nom')}}">
        @error('nom')
        <span style="color: brown">{{$message}}</span>
        @enderror

        Prenom:<input type="text" placeholder="Prenom" name="prenom" value="{{old('prenom')}}">
        @error('prenom')
        <span style="color: brown">{{$message}}</span>
        @enderror

        sexe:<select name="sexe" >
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
        </select>
        @error('sexe')
        <span style="color: brown">{{$message}}</span>
        @enderror

        Telephone:<input type="tel" placeholder="Telephone" name="telephone" value="{{old('telephone')}}">
        @error('telephone')
        <span style="color: brown">{{$message}}</span>
        @enderror

        Emaile<input type="email" placeholder="Email" name="email" value="{{old('email')}}">
        @error('email')
        <span style="color: brown"> {{$message}}</span>
        @enderror

        Felier<select name="filiere">
            <option >Developpement Digital</option>
            <option >Cyber Securite</option>
        </select>
        @error('filiere')
        <span style="color: brown">{{$message}}</span>
        @enderror

        Etablissement:<input type="text" placeholder="Etablissement" name="etablissement" value="{{old('etablissement')}}">
        @error('etablissement')
        <span style="color: brown">{{$message}}</span>
        @enderror
        Niveau d'etude:<input type="text" placeholder="Niveau d'etude" name="niveau_etude" value="{{old('niveau_etude')}}">
        @error('niveau_etude')
        <span style="color: brown">{{$message}}</span>
        @enderror

        type de Stage:<select name="type_stage">
            <option>PFE</option>
            <option>Stage initiation</option>
        </select>
        @error('type_stage')
        <span style="color: brown">{{$message}}</span>
        @enderror

        Ville:<input type="text" placeholder="Ville" name="ville" value="{{old('ville')}}">
        @error('ville')
        <span style="color: brown">{{$message}}</span>
        @enderror

        date_debut: <input type="date" placeholder="date_debut" name="date_debut"  value="{{old('date_debut')}}">
        @error('date_debut')
        <span style="color: brown">{{$message}}</span>  
        @enderror
        
        date_fin: <input type="date" placeholder="date_fin" name="date_fin"  value="{{old('date_fin')}}">
        @error('date_fin')
        <span style="color: brown">{{$message}}</span>  
        @enderror

        <button type="submit">S'inscrire</button>
    </form>
</div>


</html>