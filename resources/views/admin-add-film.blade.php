<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Film - CineForAll</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <style>
        /* Ajustement spécifique pour ce formulaire plus large */
        .container-admin-form {
            display: flex; justify-content: center; padding: 40px 20px;
        }
        .bloc-admin-form {
            background: #fff; padding: 40px; border-radius: 10px; width: 100%; max-width: 600px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3); color: #333;
        }
        .form-row { display: flex; gap: 20px; }
        .form-row .form-group { flex: 1; }
        label { display: block; margin-bottom: 5px; font-weight: bold; font-size: 0.9em; }
    </style>
</head>
<body>
<header class="main-header">
    <div class="logo-container"><img src="{{ asset('img/logo.jpeg') }}" class="logo"></div>
    <nav class="main-nav">
        <ul><li><a href="{{ route('admin.films') }}">Retour Liste Films</a></li></ul>
    </nav>
</header>

<div class="container-admin-form">
    <div class="bloc-admin-form">
        <h1 class="titre-connexion" style="margin-bottom: 20px;">Nouveau Film</h1>

        <form action="{{ route('admin.films.store') }}" method="POST" enctype="multipart/form-data" class="form-connexion">
            @csrf <div class="form-group">
                <label>Titre du film</label>
                <input type="text" name="title" placeholder="ex: Avatar 3" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Genre</label>
                    <select name="genre" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:5px;">
                        <option value="Action">Action</option>
                        <option value="Horreur">Horreur</option>
                        <option value="Animation">Animation</option>
                        <option value="Surnaturel">Surnaturel</option>
                        <option value="Comédie">Comédie</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Durée</label>
                    <input type="text" name="duration" placeholder="ex: 2h 15min">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Date de sortie</label>
                    <input type="text" name="release_date" placeholder="ex: 12 Juillet 2025">
                </div>
                <div class="form-group">
                    <label>Note (sur 5)</label>
                    <input type="number" name="rating" step="0.1" max="5" placeholder="ex: 4.5">
                </div>
            </div>

            <div class="form-group">
                <label>Réalisateur</label>
                <input type="text" name="director" placeholder="ex: James Cameron">
            </div>

            <div class="form-group">
                <label>Acteurs principaux</label>
                <input type="text" name="actors" placeholder="ex: Acteur 1, Acteur 2...">
            </div>

            <div class="form-group">
                <label>Synopsis</label>
                <textarea name="synopsis" rows="4" placeholder="Résumé du film..." style="width:100%; padding:12px; border:1px solid #ddd; border-radius:5px;"></textarea>
            </div>

            <div class="form-group">
                <label>Affiche du film (Image)</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <button type="submit" class="btn-connexion" style="background-color: var(--green-btn, #2ecc71); margin-top: 10px;">AJOUTER LE FILM</button>
        </form>
    </div>
</div>
</body>
</html>
