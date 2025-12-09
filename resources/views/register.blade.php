<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CineForAll - Inscription</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>
<div class="container-connexion">
    <div class="bloc-branding">
        <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="logo-connexion">
        <h2 class="titre-bienvenue">REJOIGNEZ NOUS</h2>
    </div>

    <div class="bloc-formulaire">
        <h1 class="titre-connexion">Inscription</h1>
        <form action="{{ route('login') }}" class="form-connexion">
            <div class="form-group"><input type="text" placeholder="Nom d'utilisateur" required></div>
            <div class="form-group"><input type="email" placeholder="E-mail" required></div>
            <div class="form-group"><input type="password" placeholder="Mot de passe" required></div>
            <div class="form-group"><input type="password" placeholder="Confirmer mot de passe" required></div>
            <button type="submit" class="btn-connexion">CRÉER UN COMPTE</button>
        </form>
        <p style="text-align:center; margin-top:15px;">
            Déjà membre ? <a href="{{ route('login') }}" style="color:var(--primary-color);">Connectez-vous</a>
        </p>
    </div>
</div>
</body>
</html>
