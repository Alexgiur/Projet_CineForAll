document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('reservation-form');
    const filmGrid = document.getElementById('film-select-grid');
    const seatMap = document.getElementById('seat-map-grid');
    const ticketsAdult = document.getElementById('tickets-adult');
    const ticketsChild = document.getElementById('tickets-child');
    const ticketsStudent = document.getElementById('tickets-student');

    const summaryFilm = document.getElementById('summary-film');
    const summarySeance = document.getElementById('summary-seance');
    const summarySeatsList = document.getElementById('selected-seats-list');
    const totalSeatsPrice = document.getElementById('total-seats-price');
    const grandTotalAmount = document.getElementById('grand-total-amount');
    const checkoutButton = document.getElementById('submit-reservation');
    const finalRecap = document.getElementById('final-recap');

    const BOOKING_FEE = 1.00;
    let selectedSeats = [];
    let selectedTicketCounts = {
        'Adultes': 0,
        'Enfants': 0,
        'Étudiants': 0
    };

    // Fonction de formatage monétaire
    const formatCurrency = (amount) => `$${(Math.round(amount * 100) / 100).toFixed(2)}`;

    // ===================================
    // LOGIQUE DE SÉLECTION DE FILM ET SÉANCE
    // ===================================
    filmGrid.addEventListener('click', (e) => {
        const card = e.target.closest('.film-card-select');
        if (card) {
            document.querySelectorAll('.film-card-select').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            document.getElementById('selected-film').value = card.dataset.id;
            summaryFilm.textContent = card.dataset.filmTitle;
            updateSubmitButtonState();
        }
    });

    document.getElementById('seance-date-time').addEventListener('change', (e) => {
        const dateValue = e.target.value;
        if (dateValue) {
            const date = new Date(dateValue);
            const options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            summarySeance.textContent = date.toLocaleDateString('fr-FR', options);
        } else {
            summarySeance.textContent = 'Non sélectionnée';
        }
        updateSubmitButtonState();
    });


    // ===================================
    // LOGIQUE DES SIÈGES ET DU TOTAL
    // ===================================

    // 1. Logique de sélection des sièges
    seatMap.addEventListener('click', (e) => {
        const seat = e.target.closest('.seat');
        if (seat && seat.classList.contains('available')) {
            const seatId = seat.dataset.id;

            if (seat.classList.contains('selected')) {
                // Désélectionner
                seat.classList.remove('selected');
                selectedSeats = selectedSeats.filter(s => s !== seatId);
            } else {
                // Sélectionner
                seat.classList.add('selected');
                selectedSeats.push(seatId);
            }
            updateSummaryAndTotal();
        }
    });

    // 2. Logique des types de billets (écoute les changements)
    [ticketsAdult, ticketsChild, ticketsStudent].forEach(input => {
        input.addEventListener('change', updateTicketCounts);
        input.addEventListener('input', updateTicketCounts);
    });

    function updateTicketCounts(e) {
        const input = e.target;
        // Extraction du type de billet depuis le label (ex: "Adultes (12.00 $):")
        const labelText = input.previousElementSibling.textContent;
        const type = labelText.split('(')[0].trim();

        selectedTicketCounts[type] = parseInt(input.value) || 0;

        // Bien que l'application utilise le prix du siège, nous gardons la trace
        // du nombre de billets pour le récapitulatif final.
        updateSummaryAndTotal();
    }

    // 3. Fonction principale de mise à jour du récapitulatif et du total
    function updateSummaryAndTotal() {
        // Mise à jour de la liste des sièges
        summarySeatsList.innerHTML = '';
        if (selectedSeats.length === 0) {
            summarySeatsList.innerHTML = '<li id="no-seats-selected">Aucun siège sélectionné.</li>';
        } else {
            selectedSeats.forEach(seatId => {
                const seatElement = document.querySelector(`.seat[data-id="${seatId}"]`);
                // Le prix du siège est utilisé pour le calcul du total
                const price = parseFloat(seatElement.dataset.price);
                let label = 'Siège Standard';
                if (seatElement.classList.contains('premium')) label = 'Siège Premium';

                const li = document.createElement('li');
                li.textContent = `${seatId} (${label} - ${formatCurrency(price)})`;
                summarySeatsList.appendChild(li);
            });
        }

        // Calcul du Total
        let subtotal = selectedSeats.reduce((sum, seatId) => {
            const seatElement = document.querySelector(`.seat[data-id="${seatId}"]`);
            return sum + parseFloat(seatElement.dataset.price);
        }, 0);

        const grandTotal = subtotal + BOOKING_FEE;

        totalSeatsPrice.textContent = formatCurrency(subtotal);
        grandTotalAmount.textContent = formatCurrency(grandTotal);

        // Mise à jour du bouton de confirmation et de son état
        checkoutButton.textContent = `Confirmer la Réservation (${selectedSeats.length} Tickets)`;
        updateSubmitButtonState();
    }

    // Fonction pour activer/désactiver le bouton de soumission
    function updateSubmitButtonState() {
        const filmSelected = document.getElementById('selected-film').value !== '';
        const seanceSelected = document.getElementById('seance-date-time').value !== '';
        const seatsSelected = selectedSeats.length > 0;

        checkoutButton.disabled = !(filmSelected && seanceSelected && seatsSelected);
    }

    // Initialisation
    updateSummaryAndTotal();

    // ===================================
    // LOGIQUE DE SOUMISSION DU FORMULAIRE
    // ===================================
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        if (selectedSeats.length === 0) {
            alert("Veuillez sélectionner au moins un siège.");
            return;
        }

        // Collecte des données
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        // Préparation du récapitulatif final
        const filmTitle = document.querySelector('.film-card-select.selected')?.dataset.filmTitle || data.film;
        const seanceDate = new Date(data.seance).toLocaleDateString('fr-FR', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' });

        let ticketDetails = [];
        let totalTickets = 0;

        // On utilise les comptes de billets pour le détail, mais le nombre de sièges pour le total si les champs sont à 0.
        if (selectedTicketCounts['Adultes'] > 0) { ticketDetails.push(`${selectedTicketCounts['Adultes']} place(s) Adulte`); totalTickets += selectedTicketCounts['Adultes']; }
        if (selectedTicketCounts['Enfants'] > 0) { ticketDetails.push(`${selectedTicketCounts['Enfants']} place(s) Enfant`); totalTickets += selectedTicketCounts['Enfants']; }
        if (selectedTicketCounts['Étudiants'] > 0) { ticketDetails.push(`${selectedTicketCounts['Étudiants']} place(s) Étudiant`); totalTickets += selectedTicketCounts['Étudiants']; }

        // S'assurer que le total de tickets correspond au nombre de sièges pour la cohérence
        totalTickets = selectedSeats.length;
        if(ticketDetails.length === 0) {
            ticketDetails.push(`${totalTickets} place(s) - Détail à préciser au guichet`);
        }

        // Récupérer le montant total final affiché
        const finalTotal = grandTotalAmount.textContent;

        let htmlRecap = `
            <p><strong>Film :</strong> ${filmTitle}</p>
            <p><strong>Séance :</strong> ${seanceDate} (Salle/Écran à confirmer au guichet)</p>
            <p><strong>Total Places :</strong> ${totalTickets}</p>
            <p><strong>Détail des places :</strong> ${ticketDetails.join(', ')}</p>
            <p><strong>Siège(s) réservé(s) :</strong> ${selectedSeats.join(', ')}</p>
            <p><strong>Réservé par :</strong> ${data.prenom} ${data.nom} (${data.email})</p>
            <hr>
            <p><strong>Montant à régler au guichet :</strong> <span class="grand-total">${finalTotal}</span></p>
        `;

        finalRecap.innerHTML = htmlRecap;

        // Afficher la page de confirmation et masquer le formulaire
        document.querySelector('.reservation-page-container').style.display = 'none';
        document.getElementById('confirmation-display').style.display = 'block';
        window.scrollTo(0, 0);
    });
});
