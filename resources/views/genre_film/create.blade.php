<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Ajouter un genre</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <style>
        .genre-form-container {
            max-width: 500px;
            margin: 60px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .genre-form-container h1 {
            color: var(--primary-color);
            font-size: 2em;
            margin-bottom: 30px;
        }
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .form-group input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            box-sizing: border-box;
        }
        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color, #e50914);
        }
        .error-message {
            color: #c0392b;
            font-size: 0.85em;
            margin-top: 5px;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="/"><img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll" class="logo"></a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="{{ route('films.index') }}">Films</a></li>
            <li><a href="#" class="btn-menu-uniforme">Réservation</a></li>
            <li><a href="{{ route('admin.dashboard') }}" class="btn-menu-uniforme">Administration</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0; padding: 0;">
                    @csrf
                    <button type="submit" class="btn-menu-uniforme">Déconnexion</button>
                </form>
            </li>
        </ul>
    </nav>
</header>

<main>
    <div class="genre-form-container">
        <h1>Ajouter un genre</h1>

        <form method="POST" action="{{ route('genre_film.store') }}">
            @csrf
            <div class="form-group">
                <label for="LibGenreFilm">Libellé du genre</label>
                <input type="text" id="LibGenreFilm" name="LibGenreFilm"
                       value="{{ old('LibGenreFilm') }}" placeholder="Ex : Action, Comédie...">
                @error('LibGenreFilm')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('genre_film.index') }}" style="color: #555; text-decoration: underline;">
                    ← Annuler
                </a>
                <button type="submit" class="btn-menu-uniforme">Enregistrer</button>
            </div>
        </form>
    </div>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>
