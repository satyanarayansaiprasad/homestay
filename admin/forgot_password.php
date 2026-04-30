<?php
require_once '../includes/db.php';

if (is_admin_logged_in()) {
    redirect('admin/dashboard.php');
}

$message = '';
$debug_link = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    // Check if email exists in admins table
    $stmt = db()->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->execute([$email]);
    $admin = $stmt->fetch();

    if ($admin) {
        // Generate Token
        $token = bin2hex(random_bytes(32));
        
        // Save to DB
        $stmt_reset = db()->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
        $stmt_reset->execute([$email, $token]);

        $reset_url = url('admin/reset_password.php?token=' . $token);
        
        // Conceptual Email Sending (Debug Mode)
        $debug_link = $reset_url;
        $message = "If an account exists for $email, a reset link will be sent. (Debug: See below)";
    } else {
        $message = "If an account exists for $email, a reset link will be sent."; // Same message for security
    }
}

$page_title = 'Forgot Password';
include '../includes/header.php';
?>

<section class="py-5 bg-dark min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-lg rounded-4 p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Reset Password</h2>
                        <p class="text-muted">Enter your email to receive a reset link</p>
                    </div>

                    <?php if($message): ?>
                        <div class="alert alert-info">
                            <?php echo $message; ?>
                            <?php if($debug_link): ?>
                                <hr>
                                <p class="mb-0 small"><strong>DEBUG MODE:</strong> <a href="<?php echo $debug_link; ?>">Click here to reset your password</a></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="mb-4">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" required placeholder="admin@example.com">
                        </div>
                        <button type="submit" class="btn btn-dark w-100 py-3 fw-bold">Send Reset Link</button>
                    </form>
                    
                    <div class="text-center mt-4">
                        <a href="login.php" class="text-decoration-none text-muted">&larr; Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
