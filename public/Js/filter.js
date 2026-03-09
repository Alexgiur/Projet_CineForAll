function filterFilms() {

    // On récupère ce que l'utilisateur a tapé dans la barre de recherche
    let recherche = document.getElementById('searchInput').value.toLowerCase();

    // On récupère toutes les cartes de films
    let films = document.querySelectorAll('.film-card');

    // On regarde chaque film un par un
    for (let i = 0; i < films.length; i++) {

        // On récupère le titre du film (en minuscules pour comparer)
        let titre = films[i].getAttribute('data-title');

        // Si le titre contient ce que l'utilisateur a tapé, on montre la carte
        if (titre.includes(recherche)) {
            films[i].style.display = 'block';
        } else {
            // Sinon on la cache
            films[i].style.display = 'none';
        }
    }
}
