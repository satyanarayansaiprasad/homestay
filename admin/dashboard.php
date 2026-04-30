<?php
require_once '../includes/db.php';

if (!is_admin_logged_in()) {
    redirect('admin/login.php');
}

// Get Admin Stats
try {
    $total_users = db()->query("SELECT COUNT(*) FROM users")->fetchColumn();
    $pending_props = db()->query("SELECT COUNT(*) FROM properties WHERE status = 'Pending'")->fetchColumn();
    $live_props = db()->query("SELECT COUNT(*) FROM properties WHERE status = 'LIVE'")->fetchColumn();
    $total_enquiries = db()->query("SELECT COUNT(*) FROM enquiries")->fetchColumn();

    // Get Recent Enquiries
    $stmt_enq = db()->query("SELECT e.*, p.title as property_name FROM enquiries e LEFT JOIN properties p ON e.property_id = p.id ORDER BY e.created_at DESC LIMIT 5");
    $recent_enquiries = $stmt_enq->fetchAll();
} catch (Exception $e) {
    die("Error loading admin dashboard.");
}

$page_title = 'Admin Dashboard';
include '../includes/header.php';
?>

<div class="bg-dark text-white py-4">
    <div class="container">
        <h2 class="fw-bold mb-0">System Overview</h2>
        <p class="opacity-75">Welcome back, Administrator.</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <!-- Stats Bar -->
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <a href="users.php" class="text-decoration-none">
                    <div class="card border-0 shadow-sm p-4 text-center h-100 transition-hover">
                        <h1 class="fw-bold text-primary mb-1"><?php echo $total_users; ?></h1>
                        <p class="text-muted fw-bold mb-0">Total Owners</p>
                        <small class="text-primary mt-2 d-block">Manage Users &rarr;</small>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="approvals.php" class="text-decoration-none">
                    <div class="card border-0 shadow-sm p-4 text-center h-100 transition-hover">
                        <h1 class="fw-bold text-warning mb-1"><?php echo $pending_props; ?></h1>
                        <p class="text-muted fw-bold mb-0">Pending Approvals</p>
                        <small class="text-warning mt-2 d-block">Review Now &rarr;</small>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-4 text-center h-100">
                    <h1 class="fw-bold text-success mb-1"><?php echo $live_props; ?></h1>
                    <p class="text-muted fw-bold mb-0">Live Properties</p>
                </div>
            </div>
            <div class="col-md-3">
                <a href="enquiries.php" class="text-decoration-none">
                    <div class="card border-0 shadow-sm p-4 text-center h-100 transition-hover">
                        <h1 class="fw-bold text-info mb-1"><?php echo $total_enquiries; ?></h1>
                        <p class="text-muted fw-bold mb-0">Total Enquiries</p>
                        <small class="text-info mt-2 d-block">View Leads &rarr;</small>
                    </div>
                </a>
            </div>
        </div>

        <div class="row g-4">
            <!-- Property Approval Queue -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0 p-4 d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Pending Properties</h4>
                        <a href="approvals.php" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    <?php
                    $stmt_pend = db()->query("SELECT p.*, u.name as owner FROM properties p JOIN users u ON p.owner_id = u.id WHERE p.status = 'Pending' LIMIT 5");
                    $pending_list = $stmt_pend->fetchAll();
                    ?>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Property</th>
                                    <th>Owner</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($pending_list)): ?>
                                    <tr><td colspan="4" class="text-center py-4">No pending properties.</td></tr>
                                <?php else: ?>
                                    <?php foreach($pending_list as $p): ?>
                                    <tr>
                                        <td><strong><?php echo $p['title']; ?></strong></td>
                                        <td><?php echo $p['owner']; ?></td>
                                        <td><?php echo $p['category']; ?></td>
                                        <td>
                                            <a href="approvals.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-primary">Review</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recent Enquiries -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0 p-4">
                        <h4 class="mb-0">Recent Enquiries</h4>
                    </div>
                    <div class="p-4 pt-0">
                        <?php foreach($recent_enquiries as $enq): ?>
                        <div class="d-flex align-items-start mb-4">
                            <div class="bg-info bg-opacity-10 text-info p-2 rounded-3 me-3"><i class="fas fa-envelope"></i></div>
                            <div>
                                <h6 class="mb-0"><?php echo $enq['name']; ?> <small class="text-muted ms-2"><?php echo date('d M', strtotime($enq['created_at'])); ?></small></h6>
                                <p class="small text-muted mb-1"><?php echo $enq['property_name'] ?: 'General Inquiry'; ?></p>
                                <p class="text-truncate small" style="max-width: 250px;"><?php echo $enq['message']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <a href="enquiries.php" class="btn btn-outline-dark w-100">View All Enquiries</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
