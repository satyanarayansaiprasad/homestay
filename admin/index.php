<?php 
$pageTitle = 'Admin Overview';
$activePage = 'dashboard';
$mainHeading = 'Overview';
include '../includes/admin-header.php'; 
?>

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

<?php include '../includes/admin-footer.php'; ?>
