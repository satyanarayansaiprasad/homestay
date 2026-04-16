<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Registration - Homestay</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-primary-custom" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 50px 0;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="text-center mb-5">
                <a href="../index.php" class="text-decoration-none">
                    <h2 class="text-white">HOME<span class="text-accent">STAY</span></h2>
                </a>
                <p class="text-white opacity-75">Partner with us and share your home</p>
            </div>
            
            <div class="glass-card p-5 shadow-lg">
                <h4 class="mb-4">Owner Registration</h4>
                <form action="login.php">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold">Full Name</label>
                            <input type="text" class="form-control" placeholder="John Doe" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Email Address</label>
                            <input type="email" class="form-control" placeholder="your@email.com" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Phone Number</label>
                            <input type="tel" class="form-control" placeholder="+91 XXX XXX XXXX" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Password</label>
                            <input type="password" class="form-control" placeholder="Create a strong password" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Repeat password" required>
                        </div>
                        <div class="col-12 my-4">
                            <div class="form-check small">
                                <input class="form-check-input" type="checkbox" value="" id="terms" required>
                                <label class="form-check-label text-muted" for="terms">
                                    I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary-custom w-100 py-3">Create Account</button>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <p class="small text-muted mb-0">Already have an account?</p>
                        <a href="login.php" class="text-accent fw-bold text-decoration-none">Login Here</a>
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
</body>
</html>
