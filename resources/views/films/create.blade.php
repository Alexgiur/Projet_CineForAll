<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un film - CineForAll</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="/">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll">
        </a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/films">Les Films</a></li>
            <li><a href="/films/create">Ajouter un film</a></li>
        </ul>
    </nav>
</header>

<main>
    <div class="reservation-form-section">
        <div class="reservation-form">
            <h1 style="color: var(--primary-color); margin-bottom: 25px; text-align: center;">Créer un nouveau film</h1>

            <form action="/films" method="POST">
                @csrf

                <div class="form-group">
                    <label for="titre">Titre du film</label>
                    <input class="@error('titre') is-invalid @enderror" type="text" id="titre" name="titre" placeholder="Ex: Titanic" value="{{ old('titre') }}">
                    @error('titre')
                    <p style="color: red; font-size: 0.9em; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="longueur">Durée (minutes)</label>
                    <input type="number" id="longueur" name="longueur" placeholder="Ex: 120" value="{{ old('longueur') }}">
                    @error('longueur')
                    <p style="color: red; font-size: 0.9em; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="datedesortie">Date de sortie</label>
                    <input type="date" id="datedesortie" name="datedesortie" value="{{ old('datedesortie') }}">
                    @error('datedesortie')
                    <p style="color: red; font-size: 0.9em; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="resume">Résumé</label>
                    <textarea id="resume" name="resume" rows="4" placeholder="Synopsis..." style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; font-family: Arial, sans-serif;">{{ old('resume') }}</textarea>
                    @error('resume')
                    <p style="color: red; font-size: 0.9em; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="langue">Langue</label>
                    <input type="text" id="langue" name="langue" placeholder="Ex: Français" value="{{ old('langue') }}">
                    @error('langue')
                    <p style="color: red; font-size: 0.9em; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="affiche">URL de l'affiche</label>
                    <input type="text" id="affiche" name="affiche" placeholder="http://..." value="{{ old('affiche') }}">
                    @error('affiche')
                    <p style="color: red; font-size: 0.9em; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="genre">Genre (ID)</label>
                    <input type="number" id="genre" name="genre" placeholder="Ex: 1" value="{{ old('genre') }}">
                    @error('genre')
                    <p style="color: red; font-size: 0.9em; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                    <input type="checkbox" name="troisD" value="1" id="troisD" {{ old('troisD') ? 'checked' : '' }} style="width: auto;">
                    <label for="troisD" style="cursor: pointer; margin: 0;">Ce film est en 3D</label>
                </div>

                <button class="submit-reservation" name="btnCreate" type="submit" style="margin-top: 20px;">Créer le film</button>
            </form>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2024 CineForAll - Tous droits réservés</p>
</footer>

</body>
</html>
