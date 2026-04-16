<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard - Homestay</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        :root {
            --sidebar-width: 280px;
        }
        body { background-color: #f0f2f5; }
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--primary-color);
            color: white;
            transition: all 0.3s;
            z-index: 1000;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 30px;
            min-height: 100vh;
        }
        .nav-link-dashboard {
            color: rgba(255, 255, 255, 0.7);
            padding: 12px 25px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }
        .nav-link-dashboard:hover, .nav-link-dashboard.active {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            border-left-color: var(--accent-color);
        }
        .nav-link-dashboard i { width: 25px; margin-right: 10px; }
        
        .stat-card {
            border: none;
            border-radius: 15px;
            padding: 25px;
            background: white;
            box-shadow: var(--shadow-sm);
        }
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        @media (max-width: 992px) {
            .sidebar { left: -100%; }
            .sidebar.show { left: 0; }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="p-4 mb-4">
        <h3 class="text-white mb-0">HOME<span class="text-accent">STAY</span></h3>
        <small class="text-white-50">Owner Dashboard</small>
    </div>
    
    <nav class="mt-4">
        <a href="index.php" class="nav-link-dashboard active">
            <i class="fas fa-th-large"></i> Dashboard
        </a>
        <a href="properties.php" class="nav-link-dashboard">
            <i class="fas fa-home"></i> My Properties
        </a>
        <a href="add-property.php" class="nav-link-dashboard">
            <i class="fas fa-plus-circle"></i> Add Property
        </a>
        <a href="enquiries.php" class="nav-link-dashboard">
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

<!-- Main Content -->
<div class="main-content">
    <!-- Top Bar -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold mb-0">Welcome Raja Pratap Singh</h2>
            <p class="text-muted">Here's what's happening with your properties today.</p>
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

    <!-- Stats Boxes -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                        <i class="fas fa-home"></i>
                    </div>
                    <span class="badge bg-success bg-opacity-10 text-success fw-normal">+2 this month</span>
                </div>
                <h3 class="fw-bold mb-0">05</h3>
                <p class="text-muted mb-0 small">Total Properties</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <span class="badge bg-primary bg-opacity-10 text-primary fw-normal">12 new</span>
                </div>
                <h3 class="fw-bold mb-0">28</h3>
                <p class="text-muted mb-0 small">Customer Enquiries</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="stat-icon bg-info bg-opacity-10 text-info">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <h3 class="fw-bold mb-0">01</h3>
                <p class="text-muted mb-0 small">Pending Approvals</p>
            </div>
        </div>
    </div>

    <!-- Recent Properties Table -->
    <div class="glass-card p-4 border-0 shadow-sm bg-white">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">My Properties</h5>
            <a href="add-property.php" class="btn btn-primary-custom btn-sm">Add New</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="border-0">Property</th>
                        <th class="border-0">Location</th>
                        <th class="border-0">Price</th>
                        <th class="border-0">Added On</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-0">
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=100" class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-0">The Grand Nawab Residence</h6>
                                    <small class="text-muted">ID: #HOM-2024</small>
                                </div>
                            </div>
                        </td>
                        <td class="border-0 text-muted">Hazratganj, Lucknow</td>
                        <td class="border-0">₹5,500/night</td>
                        <td class="border-0 text-muted">Oct 12, 2024</td>
                        <td class="border-0">
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">LIVE</span>
                        </td>
                        <td class="border-0">
                            <div class="btn-group">
                                <button class="btn btn-light btn-sm text-primary"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-light btn-sm text-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="border-0">
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?auto=format&fit=crop&q=80&w=100" class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-0">Riverside Studio</h6>
                                    <small class="text-muted">ID: #HOM-2025</small>
                                </div>
                            </div>
                        </td>
                        <td class="border-0 text-muted">Gomti Nagar, Lucknow</td>
                        <td class="border-0">₹3,200/night</td>
                        <td class="border-0 text-muted">Oct 15, 2024</td>
                        <td class="border-0">
                            <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3">Pending</span>
                        </td>
                        <td class="border-0">
                            <div class="btn-group">
                                <button class="btn btn-light btn-sm text-primary"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-light btn-sm text-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
