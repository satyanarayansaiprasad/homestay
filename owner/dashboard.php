<?php
require_once '../includes/db.php';

if (!is_logged_in()) {
    redirect('owner/login.php');
}

$owner_id = $_SESSION['user_id'];

// Get Stats
try {
    $stmt_props = db()->prepare("SELECT COUNT(*) FROM properties WHERE owner_id = ?");
    $stmt_props->execute([$owner_id]);
    $total_properties = $stmt_props->fetchColumn();

    $stmt_live = db()->prepare("SELECT COUNT(*) FROM properties WHERE owner_id = ? AND status = 'LIVE'");
    $stmt_live->execute([$owner_id]);
    $live_properties = $stmt_live->fetchColumn();

    $stmt_enquiries = db()->prepare("SELECT COUNT(*) FROM enquiries WHERE property_id IN (SELECT id FROM properties WHERE owner_id = ?)");
    $stmt_enquiries->execute([$owner_id]);
    $total_enquiries = $stmt_enquiries->fetchColumn();

    // Get Recent Properties
    $stmt_list = db()->prepare("SELECT * FROM properties WHERE owner_id = ? ORDER BY created_at DESC");
    $stmt_list->execute([$owner_id]);
    $my_properties = $stmt_list->fetchAll();
} catch (Exception $e) {
    die("Error loading dashboard data.");
}

$page_title = 'Owner Dashboard';
include '../includes/header.php';
?>

<div class="bg-light py-4 py-md-5">
    <div class="container text-center text-md-start">
        <h2 class="fw-bold mb-1">Welcome, <?php echo $_SESSION['user_name']; ?></h2>
        <p class="text-muted mb-0">Manage your business and homestay listings here.</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <!-- Stats Cards -->
        <div class="row g-3 g-md-4 mb-5">
            <div class="col-6 col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-3 p-md-4 text-center h-100">
                    <div class="bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3 class="fw-bold mb-1"><?php echo $total_properties; ?></h3>
                    <p class="text-muted small mb-0">Properties</p>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-3 p-md-4 text-center h-100">
                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="fw-bold mb-1"><?php echo $live_properties; ?></h3>
                    <p class="text-muted small mb-0">Live Listings</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <a href="enquiries.php" class="text-decoration-none h-100 d-block">
                    <div class="card border-0 shadow-sm rounded-4 p-3 p-md-4 text-center transition-hover h-100">
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3 class="fw-bold mb-1"><?php echo $total_enquiries; ?></h3>
                        <p class="text-muted small mb-0 fw-bold">Total Enquiries</p>
                        <small class="text-info mt-2 d-block">Manage Leads &rarr;</small>
                    </div>
                </a>
            </div>
        </div>

        <!-- My Properties Table Header -->
        <div class="row align-items-center mb-4 g-3">
            <div class="col-md-6 text-center text-md-start">
                <h4 class="mb-0">My Properties</h4>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="add_property.php" class="btn btn-primary-custom w-100 w-md-auto"><i class="fas fa-plus me-2"></i>Add New Property</a>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="p-3">Title</th>
                            <th class="p-3">Category</th>
                            <th class="p-3">Price</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Added On</th>
                            <th class="p-3 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($my_properties)): ?>
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">You haven't added any properties yet.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($my_properties as $prop): ?>
                            <tr>
                                <td class="p-3 fw-bold"><?php echo $prop['title']; ?></td>
                                <td class="p-3"><?php echo $prop['category']; ?></td>
                                <td class="p-3">₹<?php echo number_format($prop['price']); ?></td>
                                <td class="p-3">
                                    <span class="badge-status <?php echo 'status-' . strtolower($prop['status']); ?>">
                                        <?php echo $prop['status']; ?>
                                    </span>
                                </td>
                                <td class="p-3"><?php echo date('M d, Y', strtotime($prop['created_at'])); ?></td>
                                <td class="p-3 text-end">
                                    <a href="edit_property.php?id=<?php echo $prop['id']; ?>" class="btn btn-sm btn-outline-secondary me-2"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo url('property/' . $prop['slug']); ?>" class="btn btn-sm btn-outline-primary" target="_blank"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="text-center py-5">
    <a href="logout.php" class="btn btn-outline-danger px-4">Logout Session</a>
</div>

<?php include '../includes/footer.php'; ?>
