<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Homestay</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --sidebar-width: 260px; --admin-bg: #0f172a; --admin-card: #1e293b; --admin-accent: #fbbf24; }
        body { background-color: #f1f5f9; font-family: 'Inter', sans-serif; }
        .admin-sidebar { width: var(--sidebar-width); height: 100vh; position: fixed; left: 0; top: 0; background: var(--admin-bg); color: white; z-index: 1000; }
        .admin-main { margin-left: var(--sidebar-width); padding: 30px; }
        .admin-nav-link { color: rgba(255,255,255,0.6); padding: 15px 25px; display: flex; align-items: center; text-decoration: none; transition: 0.3s; }
        .admin-nav-link:hover, .admin-nav-link.active { color: white; background: rgba(255,255,255,0.05); border-right: 4px solid var(--admin-accent); }
        .admin-nav-link i { width: 25px; margin-right: 15px; }
        .admin-card { border: none; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<!-- Admin Sidebar -->
<div class="admin-sidebar" id="adminSidebar">
    <div class="p-4 mb-4 text-center">
        <h3 class="text-white mb-0">HOME<span style="color:var(--admin-accent)">STAY</span></h3>
        <small class="text-secondary">Administrator Console</small>
    </div>
    <nav class="mt-4">
        <a href="index.php" class="admin-nav-link active"><i class="fas fa-chart-pie"></i> Overview</a>
        <a href="properties.php" class="admin-nav-link"><i class="fas fa-home"></i> Property Approvals <span class="badge bg-danger ms-auto">2</span></a>
        <a href="enquiries.php" class="admin-nav-link"><i class="fas fa-envelope"></i> Enquiries</a>
        <a href="users.php" class="admin-nav-link"><i class="fas fa-users"></i> Owners</a>
        <div class="mt-5 pt-5 px-4">
            <a href="login.php" class="btn btn-outline-danger btn-sm w-100"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </div>
    </nav>
</div>

<!-- Admin Main Content -->
<div class="admin-main">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="fw-bold">Overview</h2>
        <div class="d-flex gap-3 align-items-center">
            <span class="text-muted small">System Status: <span class="text-success fw-bold">Online</span></span>
            <div class="bg-white p-2 rounded shadow-sm"><i class="fas fa-user-shield text-primary me-2"></i> Super Admin</div>
        </div>
    </div>

    <!-- Stats -->
    <div class="row g-4 mb-5 text-center">
        <div class="col-lg-3 col-md-6">
            <div class="admin-card bg-white p-4">
                <h4 class="fw-bold mb-1">124</h4>
                <p class="text-muted small mb-0">Total Owners</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="admin-card bg-white p-4">
                <h4 class="fw-bold mb-1">452</h4>
                <p class="text-muted small mb-0">LIVE Properties</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="admin-card bg-white p-4 border-start border-danger border-4">
                <h4 class="fw-bold mb-1 text-danger">08</h4>
                <p class="text-muted small mb-0">Pending Requests</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="admin-card bg-white p-4">
                <h4 class="fw-bold mb-1">1,280</h4>
                <p class="text-muted small mb-0">Total Enquiries</p>
            </div>
        </div>
    </div>

    <!-- Recent Property Requests -->
    <div class="admin-card bg-white p-4 shadow-sm mb-5">
        <h5 class="fw-bold mb-4">Pending Approvals</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr class="text-muted small">
                        <th>Property</th>
                        <th>Owner</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="fw-bold">Riverside Studio</div>
                            <small class="text-muted">₹3,200/night</small>
                        </td>
                        <td>Raja Pratap Singh</td>
                        <td>Lucknow</td>
                        <td><span class="badge bg-warning text-dark">Review Pending</span></td>
                        <td>
                            <a href="properties.php" class="btn btn-sm btn-dark">View Details</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="fw-bold">Varanasi Ghat House</div>
                            <small class="text-muted">₹4,500/night</small>
                        </td>
                        <td>Anil Kumar</td>
                        <td>Varanasi</td>
                        <td><span class="badge bg-warning text-dark">Review Pending</span></td>
                        <td>
                            <a href="properties.php" class="btn btn-sm btn-dark">View Details</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Enquiries -->
    <div class="admin-card bg-white p-4 shadow-sm">
        <h5 class="fw-bold mb-4">Latest Visitor Enquiries</h5>
        <div class="table-responsive">
            <table class="table table-sm table-hover align-middle">
                <thead>
                    <tr class="text-muted small">
                        <th>Visitor</th>
                        <th>Property</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="fw-bold">Amit Sharma</div>
                            <small class="text-muted">amit@email.com</small>
                        </td>
                        <td>The Grand Nawab</td>
                        <td>Today, 10:30 AM</td>
                        <td><button class="btn btn-sm btn-outline-primary">Read</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="fw-bold">Sarah Jones</div>
                            <small class="text-muted">sarah@domain.com</small>
                        </td>
                        <td>Ganges View</td>
                        <td>Yesterday</td>
                        <td><button class="btn btn-sm btn-outline-primary">Read</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
