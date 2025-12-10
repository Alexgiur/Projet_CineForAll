<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/carousel.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Logo">
        </a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="{{ route('home') }}">ACCUEIL</a></li>
            <li><a href="{{ route('films') }}">FILMS</a></li>
            <li><a href="{{ route('reservation') }}" class="cta-reservation">RÉSERVATION</a></li>
            <li><a href="{{ route('login') }}" class="cta-login">CONNEXION</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="hero-carousel">
        <div class="slide active">
            <img src="{{ asset('img/Carousel1.jpg') }}" alt="Games Of Thrones">
            <div class="slide-content">
                <h1>Games Of Thrones</h1>
                <p>Le phénomène anime arrive au cinéma</p>
                <a href="{{ route('reservation') }}" class="btn-hero">Réserver</a>
            </div>
        </div>
        <div class="slide">
            <img src="{{ asset('img/Carousel2.jpg') }}" alt="FNAF">
            <div class="slide-content">
                <h1>FNAF</h1>
                <p>Le phénomène anime arrive au cinéma.</p>
                <a href="{{ route('reservation') }}" class="btn-hero">Réserver</a>
            </div>
        </div>
        <div class="slide">
            <img src="{{ asset('img/Carousel3.jpg') }}" alt="Chainsaw Man">
            <div class="slide-content">
                <h1>ChainsSaw Man </h1>
                <p>Le phénomène anime arrive au cinéma</p>
                <a href="{{ route('reservation') }}" class="btn-hero">Réserver</a>
            </div>
        </div>

        <button class="prev-btn">&#10094;</button>
        <button class="next-btn">&#10095;</button>

        <div class="carousel-indicators">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </section>

    <section class="films-section">
        <h2>À l'affiche cette semaine</h2>
        <div class="film-list">
            <div class="film-card">
                <img src="{{ asset('img/film1.jpg') }}" alt="Film">
                <h3>Until Dawn</h3>
                <p>Horreur</p>
            </div>
            <div class="film-card">
                <img src="{{ asset('img/film2.jpg') }}" alt="Film">
                <h3>Chainsaw Man</h3>
                <p>Animation</p>
            </div>
            <div class="film-card">
                <img src="{{ asset('img/film3.jpg') }}" alt="Film">
                <h3>John Wick</h3>
                <p>Action</p>
            </div>
        </div>
    </section>
</main>
</body>
</html>
