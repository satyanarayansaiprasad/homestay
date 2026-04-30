<?php include 'includes/header.php'; ?>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Contact Us</h1>
            <p class="text-muted">Have questions? We're here to help you find the perfect stay.</p>
        </div>

        <div class="row g-5">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 p-5 h-100 bg-primary-custom text-white">
                    <h2 class="text-white mb-4">Get in Touch</h2>
                    <p class="mb-5 opacity-75">Fill out the form and our team will get back to you within 24 hours.</p>
                    
                    <div class="d-flex mb-4">
                        <div class="bg-white bg-opacity-10 p-3 rounded-3 me-3"><i class="fas fa-phone"></i></div>
                        <div>
                            <h5 class="mb-0">Phone</h5>
                            <p class="opacity-75"><?php echo CONTACT_PHONE; ?></p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="bg-white bg-opacity-10 p-3 rounded-3 me-3"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h5 class="mb-0">Email</h5>
                            <p class="opacity-75"><?php echo CONTACT_EMAIL; ?></p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="bg-white bg-opacity-10 p-3 rounded-3 me-3"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h5 class="mb-0">Office</h5>
                            <p class="opacity-75">Homestay Owners Welfare Society,<br>Bhopal, Madhya Pradesh</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow rounded-4 p-5 h-100">
                    <form action="<?php echo url('submit_contact.php'); ?>" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control p-3 bg-light border-0" placeholder="John" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control p-3 bg-light border-0" placeholder="Doe" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control p-3 bg-light border-0" placeholder="john@example.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-control p-3 bg-light border-0" placeholder="+91 00000 00000" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Message</label>
                                <textarea name="message" class="form-control p-3 bg-light border-0" rows="5" placeholder="Tell us what you're looking for..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary-custom btn-lg w-100 py-3">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Map (Optional) -->
<section class="mt-5">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d234700.3459586111!2d77.24107874999999!3d23.1978001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397c428f8ff68973%3A0x45057b40bc637c76!2sBhopal%2C%20Madhya%20Pradesh!5e0!3m2!1sen!2sin!4v1689260000000!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>

<?php include 'includes/footer.php'; ?>
