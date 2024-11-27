let currentIndex = 0;

const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const carouselContent = document.querySelector('.carousel-content');
const images = document.querySelectorAll('.carousel-content img');

// Function to update the carousel position
function updateCarousel() {
    const imageWidth = images[0].clientWidth + 20; // Width of one image plus margin
    const totalWidth = imageWidth * images.length; // Total width of all images
    const visibleWidth = imageWidth * 3; // Width of 3 images (visible area)

    const maxScroll = totalWidth - visibleWidth; // The maximum scroll value

    // Adjust index bounds
    if (currentIndex < 0) {
        currentIndex = 0;
    } else if (currentIndex > (images.length - 3)) {
        currentIndex = images.length - 3; // Show last 3 images
    }

    const offset = -(imageWidth * currentIndex);
    carouselContent.style.transform = `translateX(${offset}px)`;
}

// Previous Button Click
prevBtn.addEventListener('click', () => {
    currentIndex--;
    updateCarousel();
});

// Next Button Click
nextBtn.addEventListener('click', () => {
    currentIndex++;
    updateCarousel();
});

// Initialize Carousel
updateCarousel();
