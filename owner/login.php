<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Login - Homestay</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-primary-custom" style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="text-center mb-5 reveal">
                <a href="../index.php" class="text-decoration-none">
                    <h2 class="text-white">HOME<span class="text-accent">STAY</span></h2>
                </a>
                <p class="text-white opacity-75">Owner Portal</p>
            </div>
            
            <div class="glass-card p-4 shadow-lg reveal">
                <h4 class="mb-4">Welcome Back</h4>
                <form action="index.php">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                            <input type="email" class="form-control border-start-0" placeholder="your@email.com" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between">
                            <label class="form-label small fw-bold">Password</label>
                            <a href="#" class="small text-accent text-decoration-none">Forgot?</a>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" class="form-control border-start-0" placeholder="••••••••" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary-custom w-100 py-2 mb-4">Login to Dashboard</button>
                    
                    <div class="text-center">
                        <p class="small text-muted mb-0">Don't have an account?</p>
                        <a href="register.php" class="text-accent fw-bold text-decoration-none">Register as Owner</a>
                    </div>
                </form>
            </div>
            
            <div class="text-center mt-4">
                <a href="../index.php" class="text-white-50 text-decoration-none small"><i class="fas fa-arrow-left me-2"></i> Back to Website</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Simple reveal animation for login page
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.reveal').forEach(el => {
            el.style.opacity = '1';
            el.style.transform = 'translateY(0)';
        });
    });
</script>
</body>
</html>
