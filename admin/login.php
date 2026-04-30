<?php
require_once '../includes/db.php';

if (is_admin_logged_in()) {
    redirect('admin/dashboard.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = db()->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_user'] = $admin['username'];
        set_flash_message('success', 'Logged in to Administration Panel.');
        redirect('admin/dashboard.php');
    } else {
        $error = 'Invalid credentials.';
    }
}

$page_title = 'Admin Login';
include '../includes/header.php';
?>

<section class="py-5 bg-dark min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card border-0 shadow-lg rounded-4 p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Admin Portal</h2>
                        <p class="text-muted">Secure Access Only</p>
                    </div>

                    <?php if($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <div class="text-end mt-1">
                                <a href="forgot_password.php" class="text-muted small">Forgot Password?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 py-3 fw-bold">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
