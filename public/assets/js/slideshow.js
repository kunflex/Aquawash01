// This is a simple JavaScript code to initiate your slideshow
const slider = document.getElementById("slider");
const slideItems = document.querySelectorAll(".slider-content__item");

let currentSlide = 0;

function nextSlide() {
    currentSlide = (currentSlide + 1) % slideItems.length;
    updateSlider();
}

function updateSlider() {
    const translateValue = -currentSlide * 100;
    slider.style.transform = `translateX(${translateValue}%)`;
}

// You can use setInterval to automatically advance the slides every few seconds
setInterval(nextSlide, 5000);

// If you want to add navigation buttons to manually control the slideshow, you can do so as well.
