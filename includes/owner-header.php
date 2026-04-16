<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Owner Dashboard'; ?> - Homestay</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body class="dashboard-body">

<!-- Sidebar -->
<div class="sidebar sidebar-owner" id="sidebar">
    <div class="p-4 mb-4">
        <h3 class="text-white mb-0">HOME<span class="text-accent">STAY</span></h3>
        <small class="text-white-50">Owner Dashboard</small>
    </div>
    
    <nav class="mt-4">
        <a href="index.php" class="nav-link-dashboard <?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>">
            <i class="fas fa-th-large"></i> Dashboard
        </a>
        <a href="properties.php" class="nav-link-dashboard <?php echo ($activePage == 'properties') ? 'active' : ''; ?>">
            <i class="fas fa-home"></i> My Properties
        </a>
        <a href="add-property.php" class="nav-link-dashboard <?php echo ($activePage == 'add-property') ? 'active' : ''; ?>">
            <i class="fas fa-plus-circle"></i> Add Property
        </a>
        <a href="enquiries.php" class="nav-link-dashboard <?php echo ($activePage == 'enquiries') ? 'active' : ''; ?>">
            <i class="fas fa-envelope"></i> Enquiries
        </a>
        <div class="border-top border-secondary my-4"></div>
        <a href="../index.php" class="nav-link-dashboard">
            <i class="fas fa-globe"></i> View Website
        </a>
        <a href="login.php" class="nav-link-dashboard text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </nav>
</div>

<!-- Main Content Wrapper -->
<div class="main-content">
    <!-- Top Bar -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold mb-0"><?php echo $mainHeading ?? 'Dashboard'; ?></h2>
            <p class="text-muted"><?php echo $subHeading ?? 'Welcome back to your portal.'; ?></p>
        </div>
        <div class="d-flex align-items-center gap-3">
            <div class="bg-white p-2 rounded-circle shadow-sm">
                <i class="fas fa-bell text-muted px-2"></i>
            </div>
            <div class="d-flex align-items-center gap-2 bg-white p-1 pe-3 rounded-pill shadow-sm">
                <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">R</div>
                <span class="small fw-bold">Raja P.</span>
            </div>
        </div>
    </div>
