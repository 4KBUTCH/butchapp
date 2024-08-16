let currentSlide = 0;
let autoSlideInterval;

function showSlide(index) {
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    if (index >= totalSlides) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = totalSlides - 1;
    } else {
        currentSlide = index;
    }

    const slideWidth = slides[currentSlide].clientWidth;
    const slidesContainer = document.querySelector('.slides');

    slidesContainer.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
}

function plusSlides(n) {
    showSlide(currentSlide + n);
}

function startAutoSlide() {
    autoSlideInterval = setInterval(() => {
        plusSlides(1);
    }, 12000); // 12 segundos
}

function stopAutoSlide() {
    clearInterval(autoSlideInterval);
}

// Inicializar slider
showSlide(currentSlide);
startAutoSlide();

// Manejo de eventos para botones de navegación
document.querySelector('.prev').addEventListener('click', () => {
    plusSlides(-1);
    stopAutoSlide();
    startAutoSlide();
});

document.querySelector('.next').addEventListener('click', () => {
    plusSlides(1);
    stopAutoSlide();
    startAutoSlide();
});

// Hacer el slider responsive
window.addEventListener('resize', () => showSlide(currentSlide));
