<?php
require_once 'includes/db.php';

// Fetch property by slug
$slug = $slug ?? ''; // Passed from router
$property = null;

try {
    $stmt = db()->prepare("SELECT p.*, u.status as owner_status, u.name as owner_name, u.phone as owner_phone, u.email as owner_email FROM properties p JOIN users u ON p.owner_id = u.id WHERE p.slug = ?");
    $stmt->execute([$slug]);
    $property = $stmt->fetch();

    if (!$property) {
        header("HTTP/1.0 404 Not Found");
        include 'views/public/404.view.php';
        exit;
    }

    // Authorization Check: Only show LIVE properties to public
    // Admin can see everything, Owner can see their own
    $is_authorized = ($property['status'] === 'LIVE' && $property['owner_status'] === 'active') || 
                      is_admin_logged_in() || 
                      (is_logged_in() && $_SESSION['user_id'] == $property['owner_id']);

    if (!$is_authorized) {
        header("HTTP/1.0 404 Not Found");
        include 'views/public/404.view.php';
        exit;
    }

    // Fetch images
    $stmt_imgs = db()->prepare("SELECT image_path FROM property_images WHERE property_id = ?");
    $stmt_imgs->execute([$property['id']]);
    $images = $stmt_imgs->fetchAll();

    // Fetch amenities
    $stmt_amen = db()->prepare("SELECT name FROM amenities WHERE property_id = ?");
    $stmt_amen->execute([$property['id']]);
    $amenities = $stmt_amen->fetchAll();

    // Fetch facilities
    $stmt_fac = db()->prepare("SELECT name FROM facilities WHERE property_id = ?");
    $stmt_fac->execute([$property['id']]);
    $facilities = $stmt_fac->fetchAll();

} catch (Exception $e) {
    die("Error fetching property details.");
}

include 'includes/header.php';
?>

<section class="py-4 py-md-5">
    <div class="container">
        <!-- Gallery -->
        <div id="propertyGallery" class="carousel slide rounded-4 overflow-hidden mb-5 shadow" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php if (empty($images)): ?>
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200&q=80" class="d-block w-100 property-hero-img">
                    </div>
                <?php else: ?>
                    <?php foreach($images as $index => $img): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <img src="<?php echo url($img['image_path']); ?>" class="d-block w-100 property-hero-img">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#propertyGallery" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#propertyGallery" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <div class="row g-4 g-lg-5">
            <div class="col-lg-8">
                <div class="row align-items-start mb-4 g-3">
                    <div class="col-md-9 text-center text-md-start">
                        <span class="badge bg-success-subtle text-success mb-2"><?php echo $property['category']; ?></span>
                        <h1 class="display-6 fw-bold mb-2"><?php echo $property['title']; ?></h1>
                        <p class="text-muted"><i class="fas fa-map-marker-alt me-2"></i><?php echo $property['location']; ?></p>
                    </div>
                    <div class="col-md-3 text-center text-md-end">
                        <div class="bg-light p-3 rounded-4">
                            <h2 class="text-primary-custom fw-bold mb-0">₹<?php echo number_format($property['price']); ?></h2>
                            <small class="text-muted">per night</small>
                        </div>
                    </div>
                </div>

                <hr class="my-4 opacity-10">

                <h3 class="h4 mb-3">Description</h3>
                <div class="property-description lh-lg mb-5 text-secondary">
                    <?php echo nl2br($property['description']); ?>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-6">
                        <div class="p-4 bg-light rounded-4 h-100">
                            <h4 class="h5 mb-3"><i class="fas fa-concierge-bell me-2 text-primary"></i> Amenities</h4>
                            <div class="d-flex flex-wrap gap-2">
                                <?php foreach($amenities as $amen): ?>
                                    <span class="badge bg-white border text-dark fw-normal p-2 px-3"><?php echo $amen['name']; ?></span>
                                <?php endforeach; ?>
                                <?php if(empty($amenities)) echo "<span class='text-muted small'>No specifics listed.</span>"; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 bg-light rounded-4 h-100">
                            <h4 class="h5 mb-3"><i class="fas fa-wifi me-2 text-primary"></i> Facilities</h4>
                            <div class="d-flex flex-wrap gap-2">
                                <?php foreach($facilities as $fac): ?>
                                    <span class="badge bg-white border text-dark fw-normal p-2 px-3"><?php echo $fac['name']; ?></span>
                                <?php endforeach; ?>
                                <?php if(empty($facilities)) echo "<span class='text-muted small'>No specifics listed.</span>"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar-sticky" style="top: 100px; position: sticky;">
                    <!-- Owner Info -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-light">
                        <h4 class="h5 mb-4">Property Owner</h4>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary-custom rounded-circle text-white d-flex align-items-center justify-content-center" style="width: 50px; min-width: 50px; height: 50px; font-size: 1.5rem;">
                                <?php echo substr($property['owner_name'], 0, 1); ?>
                            </div>
                            <div class="ms-3">
                                <h5 class="mb-0 text-dark"><?php echo $property['owner_name']; ?></h5>
                                <small class="text-muted">Verified Owner</small>
                            </div>
                        </div>
                    </div>

                    <!-- Enquiry Form -->
                    <div class="card border-0 shadow rounded-4 p-4">
                        <h4 class="h5 mb-4">Send Enquiry</h4>
                        <form action="<?php echo url('submit_enquiry.php'); ?>" method="POST">
                            <input type="hidden" name="property_id" value="<?php echo $property['id']; ?>">
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control bg-light border-0 py-3" placeholder="Your Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control bg-light border-0 py-3" placeholder="Your Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" name="phone" class="form-control bg-light border-0 py-3" placeholder="Your Phone" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="message" class="form-control bg-light border-0 py-3" rows="3" placeholder="How can we help you?" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary-custom w-100 py-3 fw-bold">Contact Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.property-hero-img {
    height: 500px;
    object-fit: cover;
}
@media (max-width: 768px) {
    .property-hero-img {
        height: 300px;
    }
}
</style>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
