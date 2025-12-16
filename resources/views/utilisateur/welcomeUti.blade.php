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
            <li><a href="/">Accueil</a></li>
            <li><a href="#">Films (Demo)</a></li>
            <li><a href="#" class="cta-reservation">Réservation</a></li>
            <li>Mon compte</li>
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
            <div class="film-card">
                <img src="{{ asset('img/film1.jpeg') }}" alt="Until Dawn">
                <h3>Until Dawn</h3>
                <p>Genre: Horreur</p>
                <a href="#" class="details-link">Réserver</a>
            </div>
            <div class="film-card">
                <img src="{{ asset('img/film2.jpeg') }}" alt="Chainsaw Man">
                <h3>Chainsaw Man</h3>
                <p>Genre: Surnaturel</p>
                <a href="#" class="details-link">Réserver</a>
            </div>
            <div class="film-card">
                <img src="{{ asset('img/film3.jpeg') }}" alt="John Wick">
                <h3>John Wick</h3>
                <p>Genre: Action</p>
                <a href="#" class="details-link">Réserver</a>
            </div>
        </div>
    </section>

    <section class="films-section" id="films-avenir">
        <h2>Prochainement</h2>
        <div class="film-list">
            <div class="film-card">
                <img src="{{ asset('img/film4.jpeg') }}" alt="Scream VI">
                <h3>Scream VI</h3>
            </div>
            <div class="film-card">
                <img src="{{ asset('img/film5.jpeg') }}" alt="Shrek 5">
                <h3>Shrek 5</h3>
            </div>
            <div class="film-card">
                <img src="{{ asset('img/film6.jpeg') }}" alt="Avengers">
                <h3>Avengers Doomsday</h3>
            </div>
        </div>
    </section>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>
</body>
</html>
