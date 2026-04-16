<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Admin Console'; ?> - Homestay</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body class="dashboard-body">

<div class="sidebar sidebar-admin shadow" id="adminSidebar">
    <div class="p-4 mb-4 text-center">
        <h3 class="text-white mb-0">HOME<span style="color:var(--admin-accent)">STAY</span></h3>
        <small class="text-secondary">Administrator Console</small>
    </div>
    <nav class="mt-4">
        <a href="index.php" class="admin-nav-link <?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>">
            <i class="fas fa-chart-pie"></i> Overview
        </a>
        <a href="properties.php" class="admin-nav-link <?php echo ($activePage == 'properties') ? 'active' : ''; ?>">
            <i class="fas fa-home"></i> Property Approvals <span class="badge bg-danger ms-auto">2</span>
        </a>
        <a href="enquiries.php" class="admin-nav-link <?php echo ($activePage == 'enquiries') ? 'active' : ''; ?>">
            <i class="fas fa-envelope"></i> Enquiries
        </a>
        <a href="users.php" class="admin-nav-link <?php echo ($activePage == 'users') ? 'active' : ''; ?>">
            <i class="fas fa-users"></i> Owners
        </a>
        <div class="mt-5 pt-5 px-4">
            <a href="login.php" class="btn btn-outline-danger btn-sm w-100"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </div>
    </nav>
</div>

<div class="admin-main">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="fw-bold"><?php echo $mainHeading ?? 'Admin Overview'; ?></h2>
        <div class="d-flex gap-3 align-items-center">
            <span class="text-muted small">System Status: <span class="text-success fw-bold">Online</span></span>
            <div class="bg-white p-2 rounded shadow-sm"><i class="fas fa-user-shield text-primary me-2"></i> Super Admin</div>
        </div>
    </div>
