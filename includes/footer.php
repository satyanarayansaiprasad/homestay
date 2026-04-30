</main>

<footer class="mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <h5 class="mb-4">MyHomestayMP</h5>
                <p>Promoting authentic tourism experiences in the heart of Incredible India. Explore the beauty of
                    Madhya Pradesh through local eyes.</p>
                <div class="social-links d-flex mt-4">
                    <a href="#" class="me-4 fs-5"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="me-4 fs-5"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="me-4 fs-5"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2 ms-lg-auto">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="<?php echo url(); ?>">Home</a></li>
                    <li><a href="<?php echo url('listings.php'); ?>">Homestays</a></li>
                    <li><a href="<?php echo url('about.php'); ?>">About Us</a></li>
                    <li><a href="<?php echo url('governing-body'); ?>">Governing Body</a></li>
                    <li><a href="<?php echo url('contact.php'); ?>">Contact</a></li>
                    <li><a href="https://tourism.mp.gov.in/contents?page=homestay&number=jtgYPf+tmICK2N8tHLothw==">M.P.
                            GOV.HOME STAY REGISTRATION SCHEME</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <h5>Legals</h5>
                <ul class="list-unstyled">
                    <li><a href="<?php echo url('privacy-policy'); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo url('terms-of-use'); ?>">Terms of Use</a></li>
                    <li><a href="<?php echo url('refund-policy'); ?>">Refund Policy</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li class="mb-2 small"><i class="fas fa-envelope me-2"></i> <?php echo CONTACT_EMAIL; ?></li>
                    <li class="mb-2 small"><i class="fas fa-phone me-2"></i> <?php echo CONTACT_PHONE; ?></li>
                    <li class="mb-2 small"><i class="fas fa-map-marker-alt me-2"></i> Bhopal, Madhya Pradesh, India</li>
                </ul>
            </div>
        </div>
        <hr class="mt-5 mb-4" style="border-color: rgba(255,255,255,0.05);">
        <div class="row g-3 align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0 small">&copy; <?php echo date('Y'); ?> MyHomestayMP. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="d-flex align-items-center justify-content-center justify-content-md-end gap-3">
                    <p class="mb-0 small">Member of Homestay Owners Welfare Society MP</p>
                    <img src="<?php echo url('assets/img/gov logo.jpeg'); ?>" alt="Gov Logo" height="30" class="rounded bg-white p-1">
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery (Optional) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Custom JS -->
<script src="<?php echo url('assets/js/main.js'); ?>"></script>

</body>

</html>