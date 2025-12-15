<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Tous les Films</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/filter.js') }}" defer></script>
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
            <li><a href="/films" class="active" style="color:var(--primary-color);">Nos Films</a></li>
            <li><a href="/films/create">Ajouter un film</a></li>
            <li><a href="#" class="cta-reservation">Réservation</a></li>
            <li><a href="#" class="cta-login">Connexion</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="films-section">
        <h1>Notre Catalogue</h1>
        <p style="margin-bottom: 30px;">Découvrez tous nos films à l'affiche et à venir.</p>

        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Rechercher un film (ex: John Wick)...">
        </div>

        <div class="filter-container">
            <button class="filter-btn active" data-filter="all">Tout voir</button>
            <button class="filter-btn" data-filter="horreur">Horreur</button>
            <button class="filter-btn" data-filter="action">Action</button>
            <button class="filter-btn" data-filter="animation">Animation</button>
            <button class="filter-btn" data-filter="surnaturel">Surnaturel</button>
        </div>

        <div class="film-list">
            @if($films->isEmpty())
                <p>Aucun film disponible pour le moment.</p>
            @else
                @foreach($films as $f)
                    @php
                        // Récupération du genre (affiche 'Non classé' si vide)
                        $genreLib = $f->genre ? $f->genre->LibGenreFilm : 'Non classé';
                        $genreSlug = strtolower($genreLib);
                    @endphp

                    <div class="film-card" data-category="{{ $genreSlug }}">
                        <img src="{{ asset($f->AfficheFilm) }}"
                             alt="{{ $f->TitreFilm }}"
                             class="film-trigger"
                             data-title="{{ $f->TitreFilm }}"
                             data-genre="{{ $genreLib }}"
                             data-synopsis="{{ $f->ResumeFilm }}"
                             data-release="{{ $f->DateSortieFilm }}"
                             data-duration="{{ $f->LongueurFilm }} min"
                             data-rating="4.5/5"
                             data-director="Non spécifié"
                             data-writer="Non spécifié"
                             data-actors="Voir détails">

                        <h3>{{ $f->TitreFilm }}</h3>
                        <p>Genre: {{ $genreLib }}</p>

                        @if($f->TroisDOuNon)
                            <div style="color: gold; font-weight: bold; margin-top:5px; font-size: 0.9em;">★ En 3D</div>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>

        <div id="globalModal" class="modal-overlay">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <div class="modal-body">
                    <img id="modalImg" src="" alt="Affiche">

                    <div class="modal-info">
                        <h2 id="modalTitle" style="margin-bottom: 5px;"></h2>
                        <p id="modalGenre" style="color: var(--primary-color); font-weight:bold; margin-bottom: 15px;"></p>

                        <div class="film-meta-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 15px; font-size: 0.9em; background: #f9f9f9; padding: 10px; border-radius: 5px;">
                            <div><strong>Date de sortie :</strong> <span id="modalDate"></span></div>
                            <div><strong>Durée :</strong> <span id="modalDuration"></span></div>
                            <div><strong>Note :</strong> <span id="modalRating"></span></div>
                            <div><strong>Réalisateur :</strong> <span id="modalDirector"></span></div>
                            <div><strong>Scénario :</strong> <span id="modalWriter"></span></div>
                            <div style="grid-column: span 2;"><strong>Acteurs :</strong> <span id="modalActors"></span></div>
                        </div>

                        <p id="modalDesc" class="synopsis-text" style="line-height: 1.6; color: #333;"></p>

                        <a href="#" class="cta-reservation" style="display:inline-block; margin-top:15px;">Réserver ma place</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>
