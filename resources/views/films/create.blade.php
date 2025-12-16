<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Ajouter un film</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="/">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll" class="logo">
        </a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/films">Nos Films</a></li>
            <li><a href="/films/create" class="active" style="color:var(--primary-color);">Ajouter</a></li>
            <li><a href="#" class="cta-login">Connexion</a></li>
        </ul>
    </nav>
</header>

<main class="create-section">
    <div class="form-container">
        <h1>Ajouter un Film</h1>

        <form action="/films" method="POST">
            @csrf

            <div class="form-group">
                <label for="titre">Titre du film</label>
                <input type="text" id="titre" name="titre" placeholder="Ex: Avatar 2" value="{{ old('titre') }}"
                       @error('titre') style="border-color: var(--primary-color);" @enderror>
                @error('titre')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="longueur">Durée (en minutes)</label>
                <input type="number" id="longueur" name="longueur" placeholder="Ex: 120" value="{{ old('longueur') }}">
                @error('longueur')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="datedesortie">Date de sortie</label>
                <input type="date" id="datedesortie" name="datedesortie" value="{{ old('datedesortie') }}">
                @error('datedesortie')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="resume">Synopsis</label>
                <textarea id="resume" name="resume" placeholder="Résumé du film..."
                          @error('resume') style="border-color: var(--primary-color);" @enderror>{{ old('resume') }}</textarea>
                @error('resume')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="langue">Langue originale</label>
                <input type="text" id="langue" name="langue" placeholder="Ex: Anglais" value="{{ old('langue') }}">
                @error('langue')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="affiche">URL de l'affiche</label>
                <input type="text" id="affiche" name="affiche" placeholder="http://..." value="{{ old('affiche') }}">
                @error('affiche')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="genre">Identifiant du Genre (ID)</label>
                <input type="number" id="genre" name="genre" placeholder="Ex: 1" value="{{ old('genre') }}">
                @error('genre')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="troisD" name="troisD" value="1" {{ old('troisD') ? 'checked' : '' }}>
                <label for="troisD" style="margin-bottom: 0; font-weight: normal;">Ce film est disponible en 3D</label>
            </div>
            @error('troisD')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <button name="btnCreate" type="submit" class="btn-submit">Créer le film</button>

        </form>
    </div>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>
