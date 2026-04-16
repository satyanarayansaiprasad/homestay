<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden" style="height: 90vh; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=2070') no-repeat center center/cover;">
    <div class="container h-100 d-flex flex-column justify-content-center text-white">
        <div class="reveal">
            <h5 class="text-accent fw-bold text-uppercase mb-3">Welcome to Homestay</h5>
            <h1 class="display-3 fw-bold mb-4">Discover Your Home <br> Away From Home</h1>
            <p class="lead mb-5 col-md-6">Experience the warmth of Uttar Pradesh with our hand-picked, premium homestays. Comfortable, authentic, and unforgettable.</p>
            <div class="d-flex gap-3">
                <a href="homestays.php" class="btn btn-accent-custom px-4 py-3">Explore Homestays</a>
                <a href="about.php" class="btn btn-outline-light px-4 py-3">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- Search Strip -->
<div class="container mt-n5 position-relative z-index-1">
    <div class="glass-card p-4 shadow-lg reveal">
        <form class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-bold">Where to?</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0"><i class="fas fa-map-marker-alt text-accent"></i></span>
                    <input type="text" class="form-control border-start-0" placeholder="Destination, City...">
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Check In</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Check Out</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary-custom w-100">Search</button>
            </div>
        </form>
    </div>
</div>

<!-- Top Destinations -->
<section class="section-padding">
    <div class="container">
        <div class="section-title reveal">
            <h2>Top Destinations in UP</h2>
            <p class="text-muted">Explore the most beautiful cities of Uttar Pradesh</p>
        </div>
        <div class="row g-4 reveal">
            <?php 
            $destinations = [
                ['name' => 'Agra', 'img' => 'https://images.unsplash.com/photo-1548013146-72479768bbaa?auto=format&fit=crop&q=80&w=800'],
                ['name' => 'Varanasi', 'img' => 'https://images.unsplash.com/photo-1561361513-2d000a50f0dc?auto=format&fit=crop&q=80&w=800'],
                ['name' => 'Lucknow', 'img' => 'https://images.unsplash.com/photo-1595655455325-a131804f837c?auto=format&fit=crop&q=80&w=800'],
                ['name' => 'Mathura', 'img' => 'https://images.unsplash.com/photo-1627894483216-2138af692e32?auto=format&fit=crop&q=80&w=800']
            ];
            foreach($destinations as $dest): ?>
            <div class="col-md-3 col-6">
                <div class="position-relative overflow-hidden rounded-2xl shadow-sm destination-card" style="height: 350px;">
                    <img src="<?= $dest['img'] ?>" class="w-100 h-100 object-fit-cover transition-img" alt="<?= $dest['name'] ?>">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4 bg-gradient-dark text-white">
                        <h4 class="mb-0"><?= $dest['name'] ?></h4>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Featured Homestays -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="section-title center text-center reveal">
            <h2>Featured Homestays</h2>
            <p class="text-muted">Handpicked luxury and comfort just for you</p>
        </div>
        <div class="row g-4 reveal">
            <?php for($i=1; $i<=3; $i++): ?>
            <div class="col-lg-4 col-md-6">
                <div class="property-card">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&q=80&w=1000" class="card-img-top" alt="Property">
                        <span class="price-tag">₹4,500 / night</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0">Royal Heritage Vila</h5>
                            <div class="text-accent small"><i class="fas fa-star"></i> 4.9</div>
                        </div>
                        <p class="text-muted small mb-3"><i class="fas fa-map-marker-alt me-1"></i> Gomti Nagar, Lucknow</p>
                        <p class="card-text text-secondary mb-4">A beautiful heritage villa with modern amenities and a lush green garden.</p>
                        <div class="d-flex gap-3 mb-4 text-muted small">
                            <span><i class="fas fa-wifi me-1"></i> Wifi</span>
                            <span><i class="fas fa-parking me-1"></i> Parking</span>
                            <span><i class="fas fa-snowflake me-1"></i> AC</span>
                        </div>
                        <a href="property-details.php" class="btn btn-primary-custom w-100">View Details</a>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        <div class="text-center mt-5">
            <a href="homestays.php" class="text-primary fw-bold text-decoration-none">View All Homestays <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding">
    <div class="container">
        <div class="bg-primary-custom rounded-2xl p-5 text-white text-center reveal overflow-hidden position-relative">
            <div class="position-relative z-index-1">
                <h2 class="text-white mb-4">Are you a Property Owner?</h2>
                <p class="lead mb-5 opacity-75">Join our community and start earning by listing your unique homestay.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="owner/register.php" class="btn btn-accent-custom px-5 py-3">List Your Property</a>
                    <a href="contact.php" class="btn btn-outline-light px-5 py-3">Contact Support</a>
                </div>
            </div>
            <!-- Decorative circle -->
            <div class="position-absolute bg-white opacity-10 rounded-circle" style="width: 300px; height: 300px; top: -150px; right: -150px;"></div>
        </div>
    </div>
</section>

<style>
.mt-n5 { margin-top: -60px; }
.z-index-1 { z-index: 1; }
.bg-gradient-dark { background: linear-gradient(transparent, rgba(0,0,0,0.8)); }
.destination-card:hover .transition-img { transform: scale(1.1); }
.transition-img { transition: transform 0.5s ease; }
</style>

<?php include 'includes/footer.php'; ?>
