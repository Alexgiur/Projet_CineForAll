<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termes & Conditions - CineForAll</title>
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
            <li><a href="/">Retour à l'accueil</a></li>
        </ul>
    </nav>
</header>

<main style="padding: 50px 20px; max-width: 800px; margin: 0 auto; min-height: 60vh;">
    <h1 style="margin-bottom: 30px;">Termes & Conditions</h1>

    <div style="line-height: 1.6;">
        <h2>1. Acceptation des conditions</h2>
        <p>En accédant au site CineForAll, vous acceptez d'être lié par les présents termes et conditions.</p>

        <h2 style="margin-top: 20px;">2. Utilisation du service</h2>
        <p>Notre service permet de réserver des places de cinéma. Toute utilisation abusive entraînera la suspension de votre compte.</p>

        <h2 style="margin-top: 20px;">3. Données personnelles</h2>
        <p>Vos données sont protégées et ne seront pas revendues à des tiers.</p>

    </div>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
    <p style="margin-top: 10px;">
        <a href="{{ route('termes') }}" style="color: white; text-decoration: underline; font-size: 0.9em;">Termes & Conditions</a>
    </p>
</footer>

</body>
</html>
