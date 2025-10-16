const imageModal = document.getElementById('imageModal');
const modalImage = document.getElementById('modalImage');
let currentImageIndex = 0;
let images = [];

function showModal(imageSrc) {
    images = Array.from(document.querySelectorAll('.gallery-img img'));

    currentImageIndex = images.findIndex(img => img.src === imageSrc);
    modalImage.src = imageSrc;

    imageModal.showModal();

    document.body.classList.add('modal-open');
}

function closeModal() {
    imageModal.close();
    document.body.classList.remove('modal-open');
}

function showPrevImage() {
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    modalImage.src = images[currentImageIndex].src;
}

function showNextImage() {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    modalImage.src = images[currentImageIndex].src;
}

imageModal.addEventListener('click', function(event) {
    if (event.target === imageModal) {
    closeModal();
    }
});