<?php include 'includes/header.php'; ?>

<!-- Header Section -->
<section class="bg-primary-custom py-5">
    <div class="container text-center text-white reveal">
        <h1 class="text-white">Explore Homestays</h1>
        <p class="opacity-75">Find the perfect place to stay in Madhya Pradesh</p>
    </div>
</section>

<!-- Main Content -->
<section class="section-padding">
    <div class="container">
        <div class="row g-4">
            <!-- Sidebar Filters -->
            <div class="col-lg-3">
                <div class="glass-card p-4 sticky-top" style="top: 100px;">
                    <h5 class="mb-4">Filters</h5>
                    <form>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Location</label>
                            <select class="form-select">
                                <option selected>All Cities</option>
                                <option>Indore</option>
                                <option>Bhopal</option>
                                <option>Gwalior</option>
                                <option>Ujjain</option>
                                <option>Jabalpur</option>
                                <option>Pachmarhi</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Price Range</label>
                            <input type="range" class="form-range" min="1000" max="20000" step="1000">
                            <div class="d-flex justify-content-between small text-muted">
                                <span>₹1,000</span>
                                <span>₹20,000+</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Amenities</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="wifi">
                                <label class="form-check-label" for="wifi">Wifi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="ac">
                                <label class="form-check-label" for="ac">AC</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="parking">
                                <label class="form-check-label" for="parking">Parking</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="kitchen">
                                <label class="form-check-label" for="kitchen">Kitchen</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary-custom w-100">Apply Filters</button>
                    </form>
                </div>
            </div>

            <!-- Property Grid -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4 reveal">
                    <p class="text-muted mb-0">Showing 12 results</p>
                    <div class="d-flex align-items-center gap-2">
                        <span class="small text-muted">Sort by:</span>
                        <select class="form-select form-select-sm" style="width: auto;">
                            <option>Newest first</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Rating</option>
                        </select>
                    </div>
                </div>

                <div class="row g-4 reveal">
                    <?php 
                    $properties = [
                        ['title' => 'Indore Heritage Manor', 'location' => 'Vijay Nagar, Indore', 'price' => '5,500', 'img' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c4c750?auto=format&fit=crop&q=80&w=1000'],
                        ['title' => 'Bhopal Lake View', 'location' => 'Upper Lake, Bhopal', 'price' => '3,200', 'img' => 'https://images.unsplash.com/photo-1544984243-ec57ea16fe25?auto=format&fit=crop&q=80&w=1000'],
                        ['title' => 'Gwalior Fort Stay', 'location' => 'Near Fort, Gwalior', 'price' => '4,000', 'img' => 'https://images.unsplash.com/photo-1582719508461-905c673771fd?auto=format&fit=crop&q=80&w=1000'],
                        ['title' => 'Mahakal Spiritual Home', 'location' => 'Near Temple, Ujjain', 'price' => '2,800', 'img' => 'https://images.unsplash.com/photo-1560185127-6ed189bf02f4?auto=format&fit=crop&q=80&w=1000'],
                        ['title' => 'Bhedaghat River View', 'location' => 'Jabalpur', 'price' => '6,500', 'img' => 'https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&q=80&w=1000'],
                        ['title' => 'Satpura Green retreat', 'location' => 'Pachmarhi', 'price' => '3,500', 'img' => 'https://images.unsplash.com/photo-1444201983204-c43cbd584d93?auto=format&fit=crop&q=80&w=1000']
                    ];
                    foreach($properties as $property): ?>
                    <div class="col-md-6">
                        <div class="property-card h-100">
                            <div class="position-relative">
                                <img src="<?= $property['img'] ?>" class="card-img-top" alt="<?= $property['title'] ?>">
                                <span class="price-tag">₹<?= $property['price'] ?> / night</span>
                            </div>
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0"><?= $property['title'] ?></h5>
                                    <div class="text-accent small"><i class="fas fa-star"></i> 4.8</div>
                                </div>
                                <p class="text-muted small mb-3"><i class="fas fa-map-marker-alt me-1"></i> <?= $property['location'] ?></p>
                                <p class="card-text text-secondary mb-4 flex-grow-1">Experience authentic hospitality in this beautiful property situated in the heart of <?= explode(',', $property['location'])[1] ?>.</p>
                                <a href="property-details.php" class="btn btn-primary-custom w-100 mt-auto">View Details</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <nav class="mt-5 reveal">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
                        <li class="page-item active"><a class="page-link shadow-none" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<style>
.pagination .page-link {
    border: none;
    color: var(--primary-color);
    margin: 0 5px;
    border-radius: 8px !important;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--white);
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
}
.pagination .page-item.active .page-link {
    background-color: var(--primary-color) !important;
    color: var(--white);
}
.pagination .page-link:hover {
    background-color: var(--accent-color);
    color: var(--primary-color);
}
</style>

<?php include 'includes/footer.php'; ?>
