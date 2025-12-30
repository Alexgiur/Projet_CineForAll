<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CineForAll - Modifier {{ $personne->PrePer }}</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
</head>
<body>
<header class="main-header">
    <div class="logo-container"><a href="/"><img src="{{ asset('img/logo.jpeg') }}" class="logo"></a></div>
</header>

<main class="create-section">
    <div class="form-container">
        <h1>Modifier le Profil</h1>
        <form action="/personnes/{{ $personne->Idper }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="prenom" value="{{ $personne->PrePer }}" required>
            </div>
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" value="{{ $personne->NomPer }}" required>
            </div>
            <div class="form-group">
                <label>Date de Naissance</label>
                <input type="date" name="datedenaissance" value="{{ $personne->DateNaissancePer }}" required
                       style="width:100%; padding:12px; border:1px solid #ccc; border-radius:5px;">
            </div>
            <div class="form-group">
                <label>Nationalité</label>
                <input type="text" name="nationalite" value="{{ $personne->NationalitePer }}" required>
            </div>
            <div class="form-group">
                <label>Biographie</label>
                <textarea name="biographie" required>{{ $personne->BiographiePer }}</textarea>
            </div>
            <button type="submit" class="btn-submit" style="background-color: var(--blue-btn);">Mettre à jour</button>
            <a href="/personnes" style="display:block; text-align:center; margin-top:15px; color:#777;">Annuler</a>
        </form>
    </div>
</main>
</body>
</html>
