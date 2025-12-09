<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/carousel.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
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
            <li><a href="{{ route('home') }}" class="active-link">Accueil</a></li>
            <li><a href="{{ route('films') }}">Films</a></li>
            <li><a href="{{ route('reservation') }}" class="cta-reservation">Réservation</a></li>
            <li><a href="{{ route('login') }}" class="cta-login">Connexion</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="hero-carousel">

        <div class="slide active">
            <img src="{{ asset('img/film1.jpg') }}" alt="Until Dawn"> <div class="slide-content">
                <span class="tag">À L'AFFICHE</span>
                <h1>Until Dawn</h1>
                <p>La peur les gagne alors que la montagne se referme sur eux.</p>
                <a href="{{ route('reservation') }}" class="btn-hero">Réserver ma séance</a>
            </div>
        </div>

        <div class="slide">
            <img src="{{ asset('img/film2.jpg') }}" alt="Chainsaw Man">
            <div class="slide-content">
                <span class="tag">AVANT-PREMIÈRE</span>
                <h1>Chainsaw Man</h1>
                <p>Le démon tronçonneuse arrive sur grand écran.</p>
                <a href="{{ route('reservation') }}" class="btn-hero">Réserver ma séance</a>
            </div>
        </div>

        <div class="slide">
            <img src="{{ asset('img/film3.jpg') }}" alt="John Wick">
            <div class="slide-content">
                <span class="tag">ACTION</span>
                <h1>John Wick</h1>
                <p>La légende est de retour pour un dernier contrat.</p>
                <a href="{{ route('reservation') }}" class="btn-hero">Réserver ma séance</a>
            </div>
        </div>

        <button class="prev-btn">&#10094;</button>
        <button class="next-btn">&#10095;</button>

        <div class="carousel-indicators">
            <span class="dot active" data-slide="0"></span>
            <span class="dot" data-slide="1"></span>
            <span class="dot" data-slide="2"></span>
        </div>
    </section>

    <section class="films-section" id="films-semaine">
        <div class="section-header">
            <h2>Films à l'affiche</h2>
            <a href="{{ route('films') }}" class="see-all">Tout voir →</a>
        </div>

        <div class="film-list">
            <div class="film-card">
                <div class="card-image-container">
                    <img src="{{ asset('img/film1.jpg') }}" alt="Until Dawn">
                    <div class="card-overlay">
                        <a href="{{ route('reservation') }}" class="btn-overlay">Horaires</a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>Until Dawn</h3>
                    <p>Horreur</p>
                </div>
            </div>

            <div class="film-card">
                <div class="card-image-container">
                    <img src="{{ asset('img/film2.jpg') }}" alt="Chainsaw Man">
                    <div class="card-overlay">
                        <a href="{{ route('reservation') }}" class="btn-overlay">Horaires</a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>Chainsaw Man</h3>
                    <p>Animation</p>
                </div>
            </div>

            <div class="film-card">
                <div class="card-image-container">
                    <img src="{{ asset('img/film3.jpg') }}" alt="John Wick">
                    <div class="card-overlay">
                        <a href="{{ route('reservation') }}" class="btn-overlay">Horaires</a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>John Wick</h3>
                    <p>Action</p>
                </div>
            </div>

            <div class="film-card">
                <div class="card-image-container">
                    <img src="{{ asset('img/film6.jpg') }}" alt="Avengers">
                    <div class="card-overlay">
                        <a href="{{ route('reservation') }}" class="btn-overlay">Horaires</a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>Avengers</h3>
                    <p>Action</p>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="footer-content">
        <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="footer-logo">
        <p>© 2025 CineForAll - L'expérience cinéma par excellence.</p>
    </div>
</footer>
</body>
</html>
