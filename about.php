<?php include 'includes/header.php'; ?>

<section class="bg-primary-custom py-5">
    <div class="container text-center text-white reveal">
        <h1 class="text-white display-4">Our Story</h1>
        <p class="opacity-75 lead">Rediscovering hospitality in the heart of Madhya Pradesh</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 reveal">
                <h2 class="section-title">About Homestay</h2>
                <p>Founded in 2024, Homestay was born out of a simple idea: to connect travelers with the authentic soul of India. We believe that the best way to experience a culture is not from a hotel room, but from within a local home.</p>
                <p>Our platform exclusively features handpicked properties in Madhya Pradesh - the Heart of India, a state rich in history, spirituality, and diverse traditions. From the grand palaces of Gwalior to the spiritual retreats of Ujjain, every home on our platform has a story to tell.</p>
                
                <div class="row g-4 mt-4">
                    <div class="col-6">
                        <div class="glass-card p-4 text-center border-accent">
                            <h3 class="text-primary mb-0">500+</h3>
                            <p class="text-muted small mb-0">Verified Homes</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="glass-card p-4 text-center border-accent">
                            <h3 class="text-primary mb-0">10k+</h3>
                            <p class="text-muted small mb-0">Happy Guests</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 reveal">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&q=80&w=1200" class="img-fluid rounded-2xl shadow-lg" alt="About Image">
                    <!-- Decor -->
                    <div class="position-absolute bg-accent-color rounded-2xl p-4 text-primary fw-bold shadow-lg" style="bottom: -20px; left: -20px;">
                        Trust & Experience
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container">
        <div class="section-title center text-center reveal">
            <h2>Our Core Values</h2>
            <p class="text-muted">What drives us every day</p>
        </div>
        <div class="row g-4 reveal">
            <div class="col-md-4">
                <div class="p-5 text-center transition-all bg-light rounded-2xl hover-shadow h-100">
                    <div class="fs-1 text-accent mb-4"><i class="fas fa-heart"></i></div>
                    <h4>Authenticity</h4>
                    <p class="text-muted mb-0">We prioritize genuine local experiences that reflect the true culture of the region.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-5 text-center transition-all bg-light rounded-2xl hover-shadow h-100">
                    <div class="fs-1 text-accent mb-4"><i class="fas fa-shield-alt"></i></div>
                    <h4>Trust</h4>
                    <p class="text-muted mb-0">Every property and owner is verified by our team to ensure your safety and comfort.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-5 text-center transition-all bg-light rounded-2xl hover-shadow h-100">
                    <div class="fs-1 text-accent mb-4"><i class="fas fa-seedling"></i></div>
                    <h4>Sustainability</h4>
                    <p class="text-muted mb-0">We support local economies and eco-friendly practices in our homestay network.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.border-accent { border-bottom: 3px solid var(--accent-color); }
.hover-shadow:hover { 
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    background: white !important;
}
.transition-all { transition: all 0.3s ease; }
</style>

<?php include 'includes/footer.php'; ?>
