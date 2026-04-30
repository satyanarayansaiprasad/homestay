<?php
require_once '../includes/db.php';

if (is_logged_in()) {
    redirect('owner/dashboard.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic Validation
    if ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } else {
        try {
            $stmt = db()->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $error = 'Email already registered.';
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = db()->prepare("INSERT INTO users (name, email, phone, password, terms_accepted, terms_accepted_at) VALUES (?, ?, ?, ?, 1, NOW())");
                $stmt->execute([$name, $email, $phone, $hashed_password]);
                
                $_SESSION['user_id'] = db()->lastInsertId();
                $_SESSION['user_name'] = $name;
                
                set_flash_message('success', 'Registration successful! Welcome to MyHomestayMP.');
                redirect('owner/dashboard.php');
            }
        } catch (Exception $e) {
            $error = 'An error occurred. Please try again.';
        }
    }
}

$page_title = 'Owner Registration';
include '../includes/header.php';
?>

<section class="py-5 bg-light min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow rounded-4 overflow-hidden">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <img src="<?php echo url('assets/img/Logo.jpeg'); ?>" alt="Logo" height="60" class="mb-3">
                            <h3>Join MyHomestayMP</h3>
                            <p class="text-muted">Start listing your property and welcome guests</p>
                        </div>

                        <?php if($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form action="" method="POST">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" required>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="card bg-light border-0 rounded-3 mb-4">
                                        <div class="card-body" style="max-height: 200px; overflow-y: auto; font-size: 0.85rem;">
                                            <h6 class="fw-bold">Terms & Conditions (User Agreement)</h6>
                                            <p>This User Agreement (“Agreement”) governs the access, membership, and use of the online marketing web portal (“Portal”) operated by Home Stay Owners Welfare Society, Madhya Pradesh (hereinafter referred to as the “Society”). By accessing, registering, or using the Portal, the user (“Member”/“User”) agrees to be bound by the terms and conditions set forth herein.</p>
                                            <p><strong>1. Purpose:</strong> The Portal is developed to provide a digital marketing and promotional platform for Home Stays, Village Stays, Farm Stays, and Bed & Breakfast (B&B) units.</p>
                                            <p><strong>2. Membership & Fees:</strong> Membership to the Portal is mandatory for listing. A one-time registration fee of INR 1,000 and an annual portal/maintenance fee of INR 1,000 is applicable. All fees paid are non-refundable.</p>
                                            <p><strong>3. Content Approval:</strong> All content submitted by the Member shall be subject to review and approval by the Portal Administrator. The Society reserves the absolute right to approve, reject, modify, or remove any content.</p>
                                            <p><strong>4. Validity & Renewal:</strong> Each listing shall remain valid for a period of 12 months. A renewal fee of INR 1,000 shall be payable.</p>
                                            <p><strong>5. Promotion & Marketing:</strong> The Society reserves the right to promote the Portal and listed properties at national and international levels.</p>
                                            <p><strong>6. Governance & Authority:</strong> The Portal shall be administered by the Governing Body of the Society. The decision of the Society/Chairperson shall be final and binding.</p>
                                            <p><strong>7. User Obligations:</strong> Members shall ensure that all submitted information is accurate, truthful, and up to date. Uploading misleading or unlawful content is strictly prohibited.</p>
                                            <p><strong>8. Limitation of Liability:</strong> The Society acts solely as a marketing platform and shall not be held liable for any bookings, service quality, or disputes between Members and guests.</p>
                                        </div>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="declarationCheck" required>
                                        <label class="form-check-label small lh-sm" for="declarationCheck">
                                            <strong>Declaration / Undertaking:</strong> 
                                            “I hereby declare that I have carefully read and fully understood all the rules, regulations, and terms prescribed by the Organization. To the best of my knowledge, these rules are fair and appropriate. I agree to abide by all policies, guidelines, and conditions laid down by the Organization and undertake to comply with them at all times.”
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-primary-custom w-100 py-3 fw-bold">Register Now</button>
                                </div>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <p class="mb-0">Already have an account? <a href="login.php" class="text-success fw-bold">Login here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
