<?php
require_once '../includes/db.php';

if (is_logged_in()) {
    redirect('owner/dashboard.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = db()->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        set_flash_message('success', 'Logged in successfully! Welcome back.');
        redirect('owner/dashboard.php');
    } else {
        $error = 'Invalid email or password.';
    }
}

$page_title = 'Owner Login';
include '../includes/header.php';
?>

<section class="py-5 bg-light min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow rounded-4 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-12 p-5">
                            <div class="text-center mb-4">
                                <img src="<?php echo url('assets/img/Logo.jpeg'); ?>" alt="Logo" height="60" class="mb-3">
                                <h3>Property Owner Login</h3>
                                <p class="text-muted">Manage your homestay listings</p>
                            </div>

                            <?php if($error): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endif; ?>

                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary-custom w-100 py-3 fw-bold">Login</button>
                            </form>

                            <div class="text-center mt-4">
                                <p class="mb-0">Don't have an account? <a href="register.php" class="text-success fw-bold">Register here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="<?php echo url(); ?>" class="text-muted text-decoration-none"><i class="fas fa-arrow-left me-2"></i>Back to Website</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
