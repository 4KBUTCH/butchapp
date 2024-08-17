let slideIndex = 0;

function showSlides(n) {
    let slides = document.querySelectorAll('.slide');
    let totalSlides = slides.length;

    // Verifica si el ancho de la pantalla es 768px o menor
    let isSmallScreen = window.matchMedia('(max-width: 768px)').matches;

    // Ajusta maxIndex según el tamaño de la pantalla
    let maxIndex = isSmallScreen ? totalSlides - 1 : totalSlides - 3;

    if (n > maxIndex) {
        slideIndex = 0;
    } else if (n < 0) {
        slideIndex = maxIndex;
    } else {
        slideIndex = n;
    }

    // Cambia el cálculo del offset según el tamaño de la pantalla
    let offset = isSmallScreen ? -(slideIndex * 100) : -(slideIndex * 33.33);
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
