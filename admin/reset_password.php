<?php
require_once '../includes/db.php';

if (is_admin_logged_in()) {
    redirect('admin/dashboard.php');
}

$token = $_GET['token'] ?? '';
$error = '';
$success = false;

// Validate Token
$stmt = db()->prepare("SELECT * FROM password_resets WHERE token = ?");
$stmt->execute([$token]);
$reset = $stmt->fetch();

if (!$reset) {
    die("Invalid or expired token.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } else {
        // Update Admin Password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt_update = db()->prepare("UPDATE admins SET password = ? WHERE email = ?");
        $stmt_update->execute([$hashed_password, $reset['email']]);

        // Delete Token
        $stmt_delete = db()->prepare("DELETE FROM password_resets WHERE email = ?");
        $stmt_delete->execute([$reset['email']]);

        $success = true;
    }
}

$page_title = 'Set New Password';
include '../includes/header.php';
?>

<section class="py-5 bg-dark min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-lg rounded-4 p-5">
                    <?php if($success): ?>
                        <div class="text-center">
                            <div class="mb-4">
                                <i class="fas fa-check-circle text-success display-1"></i>
                            </div>
                            <h2 class="fw-bold">Password Updated!</h2>
                            <p class="text-muted mb-4">Your password has been changed successfully. You can now log in.</p>
                            <a href="login.php" class="btn btn-dark w-100 py-3 fw-bold">Sign In Now</a>
                        </div>
                    <?php else: ?>
                        <div class="text-center mb-4">
                            <h2 class="fw-bold">Reset Password</h2>
                            <p class="text-muted">Set your new secure password</p>
                        </div>

                        <?php if($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="password" class="form-control" required minlength="6">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" required minlength="6">
                            </div>
                            <button type="submit" class="btn btn-dark w-100 py-3 fw-bold">Reset Password</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
