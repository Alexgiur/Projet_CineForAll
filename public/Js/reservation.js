document.addEventListener('DOMContentLoaded', () => {
    // Récupération des éléments du DOM
    const form = document.getElementById('reservation-form');
    const filmGrid = document.getElementById('film-select-grid');
    const seatMap = document.getElementById('seat-map-grid');

    const summaryFilm = document.getElementById('summary-film');
    const summarySeance = document.getElementById('summary-seance');
    const summarySeatsList = document.getElementById('selected-seats-list');
    const totalCountSpan = document.getElementById('total-count');
    const checkoutButton = document.getElementById('submit-reservation');

    const finalRecap = document.getElementById('final-recap');
    const confirmationDisplay = document.getElementById('confirmation-display');
    const pageContainer = document.querySelector('.reservation-page-container');

    // Variables d'état
    let selectedSeats = [];
    let selectedTicketCounts = {
        'Adultes': 0,
        'Enfants': 0,
        'Étudiants': 0
    };

    // --- 1. GESTION DU CLIC SUR UN FILM ---
    filmGrid.addEventListener('click', (e) => {
        const card = e.target.closest('.film-card-select');
        if (card) {
            // Gestion de la classe visuelle 'selected'
            document.querySelectorAll('.film-card-select').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');

            // Mise à jour de l'input caché et du résumé
            document.getElementById('selected-film').value = card.dataset.id;
            summaryFilm.textContent = card.dataset.filmTitle;

            checkFormValidity();
        }
    });

    // --- 2. GESTION DE LA DATE/HEURE ---
    document.getElementById('seance-date-time').addEventListener('change', (e) => {
        const dateValue = e.target.value;
        if (dateValue) {
            const date = new Date(dateValue);
            // Formatage propre de la date en français
            const options = { weekday: 'long', day: 'numeric', month: 'long', hour: '2-digit', minute: '2-digit' };
            summarySeance.textContent = date.toLocaleDateString('fr-FR', options);
        } else {
            summarySeance.textContent = 'Non sélectionnée';
        }
        checkFormValidity();
    });

    // --- 3. GESTION DES SIÈGES ---
    seatMap.addEventListener('click', (e) => {
        const seat = e.target.closest('.seat');
        // On ne réagit que si c'est un siège disponible
        if (seat && seat.classList.contains('available')) {
            const seatId = seat.dataset.id;

            if (seat.classList.contains('selected')) {
                // Si déjà sélectionné -> On désélectionne
                seat.classList.remove('selected');
                selectedSeats = selectedSeats.filter(s => s !== seatId);
            } else {
                // Sinon -> On sélectionne
                seat.classList.add('selected');
                selectedSeats.push(seatId);
            }
            updateSummaryDisplay();
        }
    });

    // --- 4. GESTION DES COMPTEURS (Adultes/Enfants...) ---
    // On écoute les changements sur les inputs de type number
    const ticketInputs = document.querySelectorAll('input[type="number"]');
    ticketInputs.forEach(input => {
        input.addEventListener('change', (e) => {
            // On récupère le nom du type (ex: "Adultes") depuis le label précédent
            const labelText = input.previousElementSibling.textContent.replace(' :', '').trim();
            selectedTicketCounts[labelText] = parseInt(input.value) || 0;
            // (Optionnel) Ici on pourrait forcer la cohérence entre le nombre de billets et de sièges
        });
    });

    // --- FONCTIONS UTILITAIRES ---

    function updateSummaryDisplay() {
        // Mise à jour de la liste visuelle des sièges
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
        // Mise à jour du total
        totalCountSpan.textContent = selectedSeats.length;
        checkFormValidity();
    }

    function checkFormValidity() {
        const filmSelected = document.getElementById('selected-film').value !== '';
        const seanceSelected = document.getElementById('seance-date-time').value !== '';
        const seatsSelected = selectedSeats.length > 0;

        // Active le bouton seulement si tout est rempli
        checkoutButton.disabled = !(filmSelected && seanceSelected && seatsSelected);
    }

    // --- SOUMISSION DU FORMULAIRE ---
    form.addEventListener('submit', (e) => {
        e.preventDefault(); // On bloque l'envoi réel pour rester sur la page (Démo)

        if (selectedSeats.length === 0) {
            alert("Veuillez sélectionner au moins un siège.");
            return;
        }

        // On récupère les infos pour l'affichage final
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        const filmTitle = document.querySelector('.film-card-select.selected')?.dataset.filmTitle || "Film";

        // Construction du texte de détail (ex: "2 Adultes, 1 Enfant")
        let details = [];
        for (const [type, count] of Object.entries(selectedTicketCounts)) {
            if (count > 0) details.push(`${count} ${type}`);
        }
        const detailsStr = details.length > 0 ? details.join(', ') : "Standard";

        // Injection du HTML dans la zone de confirmation
        let recapHTML = `
            <p><strong>Film :</strong> ${filmTitle}</p>
            <p><strong>Séance :</strong> ${summarySeance.textContent}</p>
            <p><strong>Nom :</strong> ${data.nom} ${data.prenom}</p>
            <hr>
            <p><strong>Sièges (${selectedSeats.length}) :</strong> ${selectedSeats.join(', ')}</p>
            <p><strong>Détail :</strong> ${detailsStr}</p>
        `;

        finalRecap.innerHTML = recapHTML;

        // Bascule : On cache le formulaire, on affiche la confirmation
        pageContainer.style.display = 'none';
        confirmationDisplay.style.display = 'block';

        // On remonte en haut de page
        window.scrollTo(0, 0);
    });
});
