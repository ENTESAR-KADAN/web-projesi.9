document.addEventListener("DOMContentLoaded", function() {
    const sliderWrapper = document.querySelector('.slider-wrapper');
    const slides = document.querySelectorAll('.slider-wrapper .slide');
    let slideIndex = 0;

    function updateSlider() {
        const slideWidth = slides[0].offsetWidth; // Dynamically calculate slide width
        sliderWrapper.style.transition = 'transform 0.5s ease-in-out';
        sliderWrapper.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
    }

    function nextSlide() {
        slideIndex++;
        if (slideIndex >= slides.length) {
            slideIndex = 0;
        }
        updateSlider();
    }

    setInterval(nextSlide, 3000);
});