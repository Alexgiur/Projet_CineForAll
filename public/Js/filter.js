document.addEventListener('DOMContentLoaded', function () {

    // Éléments principaux
    const searchInput = document.getElementById('searchInput');
    const filterBtns = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.film-card');

    // Éléments de la Modale
    const modal = document.getElementById('globalModal');
    const closeBtn = document.querySelector('.close-btn');
    const modalImg = document.getElementById('modalImg');
    const modalTitle = document.getElementById('modalTitle');
    const modalGenre = document.getElementById('modalGenre');
    const modalDesc = document.getElementById('modalDesc');
    const modalDate = document.getElementById('modalDate');
    const modalDuration = document.getElementById('modalDuration');
    const modalRating = document.getElementById('modalRating');
    const modalDirector = document.getElementById('modalDirector');
    const modalWriter = document.getElementById('modalWriter');
    const modalActors = document.getElementById('modalActors');

    // 1. RECHERCHE
    if (searchInput) {
        searchInput.addEventListener('keyup', function (e) {
            const searchText = e.target.value.toLowerCase();

            cards.forEach(card => {
                // On cherche le titre dans le <h3> de la carte
                const titleElement = card.querySelector('h3');
                const title = titleElement ? titleElement.textContent.toLowerCase() : '';

                if (title.includes(searchText)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }

    // 2. FILTRES
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');

            cards.forEach(card => {
                // Si 'all', on montre tout, sinon on compare la catégorie
                if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                    card.style.display = 'block';
                    // Animation
                    card.style.animation = 'none';
                    card.offsetHeight;
                    card.style.animation = 'fadeIn 0.5s ease-in-out';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // 3. MODALE (POP-UP)
    const triggers = document.querySelectorAll('.film-trigger');
    triggers.forEach(trigger => {
        trigger.addEventListener('click', function () {
            modalImg.src = this.src;
            modalTitle.textContent = this.getAttribute('data-title');
            modalGenre.textContent = "Genre : " + this.getAttribute('data-genre');
            modalDesc.textContent = this.getAttribute('data-synopsis');

            modalDate.textContent = this.getAttribute('data-release');
            modalDuration.textContent = this.getAttribute('data-duration');
            modalRating.textContent = this.getAttribute('data-rating');
            modalDirector.textContent = this.getAttribute('data-director');
            modalWriter.textContent = this.getAttribute('data-writer');
            modalActors.textContent = this.getAttribute('data-actors');

            modal.classList.add('active');
        });
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            modal.classList.remove('active');
        });
    }

    window.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
    });
});

/* --- public/Js/countdown.js --- */

document.addEventListener('DOMContentLoaded', function() {
    // Date de lancement (Exemple: dans 10 jours à partir de maintenant)
    const launchDate = new Date();
    launchDate.setDate(launchDate.getDate() + 10);

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = launchDate - now;

        // Calculs du temps
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Affichage dans les éléments HTML
        // On vérifie que les éléments existent pour éviter les erreurs
        if(document.getElementById("days")) {
            document.getElementById("days").innerText = days < 10 ? "0" + days : days;
            document.getElementById("hours").innerText = hours < 10 ? "0" + hours : hours;
            document.getElementById("minutes").innerText = minutes < 10 ? "0" + minutes : minutes;
            document.getElementById("seconds").innerText = seconds < 10 ? "0" + seconds : seconds;
        }
    }

    // Mise à jour chaque seconde
    setInterval(updateCountdown, 1000);
    // Appel initial immédiat
    updateCountdown();
});
