<?php include 'includes/header.php'; ?>

<!-- Header -->
<section class="bg-primary-custom py-5">
    <div class="container text-center text-white reveal">
        <h1 class="text-white">Get in Touch</h1>
        <p class="opacity-75">We are here to help you find your perfect stay</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Info -->
            <div class="col-lg-5 reveal">
                <h2 class="section-title">Contact Information</h2>
                <p class="text-muted mb-5">Have questions about a property or need help with your booking? Reach out to our 24/7 support team.</p>
                
                <div class="d-flex gap-4 mb-4 p-4 glass-card shadow-sm border-start border-accent border-4">
                    <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Our Office</h5>
                        <p class="text-muted mb-0">12/45 Gomti Nagar, Lucknow, Uttar Pradesh, 226010</p>
                    </div>
                </div>

                <div class="d-flex gap-4 mb-4 p-4 glass-card shadow-sm">
                    <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Call Us</h5>
                        <p class="text-muted mb-0">+91 123 456 7890</p>
                        <p class="text-muted mb-0">+91 987 654 3210</p>
                    </div>
                </div>

                <div class="d-flex gap-4 mb-4 p-4 glass-card shadow-sm">
                    <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Email Us</h5>
                        <p class="text-muted mb-0">info@homestay.com</p>
                        <p class="text-muted mb-0">support@homestay.com</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7 reveal">
                <div class="glass-card p-5 shadow-lg border">
                    <h3 class="mb-4">Send a Message</h3>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">First Name</label>
                                <input type="text" class="form-control bg-light border-0 py-3" placeholder="John">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Last Name</label>
                                <input type="text" class="form-control bg-light border-0 py-3" placeholder="Doe">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Email Address</label>
                                <input type="email" class="form-control bg-light border-0 py-3" placeholder="john@example.com">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Phone Number</label>
                                <input type="tel" class="form-control bg-light border-0 py-3" placeholder="+91 XXX XXX XXXX">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Subject</label>
                                <select class="form-select bg-light border-0 py-3">
                                    <option>General Inquiry</option>
                                    <option>Property Listing Help</option>
                                    <option>Booking Issue</option>
                                    <option>Others</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Message</label>
                                <textarea class="form-control bg-light border-0 py-3" rows="5" placeholder="How can we help?"></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary-custom w-100 py-3 shadow">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Placeholder -->
<div class="container-fluid p-0 reveal">
    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 400px;">
        <div class="text-center text-muted">
            <i class="fas fa-map-marked-alt display-1 mb-3"></i>
            <h4>Interactive Map Placeholder</h4>
            <p>Lucknow, Uttar Pradesh</p>
        </div>
    </div>
</div>

<style>
.border-accent { border-left-color: var(--accent-color) !important; }
</style>

<?php include 'includes/footer.php'; ?>
