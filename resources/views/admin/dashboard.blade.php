<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Dashboard Admin</title>
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
            {{-- Ajout du lien vers la liste des cinémas dans le menu --}}
            <li><a href="{{ route('reservations.index') }}" class="btn-menu-uniforme">Réservation</a></li>

            @if(Auth::check() && Auth::user()->IdTypeRoleUti == 1)
                <li><a href="{{ route('admin.dashboard') }}" class="btn-menu-uniforme" style="color:var(--primary-color);">Administration</a></li>
            @endif

            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0; padding: 0;">
                    @csrf
                    <button type="submit" class="btn-menu-uniforme">Déconnexion</button>
                </form>
            </li>
        </ul>
    </nav>
</header>

<main class="admin-dashboard">
    <h1 style="color: var(--primary-color); font-size: 3em; margin-bottom: 40px;">Tableau de Bord</h1>

    <div class="admin-buttons-grid">

        {{-- BLOC 1 : FILMS --}}
        <div class="admin-button">
            <h2 style="color: var(--primary-color); margin-bottom: 15px; font-size: 1.8em;">Gérer les Films</h2>
            <p style="margin-bottom: 25px; color: #555;">Accédez à la liste complète pour modifier ou supprimer des films, ou ajoutez-en un nouveau.</p>

            <div style="display: flex; flex-direction: column; gap: 15px; align-items: center;">
                <a href="{{ route('films.create') }}" class="btn-menu-uniforme" style="width: 80%;">Ajouter un nouveau film</a>
                <a href="{{ route('films.index') }}" class="btn-menu-uniforme" style="width: 80%; background-color: #555 !important;">Liste des films (Modif / Suppr)</a>
            </div>
        </div>

        {{-- BLOC 2 : PERSONNES --}}
        <div class="admin-button">
            <h2 style="color: var(--primary-color); margin-bottom: 15px; font-size: 1.8em;">Gérer les Personnes</h2>
            <p style="margin-bottom: 25px; color: #555;">Gestion des acteurs et réalisateurs de la plateforme.</p>

            <div style="display: flex; flex-direction: column; gap: 15px; align-items: center;">
                <a href="{{ route('personnes.index') }}" class="btn-menu-uniforme" style="width: 80%;">Accéder aux personnes</a>
            </div>
        </div>

        {{-- BLOC 3 : PROGRAMMATION (Salles & Séances) --}}
        <div class="admin-button">
            <h2 style="color: var(--primary-color); margin-bottom: 15px; font-size: 1.8em;">Programmation</h2>
            <p style="margin-bottom: 25px; color: #555;">Gérez les horaires des séances et l'attribution des salles de cinéma.</p>

            <div style="display: flex; flex-direction: column; gap: 15px; align-items: center;">
                <a href="{{ route('admin.programmations.index') }}" class="btn-menu-uniforme" style="width: 80%;">Gérer les Séances / Salles</a>
            </div>
        </div>

        {{-- BLOC 4 : GENRES --}}
        <div class="admin-button">
            <h2 style="color: var(--primary-color); margin-bottom: 15px; font-size: 1.8em;">Gérer les Genres</h2>
            <p style="margin-bottom: 25px; color: #555;">Organisez les catégories de films (Action, Comédie, Horreur, etc.).</p>

            <div style="display: flex; flex-direction: column; gap: 15px; align-items: center;">
                <a href="{{ route('genre_film.index') }}" class="btn-menu-uniforme" style="width: 80%;">Accéder aux genres</a>
            </div>
        </div>

        {{-- BLOC 5 : CINÉMAS (Nouveau bloc ajouté) --}}
        <div class="admin-button">
            <h2 style="color: var(--primary-color); margin-bottom: 15px; font-size: 1.8em;">Gérer les Cinémas</h2>
            <p style="margin-bottom: 25px; color: #555;">Gérez la liste de vos cinémas, leurs adresses et leurs informations.</p>

            <div style="display: flex; flex-direction: column; gap: 15px; align-items: center;">
                <a href="{{ route('cinemas.index') }}" class="btn-menu-uniforme" style="width: 80%;">Accéder aux cinémas</a>
            </div>
        </div>

    </div>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>
