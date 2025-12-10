<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - CineForAll</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="{{ route('index') }}">
            <img src="{{ asset('img/logo.jpeg') }}" alt="CineForAll Logo">
        </a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="{{ route('index') }}">Accueil</a></li>
            <li><a href="{{ route('films') }}">Films</a></li>
            @auth
                <li><a href="#" class="cta-login">Mon Compte</a></li>
            @else
                <li><a href="{{ route('login') }}" class="cta-login">Connexion</a></li>
            @endauth
        </ul>
    </nav>
</header>

<div class="reservation-page-container">

    <div class="form-area">
        <h1>Réservation de Séance</h1>
        <p>Sélectionnez votre film, votre séance et vos places.</p>

        <form id="reservation-form" action="{{ route('reservation.store') }}" method="POST">
            @csrf

            <div class="step-section">
                <h3>1. Choisir le Film et la Séance</h3>

                <div class="form-group">
                    <label>Sélectionnez votre Film :</label>
                    <div class="film-selection-grid" id="film-select-grid">
                        @if(isset($films))
                            @foreach($films as $film)
                                <div class="film-card-select" data-id="{{ $film->id }}" data-film-title="{{ $film->titre }}">
                                    <img src="{{ asset('img/' . ($film->image ?? 'film1.jpeg')) }}" alt="{{ $film->titre }}">
                                    <h4>{{ $film->titre }}</h4>
                                </div>
                            @endforeach
                        @else
                            <div class="film-card-select" data-id="Dune2" data-film-title="Dune: Deuxième Partie">
                                <img src="{{ asset('img/film1.jpeg') }}" alt="Dune">
                                <h4>Dune: Deuxième Partie</h4>
                            </div>
                            <div class="film-card-select" data-id="Oppenheimer" data-film-title="Oppenheimer">
                                <img src="{{ asset('img/film2.jpg') }}" alt="Oppenheimer">
                                <h4>Oppenheimer</h4>
                            </div>
                        @endif
                    </div>
                    <input type="hidden" id="selected-film" name="film_id" required>
                </div>

                <div class="form-group">
                    <label for="seance-date-time">Date et Heure de la Séance:</label>
                    <input type="datetime-local" id="seance-date-time" name="seance" required>
                </div>
            </div>

            <div class="step-section">
                <h3>2. Nombre de personnes</h3>
                <div class="form-group">
                    <label class="label-ticket" for="tickets-adult">Adultes :</label>
                    <input type="number" id="tickets-adult" name="adultes" value="0" min="0">
                </div>
                <div class="form-group">
                    <label class="label-ticket" for="tickets-child">Enfants :</label>
                    <input type="number" id="tickets-child" name="enfants" value="0" min="0">
                </div>
                <div class="form-group">
                    <label class="label-ticket" for="tickets-student">Étudiants :</label>
                    <input type="number" id="tickets-student" name="etudiants" value="0" min="0">
                </div>
            </div>

            <div class="step-section">
                <h3>3. Sélectionner les Sièges</h3>
                <div class="seat-map-wrapper">
                    <div class="screen-area">
                        <p>ÉCRAN</p>
                    </div>

                    <div id="seat-map-grid" class="seat-map">
                        <div class="row" data-row="A">
                            <span class="row-label">A</span>
                            <div class="seat available" data-id="A1">1</div>
                            <div class="seat available" data-id="A2">2</div>
                            <div class="seat booked" data-id="A3">3</div>
                            <div class="seat available" data-id="A4">4</div>
                            <div class="seat available" data-id="A5">5</div>
                        </div>
                        <div class="row" data-row="B">
                            <span class="row-label">B</span>
                            <div class="seat available" data-id="B1">1</div>
                            <div class="seat available" data-id="B2">2</div>
                            <div class="seat available" data-id="B3">3</div>
                            <div class="seat available" data-id="B4">4</div>
                            <div class="seat available" data-id="B5">5</div>
                        </div>
                        <div class="row" data-row="C">
                            <span class="row-label">C</span>
                            <div class="seat available" data-id="C1">1</div>
                            <div class="seat available" data-id="C2">2</div>
                            <div class="seat available" data-id="C3">3</div>
                            <div class="seat available" data-id="C4">4</div>
                            <div class="seat available" data-id="C5">5</div>
                        </div>
                    </div>
                </div>

                <div class="legend">
                    <div class="legend-item"><div class="seat-icon available"></div> Disponible</div>
                    <div class="legend-item"><div class="seat-icon selected"></div> Sélectionné</div>
                    <div class="legend-item"><div class="seat-icon booked"></div> Indisponible</div>
                </div>
            </div>

            <div class="step-section">
                <h3>4. Vos Informations</h3>
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
        </form>
    </div>

    <aside class="summary-panel">
        <h2>Ma Sélection</h2>

        <div class="summary-details">
            <p><strong>Film :</strong> <span id="summary-film">Non sélectionné</span></p>
            <p><strong>Séance :</strong> <span id="summary-seance">Non sélectionnée</span></p>
            <hr>
            <p><strong>Sièges choisis :</strong></p>
            <ul id="selected-seats-list">
                <li id="no-seats-selected">Aucun siège.</li>
            </ul>
            <hr>
            <p><strong>Total places :</strong> <span id="total-count">0</span></p>
        </div>

        <button type="submit" form="reservation-form" id="submit-reservation" class="submit-reservation" disabled>
            Valider la Réservation
        </button>
    </aside>

</div>

<div id="confirmation-display" style="display:none;">
    <h2>Réservation Enregistrée !</h2>
    <p>Votre demande a bien été prise en compte.</p>

    <div class="confirmation-recap" id="final-recap">
    </div>

    <div class="confirmation-message">
        <p><strong>Rappel :</strong> Aucun paiement en ligne. Veuillez régler vos billets au guichet.</p>
    </div>

    <a href="{{ route('index') }}" class="btn-hero" style="margin-top:20px; display:inline-block; background-color:#991917; color:white; padding:10px 20px; border-radius:30px; text-decoration:none;">Retour à l'accueil</a>
</div>

<script src="{{ asset('js/reservation.js') }}"></script>
</body>
</html>
