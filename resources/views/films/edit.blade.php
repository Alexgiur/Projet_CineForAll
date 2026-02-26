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
    <div class="logo-container"><a href="/"><img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="logo"></a></div>
    <nav class="main-nav">
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="{{ route('films.index') }}">Nos Films</a></li>
            @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background:none; border:none; cursor:pointer; color:inherit;">Déconnexion</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>

<main class="create-section">
    <div class="form-container">
        <h1>Modifier le Film</h1>

        <form action="{{ route('films.update', $film->IdFilm) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titre">Titre du film</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre', $film->TitreFilm) }}" required>
                @error('titre') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="longueur">Durée (minutes)</label>
                <input type="number" id="longueur" name="longueur" value="{{ old('longueur', $film->LongueurFilm) }}" required>
                @error('longueur') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="datedesortie">Date de sortie</label>
                <input type="date" id="datedesortie" name="datedesortie" value="{{ old('datedesortie', $film->DateSortieFilm) }}" required>
                @error('datedesortie') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="resume">Synopsis</label>
                <textarea id="resume" name="resume" required>{{ old('resume', $film->ResumeFilm) }}</textarea>
                @error('resume') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="langue">Langue</label>
                <input type="text" id="langue" name="langue" value="{{ old('langue', $film->LangueFilm) }}" required>
                @error('langue') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="affiche">Affiche du film (Laisser vide pour conserver l'actuelle)</label>
                <input type="file" id="affiche" name="affiche" accept="image/*">
                @error('affiche') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="genre">Genre</label>
                <select id="genre" name="genre" required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->IdGenreFilm }}" {{ (old('genre', $film->IdGenreFilm) == $genre->IdGenreFilm) ? 'selected' : '' }}>
                            {{ $genre->LibGenreFilm }}
                        </option>
                    @endforeach
                </select>
                @error('genre') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="troisD" name="troisD" value="1" {{ old('troisD', $film->TroisDOuNon) ? 'checked' : '' }}>
                <label for="troisD">Disponible en 3D</label>
            </div>

            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <a href="{{ route('films.show', $film->IdFilm) }}" class="btn-submit" style="background-color: #777; text-decoration:none; text-align:center;">Annuler</a>
                <button type="submit" class="btn-submit">Mettre à jour</button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
