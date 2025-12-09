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
        <a href="{{ route('home') }}"><img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll" class="logo"></a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('films') }}" class="active" style="color:var(--primary-color);">Nos Films</a></li>
            <li><a href="{{ route('reservation') }}" class="cta-reservation">Réservation</a></li>
            <li><a href="{{ route('login') }}" class="cta-login">Connexion</a></li>
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
            <div class="film-card" data-category="horreur">
                <img src="{{ asset('img/film1.jpg') }}" alt="Until Dawn" class="film-trigger"
                     data-title="Until Dawn"
                     data-genre="Horreur"
                     data-synopsis="Huit amis retournent dans le chalet isolé où deux membres de leur groupe ont disparu un an plus tôt."
                     data-release="23 Avril 2025"
                     data-duration="1h 45min"
                     data-rating="4.2/5"
                     data-director="David F. Sandberg"
                     data-writer="Gary Dauberman"
                     data-actors="Ella Rubin, Michael Cimino, Ji-young Yoo">
                <h3>Until Dawn</h3>
                <p>Genre: Horreur</p>
            </div>

            <div class="film-card" data-category="surnaturel">
                <img src="{{ asset('img/film2.jpg') }}" alt="Chainsaw Man" class="film-trigger"
                     data-title="Chainsaw Man - The Movie"
                     data-genre="Surnaturel"
                     data-synopsis="Denji fusionne avec son chien-démon Pochita pour devenir Chainsaw Man."
                     data-release="Prochainement"
                     data-duration="2h 00min"
                     data-rating="4.8/5"
                     data-director="Ryu Nakayama"
                     data-writer="Hiroshi Seko"
                     data-actors="Kikunosuke Toya, Tomori Kusunoki">
                <h3>Chainsaw Man</h3>
                <p>Genre: Surnaturel</p>
            </div>

            <div class="film-card" data-category="action">
                <img src="{{ asset('img/film3.jpg') }}" alt="John Wick" class="film-trigger"
                     data-title="John Wick"
                     data-genre="Action"
                     data-synopsis="Un ancien tueur à gages légendaire sort de sa retraite."
                     data-release="Sortie passée"
                     data-duration="1h 41min"
                     data-rating="4.7/5"
                     data-director="Chad Stahelski"
                     data-writer="Derek Kolstad"
                     data-actors="Keanu Reeves, Michael Nyqvist">
                <h3>John Wick</h3>
                <p>Genre: Action</p>
            </div>

            <div class="film-card" data-category="horreur">
                <img src="{{ asset('img/film4.jpeg') }}" alt="Scream VI" class="film-trigger"
                     data-title="Scream VI"
                     data-genre="Horreur"
                     data-synopsis="Les survivants des derniers meurtres de Ghostface quittent Woodsboro."
                     data-release="Mars 2023"
                     data-duration="2h 02min"
                     data-rating="4.0/5"
                     data-director="Matt Bettinelli-Olpin"
                     data-writer="James Vanderbilt"
                     data-actors="Melissa Barrera, Jenna Ortega">
                <h3>Scream VI</h3>
                <p>Genre: Horreur</p>
            </div>

            <div class="film-card" data-category="animation">
                <img src="{{ asset('img/film5.jpg') }}" alt="Shrek 5" class="film-trigger"
                     data-title="Shrek 5"
                     data-genre="Animation"
                     data-synopsis="L'ogre vert est de retour."
                     data-release="Juillet 2026"
                     data-duration="1h 35min"
                     data-rating="Attendu"
                     data-director="Walt Dohrn"
                     data-writer="Michael McCullers"
                     data-actors="Mike Myers, Eddie Murphy">
                <h3>Shrek 5</h3>
                <p>Genre: Animation</p>
            </div>

        </div>

        <div id="globalModal" class="modal-overlay">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <div class="modal-body">
                    <img id="modalImg" src="" alt="">
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

                        <a href="{{ route('reservation') }}" class="cta-reservation" style="display:inline-block; margin-top:15px;">Réserver ma place</a>
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
