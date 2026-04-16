<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Homestay</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #0f172a; height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Inter', sans-serif; }
        .login-card { background: #1e293b; border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; padding: 40px; width: 100%; max-width: 400px; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5); }
        .form-control { background: #0f172a; border: 1px solid #334155; color: white; padding: 12px; }
        .form-control:focus { background: #0f172a; color: white; border-color: #fbbf24; box-shadow: none; }
        .btn-admin { background: #fbbf24; color: #0f172a; font-weight: 700; border: none; padding: 12px; border-radius: 10px; transition: all 0.3s; }
        .btn-admin:hover { background: #f59e0b; transform: translateY(-2px); }
    </style>
</head>
<body>

<div class="login-card text-center">
    <h2 class="text-white mb-2">HOME<span style="color:#fbbf24">STAY</span></h2>
    <p class="text-secondary small mb-5">Administrator Portal</p>
    
    <form action="index.php">
        <div class="text-start mb-3">
            <label class="text-secondary small fw-bold mb-2">Username</label>
            <input type="text" class="form-control" placeholder="admin_user">
        </div>
        <div class="text-start mb-5">
            <label class="text-secondary small fw-bold mb-2">Password</label>
            <input type="password" class="form-control" placeholder="••••••••">
        </div>
        <button type="submit" class="btn btn-admin w-100 mb-3">Login to Console</button>
        <a href="../index.php" class="text-secondary small text-decoration-none"><i class="fas fa-arrow-left me-2"></i> back to site</a>
    </form>
</div>

</body>
</html>
