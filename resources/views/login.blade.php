<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Connexion</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
    <div class="logo-container">
        <a href="index.html"><img src="img/logo.jpeg" alt="Logo" class="logo"></a>
    </div>
    <nav class="main-nav">
        <ul><li><a href="index.html">Retour Accueil</a></li></ul>
    </nav>
</header>

<div class="container-connexion">
    <div class="bloc-branding">
        <img src="img/logo.jpeg" alt="Logo CineForAll" class="logo-connexion">
        <h2 class="titre-bienvenue">BIENVENUE</h2>
        <p>Connectez-vous pour accéder à vos réservations.</p>
    </div>

    <div class="bloc-formulaire">
        <h1 class="titre-connexion">Connexion</h1>
        <form action="index.html" class="form-connexion">
            <div class="form-group">
                <input type="text" placeholder="Identifiant ou E-mail" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Mot de passe" required>
            </div>
            <button type="submit" class="btn-connexion">SE CONNECTER</button>
        </form>
        <p style="text-align:center; margin-top:15px;">
            <a href="admin.html">(Démo: Accès Admin)</a>
        </p>
        <p style="text-align:center; margin-top:15px;">
            Pas encore membre ? <a href="register.html" style="color:var(--primary-color);">Créez un compte</a>
        </p>
    </div>
</div>
</body>
</html>
