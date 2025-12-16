<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier {{ $film->TitreFilm }}</title>
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
            <li><a href="/films/create">Ajouter</a></li>
            <li><a href="#" class="cta-login">Connexion</a></li>
        </ul>
    </nav>
</header>

<main class="create-section">
    <div class="form-container">
        <h1>Modifier le Film</h1>

        <form action="/films/{{ $film->IdFilm }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titre">Titre du film</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre', $film->TitreFilm) }}"
                       @error('titre') style="border-color: var(--primary-color);" @enderror>
                @error('titre')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="longueur">Durée (minutes)</label>
                <input type="number" id="longueur" name="longueur" value="{{ old('longueur', $film->LongueurFilm) }}">
                @error('longueur')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="datedesortie">Date de sortie</label>
                <input type="date" id="datedesortie" name="datedesortie" value="{{ old('datedesortie', $film->DateSortieFilm) }}">
                @error('datedesortie')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="resume">Synopsis</label>
                <textarea id="resume" name="resume"
                          @error('resume') style="border-color: var(--primary-color);" @enderror>{{ old('resume', $film->ResumeFilm) }}</textarea>
                @error('resume')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="langue">Langue</label>
                <input type="text" id="langue" name="langue" value="{{ old('langue', $film->LangueFilm) }}">
                @error('langue')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="affiche">URL de l'affiche</label>
                <input type="text" id="affiche" name="affiche" value="{{ old('affiche', $film->AfficheFilm) }}">
                @error('affiche')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="genre">Genre (ID)</label>
                <input type="number" id="genre" name="genre" value="{{ old('genre', $film->IdGenreFilm) }}">
                @error('genre')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="troisD" name="troisD" value="1"
                    {{ old('troisD', $film->TroisDOuNon) ? 'checked' : '' }}>
                <label for="troisD" style="margin-bottom: 0; font-weight: normal;">Ce film est en 3D</label>
            </div>
            @error('troisD')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <a href="/films/{{ $film->IdFilm }}" class="btn-submit" style="background-color: #777; text-align:center; text-decoration:none;">Annuler</a>
                <button name="btnUpdate" type="submit" class="btn-submit">Mettre à jour</button>
            </div>

        </form>
    </div>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>
