<?php
include 'includes/header.php';

// Scan gallery directory for images
$gallery_dir = __DIR__ . '/../../assets/img/gallery';
$images = [];

if (is_dir($gallery_dir)) {
    $files = scandir($gallery_dir);
    foreach ($files as $file) {
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'avif'])) {
            $images[] = 'assets/img/gallery/' . $file;
        }
    }
}
?>

<!-- Gallery Hero -->
<section class="py-5 bg-dark text-white text-center" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <h1 class="display-3 fw-bold mb-3">Our Visual Journey</h1>
        <p class="lead opacity-75">Capturing the soul of Madhya Pradesh through the lens.</p>
    </div>
</section>

<!-- Masonry Gallery -->
<section class="py-5">
    <div class="container">
        <div class="gallery-masonry mt-4">
            <?php if (empty($images)): ?>
                <div class="text-center py-5">
                    <p class="text-muted">No images found in the gallery folder.</p>
                </div>
            <?php else: ?>
                <?php foreach ($images as $img): ?>
                    <div class="gallery-item mb-4">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden gallery-card">
                            <a href="javascript:void(0)" class="gallery-link" onclick="openLightbox(<?php echo $index; ?>)">
                                <img src="<?php echo url($img); ?>" class="img-fluid w-100" alt="Gallery Image" loading="lazy">
                                <div class="gallery-overlay">
                                    <i class="fas fa-expand text-white"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-3" data-bs-dismiss="modal" aria-label="Close"></button>
                
                <div id="lightboxCarousel" class="carousel slide carousel-fade" data-bs-ride="false">
                    <div class="carousel-inner">
                        <?php foreach ($images as $index => $img): ?>
                            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>" id="slide-<?php echo $index; ?>">
                                <img src="<?php echo url($img); ?>" class="d-block w-100 rounded-4" style="max-height: 85vh; object-fit: contain;" alt="Gallery Slide">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openLightbox(index) {
    const modal = new bootstrap.Modal(document.getElementById('lightboxModal'));
    const carouselEl = document.getElementById('lightboxCarousel');
    const carousel = new bootstrap.Carousel(carouselEl);
    
    // Jump to the specific slide
    carousel.to(index);
    
    modal.show();
}

// Enable keyboard navigation for the carousel
document.addEventListener('keydown', (e) => {
    const modalEl = document.getElementById('lightboxModal');
    if (modalEl.classList.contains('show')) {
        const carousel = bootstrap.Carousel.getInstance(document.getElementById('lightboxCarousel'));
        if (e.key === 'ArrowLeft') carousel.prev();
        if (e.key === 'ArrowRight') carousel.next();
    }
});
</script>

<style>
/* Masonry Layout */
.gallery-masonry {
    column-count: 1;
    column-gap: 1.5rem;
}

@media (min-width: 768px) {
    .gallery-masonry {
        column-count: 2;
    }
}

@media (min-width: 1200px) {
    .gallery-masonry {
        column-count: 3;
    }
}

.gallery-item {
    display: inline-block;
    width: 100%;
}

.gallery-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: zoom-in;
}

.gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,0.175) !important;
}

.gallery-link {
    position: relative;
    display: block;
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(46, 125, 50, 0.4); /* Primary theme color with transparency */
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    font-size: 2rem;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
}

.gallery-card img {
    border-radius: 1rem;
}
</style>

<?php include 'includes/footer.php'; ?>
