document.addEventListener('DOMContentLoaded', function() {

    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const dots = document.querySelectorAll('.dot');

    let currentSlide = 0;
    const slideInterval = 5000; // Changement toutes les 5 secondes
    let autoPlay;

    // Fonction pour afficher une slide spécifique
    function showSlide(index) {
        // Enlever la classe active de tout le monde
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        // Gérer le dépassement d'index (boucle)
        if (index >= slides.length) {
            currentSlide = 0;
        } else if (index < 0) {
            currentSlide = slides.length - 1;
        } else {
            currentSlide = index;
        }

        // Ajouter la classe active à la nouvelle slide
        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }

    // Fonction pour passer à la suivante
    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    // Fonction pour passer à la précédente
    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    // --- Événements ---

    // Clic sur bouton Suivant
    if(nextBtn) {
        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetTimer(); // On redémarre le chrono si l'utilisateur clique
        });
    }

    // Clic sur bouton Précédent
    if(prevBtn) {
        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetTimer();
        });
    }

    // Clic sur les points (dots)
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            resetTimer();
        });
    });

    // --- Auto Play ---
    function startTimer() {
        autoPlay = setInterval(nextSlide, slideInterval);
    }

    function resetTimer() {
        clearInterval(autoPlay);
        startTimer();
    }

    // Démarrer le carrousel
    if(slides.length > 0) {
        startTimer();
    }
});
