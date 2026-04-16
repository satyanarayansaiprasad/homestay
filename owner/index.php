<?php 
$pageTitle = 'Owner Dashboard';
$activePage = 'dashboard';
$mainHeading = 'Welcome Raja Pratap Singh';
$subHeading = 'Here\'s what\'s happening with your properties today.';
include '../includes/owner-header.php'; 
?>

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

<?php include '../includes/owner-footer.php'; ?>
