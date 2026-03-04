const slides = document.querySelectorAll('.slide-move__item');
const slideUp = document.querySelector('.slide-up');
const slideBack = document.querySelector('.slide-back');
const slide = document.querySelector('.slide');

let current = 0;
let timer;

const total = slides.length;

// Show slide
function showSlide(index, direction = 'next') {

    // Remove active cũ
    slides[current].classList.remove('active');

    // Set animation
    if (direction === 'next') {
        slides[index].style.animation = 'Slider 0.3s linear';
    } else {
        slides[index].style.animation = 'SliderTT 0.3s linear';
    }

    // Add active mới
    slides[index].classList.add('active');

    current = index;
}

// Next
function nextSlide() {
    let next = current + 1;

    if (next >= total) next = 0;

    showSlide(next, 'next');
}

// Prev
function prevSlide() {
    let prev = current - 1;

    if (prev < 0) prev = total - 1;

    showSlide(prev, 'back');
}

// Auto
function start() {
    timer = setInterval(nextSlide, 6000);
}

function stop() {
    clearInterval(timer);
}

// Click
slideUp.onclick = () => {
    nextSlide();
    stop();
    start();
};

slideBack.onclick = () => {
    prevSlide();
    stop();
    start();
};

// Hover pause
slide.addEventListener('mouseenter', stop);
slide.addEventListener('mouseleave', start);

// Start
start();
