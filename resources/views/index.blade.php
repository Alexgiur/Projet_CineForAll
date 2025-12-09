<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
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
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="fade-in-up">Vivez le cinéma <span class="text-highlight">autrement</span></h1>
            <p class="fade-in-up delay-1">Les derniers blockbusters, directement près de chez vous.</p>
            <div class="hero-buttons fade-in-up delay-2">
                <a href="{{ route('films') }}" class="btn-hero btn-primary">Voir les films</a>
                <a href="{{ route('reservation') }}" class="btn-hero btn-secondary">Réserver</a>
            </div>
        </div>
    </section>

    <section class="films-section" id="films-semaine">
        <div class="section-header">
            <h2>Films de la semaine</h2>
            <a href="{{ route('films') }}" class="see-all">Tout voir →</a>
        </div>

        <div class="film-list">
            <div class="film-card">
                <div class="card-image-container">
                    <img src="{{ asset('img/film1.jpg') }}" alt="Until Dawn">
                    <div class="card-overlay">
                        <a href="{{ route('reservation') }}" class="btn-overlay">Réserver</a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>Until Dawn</h3>
                    <p>Horreur • 1h 45min</p>
                </div>
            </div>

            <div class="film-card">
                <div class="card-image-container">
                    <img src="{{ asset('img/film2.jpg') }}" alt="Chainsaw Man">
                    <div class="card-overlay">
                        <a href="{{ route('reservation') }}" class="btn-overlay">Réserver</a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>Chainsaw Man</h3>
                    <p>Surnaturel • 2h 00min</p>
                </div>
            </div>

            <div class="film-card">
                <div class="card-image-container">
                    <img src="{{ asset('img/film3.jpg') }}" alt="John Wick">
                    <div class="card-overlay">
                        <a href="{{ route('reservation') }}" class="btn-overlay">Réserver</a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>John Wick</h3>
                    <p>Action • 1h 41min</p>
                </div>
            </div>
        </div>
    </section>

    <section class="films-section dark-section" id="films-avenir">
        <div class="section-header">
            <h2>Prochainement</h2>
        </div>
        <div class="film-list">
            <div class="film-card">
                <div class="card-image-container">
                    <img src="{{ asset('img/film4.jpeg') }}" alt="Scream VI">
                </div>
                <div class="card-info">
                    <h3>Scream VI</h3>
                    <p>Mars 2023</p>
                </div>
            </div>
            <div class="film-card">
                <div class="card-image-container">
                    <img src="{{ asset('img/film5.jpg') }}" alt="Shrek 5">
                </div>
                <div class="card-info">
                    <h3>Shrek 5</h3>
                    <p>Juillet 2026</p>
                </div>
            </div>
            <div class="film-card">
                <div class="card-image-container">
                    <img src="{{ asset('img/film6.jpg') }}" alt="Avengers">
                </div>
                <div class="card-info">
                    <h3>Avengers</h3>
                    <p>Mai 2026</p>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="footer-content">
        <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="footer-logo">
        <p>© 2025 CineForAll - Tous droits réservés.</p>
        
        </div>
    </div>
</footer>
</body>
</html>
