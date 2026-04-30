<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero" style="background-image: url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
    <div class="container hero-content text-center">
        <div class="mb-4 animate-fadeIn">
            <img src="<?php echo url('assets/img/gov logo.jpeg'); ?>" alt="Government of MP" height="70" class="bg-white p-2 rounded-circle shadow-lg border border-2 border-white mb-2">
            <div class="text-white small fw-bold text-uppercase tracking-wider" style="letter-spacing: 2px; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Recognized by MP Tourism</div>
        </div>
        <h1 class="display-3 fw-bold mb-4 text-white">Experience the Real Madhya Pradesh</h1>
        <p class="lead mb-5 text-white">Authentic Homestays, Farm Stays & Village Stays in the Heart of India.</p>
        <div class="d-flex flex-column flex-md-row justify-content-center gap-3 px-4 px-md-0">
            <a href="<?php echo url('listings.php'); ?>" class="btn btn-primary-custom btn-lg px-lg-5 py-3 py-md-2 shadow-sm">Explore Stays</a>
            <a href="<?php echo url('owner/register.php'); ?>" class="btn btn-outline-light btn-lg px-lg-5 py-3 py-md-2 shadow-sm">List Your Home</a>
        </div>
    </div>
</section>

<!-- Top Destinations -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5">Top Destinations in MP</h2>
            <p class="text-muted">Discover the hidden gems of Central India</p>
        </div>
        <div class="row g-3 g-md-4">
            <?php
            $tourist_dir = 'assets/img/TOURIST PLACES MP';
            $destinations = [];
            
            if (is_dir($tourist_dir)) {
                $files = scandir($tourist_dir);
                foreach ($files as $file) {
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                        $name = pathinfo($file, PATHINFO_FILENAME);
                        $name = preg_replace('/[0-9]+$/', '', $name);
                        $name = ucwords(strtolower(str_replace(['-', '_'], ' ', $name)));
                        
                        if (!isset($destinations[$name])) {
                            $destinations[$name] = [
                                'name' => $name,
                                'img' => $tourist_dir . '/' . $file
                            ];
                        }
                    }
                }
            }
            
            foreach ($destinations as $dest):
            ?>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="<?php echo url('listings.php?location=' . $dest['name']); ?>" class="text-decoration-none">
                    <div class="destination-card position-relative overflow-hidden rounded-4 shadow-sm" style="min-height: 200px; height: 100%;">
                        <img src="<?php echo url($dest['img']); ?>" class="w-100 h-100 object-fit-cover transition" alt="<?php echo $dest['name']; ?>" style="position: absolute; top:0; left:0;">
                        <div class="position-absolute bottom-0 start-0 w-100 p-3 p-md-4" style="background: linear-gradient(transparent, rgba(0,0,0,0.8)); z-index: 1;">
                            <h4 class="text-white mb-0 fs-6 fs-md-5"><?php echo $dest['name']; ?></h4>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Featured Homestays -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-end mb-5">
            <div class="col-8">
                <h2 class="display-5">Featured Stays</h2>
                <p class="text-muted mb-0">Handpicked authentic experiences</p>
            </div>
            <div class="col-4 text-end">
                <a href="<?php echo url('listings.php'); ?>" class="btn btn-outline-success btn-sm px-4">View All</a>
            </div>
        </div>
        
        <div class="row g-4">
            <?php
            try {
                $stmt = db()->prepare("SELECT p.*, (SELECT image_path FROM property_images WHERE property_id = p.id LIMIT 1) as main_image 
                                       FROM properties p 
                                       JOIN users u ON p.owner_id = u.id
                                       WHERE p.status = 'LIVE' AND u.status = 'active'
                                       ORDER BY p.featured DESC, p.created_at DESC 
                                       LIMIT 3");
                $stmt->execute();
                $featured = $stmt->fetchAll();
            } catch (Exception $e) {
                $featured = [];
            }
            
            if (empty($featured)):
            ?>
            <!-- Dummy Data if DB is empty -->
            <?php for($i=0; $i<3; $i++): ?>
            <div class="col-12 col-md-4">
                <div class="property-card shadow-sm h-100 position-relative">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=600&q=80" alt="Dummy" class="w-100">
                    <span class="price-tag">₹2,500/night</span>
                    <div class="p-4">
                        <small class="text-uppercase text-secondary fw-bold">Homestay</small>
                        <h3 class="h4 mt-2">Narmada Retreat</h3>
                        <p class="text-muted mb-3 small"><i class="fas fa-map-marker-alt me-2"></i>Maheshwar, MP</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small"><i class="fas fa-bed me-1"></i> 2 Rooms</span>
                            <a href="#" class="btn btn-primary-custom btn-sm">Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
            <?php else: ?>
                <?php foreach($featured as $prop): ?>
                <div class="col-12 col-md-4">
                    <div class="property-card shadow-sm h-100 position-relative">
                        <img src="<?php echo $prop['main_image'] ? url($prop['main_image']) : url('assets/img/agra.jpg'); ?>" alt="<?php echo $prop['title']; ?>" class="w-100">
                        <span class="price-tag">₹<?php echo number_format($prop['price']); ?></span>
                        <div class="p-4">
                            <small class="text-uppercase text-secondary fw-bold"><?php echo $prop['category']; ?></small>
                            <h3 class="h4 mt-2 h-ellipsis"><?php echo $prop['title']; ?></h3>
                            <p class="text-muted mb-3 small"><i class="fas fa-map-marker-alt me-2"></i><?php echo $prop['location']; ?></p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="small"><i class="fas fa-bed me-1"></i> <?php echo $prop['rooms']; ?> Rooms</span>
                                <a href="<?php echo url('property/' . $prop['slug']); ?>" class="btn btn-primary-custom btn-sm">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 mb-5">
    <div class="container">
        <div class="bg-primary-custom rounded-4 p-4 p-md-5 text-center text-white shadow-lg">
            <h2 class="text-white mb-3">Are you a Homestay Owner?</h2>
            <p class="lead mb-4 opacity-75">Join the Homestay Owners Welfare Society MP and list your property today!</p>
            <a href="<?php echo url('owner/register.php'); ?>" class="btn btn-light btn-lg text-primary-custom px-5 fw-bold">Join Now</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
