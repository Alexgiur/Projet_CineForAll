<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CineForAll - Réservation</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
    <div class="logo-container"><a href="{{ route('home') }}"><img src="{{ asset('img/logo.jpeg') }}" class="logo"></a></div>
    <nav class="main-nav">
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('login') }}" class="cta-login">Connexion</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="reservation-form-section">
        <h2>Réserver vos places</h2>
        <form class="reservation-form">
            <div class="form-group">
                <label>Film :</label>
                <select required>
                    <option value="">-- Choisissez un film --</option>
                    <option value="until-dawn">Until Dawn</option>
                    <option value="chainsaw-man">Chainsaw Man</option>
                    <option value="john-wick">John Wick</option>
                </select>
            </div>
            <div class="form-group">
                <label>Date :</label>
                <input type="datetime-local" required>
            </div>
            <div class="form-group">
                <label>Nombre de places :</label>
                <input type="number" min="1" max="10" value="1" required>
            </div>
            <button type="submit" class="submit-reservation">Confirmer</button>
        </form>
    </section>
</main>
<footer><p>© 2025 CineForAll</p></footer>
</body>
</html>
