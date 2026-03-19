<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Accueil</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
    <div class="logo-container">
        <img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll" class="logo">
    </div>
    <nav class="main-nav">
        <ul>


            <h2 style="color: #991917; border-bottom: 2px solid #f4f4f4; padding-bottom: 10px;">
                {{-- Affiche le nom/login de l'utilisateur connecté --}}
                Utilisateur connecté -  {{ Auth::user()->LoginUti }}
            </h2>


            <li><a href="/">Accueil</a></li>
            <li><a href="/films">Films</a></li>
            <li><a href="/mes-reservations" class="btn-menu-uniforme">Réservation</a></li>

            @if(Auth::check() && Auth::user()->IdTypeRoleUti == 1)
                <li><a href="{{ route('admin.dashboard') }}" class="btn-menu-uniforme">Administration</a></li>
            @endif

            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0; padding: 0;">
                    @csrf
                    <button type="submit" class="btn-menu-uniforme">
                        Déconnexion
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</header>

<main>
    <section class="hero-section">
        <div class="hero-content">
            <h1>Bienvenue sur CineForAll</h1>
            <p>Réservez vos places de cinéma en un clic.</p>
        </div>
    </section>

    <section class="films-section" id="films-semaine">
        <h2>Films de la semaine</h2>
        <div class="film-list">
            @foreach($filmsSemaine as $film)
                <div class="film-card">
                    @if($film->AfficheFilm)
                        <img src="{{ asset('storage/' . $film->AfficheFilm) }}" alt="{{ $film->TitreFilm }}">
                    @endif
                    <h3>{{ $film->TitreFilm }}</h3>
                    <p>Genre: {{ $film->genre_film->LibGenreFilm ?? 'Non spécifié' }}</p>
                    <a href="{{ route('films.show', $film->IdFilm) }}" class="details-link">Réserver</a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="films-section" id="films-avenir">
        <h2>Prochainement</h2>
        <div class="film-list">
            @foreach($filmsAvenir as $film)
                <div class="film-card">
                    @if($film->AfficheFilm)
                        <img src="{{ asset('storage/' . $film->AfficheFilm) }}" alt="{{ $film->TitreFilm }}">
                    @endif
                    <h3>{{ $film->TitreFilm }}</h3>
                </div>
            @endforeach
        </div>
    </section>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>
</body>
</html>
