let slideIndex = 0;

function showSlides(n) {
    let slides = document.querySelectorAll('.slide');
    let totalSlides = slides.length;
    let maxIndex = totalSlides - 3; // Ajuste para el último set de 3 slides

    if (n > maxIndex) {
        slideIndex = 0;
    } else if (n < 0) {
        slideIndex = maxIndex;
    } else {
        slideIndex = n;
    }

    let offset = -(slideIndex * 33.33); // Mueve la posición de las slides
    document.querySelector('.slides').style.transform = `translateX(${offset}%)`;
}

function plusSlides(n) {
    showSlides(slideIndex + n);
}

// Función para mover automáticamente las slides
function autoSlide() {
    plusSlides(1);
}

// Configuración inicial
document.addEventListener('DOMContentLoaded', function () {
    showSlides(slideIndex);
    // Configura el temporizador para cambiar las slides cada 15 segundos
    setInterval(autoSlide, 12800);
});
