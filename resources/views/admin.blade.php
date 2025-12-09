<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CineForAll - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
    <div class="logo-container"><img src="{{ asset('img/logo.jpeg') }}" class="logo"></div>
    <nav class="main-nav">
        <ul>
            <li><a href="{{ route('home') }}">Voir le site</a></li>
            <li><a href="{{ route('home') }}" style="color:red;">Déconnexion</a></li>
        </ul>
    </nav>
</header>

<main class="admin-dashboard">
    <h1>Tableau de Bord Admin</h1>
    <div class="admin-buttons-grid">
        <a href="{{ route('admin.films') }}" class="admin-button">
            <h2>Gestion Films</h2>
            <p>Ajouter/Modifier/Supprimer</p>
        </a>

        <a href="{{ route('admin.personnes') }}" class="admin-button">
            <h2>Gestion Personnes</h2>
            <p>Acteurs, Réalisateurs, Scénaristes...</p>
        </a>

        <a href="#" class="admin-button">
            <h2>Gestion Salles</h2>
            <p>(En construction)</p>
        </a>
    </div>
</main>
</body>
</html>
