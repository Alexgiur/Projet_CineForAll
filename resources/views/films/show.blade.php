<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $film->TitreFilm }} - Détails</title>
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

<main class="show-section">
    <div class="film-details-card">

        <div class="film-poster-side">
            @if($film->AfficheFilm)
                <img src="{{ Str::startsWith($film->AfficheFilm, 'http') ? $film->AfficheFilm : asset($film->AfficheFilm) }}"
                     alt="Affiche {{ $film->TitreFilm }}">
            @else
                <div style="height: 100%; display:flex; align-items:center; justify-content:center; background:#ddd; color:#777;">
                    Pas d'affiche
                </div>
            @endif
        </div>

        <div class="film-info-side">

            <h1 class="film-title-hero">{{ $film->TitreFilm }}</h1>

            <div class="badges-container">
                <span class="badge badge-genre">Genre ID: {{ $film->IdGenreFilm }}</span>

                @if($film->TroisDOuNon)
                    <span class="badge badge-3d">★ Disponible en 3D</span>
                @endif
            </div>

            <div class="film-meta-grid">
                <div class="meta-item">
                    <strong>Date de sortie</strong>
                    <span>{{ $film->DateSortieFilm }}</span>
                </div>
                <div class="meta-item">
                    <strong>Durée</strong>
                    <span>{{ $film->LongueurFilm }} min</span>
                </div>
                <div class="meta-item">
                    <strong>Langue</strong>
                    <span>{{ $film->LangueFilm }}</span>
                </div>
            </div>

            <div class="synopsis-section">
                <h3>Synopsis</h3>
                <p class="synopsis-content">
                    {{ $film->ResumeFilm }}
                </p>
            </div>

            <div class="action-buttons">
                <a href="/films" class="btn-back">← Retour</a>

                <form action="/films/{{ $film->IdFilm }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce film ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete-action">Supprimer le film</button>
                </form>
            </div>

        </div>
    </div>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>
