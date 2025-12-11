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

