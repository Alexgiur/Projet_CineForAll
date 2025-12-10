document.addEventListener('DOMContentLoaded', () => {

    // --- PARTIE 1 : VOS FILTRES EXISTANTS (Je les garde) ---
    const filterButtons = document.querySelectorAll('.filter-btn');
    const filmCards = document.querySelectorAll('.film-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            const filterValue = button.getAttribute('data-filter');

            filmCards.forEach(card => {
                const category = card.getAttribute('data-category');
                if (filterValue === 'all' || filterValue === category) {
                    card.style.display = 'block';
                    card.style.animation = 'none';
                    card.offsetHeight; /* trigger reflow */
                    card.style.animation = 'fadeIn 0.5s ease-in-out';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // --- PARTIE 2 : LE POP-UP FLUIDE (NOUVEAU) ---

    const modal = document.getElementById('globalModal');
    const closeBtn = document.querySelector('.close-btn');

    // Éléments à remplir dans le modal
    const mImg = document.getElementById('modalImg');
    const mTitle = document.getElementById('modalTitle');
    const mGenre = document.getElementById('modalGenre');
    const mDesc = document.getElementById('modalDesc');

    // On sélectionne toutes les images qui ont la classe 'film-trigger'
    // (Pensez à ajouter class="film-trigger" sur vos images de films)
    const triggers = document.querySelectorAll('.film-card img');

    triggers.forEach(img => {
        img.style.cursor = "pointer"; // Change le curseur en main

        img.addEventListener('click', (e) => {
            // 1. Récupération des données
            // Si l'attribut data existe, on le prend, sinon on cherche dans le HTML parent
            const src = img.src;
            const title = img.getAttribute('data-title') || img.parentElement.querySelector('h3').innerText;
            const genre = img.getAttribute('data-genre') || img.parentElement.querySelector('p').innerText;

            // Texte par défaut si pas de synopsis
            const synopsis = img.getAttribute('data-synopsis') || "Aucun résumé disponible pour ce film actuellement.";

            // 2. Remplissage du modal
            mImg.src = src;
            mTitle.innerText = title;
            mGenre.innerText = genre;
            mDesc.innerText = synopsis;

            // 3. Affichage fluide (ajout de la classe CSS)
            modal.classList.add('active');
        });
    });

    // Fermeture avec la croix
    closeBtn.addEventListener('click', () => {
        modal.classList.remove('active');
    });

    // Fermeture en cliquant en dehors de la boîte
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {

    // --- 1. FILTRES (Code existant) ---
    const filterButtons = document.querySelectorAll('.filter-btn');
    const filmCards = document.querySelectorAll('.film-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            const filterValue = button.getAttribute('data-filter');

            filmCards.forEach(card => {
                const category = card.getAttribute('data-category');
                if (filterValue === 'all' || filterValue === category) {
                    card.style.display = 'block';
                    card.style.animation = 'none';
                    card.offsetHeight;
                    card.style.animation = 'fadeIn 0.5s ease-in-out';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });








    // --- 2. POP-UP DÉTAILLÉ SANS EMOJI ---
    const modal = document.getElementById('globalModal');
    const closeBtn = document.querySelector('.close-btn');

    // Éléments du modal à remplir
    const mImg = document.getElementById('modalImg');
    const mTitle = document.getElementById('modalTitle');
    const mGenre = document.getElementById('modalGenre');
    const mDesc = document.getElementById('modalDesc');

    // Nouveaux champs techniques
    const mDate = document.getElementById('modalDate');
    const mDuration = document.getElementById('modalDuration');
    const mRating = document.getElementById('modalRating');
    const mDirector = document.getElementById('modalDirector');
    const mWriter = document.getElementById('modalWriter');
    const mActors = document.getElementById('modalActors');

    const triggers = document.querySelectorAll('.film-trigger');

    triggers.forEach(img => {
        // Change le curseur pour montrer que c'est cliquable
        img.style.cursor = "pointer";

        img.addEventListener('click', () => {
            // Récupération des données depuis les attributs data-*
            mImg.src = img.src;
            mTitle.innerText = img.getAttribute('data-title');
            mGenre.innerText = img.getAttribute('data-genre');
            mDesc.innerText = img.getAttribute('data-synopsis');

            // Remplissage des nouvelles infos (avec valeurs par défaut si vide)
            mDate.innerText = img.getAttribute('data-release') || "Non communiqué";
            mDuration.innerText = img.getAttribute('data-duration') || "--";
            mRating.innerText = img.getAttribute('data-rating') || "N/A";
            mDirector.innerText = img.getAttribute('data-director') || "Non communiqué";
            mWriter.innerText = img.getAttribute('data-writer') || "Non communiqué";
            mActors.innerText = img.getAttribute('data-actors') || "Non communiqué";

            // Affichage du modal
            modal.classList.add('active');
        });
    });

    // Fermeture avec la croix
    closeBtn.addEventListener('click', () => {
        modal.classList.remove('active');
    });

    // Fermeture en cliquant en dehors de la boîte
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
    });
});


const modal = document.getElementById('personModal');

function openPersonModal() {
    modal.classList.add('active');
    modal.style.visibility = 'visible';
    modal.style.opacity = '1';
}

function closePersonModal() {
    modal.classList.remove('active');
    modal.style.visibility = 'hidden';
    modal.style.opacity = '0';
}

// Fermer si on clique dehors
window.onclick = function(event) {
    if (event.target == modal) {
        closePersonModal();
    }
}
// ============================================================
// FONCTIONNALITÉ DE RECHERCHE EN DIRECT
// ============================================================

// 1. Je sélectionne la barre de recherche HTML par son ID pour pouvoir l'écouter.
const searchInput = document.getElementById('searchInput');

// 2. Je sélectionne toutes les cartes de films présentes sur la page (div avec class="film-card").
// Cela crée une liste (NodeList) de tous vos films.
const allCards = document.querySelectorAll('.film-card');

// 3. J'ajoute un "écouteur d'événement" sur la barre de recherche.
// L'événement 'input' se déclenche à chaque fois que l'utilisateur tape ou efface une lettre.
searchInput.addEventListener('input', function(e) {

    // 4. Je récupère le texte écrit par l'utilisateur (la valeur de l'input).
    // .toLowerCase() sert à tout mettre en minuscules pour ignorer les majuscules (ex: "JOhn" devient "john").
    // .trim() sert à enlever les espaces inutiles au début et à la fin.
    const searchTerm = e.target.value.toLowerCase().trim();

    // 5. Je démarre une boucle pour analyser chaque carte de film, une par une.
    allCards.forEach(card => {

        // 6. Pour la carte en cours, je cherche la balise <h3> qui contient le titre du film.
        // .innerText permet de récupérer juste le texte (ex: "John Wick").
        // .toLowerCase() permet de mettre ce titre en minuscules pour la comparaison.
        const filmTitle = card.querySelector('h3').innerText.toLowerCase();

        // 7. Je vérifie si le titre du film contient (includes) le texte recherché.
        // Si le terme recherché est présent dans le titre, le résultat est "true", sinon "false".
        const isMatch = filmTitle.includes(searchTerm);

        // 8. Si c'est un match (correspondance trouvée)...
        if (isMatch) {
            // 9. J'affiche la carte en mettant son style display à 'block' (ou 'flex' selon votre CSS).
            card.style.display = 'block';

            // 10. J'ajoute une petite animation d'apparition pour rendre ça fluide (optionnel mais joli).
            card.style.animation = 'fadeIn 0.5s ease';
        } else {
            // 11. Sinon (si le titre ne correspond pas), je cache la carte.
            card.style.display = 'none';
        }
    });
});


