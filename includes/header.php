<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' | ' . SITE_NAME : SITE_NAME; ?></title>
    <meta name="description" content="Discover premium homestays, farm stays, and village stays in Madhya Pradesh with MyHomestayMP.">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo url('assets/css/style.css'); ?>">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo url(); ?>">
            <img src="<?php echo url('assets/img/Logo.jpeg'); ?>" alt="MyHomestayMP Logo" height="35" class="me-2 rounded shadow-sm">
            <span>MyHomestayMP</span>
        </a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center mt-3 mt-lg-0">
                <li class="nav-item w-100 text-center text-lg-start">
                    <a class="nav-link py-2" href="<?php echo url(); ?>">Home</a>
                </li>
                <li class="nav-item w-100 text-center text-lg-start">
                    <a class="nav-link py-2" href="<?php echo url('listings.php'); ?>">Homestays</a>
                </li>
                <li class="nav-item dropdown w-100 text-center text-lg-start">
                    <a class="nav-link dropdown-toggle py-2" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown">
                        About Us
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4" aria-labelledby="aboutDropdown">
                        <li><a class="dropdown-item py-2" href="<?php echo url('about'); ?>">Our Mission</a></li>
                        <li><a class="dropdown-item py-2" href="<?php echo url('social-heads'); ?>">Social Heads</a></li>
                        <li><a class="dropdown-item py-2" href="<?php echo url('governing-body'); ?>">Governing Body</a></li>
                    </ul>
                </li>
                <li class="nav-item ms-lg-2 w-100 w-lg-auto text-center text-lg-start">
                    <a class="nav-link py-2" href="<?php echo url('gallery'); ?>">Gallery</a>
                </li>
                <li class="nav-item ms-lg-2 w-100 w-lg-auto text-center text-lg-start">
                    <a class="nav-link py-2" href="<?php echo url('contact.php'); ?>">Contact</a>
                </li>
                
                <?php if(is_admin_logged_in()): ?>
                    <li class="nav-item dropdown ms-lg-3 w-100 w-lg-auto mt-2 mt-lg-0">
                        <a class="btn btn-outline-danger w-100 w-lg-auto dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-shield me-1"></i> Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 mt-lg-2" aria-labelledby="adminDropdown">
                            <li><a class="dropdown-item py-2" href="<?php echo url('admin/dashboard.php'); ?>"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                            <li><hr class="dropdown-divider opacity-50"></li>
                            <li><a class="dropdown-item py-2 text-danger" href="<?php echo url('admin/logout.php'); ?>"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                <?php elseif(is_logged_in()): ?>
                    <li class="nav-item dropdown ms-lg-3 w-100 w-lg-auto mt-2 mt-lg-0">
                        <a class="btn btn-primary-custom w-100 w-lg-auto dropdown-toggle" href="#" id="ownerDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> Hi, <?php echo explode(' ', $_SESSION['user_name'])[0]; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 mt-lg-2" aria-labelledby="ownerDropdown">
                            <li><a class="dropdown-item py-2" href="<?php echo url('owner/dashboard.php'); ?>"><i class="fas fa-th-large me-2"></i>My Dashboard</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo url('owner/add_property.php'); ?>"><i class="fas fa-plus me-2"></i>Add Property</a></li>
                            <li><hr class="dropdown-divider opacity-50"></li>
                            <li><a class="dropdown-item py-2 text-danger" href="<?php echo url('owner/logout.php'); ?>"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item ms-lg-3 w-100 w-lg-auto mt-3 mt-lg-0">
                        <div class="d-grid d-lg-flex gap-2">
                            <a class="btn btn-outline-success px-lg-4 py-2 text-nowrap d-flex align-items-center justify-content-center" href="<?php echo url('owner/login.php'); ?>">Login</a>
                            <a class="btn btn-primary-custom px-lg-4 py-2 text-nowrap d-flex align-items-center justify-content-center" href="<?php echo url('owner/register.php'); ?>">List Property</a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<main>
<?php
$flash = get_flash_message();
if ($flash):
?>
<div class="container mt-3">
    <div class="alert alert-<?php echo $flash['type']; ?> alert-dismissible fade show" role="alert">
        <?php echo $flash['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php endif; ?>
