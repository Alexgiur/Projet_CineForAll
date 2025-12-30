<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CineForAll - Ajouter une Personne</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
    <div class="logo-container"><a href="/"><img src="{{ asset('img/logo.jpeg') }}" class="logo"></a></div>
</header>

<main class="create-section">
    <div class="form-container">
        <h1>Nouvelle Personne</h1>

        @if ($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/personnes" method="POST">
            @csrf
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="prenom" value="{{ old('prenom') }}" required>
            </div>
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" value="{{ old('nom') }}" required>
            </div>
            <div class="form-group">
                <label>Date de Naissance</label>
                <input type="date" name="datedenaissance" value="{{ old('datedenaissance') }}" required
                       style="width:100%; padding:12px; border:1px solid #ccc; border-radius:5px;">
            </div>
            <div class="form-group">
                <label>Nationalité</label>
                <input type="text" name="nationalite" value="{{ old('nationalite') }}" required>
            </div>
            <div class="form-group">
                <label>Biographie</label>
                <textarea name="biographie" required placeholder="Minimum 5 caractères...">{{ old('biographie') }}</textarea>
            </div>
            <button type="submit" class="btn-submit">Enregistrer la personne</button>
            <a href="/personnes" style="display:block; text-align:center; margin-top:15px; color:#777;">Retour à la liste</a>
        </form>
    </div>
</main>
</body>
</html>
