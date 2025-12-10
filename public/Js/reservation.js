document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('reservation-form');
    const filmGrid = document.getElementById('film-select-grid');
    const seatMap = document.getElementById('seat-map-grid');

    // Champs de quantité
    const ticketsAdult = document.getElementById('tickets-adult');
    const ticketsChild = document.getElementById('tickets-child');
    const ticketsStudent = document.getElementById('tickets-student');

    // Éléments du résumé
    const summaryFilm = document.getElementById('summary-film');
    const summarySeance = document.getElementById('summary-seance');
    const summarySeatsList = document.getElementById('selected-seats-list');
    const totalCountSpan = document.getElementById('total-count');
    const checkoutButton = document.getElementById('submit-reservation');

    // Éléments de confirmation
    const finalRecap = document.getElementById('final-recap');
    const confirmationDisplay = document.getElementById('confirmation-display');
    const pageContainer = document.querySelector('.reservation-page-container');

    let selectedSeats = [];
    let selectedTicketCounts = {
        'Adultes': 0,
        'Enfants': 0,
        'Étudiants': 0
    };

    // 1. SÉLECTION DU FILM
    filmGrid.addEventListener('click', (e) => {
        const card = e.target.closest('.film-card-select');
        if (card) {
            document.querySelectorAll('.film-card-select').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            document.getElementById('selected-film').value = card.dataset.id;
            summaryFilm.textContent = card.dataset.filmTitle;
            updateButtonState();
        }
    });

    // 2. SÉLECTION DE LA SÉANCE
    document.getElementById('seance-date-time').addEventListener('change', (e) => {
        const dateValue = e.target.value;
        if (dateValue) {
            const date = new Date(dateValue);
            const options = { weekday: 'long', day: 'numeric', month: 'long', hour: '2-digit', minute: '2-digit' };
            summarySeance.textContent = date.toLocaleDateString('fr-FR', options);
        } else {
            summarySeance.textContent = 'Non sélectionnée';
        }
        updateButtonState();
    });

    // 3. SÉLECTION DES SIÈGES
    seatMap.addEventListener('click', (e) => {
        const seat = e.target.closest('.seat');
        // On vérifie que c'est un siège et qu'il est disponible
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
            updateSummary();
        }
    });

    // 4. COMPTAGE DES PERSONNES
    [ticketsAdult, ticketsChild, ticketsStudent].forEach(input => {
        input.addEventListener('change', updateTicketCounts);
        input.addEventListener('input', updateTicketCounts);
    });

    function updateTicketCounts(e) {
        const input = e.target;
        const labelText = input.previousElementSibling.textContent; // ex: "Adultes :"
        const type = labelText.replace(':', '').trim();

        selectedTicketCounts[type] = parseInt(input.value) || 0;
        updateSummary();
    }

    // MISE A JOUR DE L'AFFICHAGE (Sans prix)
    function updateSummary() {
        // Liste des sièges
        summarySeatsList.innerHTML = '';
        if (selectedSeats.length === 0) {
            summarySeatsList.innerHTML = '<li id="no-seats-selected">Aucun siège.</li>';
        } else {
            selectedSeats.forEach(seatId => {
                const li = document.createElement('li');
                li.textContent = `Siège ${seatId}`;
                summarySeatsList.appendChild(li);
            });
        }

        // Total des places (Sièges sélectionnés)
        // On pourrait aussi additionner les inputs (Adultes+Enfants),
        // ici je base le total sur le nombre de sièges cliqués pour la cohérence visuelle.
        totalCountSpan.textContent = selectedSeats.length;

        updateButtonState();
    }

    function updateButtonState() {
        const filmSelected = document.getElementById('selected-film').value !== '';
        const seanceSelected = document.getElementById('seance-date-time').value !== '';
        const seatsSelected = selectedSeats.length > 0;

        // Le bouton est activé seulement si tout est choisi
        checkoutButton.disabled = !(filmSelected && seanceSelected && seatsSelected);
    }

    // SOUMISSION DU FORMULAIRE
    form.addEventListener('submit', (e) => {
        e.preventDefault(); // Empêche le rechargement standard pour la démo

        if (selectedSeats.length === 0) {
            alert("Veuillez sélectionner au moins un siège.");
            return;
        }

        // Récupération des données pour l'affichage final
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        const filmTitle = document.querySelector('.film-card-select.selected')?.dataset.filmTitle || "Film Inconnu";

        let detailsPersonnes = [];
        if (selectedTicketCounts['Adultes'] > 0) detailsPersonnes.push(`${selectedTicketCounts['Adultes']} Adulte(s)`);
        if (selectedTicketCounts['Enfants'] > 0) detailsPersonnes.push(`${selectedTicketCounts['Enfants']} Enfant(s)`);
        if (selectedTicketCounts['Étudiants'] > 0) detailsPersonnes.push(`${selectedTicketCounts['Étudiants']} Étudiant(s)`);

        const detailsText = detailsPersonnes.length > 0 ? detailsPersonnes.join(', ') : "Standard";

        // Création du résumé HTML
        let htmlRecap = `
            <p><strong>Film :</strong> ${filmTitle}</p>
            <p><strong>Séance :</strong> ${summarySeance.textContent}</p>
            <p><strong>Réservé par :</strong> ${data.prenom} ${data.nom}</p>
            <hr>
            <p><strong>Sièges (${selectedSeats.length}) :</strong> ${selectedSeats.join(', ')}</p>
            <p><strong>Détail :</strong> ${detailsText}</p>
        `;

        finalRecap.innerHTML = htmlRecap;

        // Bascule de l'affichage
        pageContainer.style.display = 'none';
        confirmationDisplay.style.display = 'block';
        window.scrollTo(0, 0);
    });
});
