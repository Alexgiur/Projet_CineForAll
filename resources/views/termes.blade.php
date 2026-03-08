<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termes & Conditions - CineForAll</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <style>
        .terms-section h2 {
            margin-top: 30px;
            color: #2c3e50;
            border-bottom: 2px solid #f39c12;
            padding-bottom: 5px;
            display: inline-block;
        }
        .terms-section p {
            margin-top: 10px;
            color: #444;
            text-align: justify;
        }
        .terms-section ul {
            margin-top: 10px;
            margin-left: 20px;
            color: #444;
        }
        .terms-section li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="/">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll" class="logo">
        </a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/">Retour à l'accueil</a></li>
        </ul>
    </nav>
</header>

<main style="padding: 50px 20px; max-width: 900px; margin: 0 auto; min-height: 60vh; background: white; box-shadow: 0 0 15px rgba(0,0,0,0.05); border-radius: 10px; margin-top: 40px; margin-bottom: 40px;">
    <h1 style="text-align: center; color: #e67e22; font-family: 'Lilita One', cursive; font-size: 2.5em;">Conditions Générales de Vente et d'Utilisation</h1>
    <p style="text-align: center; color: #7f8c8d; font-style: italic;">Dernière mise à jour : Février 2025</p>

    <div class="terms-section" style="line-height: 1.6; margin-top: 30px;">

        <h2>1. Objet</h2>
        <p>Les présentes Conditions Générales de Vente et d'Utilisation (ci-après les "CGV/CGU") ont pour objet de définir les modalités et conditions dans lesquelles la plateforme <strong>CineForAll</strong> permet à ses utilisateurs de consulter les programmations de films et de réserver des places de cinéma en ligne.</p>

        <h2>2. Accès au service et Création de compte</h2>
        <p>La navigation sur le catalogue de films est libre. Toutefois, la réservation de places nécessite la création d'un compte utilisateur. L'utilisateur s'engage à fournir des informations exactes et à jour. Il est seul responsable de la confidentialité de ses identifiants de connexion. Toute utilisation du compte est réputée avoir été effectuée par l'utilisateur lui-même.</p>

        <h2>3. Réservation et Achat de billets</h2>
        <p>L'utilisateur peut réserver jusqu'à 10 places par transaction pour une même séance. La réservation n'est définitive qu'après confirmation via l'interface du site. Un récapitulatif (billet virtuel) est alors généré dans la rubrique "Mes Réservations".</p>
        <ul>
            <li>Le billet est uniquement valable pour la séance, la date, l'heure et la salle précisées.</li>
            <li>Il est conseillé de se présenter au cinéma au moins 15 minutes avant le début de la séance.</li>
        </ul>

        <h2>4. Droit de rétractation, Annulation et Remboursement</h2>
        <p>Conformément à la législation en vigueur sur les prestations de services de loisirs devant être fournis à une date ou à une période déterminée, <strong>aucun droit de rétractation n'est applicable</strong> sur l'achat de billets de cinéma.</p>
        <p>Les billets achetés sur CineForAll ne sont ni repris, ni échangés, ni remboursés, sauf en cas d'annulation de la séance par le cinéma lui-même ou de problème technique majeur empêchant la projection.</p>

        <h2>5. Règlement intérieur du cinéma</h2>
        <p>L'accès aux salles de cinéma est soumis au respect du règlement intérieur de l'établissement. La direction du cinéma se réserve le droit de refuser l'accès aux salles ou de faire expulser tout contrevenant, sans aucun remboursement, notamment en cas de :</p>
        <ul>
            <li>Comportement violent, bruyant ou inapproprié.</li>
            <li>Non-respect des restrictions d'âge légales pour certains films (une pièce d'identité pourra être demandée).</li>
            <li>Utilisation de téléphones portables ou d'appareils d'enregistrement pendant la projection.</li>
        </ul>

        <h2>6. Protection des données personnelles (RGPD)</h2>
        <p>Dans le cadre de l'utilisation du site, CineForAll collecte et traite certaines données à caractère personnel (nom, prénom, adresse e-mail). Ces données sont utilisées exclusivement pour la gestion des réservations et le bon fonctionnement du compte utilisateur.</p>
        <p>CineForAll s'engage à ne jamais vendre, louer ou céder ces données à des tiers à des fins commerciales. Conformément à la loi Informatique et Libertés et au RGPD, vous disposez d'un droit d'accès, de rectification et de suppression de vos données, que vous pouvez exercer en nous contactant ou via votre espace personnel.</p>

        <h2>7. Propriété intellectuelle</h2>
        <p>L'ensemble des éléments constituant le site CineForAll (textes, graphismes, logiciels, photographies, images, vidéos, sons, plans, noms, logos, marques, créations et œuvres diverses protégées, bases de données, etc.) est protégé par le droit de la propriété intellectuelle. Les affiches de films et synopsis appartiennent à leurs distributeurs et ayants droit respectifs.</p>

        <h2>8. Modification des conditions</h2>
        <p>CineForAll se réserve le droit de modifier les présentes CGV/CGU à tout moment. Les nouvelles conditions s'appliqueront à toute nouvelle réservation effectuée après leur mise en ligne.</p>

        <h2>9. Droit applicable et Litiges</h2>
        <p>Les présentes conditions sont soumises à la loi française. En cas de litige, et après une tentative de recherche de solution amiable, les tribunaux français seront seuls compétents pour en connaître.</p>

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
