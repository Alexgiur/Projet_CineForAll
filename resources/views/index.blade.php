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

<div class="red-divider">
    LES NOUVEAUTÉS DU MOMENT
</div>

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
                <img src="{{ asset('img/film1.jpeg') }}" alt="Film">
                <h3>Until Dawn</h3>
                <p>Horreur</p>
            </div>
            <div class="film-card">
                <img src="{{ asset('img/film2.jpg') }}" alt="Film">
                <h3>Chainsaw Man</h3>
                <p>Animation</p>
            </div>
            <div class="film-card">
                <img src="{{ asset('img/film3.jpeg') }}" alt="Film">
                <h3>John Wick</h3>
                <p>Action</p>
            </div>
        </div>
    </section>

    <section class="upcoming-section">
        <h2>Prochaines sorties au cinéma</h2>

        <div class="film-list">
            <div class="film-card">
                <img src="{{ asset('img/film4.jpeg') }}" alt="Film">
                <h3>Mufasa</h3>
                <p>Aventure / Famille</p>
                <span class="tag-coming-soon">Bientôt</span>
            </div>

            <div class="film-card">
                <img src="{{ asset('img/film5.jpg') }}" alt="Film">
                <h3>Sonic 3</h3>
                <p>Action / Jeunesse</p>
                <span class="tag-coming-soon">Bientôt</span>
            </div>

            <div class="film-card">
                <img src="{{ asset('img/film6.jpg') }}" alt="Film">
                <h3>Captain America</h3>
                <p>Action / Marvel</p>
                <span class="tag-coming-soon">Bientôt</span>
            </div>
        </div>
    </section>

    <section class="newsletter-section">
        <h2>NE RATEZ AUCUN FILM !</h2>
        <p>Inscrivez-vous à notre newsletter pour recevoir les offres spéciales et les avant-premières.</p>

        <form action="#">
            <input type="email" placeholder="Votre email...">
            <button type="submit">S'INSCRIRE</button>
        </form>
    </section>

</main>

<footer>
    <div class="footer-content">
        <h3>CineForAll</h3>
        <p>Votre destination cinéma préférée. Réservez vos places en ligne simplement.</p>
        <div class="social-icons">
            <span>Facebook</span> <span>Twitter</span> <span>Instagram</span>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 CineForAll. Tous droits réservés.</p>
    </div>
</footer>

</body>
</html>
