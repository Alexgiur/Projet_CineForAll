<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Films - CineForAll</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
    <div class="logo-container"><img src="{{ asset('img/logo.jpeg') }}" class="logo"></div>
    <nav class="main-nav">
        <ul><li><a href="{{ route('admin.dashboard') }}">Retour Dashboard</a></li></ul>
    </nav>
</header>

<main style="padding: 40px 5%;">
    <h1>Gestion des Films</h1>

    <div class="admin-toolbar">
        <input type="text" placeholder="Rechercher un film...">
        <a href="{{ route('admin.films.add') }}" class="cta-login" style="background-color:#2ecc71; display:inline-block; text-align:center;">
            + Ajouter Film
        </a>    </div>

    <div style="background:white; padding:20px; border-radius:8px;">
        <table class="admin-table">
            <thead>
            <tr>
                <th>Img</th>
                <th>Titre</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><img src="{{ asset('img/film1.jpg') }}" class="mini-img"></td>
                <td>Until Dawn</td>
                <td>Horreur</td>
                <td>
                    <button class="cta-login" style="background-color:var(--blue-btn); padding:5px 10px;">Modif</button>
                    <button class="cta-login" style="background-color:var(--red-btn); padding:5px 10px;">Suppr</button>
                </td>
            </tr>
            <tr>
                <td><img src="{{ asset('img/film2.jpg') }}" class="mini-img"></td>
                <td>Chainsaw Man</td>
                <td>Surnaturel</td>
                <td>
                    <button class="cta-login" style="background-color:var(--blue-btn); padding:5px 10px;">Modif</button>
                    <button class="cta-login" style="background-color:var(--red-btn); padding:5px 10px;">Suppr</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
