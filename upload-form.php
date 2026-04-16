<?php 
$pageTitle = 'Upload Property Details - Home Stay Owners Welfare Society';
include 'includes/header.php'; 
?>

<!-- Hero Section -->
<section class="bg-primary-dark py-5">
    <div class="container text-center text-white reveal">
        <h1 class="text-white display-4">Upload Your Detail</h1>
        <p class="opacity-75 lead">Register your homestay with the Association Portal</p>
    </div>
</section>

<!-- Form Section -->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="glass-card p-5 shadow-lg">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="row g-4">
                            <!-- Basic Info -->
                            <div class="col-12"><h5 class="fw-bold text-primary border-bottom pb-2">Basic Information</h5></div>
                            
                            <div class="col-md-12">
                                <label class="form-label fw-bold small">Title of Property (As per Registration Certificate)</label>
                                <input type="text" class="form-control" name="property_title" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-bold small">Full Address</label>
                                <textarea class="form-control" name="address" rows="2" required></textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold small">City</label>
                                <input type="text" class="form-control" name="city" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold small">Division</label>
                                <select class="form-select" name="division">
                                    <option selected>Select Division</option>
                                    <option>Indore</option>
                                    <option>Bhopal</option>
                                    <option>Jabalpur</option>
                                    <option>Gwalior</option>
                                    <option>Ujjain</option>
                                    <option>Sagar</option>
                                    <option>Rewa</option>
                                    <option>Shahdol</option>
                                    <option>Narmadapuram</option>
                                    <option>Chambal</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold small">Pin Code</label>
                                <input type="text" class="form-control" name="pincode" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-bold small">Category</label>
                                <div class="d-flex flex-wrap gap-4 pt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="cat-home" checked>
                                        <label class="form-check-label" for="cat-home">Home Stay</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="cat-gram">
                                        <label class="form-check-label" for="cat-gram">Gram Stay</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="cat-farm">
                                        <label class="form-check-label" for="cat-farm">Farm Stay</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="cat-bb">
                                        <label class="form-check-label" for="cat-bb">Bed and Breakfast</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Capacity & Location -->
                            <div class="col-12 mt-5"><h5 class="fw-bold text-primary border-bottom pb-2">Capacity & Surrounding</h5></div>
                            
                            <div class="col-md-4">
                                <label class="form-label fw-bold small">Number of Guest Rooms</label>
                                <input type="number" class="form-control" name="rooms" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold small">Total Guest Capacity</label>
                                <input type="number" class="form-control" name="capacity" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold small">Nearest Tourist Destination</label>
                                <input type="text" class="form-control" name="nearest_dest" required>
                            </div>

                            <!-- Contact Info -->
                            <div class="col-12 mt-5"><h5 class="fw-bold text-primary border-bottom pb-2">Contact Details</h5></div>
                            
                            <div class="col-md-4">
                                <label class="form-label fw-bold small">Contact Person Name</label>
                                <input type="text" class="form-control" placeholder="Mr. / Ms. / Mrs." name="contact_name" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold small">Email ID</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label fw-bold small">Phone 1</label>
                                <input type="text" class="form-control" name="phone1" required>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label fw-bold small">Phone 2 (Optional)</label>
                                <input type="text" class="form-control" name="phone2">
                            </div>

                            <!-- Detailed Description -->
                            <div class="col-12 mt-5"><h5 class="fw-bold text-primary border-bottom pb-2">Detailed Information</h5></div>

                            <div class="col-12">
                                <label class="form-label fw-bold small">Detail Women Safety (Max 500 words)</label>
                                <textarea class="form-control" name="women_safety" rows="6" placeholder="Describe security measures, nearby police help, host availability, etc." required></textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small">Property Description (Facilities, Transportation, Solo Traveler Support)</label>
                                <textarea class="form-control" name="property_desc" rows="8" placeholder="List best available facilities, transport nearby, food options, and support for solo travelers..." required></textarea>
                            </div>

                            <!-- Photo Upload -->
                            <div class="col-12 mt-4 text-center">
                                <div class="bg-light p-5 rounded-2xl border-dashed border-2 text-muted border-secondary opacity-75">
                                    <i class="fas fa-cloud-upload-alt display-3 mb-3"></i>
                                    <h5 class="fw-bold mb-2">Upload Photos (Max 10)</h5>
                                    <p class="small mb-4">Recommended format: JPEG/PNG. Max size 5MB per image.</p>
                                    <input type="file" multiple class="form-control w-50 mx-auto" name="photos">
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="col-12 mt-5 text-center">
                                <button type="submit" class="btn btn-primary-custom px-5 py-3">Submit Listing for Review</button>
                                <p class="text-muted small mt-3">By submitting, you agree to follow the Society's Portal Rules & Regulations.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
