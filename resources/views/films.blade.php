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
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll" class="logo">
        </a>
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
                     data-synopsis="Huit amis retournent dans le chalet isolé où deux membres de leur groupe ont disparu un an plus tôt. La peur les gagne alors que la montagne semble se refermer sur eux."
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
                     data-synopsis="Denji, un jeune homme pauvre, fusionne avec son chien-démon Pochita pour devenir Chainsaw Man. Il rejoint alors les Devil Hunters pour traquer les démons les plus dangereux."
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
                     data-synopsis="Un ancien tueur à gages légendaire sort de sa retraite pour traquer les gangsters qui lui ont tout pris, déclenchant une guerre sans merci au cœur de la pègre."
                     data-release="Sortie passée"
                     data-duration="1h 41min"
                     data-rating="4.7/5"
                     data-director="Chad Stahelski"
                     data-writer="Derek Kolstad"
                     data-actors="Keanu Reeves, Michael Nyqvist, Alfie Allen">
                <h3>John Wick</h3>
                <p>Genre: Action</p>
            </div>

            <div class="film-card" data-category="horreur">
                <img src="{{ asset('img/film4.jpeg') }}" alt="Scream VI" class="film-trigger"
                     data-title="Scream VI"
                     data-genre="Horreur"
                     data-synopsis="Les survivants des derniers meurtres de Ghostface quittent Woodsboro pour tenter de prendre un nouveau départ à New York, mais le tueur masqué les y attend."
                     data-release="Mars 2023"
                     data-duration="2h 02min"
                     data-rating="4.0/5"
                     data-director="Matt Bettinelli-Olpin"
                     data-writer="James Vanderbilt"
                     data-actors="Melissa Barrera, Jenna Ortega, Courteney Cox">
                <h3>Scream VI</h3>
                <p>Genre: Horreur</p>
            </div>

            <div class="film-card" data-category="animation">
                <img src="{{ asset('img/film5.jpg') }}" alt="Shrek 5" class="film-trigger"
                     data-title="Shrek 5"
                     data-genre="Animation"
                     data-synopsis="Le célèbre ogre vert, l'Âne et le Chat Potté sont de retour pour une toute nouvelle aventure hilarante dans le royaume de Fort Fort Lointain."
                     data-release="Juillet 2026"
                     data-duration="1h 35min"
                     data-rating="Attendu"
                     data-director="Walt Dohrn"
                     data-writer="Michael McCullers"
                     data-actors="Mike Myers, Eddie Murphy, Cameron Diaz">
                <h3>Shrek 5</h3>
                <p>Genre: Animation</p>
            </div>

            <div class="film-card" data-category="action">
                <img src="{{ asset('img/film6.jpg') }}" alt="Avengers Doomsday" class="film-trigger"
                     data-title="Avengers: Doomsday"
                     data-genre="Action"
                     data-synopsis="Face à une nouvelle menace cosmique incarnée par le redoutable Docteur Doom, les héros les plus puissants de la Terre doivent se rassembler une nouvelle fois."
                     data-release="Mai 2026"
                     data-duration="2h 30min"
                     data-rating="Attendu"
                     data-director="Russo Brothers"
                     data-writer="Stephen McFeely"
                     data-actors="Robert Downey Jr., Pedro Pascal, Vanessa Kirby">
                <h3>Avengers</h3>
                <p>Genre: Action</p>
            </div>

            <div class="film-card" data-category="animation">
                <img src="{{ asset('img/film7.jpeg') }}" alt="Spider-Man" class="film-trigger"
                     data-title="Spider-Man: New Generation"
                     data-genre="Animation"
                     data-synopsis="Miles Morales, un adolescent de Brooklyn, découvre les possibilités illimitées du Spider-Verse, un univers où plus d'un héros peut porter le masque."
                     data-release="Sortie passée"
                     data-duration="1h 57min"
                     data-rating="4.9/5"
                     data-director="Bob Persichetti"
                     data-writer="Phil Lord"
                     data-actors="Shameik Moore, Jake Johnson, Hailee Steinfeld">
                <h3>Spider-Man</h3>
                <p>Genre: Animation</p>
            </div>

            <div class="film-card" data-category="horreur">
                <img src="{{ asset('img/film8.jpeg') }}" alt="The Conjuring" class="film-trigger"
                     data-title="The Conjuring: Last Rites"
                     data-genre="Horreur"
                     data-synopsis="Les enquêteurs paranormaux Ed et Lorraine Warren font face à leur dernière enquête terrifiante impliquant une malédiction ancienne."
                     data-release="Septembre 2025"
                     data-duration="1h 52min"
                     data-rating="Attendu"
                     data-director="Michael Chaves"
                     data-writer="David Leslie Johnson"
                     data-actors="Patrick Wilson, Vera Farmiga">
                <h3>The Conjuring</h3>
                <p>Genre: Horreur</p>
            </div>

            <div class="film-card" data-category="action">
                <img src="{{ asset('img/film9.jpeg') }}" alt="Gladiator II" class="film-trigger"
                     data-title="Gladiator II"
                     data-genre="Action"
                     data-synopsis="Des années après la mort de Maximus, Lucius est forcé d'entrer dans le Colisée pour combattre les empereurs tyranniques et rendre sa gloire à Rome."
                     data-release="Novembre 2024"
                     data-duration="2h 28min"
                     data-rating="4.3/5"
                     data-director="Ridley Scott"
                     data-writer="David Scarpa"
                     data-actors="Paul Mescal, Pedro Pascal, Denzel Washington">
                <h3>Gladiator II</h3>
                <p>Genre: Action</p>
            </div>

            <div class="film-card" data-category="surnaturel">
                <img src="{{ asset('img/film10.jpeg') }}" alt="Beetlejuice 2" class="film-trigger"
                     data-title="Beetlejuice Beetlejuice"
                     data-genre="Surnaturel"
                     data-synopsis="Après une tragédie familiale, les Deetz reviennent à Winter River. La vie de Lydia bascule quand le portail de l'au-delà est accidentellement rouvert."
                     data-release="Septembre 2024"
                     data-duration="1h 44min"
                     data-rating="4.1/5"
                     data-director="Tim Burton"
                     data-writer="Alfred Gough"
                     data-actors="Michael Keaton, Winona Ryder, Jenna Ortega">
                <h3>Beetlejuice 2</h3>
                <p>Genre: Surnaturel</p>
            </div>

            <div class="film-card" data-category="animation">
                <img src="{{ asset('img/film11.jpeg') }}" alt="Vice-Versa 2" class="film-trigger"
                     data-title="Vice-Versa 2"
                     data-genre="Animation"
                     data-synopsis="Riley est désormais une adolescente. Son quartier général émotionnel subit un grand chamboulement avec l'arrivée d'une nouvelle émotion : l'Anxiété."
                     data-release="Juin 2024"
                     data-duration="1h 36min"
                     data-rating="4.5/5"
                     data-director="Kelsey Mann"
                     data-writer="Meg LeFauve"
                     data-actors="Amy Poehler, Maya Hawke">
                <h3>Vice-Versa 2</h3>
                <p>Genre: Animation</p>
            </div>

            <div class="film-card" data-category="action">
                <img src="{{ asset('img/film12.jpeg') }}" alt="Mission Impossible" class="film-trigger"
                     data-title="Mission: Impossible - The Final Reckoning"
                     data-genre="Action"
                     data-synopsis="Ethan Hunt et son équipe de l'IMF se lancent dans leur mission la plus périlleuse pour traquer une arme terrifiante qui menace l'humanité entière."
                     data-release="Mai 2025"
                     data-duration="2h 40min"
                     data-rating="Attendu"
                     data-director="Christopher McQuarrie"
                     data-writer="Christopher McQuarrie"
                     data-actors="Tom Cruise, Hayley Atwell, Ving Rhames">
                <h3>Mission Impossible</h3>
                <p>Genre: Action</p>
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

                        <div class="film-meta-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 15px; font-size: 0.9em; background: #f9f9f9; padding: 10px; border-radius: 5px; color: #333;">
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
