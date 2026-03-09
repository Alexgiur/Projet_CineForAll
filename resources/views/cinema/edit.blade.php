<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Modifier un cinéma</title>
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
            <li><a href="{{ route('films.index') }}">Films</a></li>
            <li><a href="{{ route('cinemas.index') }}" style="color:var(--primary-color);">Cinémas</a></li>

            @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0; padding: 0;">
                        @csrf
                        <button type="submit" class="btn-menu-uniforme">Déconnexion</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>

<main class="create-section">
    <div class="form-container">
        <h1>Modifier le Cinéma</h1>

        <form action="/cinemas/{{ $cinema->IdCinema }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="AdresseCine">Adresse</label>
                <input type="text" id="AdresseCine" name="AdresseCine" value="{{ $cinema->AdresseCine }}" required>
            </div>

            <div class="form-group">
                <label for="CodPostCine">Code Postal</label>
                <input type="text" id="CodPostCine" name="CodPostCine" value="{{ $cinema->CodPostCine }}" required>
            </div>

            <div class="form-group">
                <label for="VilleCine">Ville</label>
                <input type="text" id="VilleCine" name="VilleCine" value="{{ $cinema->VilleCine }}" required>
            </div>

            <button type="submit" class="btn-submit">Mettre à jour</button>
            <a href="/cinemas" style="display:block; text-align:center; margin-top:15px; color:#777; text-decoration:none;">Annuler</a>
        </form>
    </div>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>
