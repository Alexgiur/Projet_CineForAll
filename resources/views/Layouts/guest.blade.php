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
            <li><a href="{{ route('films.index') }}">Films</a></li>
            <li><a href="#" class="cta-reservation">Réservation</a></li>
            <li><a href="/login" class="cta-login">Connexion</a></li>
        </ul>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
    <p style="margin-top: 10px;">
{{--        <a href="{{ route('termes') }}" style="color: white; text-decoration: underline; font-size: 0.9em;">Termes & Conditions</a>--}}
    </p>
</footer>

</body>
</html>
