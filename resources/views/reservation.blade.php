<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - CineForAll</title>
    <link rel="stylesheet" href="reservation.css">
</head>
<body>

<div class="reservation-page-container">

    <div class="form-area">
        <h1>Réservation de Billets</h1>
        <form id="reservation-form">

            <div class="step-section">
                <h3>1. Choisir le Film et la Séance</h3>

                <div class="form-group">
                    <label>Sélectionnez votre Film (Cliquez sur l'affiche) :</label>
                    <div class="film-selection-grid" id="film-select-grid">
                        <div class="film-card-select" data-id="Dune2" data-film-title="Dune: Deuxième Partie">
                            <img src="img/film1.jpeg" alt="Dune: Deuxième Partie">
                            <h4>Dune: Deuxième Partie</h4>
                        </div>
                        <div class="film-card-select" data-id="Oppenheimer" data-film-title="Oppenheimer">
                            <img src="img/film2.jpg" alt="Oppenheimer">
                            <h4>Oppenheimer</h4>
                        </div>
                        <div class="film-card-select" data-id="Barbie" data-film-title="Barbie">
                            <img src="img/film3.jpeg" alt="Barbie">
                            <h4>Barbie</h4>
                        </div>
                    </div>
                    <input type="hidden" id="selected-film" name="film" required>
                </div>

                <div class="form-group">
                    <label for="seance-date-time">Date et Heure de la Séance:</label>
                    <input type="datetime-local" id="seance-date-time" name="seance" required>
                </div>
            </div>

            <div class="step-section">
                <h3>2. Choisir le Nombre de Places</h3>
                <p>Prix Adultes/Enfants/Étudiants simulés.</p>
                <div class="form-group">
                    <label class="label-ticket" for="tickets-adult">Adultes (12.00 $):</label>
                    <input type="number" id="tickets-adult" name="adultes" value="0" min="0" data-price="12.00">
                </div>
                <div class="form-group">
                    <label class="label-ticket" for="tickets-child">Enfants (8.00 $):</label>
                    <input type="number" id="tickets-child" name="enfants" value="0" min="0" data-price="8.00">
                </div>
                <div class="form-group">
                    <label class="label-ticket" for="tickets-student">Étudiants (10.00 $):</label>
                    <input type="number" id="tickets-student" name="etudiants" value="0" min="0" data-price="10.00">
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
                            <div class="seat available" data-id="A1" data-price="12.00">1</div>
                            <div class="seat available" data-id="A2" data-price="12.00">2</div>
                            <div class="seat booked" data-id="A3">3</div>
                            <div class="seat booked" data-id="A4">4</div>
                            <div class="seat available" data-id="A5" data-price="12.00">5</div>
                        </div>

                        <div class="row" data-row="B">
                            <span class="row-label">B</span>
                            <div class="seat available" data-id="B1" data-price="12.00">1</div>
                            <div class="seat available" data-id="B2" data-price="12.00">2</div>
                            <div class="seat available" data-id="B3" data-price="12.00">3</div>
                            <div class="seat available" data-id="B4" data-price="12.00">4</div>
                            <div class="seat available" data-id="B5" data-price="12.00">5</div>
                        </div>

                        <div class="row premium-row" data-row="C">
                            <span class="row-label">C (Premium)</span>
                            <div class="seat available premium" data-id="C1" data-price="15.00">1</div>
                            <div class="seat available premium" data-id="C2" data-price="15.00">2</div>
                            <div class="seat available premium" data-id="C3" data-price="15.00">3</div>
                            <div class="seat booked premium" data-id="C4">4</div>
                            <div class="seat available premium" data-id="C5" data-price="15.00">5</div>
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
                <p>Ces informations seront utilisées pour retrouver votre réservation au guichet.</p>
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

            <button type="submit" id="submit-reservation" class="submit-reservation" disabled>
                Confirmer la Réservation (0 Ticket)
            </button>

        </form>
    </div>

    <aside class="summary-panel">
        <h2>Récapitulatif de Réservation</h2>

        <div class="summary-details">
            <p><strong>Film:</strong> <span id="summary-film">Non sélectionné</span></p>
            <p><strong>Séance:</strong> <span id="summary-seance">Non sélectionnée</span></p>
            <hr>
            <p>Places Sélectionnées:</p>
            <ul id="selected-seats-list">
                <li id="no-seats-selected">Aucun siège sélectionné.</li>
            </ul>
        </div>

        <div class="total-breakdown">
            <p>Total Sièges: <span id="total-seats-price">$0.00</span></p>
            <p>Frais de Service: <span id="booking-fee">$1.00</span></p>
            <hr>
            <p class="grand-total">Total à Payer: <span><span id="grand-total-amount">$1.00</span></span></p>
        </div>

        <p style="font-size: 0.9em; margin-top: 15px; color: gray;">
            (Le montant total inclut les frais de service de 1.00 $.)
        </p>
    </aside>

</div>

<div id="confirmation-display" style="display:none;">
    <h2>Réservation Confirmée !</h2>
    <p>Merci pour votre réservation. Voici les détails de votre commande :</p>

    <div class="confirmation-recap" id="final-recap">
    </div>

    <div class="confirmation-message">
        <p><strong>ATTENTION:</strong> Cette plateforme n'inclut pas de fonctionnalité de paiement en ligne.</p>
        <p>Votre réservation est en attente de paiement.</p>
    </div>

    <p class="confirmation-message-retrait">
        Veuillez vous présenter au guichet du cinéma **au moins 30 minutes avant la séance** pour régler et retirer vos billets.
    </p>

</div>

<script src="reservation.js"></script>
</body>
</html>
