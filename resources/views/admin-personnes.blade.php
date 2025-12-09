<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Personnes - CineForAll</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-personnes.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
    <div class="logo-container"><a href="{{ route('home') }}"><img src="{{ asset('img/logo.jpeg') }}" class="logo"></a></div>
    <nav class="main-nav">
        <ul><li><a href="{{ route('admin.dashboard') }}">Retour Dashboard</a></li></ul>
    </nav>
</header>

<main style="padding: 40px 5%;">
    <h1>Gestions Personnes</h1>
    <p style="margin-bottom: 20px;">Gérez ici les Acteurs, Réalisateurs, Scénaristes et Producteurs.</p>

    <div class="admin-toolbar">
        <input type="text" id="searchPerson" placeholder="Rechercher une personne (ex: Nolan)...">
        <button class="cta-login" id="addPersonBtn">+ Ajouter Personne</button>
    </div>

    <div class="table-container">
        <table class="admin-table">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Identité</th>
                <th>Rôle(s)</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="personTableBody">
            <tr>
                <td><img src="https://image.tmdb.org/t/p/w200/5qHNjhtjMD4YWH3UPcsDxlbPB8M.jpg" class="mini-img" alt="RDJ"></td>
                <td><strong>Robert Downey Jr.</strong></td>
                <td>
                    <span class="role-badge role-acteur">Acteur</span>
                    <span class="role-badge role-producteur">Producteur</span>
                </td>
                <td>
                    <button class="cta-login edit-btn">Modif</button>
                    <button class="cta-login delete-btn">Suppr</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</main>

<div id="personModal" class="modal-overlay">
    <div class="modal-content">
        <span class="close-btn" onclick="closePersonModal()">&times;</span>
        <div class="modal-body">
            <h2 id="modalTitle">Ajouter / Modifier</h2>
            <form class="form-connexion" id="personForm">
                <div class="form-group">
                    <label for="fullName">Nom complet</label>
                    <input type="text" id="fullName" placeholder="ex: Quentin Tarantino" required>
                </div>
                <div class="form-group">
                    <label for="photoUrl">URL Photo</label>
                    <input type="text" id="photoUrl" placeholder="http://..." required>
                </div>

                <div class="form-group">
                    <label style="display:block; margin-bottom:10px;">Rôles (Cochez les cases)</label>
                    <div id="roleCheckboxes">
                        <label><input type="checkbox" name="role" value="acteur"> Acteur</label>
                        <label><input type="checkbox" name="role" value="realisateur"> Réalisateur</label>
                        <label><input type="checkbox" name="role" value="scenariste"> Scénariste</label>
                        <label><input type="checkbox" name="role" value="producteur"> Producteur</label>
                    </div>
                </div>

                <button type="submit" class="btn-connexion">ENREGISTRER</button>
            </form>
        </div>
    </div>
</div>

<footer>
    <p>© 2025 CineForAll - Admin Panel</p>
</footer>

<script src="{{ asset('js/admin-personnes.js') }}"></script>
</body>
</html>
