<?php include 'includes/header.php'; ?>

<!-- Breadcrumbs -->
<nav class="bg-light py-3 border-bottom">
    <div class="container small reveal">
        <a href="index.php" class="text-decoration-none text-muted">Home</a> / 
        <a href="homestays.php" class="text-decoration-none text-muted">Homestays</a> / 
        <span class="text-primary fw-bold">The Grand Nawab Residence</span>
    </div>
</nav>

<section class="section-padding pt-4">
    <div class="container">
        <!-- Property Title & Location -->
        <div class="d-flex justify-content-between align-items-end mb-4 reveal">
            <div>
                <h1 class="mb-2">The Grand Nawab Residence</h1>
                <p class="text-muted mb-0"><i class="fas fa-map-marker-alt text-accent me-2"></i>Hazratganj, Lucknow, Uttar Pradesh</p>
            </div>
            <div class="text-end">
                <h3 class="text-primary mb-0">₹5,500 <span class="fs-6 text-muted fw-normal">/ night</span></h3>
                <div class="text-accent mt-2">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span class="ms-1 text-muted">(42 Reviews)</span>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <!-- Gallery -->
                <div id="propertyGallery" class="carousel slide rounded-2xl overflow-hidden shadow-md mb-5 reveal" data-bs-ride="carousel">
                    <div class="carousel-inner" style="height: 500px;">
                        <div class="carousel-item active h-100">
                            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=2000" class="d-block w-100 h-100 object-fit-cover" alt="Main Image">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&q=80&w=2000" class="d-block w-100 h-100 object-fit-cover" alt="Room">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="https://images.unsplash.com/photo-1544984243-ec57ea16fe25?auto=format&fit=crop&q=80&w=2000" class="d-block w-100 h-100 object-fit-cover" alt="Lobby">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#propertyGallery" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#propertyGallery" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>

                <!-- Description -->
                <div class="reveal mb-5">
                    <h4 class="mb-3 border-bottom pb-2">About this Homestay</h4>
                    <p class="text-secondary">Experience the royalty of Lucknow at The Grand Nawab Residence. This beautifully preserved heritage property offers a perfect blend of traditional Nawabi hospitality and modern luxury. Located in the heart of Hazratganj, you are steps away from the city's best shopping and dining experiences.</p>
                    <p class="text-secondary">The property features large airy rooms with high ceilings, vintage furniture, and a private garden where you can enjoy your morning tea. Our family is dedicated to making your stay comfortable and authentic.</p>
                </div>

                <!-- Amenities & Facilities -->
                <div class="row g-4 reveal mb-5">
                    <div class="col-md-6">
                        <h4 class="mb-3 border-bottom pb-2">Amenities</h4>
                        <ul class="list-unstyled d-flex flex-wrap gap-3">
                            <li class="bg-white p-2 px-3 rounded shadow-sm border"><i class="fas fa-wifi text-accent me-2"></i> Free Wifi</li>
                            <li class="bg-white p-2 px-3 rounded shadow-sm border"><i class="fas fa-snowflake text-accent me-2"></i> Air Conditioning</li>
                            <li class="bg-white p-2 px-3 rounded shadow-sm border"><i class="fas fa-tv text-accent me-2"></i> Smart TV</li>
                            <li class="bg-white p-2 px-3 rounded shadow-sm border"><i class="fas fa-coffee text-accent me-2"></i> Breakfast</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-3 border-bottom pb-2">Facilities</h4>
                        <ul class="list-unstyled d-flex flex-wrap gap-3">
                            <li class="bg-white p-2 px-3 rounded shadow-sm border"><i class="fas fa-parking text-accent me-2"></i> Free Parking</li>
                            <li class="bg-white p-2 px-3 rounded shadow-sm border"><i class="fas fa-utensils text-accent me-2"></i> Shared Kitchen</li>
                            <li class="bg-white p-2 px-3 rounded shadow-sm border"><i class="fas fa-swimmer text-accent me-2"></i> Swimming Pool</li>
                        </ul>
                    </div>
                </div>

                <!-- Room Details -->
                <div class="reveal mb-5">
                    <h4 class="mb-3 border-bottom pb-2">Room Details</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless bg-white rounded shadow-sm p-4">
                            <tbody>
                                <tr>
                                    <td class="fw-bold text-muted">Room Size</td>
                                    <td>450 sq. ft.</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-muted">Bed Type</td>
                                    <td>King Size Master Bed</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-muted">Max Occupants</td>
                                    <td>2 Adults, 1 Child</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-muted">View</td>
                                    <td>Garden View / City View</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Enquiry Form Card -->
                <div class="glass-card p-4 shadow-lg sticky-top border-primary reveal" style="top: 100px; border-left: 4px solid var(--accent-color);">
                    <h4 class="mb-4">Quick Enquiry</h4>
                    <form>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Phone Number</label>
                            <input type="tel" class="form-control" placeholder="Enter phone number">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Message</label>
                            <textarea class="form-control" rows="4" placeholder="How can we help you?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary-custom w-100 py-3 mt-2">Send Enquiry</button>
                    </form>
                    <p class="text-center text-muted small mt-3">You will receive a response within 24 hours.</p>
                </div>

                <!-- Owner Profile -->
                <div class="glass-card p-4 shadow-sm mt-4 reveal">
                    <h5 class="mb-3">Owner Contact</h5>
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-user-tie fs-4"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Raja Pratap Singh</h6>
                            <p class="text-muted small mb-0">Member since 2022</p>
                        </div>
                    </div>
                    <p class="small text-muted mb-0"><i class="fas fa-phone me-2"></i> +91 98765 43210</p>
                    <p class="small text-muted"><i class="fas fa-envelope me-2"></i> nawab.residence@email.com</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
